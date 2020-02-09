@extends('layouts.app') @section('content')
<div class="semi-bold page-title" style = "margin-bottom:7%">
    <h2>Home</h2>
</div>

@if (Session::get('cur_user')["user_type"] =="2")
<div class="row">
        <div class="col-md-7">
            <button style = "width:150px" type="button" data-toggle="modal" data-target="#add_post_modal" class="btn btn-primary pull-right" data-dismiss="modal">Add Post</button>
        </div>
    </div>
<br>
@endif

@for ($i = 0; $i < count($data["posts"]); $i++)
@if ($data["posts"][$i]["post_status"] == "1"  || $data["posts"][$i]["user_ID"] == Session::get('cur_user')["id"] )
<div class="col-md-8 col-md-offset-2">
        <div class="grid simple ">
            <div class="grid-title">
                @if ($data["posts"][$i]["user_ID"] == Session::get('cur_user')["id"])
                <div class="pull-right">
                    <i  onclick ='open_update_modal("{{$data["posts"][$i]["id"]}}" ,"{{$data["posts"][$i]["title"]}}" ,"{{$data["posts"][$i]["patient_name"]}}" , "{{$data["posts"][$i]["file_number"]}}", "{{$data["posts"][$i]["country"]}}","{{$data["posts"][$i]["city"]}}","{{$data["posts"][$i]["hospital_name"]}}" , "{{$data["posts"][$i]["description"]}}"  ,"{{$data["posts"][$i]["post_status"]}}" )' class="fa fa-cog fa-2x" style="cursor: pointer;" data-toggle="modal" data-target="#update_post_modal">&nbsp;</i>
                    <i  onclick ='open_delete_modal("{{$data["posts"][$i]["id"]}}")' class="fa fa-minus-circle fa-2x" style="color:red; cursor: pointer;" data-toggle="modal" data-target="#delete_post_modal" ></i>
                </div>
                @endif
                <h4>{{$data["posts"][$i]["title"]}} 
                 @if($data["posts"][$i]["user_ID"] == Session::get('cur_user')["id"] && $data["posts"][$i]["post_status"] == "0")   
                <span class="text-danger">&nbsp;(Disabled)</span>
                @endif
            </h4> 
            </div>
            <div class="grid-body">
                <div  style="position: relative;">
                    <div  style="margin-bottom: -17px; margin-right: -17px; ">
                        <h5>Patient name : {{$data["posts"][$i]["patient_name"]}} </h5>
                        <h5>File number :  {{$data["posts"][$i]["file_number"]}}  </h5>
                        <h5>County : {{$data["posts"][$i]["country"]}} </h5>
                        <h5>City:  {{$data["posts"][$i]["city"]}}  </h5>
                        <h5>Hospital name : {{$data["posts"][$i]["hospital_name"]}}  </h5>
                        <hr>
                        <h4>Description </h4>
                        <p>{{$data["posts"][$i]["description"]}} </p>
                        <hr>
                        <h4>Comments </h4>
                        <br>
                        
                        @for ($j = 0; $j < count($data["comments"]); $j++)
                            @if ($data["comments"][$j]["post_id"] == $data["posts"][$i]["id"] )
                        <div id = "comments">
                            <div class="post comments-section">
                                <div class="user-profile-pic-wrapper">
                                  <div class="user-profile-pic-normal">
                                    <img width="35" height="35" alt="" src="/img/avatar.jpg" >
                                  </div>
                                </div>
                                <div class="info-wrapper">
                                  <div class="username">
                                  <span class="dark-text">{{$data["users"][$j]["name"]}}</span>
                                  </div>
                                  <div class="info">
                                      <span class="dark-text">{{$data["comments"][$j]["comment"]}}</span>
                                  </div>    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                          @endif
                        @endfor
                        <br>
                        <br>
                        <form id = "comment_post" class="animated fadeIn validate" method="POST" action = "/add_comment" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf 
                            <div class="input-group transparent ">
                            <input value = '{{$data["posts"][$i]["id"]}}' name= "post_id" type="text" class="form-control hide">
                                <input id = "add_comment" name= "comment" type="text" class="form-control comment" placeholder="Write a comment">
                                <span class="input-group-addon"> 
                                    <i class="fa fa-arrow-circle-left"></i> 
                                </span> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endfor

