<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // firstname
    // - lastname
    // - middle name (optional)
    // - passport (File)
    // - id-card number (auto generate this for each organization)
    // - issued (date)
    // - expiry (optional - date)
    // - template_name (enum HORIZONTAL or PORTRAIT)
    // - category (enum GOVERNMENT, MEMBERS, PERSONAL)
    public function up()
    {
        Schema::create('id_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('organization_id')->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations');

            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('passport')->nullable();
            $table->string('id_card_number')->nullable();
            $table->string('issued_date')->nullable();
            $table->string('expiry_date')->nullable();

            $table->string('qr_code')->nullable();
            $table->string('qr_code_url')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('role')->nullable();


            $table->enum('template_name', ['horizontal', 'portrait'])->default('horizontal')->nullable();
            $table->enum('category', ['government', 'members','personal'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('id_cards');
    }
}
