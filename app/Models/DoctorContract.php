<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorContract extends Model {
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'contract_start_date',
        'contract_end_date',
        'attach_contract',
        'attach_documents',
        'attach_price_list',
        'service_online_price',
        'service_home_care_price',
        'service_clinic_price',
        'price_list_discount',
        'contract_note'
    ];
    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function renewals() {
        return $this->hasMany(ContractRenewal::class);
    }

}
