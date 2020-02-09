<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\LoginController ;
use App\Http\database;
class LoginController extends Controller
{
    public function login(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user !=null){
            return view('pages.home') -> with ('correct' ,'hide');
        }

        if ( $request->isMethod('post')){
            $res  = json_decode(database :: getdata(array('method' => 'VIEW', 'table' => 'user')), true)["data"];
            $email_address = $request->input('login_email');
            $pass = $request->input('login_pass');
            foreach ($res as $item){ 
               if ($item["email_address"] == $email_address  &&  $pass == $item["password"]  ){
                    $request->session()->put( "cur_user" , $item);
                    return view('pages.home');
                }
              } 
              return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "password or email isn't correct ."]);  
        }
           return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
    }

}
