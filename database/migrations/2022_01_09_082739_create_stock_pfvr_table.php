<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockPfvrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_pfvr', function (Blueprint $table) {
            $table->id();
            $table->string('code_PFVR');
            $table->integer('quantite');
            $table->string('code_PF');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
        $this->populateTable();
    }

    private function populateTable(){
        \Illuminate\Support\Facades\DB::statement("INSERT INTO `stocks`.`stock_pfvr` (`code_PFVR`, `quantite`, `code_PF`) VALUES
 ('PRV001', 0, 'PF001'),
 ('PRV002', 0, 'PF002'),
 ('PRV003', 0, 'PF003'),
 ('PRV004', 0, 'PF004'),
 ('PRV005', 0, 'PF005'),
 ('PRV006', 0, 'PF006'),
 ('PRV007', 0, 'PF007'),
 ('PRV008', 0, 'PF008'),
 ('PRV009', 0, 'PF009'),
 ('PRV010', 0, 'PF010'),
 ('PRV011', 0, 'PF011'),
 ('PRV012', 0, 'PF012'),
 ('PRV013', 0, 'PF013'),
 ('PRV014', 0, 'PF014'),
 ('PRV015', 0, 'PF015'),
 ('PRV016', 0, 'PF016'),
 ('PRV017', 0, 'PF017'),
 ('PRV018', 0, 'PF018'),
 ('PRV019', 0, 'PF019'),
 ('PRV020', 0, 'PF020'),
 ('PRV021', 0, 'PF021'),
 ('PRV022', 0, 'PF022'),
 ('PRV023', 0, 'PF023'),
 ('PRV024', 0, 'PF024'),
 ('PRV025', 0, 'PF025'),
 ('PRV026', 0, 'PF026'),
 ('PRV027', 0, 'PF027'),
 ('PRV028', 0, 'PF028'),
 ('PRV029', 0, 'PF029'),
 ('PRV030', 0, 'PF030'),
 ('PRV031', 0, 'PF031'),
 ('PRV032', 0, 'PF032'),
 ('PRV033', 0, 'PF033'),
 ('PRV034', 0, 'PF034'),
 ('PRV035', 0, 'PF035'),
 ('PRV036', 0, 'PF036'),
 ('PRV037', 0, 'PF037'),
 ('PRV038', 0, 'PF038'),
 ('PRV039', 0, 'PF039'),
 ('PRV040', 0, 'PF040'),
 ('PRV041', 0, 'PF041'),
 ('PRV042', 0, 'PF042'),
 ('PRV043', 0, 'PF043'),
 ('PRV044', 0, 'PF044'),
 ('PRV045', 0, 'PF045'),
 ('PRV046', 0, 'PF046'),
 ('PRV047', 0, 'PF047'),
 ('PRV048', 0, 'PF048'),
 ('PRV049', 0, 'PF049'),
 ('PRV051', 0, 'PF051'),
 ('PRV053', 0, 'PF053');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_pfvr', function (Blueprint $table) {
            //
        });
    }
}