<div class="modal fade in" id="add_post_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:None;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-question fa-7x"></i>
                    <h4 id="myModalLabel" class="semi-bold">Add new Post</h4>
                </div>
                <form id = "addform" class="animated fadeIn validate" method="POST" action = "/add_post" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <div class="modal-body">
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input class="form-control" id="add_title" name="add_title" placeholder="Title" type="text" required>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input type="text" id="add_paient" name="add_paient"  placeholder="paient name" class="form-control">
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input type="text" id="add_file_number"  name="add_file_number"  placeholder="File number" class="form-control">
                            </div>
                        </div>
                        <div class="row form-row">
                                <div class="col-md-12">
                                    <input type="text" id="add_country"  name="add_country"  placeholder="Country" class="form-control">
                                </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input type="text" id="add_city" name="add_city"  placeholder="City" class="form-control">
                            </div>
                        </div>
                        <div class="row form-row">
                                <div class="col-md-12">
                                    <input type="text" id="add_hospital_name" name="add_hospital_name"  placeholder="Hospital name" class="form-control">
                                </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input type="text" id="add_description" name="add_description"  placeholder="Description" class="form-control">
                            </div>
                        </div>
     
                    </div>
                    <div class="modal-footer ">
                        <button  type="submit" class="btn btn-primary" >submit</button>
                        <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
    </div>
</div>

<div class="modal fade in" id="update_post_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:None;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-question fa-7x"></i>
                    <h4 id="myModalLabel" class="semi-bold">Update Post</h4>
                </div>
                <form id = "updateform" class="animated fadeIn validate" method="POST" action = "/update_post" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <div class="modal-body">
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input class="form-control" id="update_title" name="update_title" placeholder="Title" type="text" required>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input type="text" id="update_paient" name="update_paient"  placeholder="paient name" class="form-control">
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input type="text" id="update_file_number"  name="update_file_number"  placeholder="File number" class="form-control">
                            </div>
                        </div>
                        <div class="row form-row">
                                <div class="col-md-12">
                                    <input type="text" id="update_country"  name="update_country"  placeholder="Country" class="form-control">
                                </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input type="text" id="update_city" name="update_city"  placeholder="City" class="form-control">
                            </div>
                        </div>
                        <div class="row form-row">
                                <div class="col-md-12">
                                    <input type="text" id="update_hospital_name" name="update_hospital_name"  placeholder="Hospital name" class="form-control">
                                </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <input type="text" id="update_description" name="update_description"  placeholder="Description" class="form-control">
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-12">
                                <div class="col-md-offset-5">
                                    <p for= "post_status" style=" font-size: 19px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Visibility </p>
                                </div>
                                <input type="checkbox" id="post_status" name="post_status"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <input type="text" id="update_post_id" name="update_post_id" class="form-control hide">
                    <div class="modal-footer ">
                        <button  type="submit" class="btn btn-primary" >submit</button>
                        <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
    </div>
</div>


<div class="modal fade in" id="delete_post_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:None;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-question fa-7x"></i>
                    <h4 id="myModalLabel" class="semi-bold">Delete Post</h4>
                </div>
                <form id = "updateform" class="animated fadeIn validate" method="POST" action = "/delete_post" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <div class="modal-body">
                         <h4>Do you want to delete it !?</h4>
                    </div>
                    <input type="text" id="delete_post_id" name="delete_post_id" class="form-control hide">
                    <div class="modal-footer ">
                        <button  type="submit" class="btn btn-primary" >submit</button>
                        <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
    </div>
</div>
<input type="text" id="blood_type" name="blood_type"  value = '"{{Session::get('cur_blood_type')}}"' class="form-control hide">
<input type="text" id="user_id" name="user_id"  value = '"{{Session::get('cur_user')["id"]}}"' class="form-control hide">


@endsection