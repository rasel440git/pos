<?php

use App\Models\Admin;
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
        $admin=[
            'name'=>'Admin',
            'email'=>'admin@admin',
            'email_verified_at'=>now(),
            'password'=>Hash::make(123456),
            'phone'=> '01709321838',
            'address'=>'Dhaka',
            
        ];
        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
