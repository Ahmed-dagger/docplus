<?php
namespace App\Console\Commands\Contract;
use Illuminate\Console\Command;
use App\Models\DoctorContract;
use Illuminate\Support\Facades\{Mail, Log};
use Carbon\Carbon;

class NotifyExpiringContracts extends Command {
    protected $signature = 'notify:expiring-contracts';
    protected $description = 'Notify admin of contracts expiring in the next month';
    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        $nextMonth = Carbon::now()->addMonth();
        $today = Carbon::now();
        $contracts = DoctorContract::whereBetween('contract_end_date', [$today, $nextMonth])
            ->with(['doctor.governorate', 'doctor.specialization'])
            ->get();
        $contractsCount = $contracts->count();
        if ($contractsCount > 0) {
            foreach ($contracts as $contract) {
                $doctor = $contract->doctor;
                Mail::send('emails.expiring_contract', ['contract' => $contract, 'doctor' => $doctor], function($message) use ($contract) {
                    $message->to('network@doctoriaplus.com')
                        ->subject('Doctor Contract Expiring Soon: ' . $contract->doctor->name);
                });
            }
            $this->info("Sent {$contractsCount} notification(s) for expiring contracts.");
            Log::info("Sent {$contractsCount} notification(s) for expiring contracts.");
        } else {
            $this->info('No contracts expiring in the next month.');
            Log::info('No contracts expiring in the next month.');
        }
        return 0;
    }
}
