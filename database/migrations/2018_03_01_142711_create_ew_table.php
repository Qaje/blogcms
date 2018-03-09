<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEwTable extends Migration
{

    public function up()
        {

            Schema::create('external_users', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('ext_user_id')->unsigned();
                $table->integer('passport_number')->unsigned();
                $table->string('nationality', 100);
                $table->string('lodging', 100); //hospedae
                $table->string('first_name', 100);
                $table->string('last_name', 100);
                $table->string('id_number', 100);
                $table->string('email', 100);
                $table->string('password', 50);
                $table->string('activation_code', 100);
                $table->timestamp('last_login', 100);
                $table->timestamp('count_up', 150);
                $table->timestamp('count_down', 150);
                $table->string('geolocalization',50);
                $table->timestamps();
                $table->index(['user_id','namespace', 'group', 'item'], 'user_item_index');
            });


            
            Schema::create('entities', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('nit')->unsigned();
                $table->string('department',30);
                $table->string('municipality',30);
                $table->string('type_id', 100);
                $table->string('entity_user_ad',100);   
                $table->string('description', 100);
                $table->string('web_address', 100);
                $table->string('email', 100);
                $table->string('phone_number', 50);
                $table->string('geolocalization',50);
                $table->timestamps();
                $table->index(['user_id', 'namespace', 'group', 'item'], 'user_item_index');
            });
            
            Schema::create('entity_users', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('ent_user_id')->unsigned();
                $table->integer('id_number')->unsigned();//numero de carnet
                $table->string('father_name', 100);
                $table->string('mother_name', 100);
                $table->string('names', 100);
                $table->string('id_number', 100);
                $table->string('email', 100);
                $table->string('password', 50);
                $table->string('activation_code', 100);
                $table->string('cell_phone_number', 100);
                $table->string('geolocalization',50);
                $table->timestamp('count_up', 150);
                $table->timestamp('count_down', 150);
                $table->text('value')->nullable();
                $table->timestamps();
                $table->index(['user_id', 'namespace', 'group', 'item'], 'user_item_index');
            });

            Schema::create('superadmins', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('super_id')->unsigned();
                $table->string('first_name', 100);
                $table->string('last_name', 100);
                $table->string('id_number', 100);
                $table->string('email', 100);
                $table->string('password', 50);
                $table->string('activation_code', 100);
                $table->text('value')->nullable();
                $table->timestamps();
                $table->index(['user_id', 'namespace', 'group', 'item'], 'user_item_index');
            });

            

            Schema::create('property_types',function (Blueprint $table){
                $table->emgine = 'InnoDB';
                $table->increments('id');
                $table->string('category',20);
                $table->string('type');
                $table->string('decription',200);
                $table->timestamps();
            });

            Schema::create('tour_guides',function(Blueprin $table){
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('municipality',40);
                $table->string('father_name', 100);
                $table->string('mother_name', 100);
                $table->string('names',100);
                $table->string('type_guide',50);
                $table->string('geolocalization',100);
                $table->timestamps();
            });

            Schema::create('events', function(Blueprint $table){
                $table->engine = 'InnoDB';
                $table->incremets('id');
                $table->timestamp('date_begin');
                $table->timestamp('date_end');
                $table->string('cost',50);
                $table->string('name',100);
                $table->string('description',100);
                $table->string('geolocalization',100);
                $table->foreign('superadmin_id')
                  ->references('id')->on('superadmins')->onDelete('cascade');
                $table->timestamps();
            });
        


        public function down()
        {
            Schema::dropIfExists('events');
            Schema::dropIfExists('tour_guides');
            Schema::dropIfExists('property_types');
            
            Schema::dropIfExists('external_users');
            Schema::dropIfExists('entity_users');
            Schema::dropIfExists('superadmins');
            Schema::dropIfExists('entities');
        }


    /**************************
    AGREGAR EL USUARIO DE PREFECTURA PARA QUE PUEDA TAMBIEN ADMINISTRAR
    LAS PUBICACIONES DEL LUGAR
    O SU DE JURISDICCION        
    */ 
        
 

                   
