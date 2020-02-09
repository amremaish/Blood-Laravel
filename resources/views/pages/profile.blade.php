@extends('layouts.app') @section('content')
<div class="semi-bold page-title" style = "margin-bottom:7%">
    <h2>Home</h2>
</div>

<div class="row">
    <div class=" col-md-10 col-md-offset-1">
        <div class="grid simple ">
          <div class="grid-title no-border">
            <h4> <span class="semi-bold">Profile</span></h4>
          </div>
          <div class="grid-body no-border">
            <form id = "profile_form" class="animated fadeIn validate" method="POST" action = "/profile" enctype="multipart/form-data" novalidate="novalidate">
              @csrf 
              <div class="col-md-12">
                  <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-4 col-sm-4">
                        <input class="form-control" value ='{{Session::get('cur_user')["name"]}}' id="reg_username" name="reg_username" placeholder="Username" type="text" required>
                      </div>
                      <div class="col-md-8 col-sm-8">
                        <input class="form-control" value ='{{Session::get('cur_user')["email_address"]}}' id="reg_email" name="reg_email" placeholder="Email" type="text" required>
                      </div>
                    </div>
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" id="reg_pass" name="reg_pass" placeholder="Password" type="password" required>
                      </div>

                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" id="reg_con_pass" name="reg_con_pass" placeholder="Confirm password" type="password" required="">
                        </div>
                    </div>
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value ='{{Session::get('cur_user')["age"]}}' id="reg_age" name="reg_age" placeholder="Age" type="text" required="">
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value ='{{Session::get('cur_user')["phone_no"]}}' id="reg_phone_num" name="reg_phone_num" placeholder="Phone number" type="text" required="">
                      </div>
                    </div> 
                    <div class=" row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10 " >
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" value ='{{Session::get('cur_user')["city"]}}' id="reg_city" name="reg_city" placeholder="City" type="text" required="">
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <input class="form-control" value ='{{Session::get('cur_user')["country"]}}' id="reg_country" name="reg_country" placeholder="Country" type="text" required="">
                          </div>
                  </div>
                  <br>
                  <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                    <div class="col-md-6">
                        <button id="submit_btn_register"  class="btn btn-info btn-cons">Submit</button>
                    </div>
                    <div class="col-md-6 ">
                      <p class="p-b-20 text-danger bold hide " error = "{{$data["error"]}}"  id ="error_reg">* Email or password isn't correct. </p>
                  </div>   
                </div>
              </div>
            </form> 
          </div>
        </div>
      </div>


</div>

@endsection