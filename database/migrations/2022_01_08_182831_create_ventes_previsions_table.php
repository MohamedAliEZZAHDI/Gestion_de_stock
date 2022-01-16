<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesPrevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes_previsions', function (Blueprint $table) {
            $table->id();
            $table->string('code_PF');
            $table->integer('quantite');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
        $this->populateTable();
    }

    private function populateTable(){
        \Illuminate\Support\Facades\DB::statement("INSERT INTO `stocks`.`ventes_previsions` (`code_PF`, `quantite`) VALUES ('PF001', 0), ('PF002', 0), ('PF003', 0), ('PF004', 0), ('PF005', 0), ('PF006', 0), ('PF007', 0), ('PF008', 0), ('PF009', 0), ('PF010', 0), ('PF011', 0), ('PF012', 0), ('PF013', 0), ('PF014', 0), ('PF015', 0), ('PF016', 0), ('PF017', 0), ('PF018', 0), ('PF019', 0), ('PF020', 0), ('PF021', 0), ('PF022', 0), ('PF023', 0), ('PF024', 0), ('PF025', 0), ('PF026', 0), ('PF027', 0), ('PF028', 0), ('PF029', 0), ('PF030', 0), ('PF031', 0), ('PF032', 0), ('PF033', 0), ('PF034', 0), ('PF035', 0), ('PF036', 0), ('PF037', 0), ('PF038', 0), ('PF039', 0), ('PF040', 0), ('PF041', 0), ('PF042', 0), ('PF043', 0), ('PF044', 0), ('PF045', 0), ('PF046', 0), ('PF047', 0), ('PF048', 0), ('PF049', 0), ('PF051', 0), ('PF053', 0);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventes_previsions', function (Blueprint $table) {
            //
        });
    }
}
