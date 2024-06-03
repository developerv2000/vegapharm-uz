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
    Schema::create('presence_translations', function (Blueprint $table) {
      $table->id();
      $table->string('locale');
      $table->integer('presence_id');
      $table->string('title')->nullable();
      $table->string('address')->nullable();
      $table->string('phone')->nullable();
      $table->string('email')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('presence_translations');
  }
};
