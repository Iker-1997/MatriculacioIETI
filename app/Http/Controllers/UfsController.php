<?php

namespace App\Http\Controllers;

use App\Model\Ufs;
use Illuminate\Http\Request;

class UfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Ufs::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCustomer">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('ufs');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customer::updateOrCreate(['id' => $request->Customer_id],
                ['firstName' => $request->firstName, 'info' => $request->info]);        

        return response()->json(['success'=>'Customer saved successfully!']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Customer = Ufs::find($id);
        return response()->json($Customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ufs::find($id)->delete();

        return response()->json(['success'=>'Customer deleted!']);
    }
}