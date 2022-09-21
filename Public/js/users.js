$(document).ready(function() {
	$.validate({
	  form : '#form-add',
	  modules : 'file',
	  validateOnBlur : false,
	  errorMessagePosition: 'top',
	  onError : function() {
      //alert('alert !');
	    },
	    onSuccess : function() {
	     // alert('Success');
	    }
	});


	$.validate({
	  form : '#form_search_info',
	  validateOnBlur : false,
	  errorMessagePosition: 'top',
	  onError : function() {
      	//alert('alert !');
	    },
	    onSuccess : function() {
	     //alert('Success');
	     searchCategories();
	    }
	});

	$.validate({
	  form : '#form-profile-edit',
	  validateOnBlur : false,
	  errorMessagePosition: 'top',
	  modules : 'secuirty',
	  onError : function() {
      	//alert('alert !');
	    },
	    onSuccess : function() {
	     //alert('Success');
	     searchCategories();
	    }
	});

	$('.search').click(function() {

		loadSuppliers();
	});


  $('#form_search_info').submit(function() {
  	return false;
  });
});



function searchCategories() {
	var obj = {
		ajax_action : 'users.search',
		user : $('#users').val(),
	};

	$.post(
		'index.php',
		obj,
		function(data) {
			$('.box-search').slideUp();
			$('.table-main tbody').html(data);
		},
		'html'
	);
}





function deleteElement(btn, e) {
	e.preventDefault();

	if (confirm("Are You Sure To Delete This Data?")) {
		var obj = {
			ajax_action : 'users.delete',
			id_user : $(btn).attr('id_user')
		};
		

		$.post(
			'index.php',
			obj,
			function(data) {
				
				if (data == 1) {
					window.location.reload();
				} else {
					alert("Problem Occure!");
				}
			},
			'html'
		);
	}
}


$('#login-user').keyup(function() {
	$('#password-default').val($('#login-user').val());	
});
