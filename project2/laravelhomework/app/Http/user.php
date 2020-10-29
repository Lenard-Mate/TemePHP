<?php

namespace App\Http;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class user extends Controller
{
    function inserter(Request $req){

        $first_name = $req->input('first_name');
        $data = array('first_name'=>$first_name);
        DB::table('students')->insert($data);

        echo "Sucsess";
    }
}
