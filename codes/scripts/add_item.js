function myfunction(){
              
		var item_code = document.getElementById("txt_item_code").value;
		var item_desc = document.getElementById("txt_item_desc").value;
		var price = document.getElementById("txt_price").value;


			
		if(item_code == ''){ //check email not empty
			alert('please enter Item Code !!'); 
		}
		else if(item_code.length !=6){ //check item code length
			alert('please enter a valid Item code !!'); 
		}
		else if(item_desc == ''){ //check username not empty
			alert('please enter Item Description !!'); 
		}
		else if(price == ''){ //check username not empty
			alert('please enter Price !!'); 
		}
		else if(/[^0-9]+$/.test(price)){ //check password value length six 
			alert('please enter valid price');
		} 
		else{			
			$.ajax({
				url: 'add_item_chk.php',
				type: 'post',
				data: 
					{item_code: item_code, 
					 item_desc : item_desc,
                                         price:price
                                        },
				success: function(data){
					var response=jQuery.parseJSON(data);
                                        alert(response.data);
                                        if(response.data == 'Item Added!'){
                                         document.getElementById("itm_form").reset();
                                         }
				       }
			});
		}
			




}