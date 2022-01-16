<?php

namespace App\Http\Controllers;

use App\Models\Prevision;
use App\Models\FabricationPF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PrevisionController extends Controller
{
    public function index()
    {
        return view('prevision');
    }

    function getData()
    {
        $previsions = Prevision::select('id', 'code_PF','quantite');

        return Datatables::of($previsions)
            ->addColumn('action', function($prevision){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$prevision->id.'"><i class="glyphicon glyphicon-edit"></i> Modifier </a>';
            })
            ->make(true);
    }
    function fetchData(Request $request)
    {

        $id = $request->input('id');
        $prevision = Prevision::find($id);
        $output = array(
            'id'    =>  $prevision->id,
            'code_PF'     =>  $prevision->code_PF
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
                $prevision = new Prevision([
                    'code_PF'    =>  $request->get('code_PF'),
                    'quantite'     =>  $request->get('quantite')
                ]);
                $prevision->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                $prevision = Prevision::find($request->get('id'));
                $prevision->update([
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
