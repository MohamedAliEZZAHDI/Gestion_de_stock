<?php

namespace App\Http\Controllers;

use App\Models\StockComposant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class StockComposant_Controller extends Controller
{

    public function index()
    {
        return view('stockComposant');
    }

    function getData()
    {
        $stockComposants = StockComposant::select('id', 'code_composant','quantite','type');

        return Datatables::of($stockComposants)
            ->addColumn('action', function($stockComposant){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$stockComposant->id.'"><i class="glyphicon glyphicon-edit"></i> Modifier </a>';
            })
            ->make(true);
    }
    function fetchData(Request $request)
    {

        $id = $request->input('id');
        $stockComposant = StockComposant::find($id);
        $output = array(
            'id'    =>  $stockComposant->id,
            'code_composant'     =>  $stockComposant->code_composant,
            'type'     =>  $stockComposant->type

        );
        echo json_encode($output);
    }
    function postData(Request $request)
    {
        $validation = Validator::make($request->all(), [
            //  'code' => 'required',
            // 'stock'  => 'required',
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
                $stockComposant = new StockComposant([
                    'code_composant'       =>  $request->get('code_composant'),
                    'quantite'      =>  $request->get('quantite'),
                    'type'          =>  $request->get('type')

                ]);
                $stockComposant->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                $stockComposant = StockComposant::find($request->get('id'));
                $stockComposant->update([
                    'quantite'     =>  $request->get('quantite')
                ]);
            }

        }

        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);

    }
}
