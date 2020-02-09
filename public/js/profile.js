


$('#profile_form').submit(function(e) {
    console.log("XXX");
    var reg_username = document.getElementById("reg_username").value;
    var reg_email = document.getElementById("reg_email").value;
    var reg_pass = document.getElementById("reg_pass").value;
    var reg_con_pass = document.getElementById("reg_con_pass").value;
    var reg_age = document.getElementById("reg_age").value;
    var reg_phone_num = document.getElementById("reg_phone_num").value;
    var reg_city = document.getElementById("reg_city").value;
    var reg_country = document.getElementById("reg_country").value;
    // validation
    if (reg_email == ""  || !validateEmail(reg_email)){
        $('#error_reg').removeClass('hide');
        $('#error_reg').text('Check email is not correct.');
        e.preventDefault();
    }else if (reg_username ==""){
        $('#error_reg').removeClass('hide');
        $('#error_reg').text('Check username is empty.');
        e.preventDefault();
    }else if (reg_pass ==""){
        $('#error_reg').removeClass('hide');
        $('#error_reg').text('Check pass is empty.');
        e.preventDefault();
    }else if (reg_pass !=reg_con_pass ){
        $('#error_reg').removeClass('hide');
        $('#error_reg').text('password and confirm password are not equal.');
        e.preventDefault();
    }else if (reg_age =="" || !isNumeric(reg_age)){
        $('#error_reg').removeClass('hide');
        $('#error_reg').text('Check age is not correct.');
        e.preventDefault();
    }else if (reg_phone_num ==""){
        $('#error_reg').removeClass('hide');
        $('#error_reg').text('Check phone number is empty.');
        e.preventDefault();
    }else if (reg_city ==""){
        $('#error_reg').removeClass('hide');
        $('#error_reg').text('Check city is empty.');
        e.preventDefault();
    }else if (reg_country ==""){
        $('#error_reg').removeClass('hide');
        $('#error_reg').text('Check country is empty.');
        e.preventDefault();
    }else if (reg_pass =="" ){
        $('#error_reg').removeClass('hide');
        $('#error_reg').text('password is empty.');
        e.preventDefault();
    }
});

var error = $("#error_reg").attr("error");
if (error.length > 2 ){
    alert(error);
}
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function isNumeric(num){
    return !isNaN(num)
  }
