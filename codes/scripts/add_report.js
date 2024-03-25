function myfunction1(){
              
		var appointment_id = document.getElementById("txt_appointmentId").value;
		var result = document.getElementById("txt_result").value;

			
		if(appointment_id == ''){ //check Appointment Id not empty
			alert('please enter an Appointment Id !!'); 
		}
		else if(/[^0-9]+$/.test(appointment_id)){ //check  only numbers
			alert('please enter valid Appointment Id !!'); 
		}
		else if(result == ''){ //check first name not empty
			alert('please enter a Result !!'); 
		}
		else if(/[^0-9.]/.test(result)){ //check  only numbers
			alert('please enter valid result !!'); 
		}else{			
			$.ajax({
				url: 'process.php',
				type: 'post',
				data: 
					{ appointment_id:appointment_id,
                                          result:result                                     
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