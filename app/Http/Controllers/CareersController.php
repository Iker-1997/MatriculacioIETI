<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Careers;

class CareersController extends Controller
{
    // ----------- [ post listing ] -------------
    public function index()
    {
        $Careers = Careers::all();
        return response()->json($Careers);
    }

// ------------- [ store post ] -----------------
    public function store($info)
    {
        // Decode the JSON data
        $data = json_decode($info, true);

        // Insert the new data into the table
        $career = DB::insert('insert into careers (term_id, name_careers, code_careers, family, career_hours, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?)', [$data['term'], $data['name'], $data['code'], $data['family'], $data['hours'], date("Y-m-d H:i:s", strtotime('now')), date("Y-m-d H:i:s", strtotime('now'))]);

        if($career == 1) {
            $id = DB::getPDO()->lastInsertId();
            return response()->json(["status" => "success", "message" => "Success! career created", "id" => $id]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! career not created"]);
        }
    }

// ---------------- [ Update post ] -------------
    public function update($data)
    {
        // Decode the JSON data
        $info = json_decode($data, true);

        // Look for the term with the provided ID, and update all fields.
        $career   = Careers::where("id", $info["id"])
                ->update(["term_id" => $info["term"],
                          "name_careers" => $info["name"],
                          "code_careers" => $info["code"],
                          "family" => $info["family"],
                          "career_hours" => $info["hours"]]);

        if($career == 1) {
            return response()->json(["status" => "success", "message" => "Success! term updated"]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! term not updated"]);
        }
    }

// -------------- [ Delete post ] ---------------
    public function destroy($term_id) {
        // Soft delete the term with the provided id.
        $career = Careers::where("id", $term_id)->delete();
        if($career == 1) {
            return response()->json(["status" => "success", "message" => "Success! Careers deleted"]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! Careers not deleted"]);
        }
    }
}