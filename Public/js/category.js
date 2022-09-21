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


	$('.search').click(function() {

		loadSuppliers();
	});


  $('#form_search_info').submit(function() {
  	return false;
  });
});



function searchCategories() {
	var obj = {
		ajax_action : 'category.search',
		name : $('#category').val(),
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
			ajax_action : 'category.delete',
			id_cat : $(btn).attr('id_cat')
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
