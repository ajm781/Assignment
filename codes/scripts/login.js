function myfunction(){

	var username = document.getElementById("txt_username").value;
	var password = document.getElementById("txt_password").value;

        if(username == ''){ //check username not empty
		alert('please enter username!'); 
	}
        else if(password == ''){ // check password not empty
                alert('please enter password! ');
        }
        else{			
			$.ajax({
				url: 'lab_login_chk.php',
				type: 'post',
				data: 
					{username:username,
                                         password:password                                      
					},
				success: function(response){
					var output=jQuery.parseJSON(response);
                                         if(output.data=='TEST SUCCESS'){
                                            alert('Success');
                                            window.location = 'redirect_page.php';
                                         }
				}
			});
		}


}