@extends('layouts.base_login') @section('content')

<body class="error-body no-top lazy  pace-done" data-original="/img/back.png" style="  background-size: cover; background-image: url('/img/back.png') ; ">
 


  <div class="container">
            <div class="row login-container animated fadeInUp">
              <div class="col-md-5 col-xs-offset-5" style="margin-bottom:50px">
                  <img  width = "40%" src="/img/blood_img.png" >
              </div>
              <div class="col-md-8 col-md-offset-2 tiles white no-padding">
                <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
                  <h2 class="normal"> Sign in to Blood Bank </h2>
                  <p class="p-b-20"> Sign up Now! for Blood Bank accounts, it's free and always will be.. </p>
                  <div role="tablist">
                    <a id="tab_btn_login" class="btn btn-danger-dark btn-cons" >Login</a>
                    <a id="tab_btn_register" class="btn btn-info btn-cons" >Create an account</a>
                  </div>
                </div>
                <div class="tiles grey p-t-20 p-b-20 no-margin text-black tab-content">
                  <div role="tabpanel" class="tab-pane active" id="tab_login">
                    <form class="animated fadeIn validate" method="post" action = "/login" novalidate="novalidate">
                        @csrf
                      <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                        <div class="col-md-6 col-sm-6">
                          <input class="form-control" id="login_email" name="login_email" placeholder="Email" type="email" required="" aria-required="true">
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <input class="form-control" id="login_pass" name="login_pass" placeholder="Password" type="password" required="" aria-required="true">
                        </div>
                      </div>
                     <br>
                      <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                          <div class="col-md-6">
                              <button class="btn btn-info btn-cons">Submit</button>
                          </div>  
                    </form>     
                        @if ($data['correct'] == 'not_hide')
                          <div class="col-md-6">
                              <p class="p-b-20 text-danger"> Email or password isn't correct. </p>
                          </div>   
                        @endif
                    </div>
                </div>
                <div class="tiles grey p-t-20 p-b-20 no-margin text-black tab-content">
                  <div role="tabpanel" class="tab-pane" id="tab_register">       
                <form id = "myform" class="animated fadeIn validate" method="POST" action = "/signup" enctype="multipart/form-data" novalidate="novalidate">
                  @csrf 
                  <div class="col-md-12">
                      <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                          <div class="col-md-4 col-sm-4">
                            <input class="form-control" id="reg_username" name="reg_username" placeholder="Username" type="text" required>
                          </div>
                          <div class="col-md-8 col-sm-8">
                            <input class="form-control" id="reg_email" name="reg_email" placeholder="Email" type="text" required>
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
                            <input class="form-control" id="reg_age" name="reg_age" placeholder="Age" type="text" required="">
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <input class="form-control" id="reg_phone_num" name="reg_phone_num" placeholder="Phone number" type="text" required="">
                          </div>
                        </div> 
                        <div class=" row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10 " >
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" id="reg_city" name="reg_city" placeholder="City" type="text" required="">
                              </div>
                              <div class="col-md-6 col-sm-6">
                                <input class="form-control" id="reg_country" name="reg_country" placeholder="Country" type="text" required="">
                              </div>
                      </div>
                      <div class=" row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10 " >
                          <div class="radio radio-success">
                            <div class="col-md-6">
                              <input type="radio" id="donar_radio" value = "donor" name="type_radio" checked class="custom-control-input">
                              <label class="custom-control-label " for="donar_radio">Are you Doner ?</label>
                            </div>
                            <div class="col-md-6 ">
                              <input type="radio" id="requester_radio" value = "requester" name="type_radio" class="custom-control-input">
                              <label class="custom-control-label" for="requester_radio">Are you Requester ?</label>
                            </div>
                        </div>
                      </div>
                      <input class="hide"  id = "selectedUser" name="selectedUser" >

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
           <div class="row" >
            <br>
            <div class="col-md-6 col-xs-offset-5">
              <img  style="margin-top :40px;" width = "30%" src='/img/logo2.png' >
            </div>
          </div>        
        </div>
      </div>
    </div>
        

</body>
<script src="{{asset('assets/plugins/jquery/jquery-3.4.1.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/login.js') }}" type="text/javascript"></script>
  <script src="{{asset('js/sign_up.js')}}" type="text/javascript"></script>

@endsection