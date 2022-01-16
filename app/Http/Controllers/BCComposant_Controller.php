<?php

namespace App\Http\Controllers;

use App\Models\BC_Composant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class BCComposant_Controller extends Controller
{
    public function index()
    {
        return view('bcComposant');
    }

    function getData()
    {
        $BC_Composants = BC_Composant::select('id', 'code_composant','quantite','type');

        return Datatables::of($BC_Composants)
            ->addColumn('action', function($BC_Composant){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$BC_Composant->id.'"><i class="glyphicon glyphicon-edit"></i> Modifier </a>';
            })
            ->make(true);
    }
    function fetchData(Request $request)
    {

        $id = $request->input('id');
        $BC_Composant = BC_Composant::find($id);
        $output = array(
            'id'    =>  $BC_Composant->id,
            'code_composant'     =>  $BC_Composant->code_composant,
            'type'     =>  $BC_Composant->type

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
                $BC_Composant = new BC_Composant([
                    'code_composant'       =>  $request->get('code_composant'),
                    'quantite'      =>  $request->get('quantite'),
                    'type'          =>  $request->get('type')

                ]);
                $BC_Composant->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                $BC_Composant = BC_Composant::find($request->get('id'));
                $BC_Composant->update([
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
