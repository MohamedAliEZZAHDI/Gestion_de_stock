<?php

namespace App\Http\Controllers;

use App\Models\BesoinComposant;
use App\Models\FabricationPF;
use App\Models\Formulation;
use App\Models\Prevision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class BesoinComposantController extends Controller
{

    public function index()
    {
        return view('besoinComposant');
    }

    function getData()
    {
        $this->calculbesoinComposant();

        $besoinComposants = BesoinComposant::select('id', 'code_PF', 'quantite','code_composant','created_at','updated_at');
        return Datatables::of($besoinComposants)
            ->addColumn('action', function($stock){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$stock->id.'"><i class="glyphicon glyphicon-edit"></i> Modifier </a>';
            })
            ->make(true);
    }
    function fetchData(Request $request)
    {
        $id = $request->input('id');
        $BesoinComposant = BesoinComposant::find($id);
        $output = array(
            'code_PF'    =>  $BesoinComposant->code_PF,
            'code_composant'    =>  $BesoinComposant->code_composant,
            'quantite'     =>  $BesoinComposant->quantite
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
                $BesoinComposant = new BesoinComposant([
                    'code_PF'    =>  $request->get('code_PF'),
                    'code_composant' => $request->get('code_composant'),
                    'quantite'     =>  $request->get('quantite')
                ]);
                $BesoinComposant->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $BesoinComposant = BesoinComposant::find($request->get('id'));
                $BesoinComposant->code_PF = $request->get('code_PF') ?? $BesoinComposant->code_PF;
                $BesoinComposant->quantite = $request->get('quantite') ?? $BesoinComposant->quantite;
                $BesoinComposant->code_composant = $request->get('code_composant') ?? $BesoinComposant->code_composant;

                $BesoinComposant->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
        }

        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    private function calculbesoinComposant() : void{

        $formulations = Formulation::all();
        foreach ($formulations as $formulation) {
            $prevision = FabricationPF::where('code_PF', $formulation->code_PF)->pluck('quantite')->first();
            BesoinComposant::where('code_composant',$formulation->code_composant)->where('code_PF', $formulation->code_PF)->update([
                'quantite' => $prevision * $formulation->quantite
            ]);
        }

    }
}
