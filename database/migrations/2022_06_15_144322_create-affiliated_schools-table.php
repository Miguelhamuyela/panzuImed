<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatedSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliatedSchools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tel')->nullable();
            $table->longText('email')->nullable();
            $table->longText('address')->nullable();
            $table->longText('site')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('affiliatedSchools');
    }
}
