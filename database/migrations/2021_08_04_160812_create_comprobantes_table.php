<?php

use App\Models\Area;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->string('comprobante');
            $table->string('detalle');

            $table->double('BrutoComp')->default(0);
            $table->double('ParticIva')->default("No");
            $table->double('MontoIva')->default(0);
            $table->double('ExentoComp')->default(0);
            $table->double('ImpInternoComp')->default(0);
            $table->double('PercepcionIvaComp')->default(0);
            $table->double('RetencionIB')->default(0);
            $table->double('RetencionGan')->default(0);
            $table->double('NetoComp')->default(0);
            $table->double('MontoPagadoComp')->default(0);
            $table->double('CantidadLitroComp')->default(0);
            $table->boolean('Cerrado')->default(0);
            $table->double('Anio')->default(0);
            $table->integer('PasadoEnMes')->default(0);

            $table->unsignedBigInteger('iva_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('cuenta_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('proveedor_id');

            
            $table->foreign('iva_id')->references('id')->on('ivas');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comprobantes');
    }
}
