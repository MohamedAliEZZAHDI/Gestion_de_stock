<?php

namespace App\Http\Controllers;

use App\Models\StockPFSF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class StockPFSF_Controller extends Controller
{
    public function index()
    {
        return view('stockPFSF');
    }

    function getData()
    {
        $stockPFSFs = StockPFSF::select('id', 'code_PF','quantite');

        return Datatables::of($stockPFSFs)
            ->addColumn('action', function($stockPFSF){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$stockPFSF->id.'"><i class="glyphicon glyphicon-edit"></i> Modifier </a>';
            })
            ->make(true);
    }
    function fetchData(Request $request)
    {

        $id = $request->input('id');
        $stockPFSF = StockPFSF::find($id);
        $output = array(
            'id'    =>  $stockPFSF->id,
            'code_PF'     =>  $stockPFSF->code_PF
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
                $stockPFSF = new StockPFSF([
                    'code_PF'    =>  $request->get('code_PF'),
                    'quantite'     =>  $request->get('quantite')
                ]);
                $stockPFSF->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                $stockPFSF = StockPFSF::find($request->get('id'));
                $stockPFSF->update([
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
