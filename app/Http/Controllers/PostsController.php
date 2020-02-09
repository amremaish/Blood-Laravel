<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Http\database;

class PostsController extends Controller
{
 
    public function add_comment(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user == null){
            return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
        }
        $comment = $request->input('comment');
        $post_id = $request->input('post_id');
        $res  = json_decode(database :: getdata(array('method' => 'INSERT', 'table' => 'comment' , 'comment'=>$comment ,
                             'user_id' => $cur_user["id"] , "seen" => "0" ,"post_id" =>$post_id )), true)["data"];

    return redirect('/blood'.'/' .$request->session()->get("cur_blood_type"));
    }


    public function add_post(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user == null){
            return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
        }
        $blood_type =  $request->session()->get("cur_blood_type");
        $title  = $request->input('add_title');
        $patient_name  = $request->input('add_paient');
        $file_number  = $request->input('add_file_number');
        $country  = $request->input('add_country');
        $city  = $request->input('add_city');
        $hospital_name  = $request->input('add_hospital_name');
        $description  = $request->input('add_description');
        $post_id = $request->input('post_id');
        $res  = json_decode(database :: getdata(array('method' => 'INSERT', 'table' => 'post' 
        , 'title' => $title 
        , 'patient_name' => $patient_name
        , 'file_number' => $file_number
        , 'country' => $country
        , 'city' => $city
        , 'hospital_name' => $hospital_name
        , 'description' => $description
        , 'post_status' => "1"
        , 'user_ID' => $cur_user["id"]
        , 'blood_type' => $blood_type
        )), true)["data"];

      return redirect('/blood'.'/' .$request->session()->get("cur_blood_type"));
    }
    
    public function update_post(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user == null){
            return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
        }
        $blood_type =  $request->session()->get("cur_blood_type");
        $title  = $request->input('update_title');
        $patient_name  = $request->input('update_paient');
        $file_number  = $request->input('update_file_number');
        $country  = $request->input('update_country');
        $city  = $request->input('update_city');
        $hospital_name  = $request->input('update_hospital_name');
        $description  = $request->input('update_description');
        $post_id = $request->input('update_post_id');
        $post_status = $request->input('post_status');

        $status = "0" ;
        if ($post_status == "on") {
            $status = "1" ;
        }
        $res  = database :: getdata(array('method' => 'UPDATE', 'table' => 'post' 
        , 'id' => $post_id 
        , 'title' => $title 
        , 'patient_name' => $patient_name
        , 'file_number' => $file_number
        , 'country' => $country
        , 'city' => $city
        , 'hospital_name' => $hospital_name
        , 'description' => $description
        , 'post_status' => $status
        , 'user_ID' => $cur_user["id"]
        , 'blood_type' => $blood_type
     ));

 
     return redirect('/blood'.'/' .$request->session()->get("cur_blood_type"));
    }



    public function delete_post(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user == null){
            return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
        }
        $post_id = $request->input('delete_post_id');
        $res  = database :: getdata(array('method' => 'DELETE', 'table' => 'post','id' => $post_id));
        return redirect('/blood'.'/' .$request->session()->get("cur_blood_type"));
    }




}
