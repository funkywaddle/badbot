<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcssDashboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dcss_dashboard', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->onDelete('cascade');
            $table->string('borderColor');
            $table->string('borderSize');
            $table->string('backgroundColor');
            $table->string('textColor');
            $table->string('hoverBorderColor');
            $table->string('hoverBorderSize');
            $table->string('hoverBackgroundColor');
            $table->string('hoverTextColor');

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dcss_dashboard');
    }
}
