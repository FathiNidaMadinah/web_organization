function loginCheck(user){
    $.ajax({
      url: "/api/data/"+user,
      method: "GET",
      headers: {
        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
      },
      success: function(response) {
        var data = response.data;
        if (data.avatar != null) {
            $('#user_image').attr('src', window.location.origin+'/storage/images/users-images/'+data.avatar);
          }
        $(".d-block").text(data.data_anggota.nama);
        if (data.role_id == 1) {
          if (data.id == 64) {
            $(".c-block").text('admin');
          }else{
            $(".c-block").text('leader');
          }
        }else{
          $(".c-block").text(data.data_divisi.divisi); 
        }
      },
    });
    $("#btnLogOut").click(function(){
      sessionStorage.clear();
      window.location = window.location.origin+'/login';
    });
  }
  function sessionCheck(user){
    $.ajax({
      url: "/api/data/"+user,
      method: "GET",
      headers: {
        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
      },
      success: function(response) {
        var data = response.data;
        // if (data.role_id != sessionStorage.getItem('session')) {
        //   alert("tejadi kesalahan silahkan login kembali!");
        //   sessionStorage.clear();
        //   window.location = window.location.origin+'/login';
        // }
      },
      error: function(status){
        alert("tejadi kesalahan silahkan login kembali!");
        sessionStorage.clear();
        window.location = window.location.origin+'/login';
      }
    });
  }