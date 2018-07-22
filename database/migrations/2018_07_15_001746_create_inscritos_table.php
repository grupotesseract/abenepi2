<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInscritosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscritos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf');
            $table->string('nome');
            $table->string('profissao');
            $table->string('endereco', 1000);
            $table->string('bairro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->text('cep');
            $table->string('email');
            $table->string('senha');
            $table->boolean('compareceu');
            $table->boolean('pagou');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefone');
            $table->string('nascimento');
            $table->decimal('valor',10,2);
            $table->string('dia_inscrito')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscritos');
    }
}
