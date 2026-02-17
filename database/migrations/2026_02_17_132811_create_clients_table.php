<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            // Primary Key 'id'
            $table->id();
            $table->string('name');
            // nullable: variables cuyos valores son opcionales en el formulario
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->text('notes')->nullable();
            // tinyInteger: Servirá para definir el estatus del usuario como activo/inactivo.
            // default: variables que se inicializan con un valor
            $table->tinyInteger('active')->default(1);
            // foreignId: clave id que relaciona hacia otra tabla
            // constrained: se le indica que esta id se relacionará con la tabla 'users'
            // onDelete: Determina el comportamiento sobre los registros, en este caso, 'restricted' se restringe la eliminación de registros
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            // timestamps: fechas de actualización del registro
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
