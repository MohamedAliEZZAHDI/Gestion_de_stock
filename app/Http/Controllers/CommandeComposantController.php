<?php

namespace App\Http\Controllers;

use App\Models\BC_Composant;
use App\Models\BesoinComposant;
use App\Models\CommandeComposant;
use App\Models\StockComposant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CommandeComposantController extends Controller
{

    public function index()
    {
        return view('commandeComposant');
    }

    function getData()
    {
        $this->calculCommandeComposant();

        $CommandeComposants = CommandeComposant::select('id',
            'code_composant','stock_restant','quantite_commander','created_at','updated_at');
        return Datatables::of($CommandeComposants)
            ->addColumn('action', function($stock){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$stock->id.'"><i class="glyphicon glyphicon-edit"></i> Modifier </a>';
            })
            ->make(true);
    }
    function fetchData(Request $request)
    {
        $id = $request->input('id');
        $CommandeComposant = CommandeComposant::find($id);
        $output = array(
            'code_composant'    =>  $CommandeComposant->code_composant,
            'quantite_commander'     =>  $CommandeComposant->quantite_commander,
            'stock_restant' => $CommandeComposant->stock_restant
        );
        echo json_encode($output);
    }
    function postData(Request $request)
    {
        $validation = Validator::make($request->all(), [
            //  'code'   => 'required',
            //  'stock'  => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == 'insert')
            {
                $CommandeComposant = new CommandeComposant([
                    'code_composant' => $request->get('code_composant'),
                    'quantite_commander'     =>  $request->get('quantite_commander'),
                    'stock_restant' => $request->get('stock_restant')
                ]);
                $CommandeComposant->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $CommandeComposant = CommandeComposant::find($request->get('id'));
                $CommandeComposant->code_PF = $request->get('code_PF') ?? $CommandeComposant->code_PF;
                $CommandeComposant->quantite = $request->get('quantite') ?? $CommandeComposant->quantite;
                $CommandeComposant->code_composant = $request->get('code_composant') ?? $CommandeComposant->code_composant;

                $CommandeComposant->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
        }

        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    private function calculCommandeComposant() : void{
        $commandes = CommandeComposant::all();
        foreach ($commandes as $commande){

            $stock_composant = StockComposant::where('code_composant',$commande->code_composant)->pluck('quantite')->first();
            $bc_composant = BC_Composant::where('code_composant',$commande->code_composant)->pluck('quantite')->first();
            $besoin_composant = BesoinComposant::where('code_composant',$commande->code_composant)->pluck('quantite')->first();

            $total = $stock_composant + $bc_composant - $besoin_composant;
            if($total > 0 ){
                $commande->update([
                    'quantite_commander' => 0
                ]);

            }else{
                $commande->update([
                    'quantite_commander' => abs($total),
                    'stock_restant'      => 0
                ]);
            }



        }

    }
}
