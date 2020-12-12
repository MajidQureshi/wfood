<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    
    public function test(){
    	$pdo = DB::connection()->getPdo();

		if($pdo){
		    echo "Connected successfully to database ".DB::connection()->getDatabaseName();
		//     $users = DB::table('testpersons')
  //                    ->select('first_name')
  //                    ->get();
		//     $cnt = DB::table('testpersons')->count();
		//     // var_dump($cnt);
		//     var_dump($users);
		//     foreach ($users as $user) {
		// 	    echo $user->first_name;
		// 	}
		}else{
		    echo "You are not connected to database";
		}
    }
}
