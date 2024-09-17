<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctor_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->date('contract_start_date')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->string('attach_contract')->nullable();
            $table->string('attach_documents')->nullable();
            $table->string('attach_price_list')->nullable();
            $table->decimal('home_care_gross_price', 8, 2)->nullable();
            $table->string('home_care_discount')->nullable();
            $table->decimal('home_care_net_price', 8, 2)->nullable();
            $table->decimal('service_clinic_gross_price', 8, 2)->nullable();
            $table->string('service_clinic_discount')->nullable();
            $table->decimal('service_clinic_net_price', 8, 2)->nullable();
            $table->string('price_list_outpatient')->nullable();
            $table->string('price_list_intpatient')->nullable();
            $table->decimal('service_online_gross_price', 8, 2)->nullable();
            $table->string('service_online_discount')->nullable();
            $table->decimal('service_online_net_price', 8, 2)->nullable();
            $table->text('contract_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_contracts');
    }
};
