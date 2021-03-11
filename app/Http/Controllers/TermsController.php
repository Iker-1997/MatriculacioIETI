<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Terms;

class TermsController extends Controller
{
    // ----------- [ post listing ] -------------
    public function index()
    {
        $terms = Terms::latest()->paginate(5);
        return view('terms', compact('terms'));
    }

// ------------- [ store post ] -----------------
    public function store(Request $request)
    {
       $request->validate([
            'start'         =>      'required',
            'end'           =>      'required',
            'name'          =>      'required',
            'description'   =>      'required',
            'active'        =>      'required',
        ]);

       $term = Terms::create($request->all());

       if(!is_null($term)) {
            return response()->json(["status" => "success", "message" => "Success! Terms created.", "data" => $term]);
       }

       else {
           return response()->json(["status" => "failed", "message" => "Alert! Terms not created"]);
       }
    
    }

// ---------------- [ Update post ] -------------
    public function update(Request $request)
    {
        $term_id = $request->id;
        $term    = Terms::where("id", $term_id)->update($request->all());

        if($term == 1) {
            return response()->json(["status" => "success", "message" => "Success! term updated"]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! term not updated"]);
        }
    }

// -------------- [ Delete post ] ---------------
    public function destroy($term_id) {
        $term = Terms::where("id", $term_id)->delete();
        if($term == 1) {
            return response()->json(["status" => "success", "message" => "Success! Terms deleted"]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! Terms not deleted"]);
        }
    }
}