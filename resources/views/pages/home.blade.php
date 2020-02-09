@extends('layouts.app') @section('content')
<div class="semi-bold page-title">
    <h2>Home</h2>
</div>

<div class="row " style = "margin : 5%" >
    <div class="col-md-4">
        <a href="blood/A_PLUS">
            <div class="tiles black added-margin">
                <div class="tiles-body">
                    <div class="tiles-title ">
                    <h4> <span class= "bold " style = "color:b2b2b2;"> A+ blood type </span ></h4>               
                    </div>
                    <img style = "margin-left:30%;"src="/img/a_plus.png">     
                        
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="blood/A_MINUS">
            <div class="tiles black added-margin">
                <div class="tiles-body">
                    <div class="tiles-title ">
                    <h4> <span class= "bold " style = "color:b2b2b2;"> A- blood type </span ></h4>               
                    </div>
                        <img style = "margin-left:30%;"src="/img/a_mins.png">     
                </div>
            </div>
        </a>
    </div>
 
     <div class="col-md-4">
        <a href="blood/AB_MINUS">
            <div class="tiles black added-margin">
                <div class="tiles-body">
                    <div class="tiles-title ">
                    <h4> <span class= "bold " style = "color:b2b2b2;"> AB- blood type </span ></h4>               
                    </div>
                        <img style = "margin-left:30%;"src="/img/ab_minus.png">     
                </div>
            </div>
         </a>
    </div>
</div>          
     
<div class="row " style = "margin:5%" >
    <div class="col-md-4">
        <a href="blood/AB_PLUS">
            <div class="tiles black added-margin">
                <div class="tiles-body">
                    <div class="tiles-title ">
                    <h4> <span class= "bold " style = "color:b2b2b2;"> AB+ blood type </span ></h4>               
                    </div>
                        <img style = "margin-left:30%;"src="/img/ab_plus.png">     
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="blood/B_PLUS">
            <div class="tiles black added-margin">
                <div class="tiles-body">
                    <div class="tiles-title ">
                    <h4> <span class= "bold " style = "color:b2b2b2;"> B+ blood type </span ></h4>               
                    </div>
                        <img style = "margin-left:30%;"src="/img/b_plus.png">     
                </div>
            </div>
        </a>
    </div>
 
     <div class="col-md-4">
        <a href="blood/B_MINUS">
            <div class="tiles black added-margin">
                <div class="tiles-body">
                    <div class="tiles-title ">
                    <h4> <span class= "bold " style = "color:b2b2b2;"> B- blood type </span ></h4>               
                    </div>
                        <img style = "margin-left:30%;"src="/img/b_minus.png">     
                </div>
            </div>
        </a>
    </div>
</div> 

<div class="row " style = "margin:5%" >
    <div class="col-md-6">
        <a href="blood/O_PLUS">
            <div class="tiles black added-margin">
                <div class="tiles-body">
                    <div class="tiles-title ">
                    <h4> <span class= "bold " style = "color:b2b2b2;"> O+ blood type </span ></h4>               
                    </div>
                        <img style = "margin-left:42%;"src="/img/o_plus.png">     
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-6">
        <a href="blood/O_MINUS">
            <div class="tiles black added-margin">
                <div class="tiles-body">
                    <div class="tiles-title ">
                    <h4> <span class= "bold " style = "color:b2b2b2;"> O- blood type </span ></h4>               
                    </div>
                        <img style = "margin-left:42%;"src="/img/o_minus.png">     
                </div>
            </div>
         </a>
    </div>

</div> 


@endsection