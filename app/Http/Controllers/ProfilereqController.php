<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profilereq;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilereqController extends Controller
{
    // ----------- [ post listing ] -------------
    public function index()
    {
        $Profilereq = Profilereq::all();
        return response()->json($Profilereq);
    }

// ------------- [ store post ] -----------------
    public function store($info)
    {
        // Decode the JSON data
        $data = json_decode($info, true);

        // Insert the new data into the table
        $proreq = DB::insert('insert into profilereq (name_profile, created_at, updated_at) values (?, ?, ?)', [$data['name'], date("Y-m-d H:i:s", strtotime('now')), date("Y-m-d H:i:s", strtotime('now'))]);

        if($proreq == 1) {
            $id = DB::getPDO()->lastInsertId();
            return response()->json(["status" => "success", "message" => "Success! profile created", "id" => $id]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! profile not created"]);
        }
    }

// ---------------- [ Update post ] -------------
    public function update($data)
    {
        // Decode the JSON data
        $info = json_decode($data, true);

        // Look for the profile with the provided ID, and update all fields.
        $proreq = DB::table('profilereq')->where("id", $info["id"])->update(["name_profile" => $info["name"]]);

        if($proreq == 1) {
            return response()->json(["status" => "success", "message" => "Success! profile updated"]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! profile not updated"]);
        }
    }

// -------------- [ Delete post ] ---------------
    public function destroy($proreq_id) {
        // Soft delete the profile with the provided id.
        $proreq = DB::table('profilereq')->where("id", $proreq_id)->update(["deleted_at" => date("Y-m-d H:i:s", strtotime('now'))]);
        if($proreq == 1) {
            return response()->json(["status" => "success", "message" => "Success! profile deleted"]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Alert! profile not deleted"]);
        }
    }
}