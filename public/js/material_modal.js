function showMaterial(id) {
    $("#mat_img_modal").attr("src",$('#material_img_'+id).prop('src'));
 
  }
  function close_view_modal(){
    $("#material_modal").css("display" , "none");
  }

    function close_add_modal(){
    $("#add_material_modal").css("display" , "none");
  }

  function show_add_material_modal(){
    $("#add_material_modal").css("display" , "block");
  }

  function modal(){

    setTimeout(function () {
     console.log('completed');
  
}, 3000);
  }

  function add_mat_action(user_email){
    $('#loading_modal').modal('show');
    var add_mat_title=document.getElementById("add_mat_title").value;
    var add_mat_desc =document.getElementById("add_mat_desc").value;
    var image = document.getElementById("material_img").files[0];  
    const None = "None";
    var id  = makeid() ;
    var storageRef=firebase.storage().ref( user_email+'/'+id);
    //upload image to selected storage reference
    var uploadTask=storageRef.put(image);
    uploadTask.on('state_changed',function (snapshot) {
        },function (error) {
            //handle error here
            console.log(error.message);
        },function () {
       //handle successful uploads on complete
        uploadTask.snapshot.ref.getDownloadURL().then(function (downlaodURL) {
                var rootRef = firebase.database().ref();
                var storesRef = rootRef.child('Material');
                var newStoreRef = storesRef.push();
                newStoreRef.set({
                desc: add_mat_desc,
                id: id,
                imgPath: downlaodURL,
                status: None,
                title: add_mat_title,
                user_email: user_email,
            });
            $("#add_material_modal").css("display" , "none");
            $('#loading_modal').modal('hide');
            alert("successfully added please wait the admin .");
            window.location.pathname = '/material'
        });
    });
}


  

  function makeid() {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < 12; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }
 
