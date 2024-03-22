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
        Schema::disableForeignKeyConstraints();
        Schema::create('oportunidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_oportunidad');
            $table->decimal('monto', 4,2);
            $table->date('fecha_cierre');
            $table->tinyInteger('estatus')->default(1);
            $table->text('notas')->nullable();
            $table->foreignId('prospectos_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oportunidades');
    }
};
