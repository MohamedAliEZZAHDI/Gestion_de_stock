<?php

namespace App\Http\Controllers;

use App\Models\FabricationPF;
use App\Models\Prevision;
use App\Models\StockPF;
use App\Models\StockPFSF;
use App\Models\StockPFVR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class FabricationController extends Controller
{
    public function index()
    {
        return view('fabrication');
    }

    function getData()
    {
        $this->calculFabrication();

        $fabrications = FabricationPF::select('id', 'code_PF', 'quantite','created_at','updated_at');

        return Datatables::of($fabrications)
            ->addColumn('action', function($stock){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$stock->id.'"><i class="glyphicon glyphicon-edit"></i> Modifier </a>';
            })
            ->make(true);
    }
    function fetchData(Request $request)
    {
        $id = $request->input('id');
        $fabricationPF = FabricationPF::find($id);
        $output = array(
            'code_PF'    =>  $fabricationPF->code_PF,
            'quantite'     =>  $fabricationPF->quantite
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
                $fabricationPF = new FabricationPF([
                    'code_PF'    =>  $request->get('code_PF'),
                    'quantite'     =>  $request->get('quantite')
                ]);
                $fabricationPF->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $fabricationPF = FabricationPF::find($request->get('id'));
                $fabricationPF->code_PF = $request->get('code_PF') ?? $fabricationPF->code_PF;
                $fabricationPF->quantite = $request->get('quantite') ?? $fabricationPF->quantite;
                $fabricationPF->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
        }

        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    private function calculFabrication() : void{
        $fabrications = FabricationPF::all();
        foreach ($fabrications as $fabrication){
            $quantite = Prevision::where('code_PF', $fabrication->code_PF)->pluck('quantite')->first() - StockPF::where('code_PF', $fabrication->code_PF)->pluck('quantite')->first() - StockPFSF::where('code_PF', $fabrication->code_PF)->pluck('quantite')->first() - StockPFVR::where('code_PF', $fabrication->code_PF)->pluck('quantite')->first();
            $fabrication->update(['quantite' => $quantite]);
        }

    }
}
