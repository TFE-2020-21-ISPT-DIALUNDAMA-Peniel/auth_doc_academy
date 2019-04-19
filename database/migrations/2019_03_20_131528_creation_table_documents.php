<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreationTableDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lib',65);
            $table->string('abbr',65);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        Schema::create('annees', function (Blueprint $table) {
            $table->increments('id');
            $table->year('annee_debut');
            $table->year('annee_fin');
            $table->string('annee_format',10);
            $table->boolean('statut')->default(false);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricule',65);
            $table->string('nom',65);
            $table->string('postnom',65)->nullable();
            $table->string('prenom',65)->nullable();
            $table->string('code',255)->unique();
            $table->integer('pourcentage');
            $table->unsignedInteger('id_annee');
            $table->unsignedInteger('id_promotion');
            $table->foreign('id_annee')
                  ->references('id')->on('annees')->onDelete('cascade');
            $table->foreign('id_promotion')
                  ->references('id')->on('promotions')->onDelete('cascade');



            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
        Schema::dropIfExists('promotions');
        Schema::dropIfExists('annees');
        
    }
}
