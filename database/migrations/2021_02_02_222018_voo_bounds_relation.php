<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VooBoundsRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voo_group', function (Blueprint $table) {
            $table->id();
            $table->integer('voo_id');
            $table->uuid('group_id');
            $table->enum('boundType', ['inbond', 'outbound'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voo_group');
    }
}
