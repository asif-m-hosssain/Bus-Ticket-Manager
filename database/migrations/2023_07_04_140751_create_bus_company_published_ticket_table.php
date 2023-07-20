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
        Schema::create('bus_company_published_ticket', function (Blueprint $table) {
            $table->id();
            $table->string("b_comp_ticket_from");
            $table->string("b_comp_ticket_to");
            $table->integer("b_comp_ticket_seat");
            $table->dateTime("b_comp_ticket_date");
            $table->integer("b_comp_ticket_price");
            $table->integer("b_comp_ticket_author_id");
            $table->string("b_comp_ticket_author_name");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_company_published_ticket');
    }
};
