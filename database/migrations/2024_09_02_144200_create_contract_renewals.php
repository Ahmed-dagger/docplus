<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contract_renewals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('doctor_contract_id')->constrained('doctor_contracts')->onDelete('cascade')->onUpdate('cascade');
            $table->date('renewal_start_date');
            $table->date('renewal_end_date')->nullable();
            $table->string('renewed_attach_contract')->nullable();
            $table->string('renewed_attach_documents')->nullable();
            $table->string('renewed_attach_price_list')->nullable();
            $table->decimal('renewed_home_care_gross_price', 8, 2)->nullable();
            $table->string('renewed_home_care_discount')->nullable();
            $table->decimal('renewed_home_care_net_price', 8, 2)->nullable();
            $table->decimal('renewed_service_clinic_gross_price', 8, 2)->nullable();
            $table->string('renewed_service_clinic_discount')->nullable();
            $table->decimal('renewed_service_clinic_net_price', 8, 2)->nullable();
            $table->string('renewed_price_list_outpatient')->nullable();
            $table->string('renewed_price_list_intpatient')->nullable();
            $table->decimal('renewed_service_online_gross_price', 8, 2)->nullable();
            $table->string('renewed_service_online_discount')->nullable();
            $table->decimal('renewed_service_online_net_price', 8, 2)->nullable();
            $table->text('renewal_note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contract_renewals');
    }
};
