<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Http\database;


class AjaxNotifiController extends Controller
{
    public function notifi(Request $request){
        $cur_user =  $request->session()->get("cur_user");
        if ($cur_user == null){
            return view('pages.login') -> with ('data' , ['correct' =>'hide' , "error" => "-1"]);
        }

        $posts_db  = json_decode(database :: getdata(array('method' => 'VIEW', 'table' => 'post')), true)["data"];
        $users_db  = json_decode(database :: getdata(array('method' => 'VIEW', 'table' => 'user')), true)["data"];
        $comments_db  = json_decode(database :: getdata(array('method' => 'VIEW', 'table' => 'comment')), true)["data"];
        foreach ($comments_db as $comment){
            foreach ($posts_db as $post){
                
                if ($post["id"] == $comment["post_id"] 
                && $post["user_ID"] == $cur_user["id"] 
                && $comment["user_id"] != $cur_user["id"] 
                && $comment["seen"] =="0" ){
                    database :: getdata(array('method' => 'UPDATE', 'table' => 'comment', 
                    'id' =>$comment["id"],
                    'comment' =>$comment["comment"],
                    'post_id' =>$comment["post_id"],
                    'seen' =>"1",
                    'user_id' =>$comment["user_id"],
                ));
                    return $comment["comment"] . "-".$post["title"] ; 
                }
            }
        }
        return "0";
   
    }
}
