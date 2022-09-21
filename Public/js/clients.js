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
	     searchclients();
	    }
	});


  $('#form_search_info').submit(function() {
  	return false;
  });
});



function searchclients() {
	var obj = {
		ajax_action : 'clients.search',
		name : $('#name').val(),
		adress : $('#adress').val(),
		city : $('#city').val(),
		tel : $('#tel').val(),
	};

	$.post(
		'/try/public/index.php',
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
			ajax_action : 'clients.delete',
			id_client : $(btn).attr('id_client')
		};

		$.post(
			'/try/public/index.php',
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
