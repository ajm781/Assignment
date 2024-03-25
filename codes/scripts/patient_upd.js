function myfunction(){
                var var_er=0;
		var email = document.getElementById("txt_email").value;
		var fname = document.getElementById("txt_fname").value;
		var lname = document.getElementById("txt_lname").value;
		var contact = document.getElementById("txt_contact").value;
		var address = document.getElementById("txt_address").value;
		var city = document.getElementById("txt_city").value;
		var password = document.getElementById("txt_password").value;
		var conf_password = document.getElementById("txt_conf_password").value;
		var gender = document.getElementById("gender").value;
                var var_date = document.querySelector('input[type="date"]');
                var selectedDate = var_date.value;
			
		var atpos  = email.indexOf('@');
		var dotpos = email.lastIndexOf('.com');


		if(email != ''){ //check email not empty
			if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){ //check valid email format
                        
			alert('please enter valid email address !!'); 
                        var_er=var_er+1;
		        }
		}


		if(fname != '' && var_er==0){ //check fname not empty
			if(/[^a-zA-Z]+$/.test(fname)){ //check first name is only letters
                        
                                alert('only letters allowed for First Name');
                                var_er=var_er+1;
		        }
		}


		if(lname != '' && var_er==0){ //check lname not empty
			if(/[^a-zA-Z]+$/.test(lname)){ //check first name is only letters
                        
                                alert('only letters allowed for Last Name');
                                var_er=var_er+1;
		        }
		}

                if(contact != '' && var_er==0){ //check lname not empty
			if(/[^0-9]+$/.test(contact)){ //check contact only numbers
			alert('please enter a valid Contact');
                        var_er=var_er+1;
		        } 
		}

                if(password != '' && var_er==0){ //check lname not empty
			if(conf_password != password){ //check province not empty
			alert('Passwords do not match !!'); 
                        var_er=var_er+1;
		         }      
		}

                if(conf_password != '' && var_er==0){ //check lname not empty
			if(conf_password != password){ //check province not empty
			alert('Passwords do not match !!'); 
                        var_er=var_er+1;
		         }      
		}

                if(var_er==0){
			$.ajax({
				url: 'process_update_patient.php',
				type: 'post',
				data: 
					{email:email, 
					 fname:fname,
                                         lname:lname,
                                         selectedDate:selectedDate,
                                         gender:gender,
                                         contact:contact,
                                         address:address,
                                         city:city,
                                         password:password                                         
					},
				success: function(response){
					var output=jQuery.parseJSON(response);
                                         if(output.data=='done'){
                                         window.location = 'technician_patients.php';
                                         }
				}
			});                   
                    
                }



}