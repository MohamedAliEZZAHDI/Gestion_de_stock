<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockPfsfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_pfsf', function (Blueprint $table) {
            $table->id();
            $table->string('code_PFSF');
            $table->integer('quantite');
            $table->string('code_PF');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
        $this->populateTable();
    }

    private function populateTable(){
        \Illuminate\Support\Facades\DB::statement("INSERT INTO `stocks`.`stock_pfsf` (`code_PFSF`, `quantite`, `code_PF`) VALUES
 ('PSF001', 0, 'PF001'),
 ('PSF002', 0, 'PF002'),
 ('PSF003', 0, 'PF003'),
 ('PSF004', 0, 'PF004'),
 ('PSF005', 0, 'PF005'),
 ('PSF006', 0, 'PF006'),
 ('PSF007', 0, 'PF007'),
 ('PSF008', 0, 'PF008'),
 ('PSF009', 0, 'PF009'),
 ('PSF010', 0, 'PF010'),
 ('PSF011', 0, 'PF011'),
 ('PSF012', 0, 'PF012'),
 ('PSF013', 0, 'PF013'),
 ('PSF014', 0, 'PF014'),
 ('PSF015', 0, 'PF015'),
 ('PSF016', 0, 'PF016'),
 ('PSF017', 0, 'PF017'),
 ('PSF018', 0, 'PF018'),
 ('PSF019', 0, 'PF019'),
 ('PSF020', 0, 'PF020'),
 ('PSF021', 0, 'PF021'),
 ('PSF022', 0, 'PF022'),
 ('PSF023', 0, 'PF023'),
 ('PSF024', 0, 'PF024'),
 ('PSF025', 0, 'PF025'),
 ('PSF026', 0, 'PF026'),
 ('PSF027', 0, 'PF027'),
 ('PSF028', 0, 'PF028'),
 ('PSF029', 0, 'PF029'),
 ('PSF030', 0, 'PF030'),
 ('PSF031', 0, 'PF031'),
 ('PSF032', 0, 'PF032'),
 ('PSF033', 0, 'PF033'),
 ('PSF034', 0, 'PF034'),
 ('PSF035', 0, 'PF035'),
 ('PSF036', 0, 'PF036'),
 ('PSF037', 0, 'PF037'),
 ('PSF038', 0, 'PF038'),
 ('PSF039', 0, 'PF039'),
 ('PSF040', 0, 'PF040'),
 ('PSF041', 0, 'PF041'),
 ('PSF042', 0, 'PF042'),
 ('PSF043', 0, 'PF043'),
 ('PSF044', 0, 'PF044'),
 ('PSF045', 0, 'PF045'),
 ('PSF046', 0, 'PF046'),
 ('PSF047', 0, 'PF047'),
 ('PSF048', 0, 'PF048'),
 ('PSF049', 0, 'PF049'),
 ('PSF051', 0, 'PF051'),
 ('PSF053', 0, 'PF053');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_pfsf', function (Blueprint $table) {
            //
        });
    }
}
