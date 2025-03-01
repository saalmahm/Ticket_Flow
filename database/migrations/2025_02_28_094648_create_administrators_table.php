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
            $table->string('os'); // Assure-toi que ce champ est bien défini et non NULL
            $table->string('software'); // Assure-toi que ce champ est bien défini et non NULL
            $table->timestamp('creationDate')->nullable();
            $table->string('status')->default('Ouvert');
            $table->foreignId('createdBy')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
