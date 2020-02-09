<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\database;

class SignUpController extends Controller
{
    public function SignUp(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user !=null){
            return view('pages.home') -> with ('correct' ,'hide');
        }
    if ( $request->isMethod('post')){
            $name = $request->input('reg_username');
            $phone_no = $request->input('reg_phone_num');
            $email_address = $request->input('reg_email');
            $password = $request->input('reg_pass');
            $con_pass = $request->input('reg_con_pass');
            $age = $request->input('reg_age');
            $city = $request->input('reg_city');
            $country = $request->input('reg_country');
            $type_radio = $request->input('selectedUser');
                $user_type = 2 ; 
            if ($type_radio == "doner"){
                $user_type = 1 ;
            }
            $res  = json_decode(database :: getdata(array('method' => 'VIEW', 'table' => 'user')), true)["data"];
            if(is_array($res)){ 
                foreach ($res as $item){ 
                if ($item["email_address"] == $email_address ){
                        return view('pages.login') -> with ('data' , ["error" => "registration failed ! this email is already exist ." , 'correct' =>'hide']);
                    }
                } 
            }

            $data = array('name' =>  $name , 'user_type' => $user_type ,
            'phone_no' =>  $phone_no , 'email_address' => $email_address , 'password' => $password
            , 'age' => $age , 'city' => $city, 'country' => $country , 'receive_notifi' => '1',
            'method' => 'INSERT', 'table' => 'user');
            $res  = database :: getdata($data);
    }
        return view('pages.login') -> with ('data' , [ "error" => "0" , 'correct' =>'hide' , 'res' => $res]);
    }
}
