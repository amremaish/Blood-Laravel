var  cur_title , cur_patient_name , cur_file_number ,cur_country ,cur_city ,cur_hospital_name,cur_description,post_status


$('.comment').keydown(function(event) {
    if (event.keyCode == 13) {
      this.form.submit();
      return false;
    }
  });

  $('#addform').submit(function(e) {

    var add_title = document.getElementById("add_title").value;
    var add_paient = document.getElementById("add_paient").value;
    var add_file_number = document.getElementById("add_file_number").value;
    var add_country = document.getElementById("add_country").value;
    var add_city = document.getElementById("add_city").value;
    var add_hospital_name = document.getElementById("add_hospital_name").value;
    var add_description = document.getElementById("add_description").value;

    // validation
    if (add_title.trim()== "" ){
        alert("please write a title ");
        e.preventDefault();
    }else if (add_paient.trim() ==""){
        alert("please write a patient name ");
        e.preventDefault();
    }else if (add_file_number.trim() ==""){
        alert("please write a file number");
        e.preventDefault();
    }else if (add_country.trim() ==""){
        alert("please write your country ");
        e.preventDefault();
    }else if (add_city.trim() ==""){
        alert("please write your city ");
        e.preventDefault();
    }else if (add_hospital_name.trim() ==""){
        alert("please write the hospital name");
        e.preventDefault();
    }else if (add_description.trim()==""){
        alert("please write a Description");
        e.preventDefault();
    }
});


$('#updateform').submit(function(e) {

    var update_title = document.getElementById("update_title").value ;
    var update_paient =document.getElementById("update_paient").value ;
    var update_file_number = document.getElementById("update_file_number").value;
    var update_country = document.getElementById("update_country").value;
    var update_city = document.getElementById("update_city").value;
    var update_hospital_name = document.getElementById("update_hospital_name").value;
    var update_description = document.getElementById("update_description").value;


    // validation
    if (update_title.trim()== "" ){
        alert("please write a title ");
        e.preventDefault();
    }else if (update_paient.trim() ==""){
        alert("please write a patient name ");
        e.preventDefault();
    }else if (update_file_number.trim() ==""){
        alert("please write a file number");
        e.preventDefault();
    }else if (update_country.trim() ==""){
        alert("please write your country ");
        e.preventDefault();
    }else if (update_city.trim() ==""){
        alert("please write your city ");
        e.preventDefault();
    }else if (update_hospital_name.trim() ==""){
        alert("please write the hospital name");
        e.preventDefault();
    }else if (update_description.trim()==""){
        alert("please write a Description");
        e.preventDefault();
    }
});

function open_update_modal(id,title, patient_name , file_number ,country ,city ,hospital_name,description , post_status){
    this.cur_patient_name = patient_name ;
    this.cur_file_number = file_number ;
    this.cur_country = country ;
    this.cur_city = city ;
    this.cur_hospital_name = hospital_name ;
    this.cur_description= description ;
    this.cur_title= title ;
    this.post_status = post_status ;
    document.getElementById("update_post_id").value = id ;
    document.getElementById("update_title").value = title ;
    document.getElementById("update_paient").value = patient_name ;
    document.getElementById("update_file_number").value = file_number ;
    document.getElementById("update_country").value = country ;
    document.getElementById("update_city").value = city ;
    document.getElementById("update_hospital_name").value = hospital_name ;
    document.getElementById("update_description").value = description ;
    if (post_status.trim() == "1"){
        $('#post_status').prop('checked', true);
    }

}


function open_delete_modal(id){
    document.getElementById("delete_post_id").value = id ;
}