<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Http\database;

class HomeController extends Controller
{
    public function logout(Request $request){
          $request->session()->put( "cur_user" , null);
          return redirect('/');
    }


    public function home(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user !=null){
            return view('pages.home');
        }
        return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
    }




    public function posts(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user == null){
            return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
        }
        $type = request()->route('type');
        $request->session()->put( "cur_blood_type" , $type);

        $posts_db  = json_decode(database :: getdata(array('method' => 'VIEW', 'table' => 'post')), true)["data"];
        $users_db  = json_decode(database :: getdata(array('method' => 'VIEW', 'table' => 'user')), true)["data"];
        $comments_db  = json_decode(database :: getdata(array('method' => 'VIEW', 'table' => 'comment')), true)["data"];
        $posts = array();
        $comments = array();
        $users = array();

        if(!is_array($posts_db)){
            return view('pages.posts') -> with("data" , ["posts" => $posts , "comments" =>  $comments  ,"users" =>  $users ]);
        }
        foreach ($posts_db as $post){ 
            if ($post["blood_type"] == $type  ){
                array_push($posts,  $post);
                if(is_array($comments_db)){
                    foreach ($comments_db as $comment){ 
                        if ($comment["post_id"] == $post["id"]){
                            array_push($comments,  $comment);
                            foreach ($users_db as $user){ 
                                if ($comment["user_id"] == $user["id"]){
                                    array_push($users,  $user);
                                }
                            }
                        }
                    }
                }
             }
        }
        return view('pages.posts') -> with("data" , ["posts" => $posts , "comments" =>  $comments  ,"users" =>  $users ]);

    }
    public function UpdateProfile(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user == null){
            return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
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

            $res  = json_decode(database :: getdata(array('method' => 'VIEW', 'table' => 'user')), true)["data"];
            
            foreach ($res as $item1){ 
                if ($item1["email_address"] == $email_address  && $email_address != $cur_user["email_address"]){
                    return view('pages.login') -> with ('data' , ["error" => "registration failed ! this email is already exist ." , 'correct' =>'hide']);
                }
            }  
            
            if(is_array($res)){ 
                foreach ($res as $item){ 
                if ($item["email_address"] ==  $cur_user["email_address"] ){ 
                    $data = array('id'=>$cur_user["id"]  , 'name' =>  $name , 'user_type' => $cur_user["user_type"] ,
                    'phone_no' =>  $phone_no , 'email_address' => $email_address , 'password' => $password
                    , 'age' => $age , 'city' => $city, 'country' => $country , 'receive_notifi' => $cur_user["receive_notifi"],
                    'method' => 'UPDATE', 'table' => 'user');
                    database :: getdata($data);
                    }
                } 
            }
        }
       return view('pages.profile') -> with("data" , ["error" => "0"]);

    }

    public function Settings(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user == null){
            return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
        }

        if ( $request->isMethod('post')){
            $receive_notifi = $request->input('receive_notifi');
            $status = "0" ;
            if ($receive_notifi == "on") {
                $status = "1" ;
            }
            $data = array('id'=>$cur_user["id"]  , 'name' =>  $cur_user["name"] , 'user_type' => $cur_user["user_type"] ,
            'phone_no' =>  $cur_user["phone_no"] , 'email_address' => $cur_user["email_address"] , 'password' => $cur_user["password"]
            , 'age' => $cur_user["age"]  , 'city' => $cur_user["age"] , 'country' => $cur_user["country"]  , 'receive_notifi' => $status,
            'method' => 'UPDATE', 'table' => 'user');
            $request->session()->put( "cur_user" ,  $data);
            database :: getdata($data);
           
        }
        return view('pages.settings');
    }


}
