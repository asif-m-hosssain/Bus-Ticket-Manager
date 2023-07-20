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
        Schema::create('customer_ticket', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('customer_ticket', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('customer_name');
            $table->string('from');
            $table->string('to');
            $table->string('date');
            $table->string('Customerseat');
            $table->string('totalprice');
            $table->string('ticket_company');
            $table->string('ticketid');
            $table->string('company_ticket_id');
            $table->timestamps();
        });
    }
};
