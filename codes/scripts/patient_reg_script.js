function myfunction(){
              
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

			
		if(email == ''){ //check email not empty
			alert('please enter email address !!'); 
		}
		else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){ //check valid email format
			alert('please enter valid email address !!'); 
		}
		else if(fname == ''){ //check first name not empty
			alert('please enter First Name !!'); 
		}
		else if(/[^a-zA-Z]+$/.test(fname)){ //check first name is only letters
			alert('only letters allowed for First Name');
		} 
		else if(lname == ''){ //check last name not empty
			alert('please enter Last Name !!'); 
		}
		else if(/[^a-zA-Z]+$/.test(lname)){ //check last name only letters
			alert('only letters allowed for Last Name');
		} 
		else if(selectedDate == ''){ //check last name not empty
			alert('please enter Date Of Birth !!'); 
		}
                else if(gender == ''){ //check Gender not empty
			alert('please select Gender !!'); 
		}
		else if(contact == ''){ //check contact not empty
			alert('please enter Contact !!'); 
		}
		else if(/[^0-9]+$/.test(contact)){ //check contact only numbers
			alert('please enter a valid Contact');
		} 
		else if(contact.length !=9){ //check contaxt only ten digits 
			alert('please enter a valid Contact');
		}  
		else if(address == ''){ //check address not empty
			alert('please enter Address !!'); 
		}
		else if(city == ''){ //check city not empty
			alert('please enter City !!'); 
		}
		else if(password == ''){ //check province not empty
			alert('please enter a Password !!'); 
		}
		else if(conf_password == ''){ //check province not empty
			alert('please enter a Confirm Password !!'); 
		}
		else if(conf_password != password){ //check province not empty
			alert('Passwords do not match !!'); 
		}else{			
			$.ajax({
				url: 'process.php',
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
					var output=jQuery.parseJSON(response);alert(output.data);
                                         if(output.data=='Successfully Registered!'){
                                         document.getElementById("registraion_form").reset();
                                         }
				}
			});
		}
			


}