<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function store($info)
    {
        // Decode the JSON data
        $data = json_decode($info, true);

        // Insert the new data into the table
        $term = DB::insert('insert into terms (start, end, name_terms, description_terms) values (?, ?, ?, ?)', [$data['start'], $data['end'], $data['name'], $data['desc']]);

        if($term == 1) {
            return response()->json(["status" => "success", "message" => "Success! term created"]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! term not created"]);
        }
    }

// ---------------- [ Update post ] -------------
    public function update($data)
    {
        // Decode the JSON data
        $info = json_decode($data, true);

        // Look for the term with the provided ID, and update all fields.
        $term   = Terms::where("id", $info["id"])
                ->update(["start" => $info["start"],
                          "end" => $info["end"],
                          "name_terms" => $info["name"],
                          "description_terms" => $info["desc"]]);

        if($term == 1) {
            return response()->json(["status" => "success", "message" => "Success! term updated"]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! term not updated"]);
        }
    }

// -------------- [ Delete post ] ---------------
    public function destroy($term_id) {

        // Soft delete the term with the provided id.
        $term = Terms::where("id", $term_id)->delete();
        if($term == 1) {
            return response()->json(["status" => "success", "message" => "Success! Terms deleted"]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! Terms not deleted"]);
        }
    }
}