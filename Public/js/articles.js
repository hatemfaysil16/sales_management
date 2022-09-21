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
	     searchArticles();
	    }
	});


	function loadSuppliers() {

	var obj = {
		ajax_action : 'supplier.model'
	};
	$.post(
		'/try/public/index.php',
		obj,
		function(data) {
			$('.modal .modal-body .table tbody').html(data);
		},
		'html'
	);
}

	$('.search').click(function() {

		loadSuppliers();
	});


  $('#form_search_info').submit(function() {
  	return false;
  });
});



function searchArticles() {
	var obj = {
		ajax_action : 'articles.search',
		ref : $('#ref').val(),
		desig : $('#desig').val(),
		category_id : $('#category_id').val(),
		unit_id : $('#unit_id').val(),
		tvr : $('#tvr').val(),
		suplier_id : $('#suplier_id').val(),
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

function selectSupplier(btn, e) {
	event.preventDefault();

	var tr = $(btn).parent().parent();
	$('.supplier_id_info').val($(btn).attr('supplier_select_id'));
	$('.supplier_name_info').text($(tr).children('.supplier-name').text());
	$('.supplier_city_info').text($(tr).children('.supplier_city').text());
	$('.supplier_adress_info').text($(tr).children('.supplier_adress').text());
}

function deleteArt(btn, e) {
	e.preventDefault();

	if (confirm("Are You Sure To Delete This Data?")) {
		var obj = {
			ajax_action : 'articles.delete',
			id_art : $(btn).attr('id_art')
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
