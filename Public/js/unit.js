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


  $('#form_search_info').submit(function() {
  	return false;
  });
});



function searchCategories() {
	var obj = {
		ajax_action : 'unit.search',
		unit : $('#unit').val(),
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
			ajax_action : 'unit.delete',
			id_unit : $(btn).attr('id_unit')
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
