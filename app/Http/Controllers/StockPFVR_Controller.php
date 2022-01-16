<?php

namespace App\Http\Controllers;

use App\Models\StockPFVR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class StockPFVR_Controller extends Controller
{

    public function index()
    {
        return view('stockPFVR');
    }

    function getData()
    {
        $stockPFVRs = StockPFVR::select('id', 'code_PF','quantite');

        return Datatables::of($stockPFVRs)
            ->addColumn('action', function($stockPFVR){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$stockPFVR->id.'"><i class="glyphicon glyphicon-edit"></i> Modifier </a>';
            })
            ->make(true);
    }
    function fetchData(Request $request)
    {

        $id = $request->input('id');
        $stockPFVR = StockPFVR::find($id);
        $output = array(
            'id'    =>  $stockPFVR->id,
            'code_PF'     =>  $stockPFVR->code_PF
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
                $stockPFVR = new StockPFVR([
                    'code_PF'    =>  $request->get('code_PF'),
                    'quantite'     =>  $request->get('quantite')
                ]);
                $stockPFVR->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                $stockPFVR = StockPFVR::find($request->get('id'));
                $stockPFVR->update([
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
