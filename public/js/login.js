$(document).ready(function() {		

	$('#tab_btn_login').click(function(){
        $('#tab_register').removeClass('active');
        $('#tab_login').addClass('active');
	})
    $('#tab_btn_register').click(function(){
        $('#tab_register').addClass('active');
        $('#tab_login').removeClass('active');
        })
        
        $("#tab_btn_login").addClass("hide");

        $( "#tab_btn_login" ).click(function() {
                $("#tab_btn_register").removeClass("hide");
                $("#tab_btn_login").addClass("hide");
        });

        $( "#tab_btn_register" ).click(function() {
                $("#tab_btn_login").removeClass("hide");
                $("#tab_btn_register").addClass("hide");
        });

        var n = $(document).height();
        $('html, body').animate({ scrollTop: n }, 50);
 
});