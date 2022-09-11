<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_invoices', function (Blueprint $table) {
           
            $table->String('date')->nullable()->after('invoice_id');
            $table->String('note')->nullable()->after('date');
 
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_invoices', function (Blueprint $table) {
           
            $table->String('date');
            $table->String('note');
 
        });
    }
};
