

function send_message(){
    var firstname=jQuery("#firstname").val();
    var lastname=jQuery("#lastname").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var message=jQuery("#message").val();
	
	if(firstname==""){
        alert('Please enter firstname');
    }else if(lastname==""){
		alert('Please enter lastname');
	}else if(email==""){
		alert('Please enter email');
	}else if(mobile==""){
		alert('Please enter mobile');
	}else if(message==""){
		alert('Please enter message');
	}else{
		jQuery.ajax({
			url:'send_message.php',
			type:'post',
			data:'&firstname='+firstname+'&lastname='+lastname+'&email='+email+'&mobile='+mobile+'&message='+message,
			success:function(result){
				alert(result);
			}	
		});
	}
}


function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			jQuery('#carttext').html(result);
		}	
	});	
}


// function sort_product_drop(cat_id,site_path){
// 	var sort_product_id=jQuery('#sort_product_id').val();
// 	window.location.href=site_path+"categories.php?id="+cat_id+"&sort="+sort_product_id;
// }

function wishlist_manage(pid,type){
	jQuery.ajax({
		url:'wishlist_manage.php',
		type:'post',
		data:'pid='+pid+'&type='+type,
		success:function(result){
			if(result=='not_login'){
				window.location.href='ragistration.php';
			}else{
				jQuery('#wishlist').html(result);
			}
		}	
	});	
}