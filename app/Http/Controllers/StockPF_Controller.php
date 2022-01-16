<?php

namespace App\Http\Controllers;

use App\Models\StockPF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class StockPF_Controller extends Controller
{

    public function index()
    {
        return view('stockPF');
    }

    function getData()
    {
        $StockPFs = StockPF::select('id', 'code_PF','quantite');

        return Datatables::of($StockPFs)
            ->addColumn('action', function($StockPF){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$StockPF->id.'"><i class="glyphicon glyphicon-edit"></i> Modifier </a>';
            })
            ->make(true);
    }
    function fetchData(Request $request)
    {

        $id = $request->input('id');
        $StockPF = StockPF::find($id);
        $output = array(
            'id'    =>  $StockPF->id,
            'code_PF'     =>  $StockPF->code_PF
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
                $StockPF = new StockPF([
                    'code_PF'    =>  $request->get('code_PF'),
                    'quantite'     =>  $request->get('quantite')
                ]);
                $StockPF->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                $StockPF = StockPF::find($request->get('id'));
                $StockPF->update([
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
