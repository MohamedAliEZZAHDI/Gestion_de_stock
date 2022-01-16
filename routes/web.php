<?php

use App\Http\Controllers\BCComposant_Controller;
use App\Http\Controllers\BesoinComposantController;
use App\Http\Controllers\CommandeComposantController;
use App\Http\Controllers\StockComposant_Controller;
use App\Http\Controllers\StockPFVR_Controller;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FabricationController;
use \App\Http\Controllers\PrevisionController;
use \App\Http\Controllers\StockPFSF_Controller;
use \App\Http\Controllers\StockPF_Controller;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){
    return view('welcome');
} );

Route::get('fabrication_pf', [FabricationController::class,'index'])->name('ajaxdata');
Route::get('fabrication/getdata', [FabricationController::class, 'getData'])->name('ajaxdata.getdata');
Route::post('fabrication/postdata',  [FabricationController::class, 'postData'])->name('ajaxdata.postdata');
Route::get('fabrication/fetchdata', [FabricationController::class, 'fetchData'])->name('ajaxdata.fetchdata');


Route::get('prevision', [PrevisionController::class,'index'])->name('prevision');
Route::get('prevision/getdata', [PrevisionController::class, 'getData'])->name('prevision.getdata');
Route::post('prevision/postdata',  [PrevisionController::class, 'postData'])->name('prevision.postdata');
Route::get('prevision/fetchdata', [PrevisionController::class, 'fetchData'])->name('prevision.fetchdata');


Route::get('stock_pfsf', [StockPFSF_Controller::class,'index'])->name('stock_pfsf');
Route::get('stock_pfsf/getdata', [StockPFSF_Controller::class, 'getData'])->name('stock_pfsf.getdata');
Route::post('stock_pfsf/postdata',  [StockPFSF_Controller::class, 'postData'])->name('stock_pfsf.postdata');
Route::get('stock_pfsf/fetchdata', [StockPFSF_Controller::class, 'fetchData'])->name('stock_pfsf.fetchdata');


Route::get('stock_pfvr', [StockPFVR_Controller::class,'index'])->name('stock_pfvr');
Route::get('stock_pfvr/getdata', [StockPFVR_Controller::class, 'getData'])->name('stock_pfvr.getdata');
Route::post('stock_pfvr/postdata',  [StockPFVR_Controller::class, 'postData'])->name('stock_pfvr.postdata');
Route::get('stock_pfvr/fetchdata', [StockPFVR_Controller::class, 'fetchData'])->name('stock_pfvr.fetchdata');


Route::get('stock_pf', [StockPF_Controller::class,'index'])->name('stock_pf');
Route::get('stock_pf/getdata', [StockPF_Controller::class, 'getData'])->name('stock_pf.getdata');
Route::post('stock_pf/postdata',  [StockPF_Controller::class, 'postData'])->name('stock_pf.postdata');
Route::get('stock_pf/fetchdata', [StockPF_Controller::class, 'fetchData'])->name('stock_pf.fetchdata');



Route::get('stock_composant', [StockComposant_Controller::class,'index'])->name('stock_composant');
Route::get('stock_composant/getdata', [StockComposant_Controller::class, 'getData'])->name('stock_composant.getdata');
Route::post('stock_composant/postdata',  [StockComposant_Controller::class, 'postData'])->name('stock_composant.postdata');
Route::get('stock_composant/fetchdata', [StockComposant_Controller::class, 'fetchData'])->name('stock_composant.fetchdata');



Route::get('bc_composant', [BCComposant_Controller::class,'index'])->name('bc_composant');
Route::get('bc_composant/getdata', [BCComposant_Controller::class, 'getData'])->name('bc_composant.getdata');
Route::post('bc_composant/postdata',  [BCComposant_Controller::class, 'postData'])->name('bc_composant.postdata');
Route::get('bc_composant/fetchdata', [BCComposant_Controller::class, 'fetchData'])->name('bc_composant.fetchdata');



Route::get('besoin_composant', [BesoinComposantController::class,'index'])->name('besoin_composant');
Route::get('besoin_composant/getdata', [BesoinComposantController::class, 'getData'])->name('besoin_composant.getdata');
Route::post('besoin_composant/postdata',  [BesoinComposantController::class, 'postData'])->name('besoin_composant.postdata');
Route::get('besoin_composant/fetchdata', [BesoinComposantController::class, 'fetchData'])->name('besoin_composant.fetchdata');



Route::get('commande_composant', [CommandeComposantController::class,'index'])->name('commande_composant');
Route::get('commande_composant/getdata', [CommandeComposantController::class, 'getData'])->name('commande_composant.getdata');
Route::post('commande_composant/postdata',  [CommandeComposantController::class, 'postData'])->name('commande_composant.postdata');
Route::get('commande_composant/fetchdata', [CommandeComposantController::class, 'fetchData'])->name('commande_composant.fetchdata');
