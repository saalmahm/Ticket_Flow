<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('priority');
            $table->string('os');
            $table->string('software');
            $table->date('creationDate');
            $table->string('status');
            $table->date('assignDate')->nullable();
            $table->unsignedBigInteger('assignedTo')->nullable();
            $table->unsignedBigInteger('createdBy');
            $table->foreign('assignedTo')->references('id')->on('users')->onDelete('set null');
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}