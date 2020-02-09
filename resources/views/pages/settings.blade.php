@extends('layouts.app') @section('content')

<div class="row">
    <div class=" col-md-10 col-md-offset-1">
        <div class="grid simple ">
          <div class="grid-title no-border">
            <h4> <span class="semi-bold">Settings</span></h4>
          </div>
          <div class="grid-body no-border">
            <div class="row form-row">
                <div class="col-md-12 ">
                    <form  class="animated fadeIn validate" method="POST" action = "/settings" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="col-md-offset-4">
                            <p for= "receive_notifi" style=" font-size: 19px;">&nbsp;&nbsp;&nbsp;&nbsp; Receiving notifications  </p>
                        </div>
                        <input type="checkbox" id="receive_notifi" name="receive_notifi"  @if (Session::get('cur_user')["receive_notifi"] =="1") checked @endif   class="form-control ">
                        <div class="modal-footer ">
                                <button  type="submit" class="btn btn-primary" >Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>


</div>

@endsection