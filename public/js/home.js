

 $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


    window.setInterval(function() {
        $(document).ready(function(){
          $.ajax({
              url: '/notifi',   
              method: 'POST',
              type: 'json',
              success: function (response) {
                if (response != "0"){
                  var ar=response.split("-");
                  Messenger().post("you have new comment ' "+ar[0]+" '" + "on post "+ar[1]);
                 }else {
                   console.log("0")
                 }
              },
              error: function (error) {
                  console.log(error);
              }
              });
          });
  }, 2000);