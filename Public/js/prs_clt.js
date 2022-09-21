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



});

$('.searchart').click(function() {

   	loadArticles();
});

function loadArticles() {

   var obj = {
        ajax_action : 'Articles.model'
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

$('.search-art').click(function() {
    loadArticles();
});

$('.search').click(function() {

    loadClients();
});


$('.searchart').click(function(e) {
	e.preventDefault();
    loadArticles();
});


$('#form_search_info').submit(function() {
    return false;
});

function selectClient(btn, e) {
    e.preventDefault();

    var tr = $(btn).parent().parent();
    $('.client_id_info').val($(btn).attr('client_select_id'));
	 $('.client_name_info').text($(tr).children('.client-name').text());
	 $('.client_adress_info').text($(tr).children('.client-city').text());
	 $('.client_city_info').text($(tr).children('.client-adress').text());

	 $('#myModal').modal('hide');
}

function loadClients() {

    var obj = {
        ajax_action : 'clients.model'
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

function selectArticles(btn, e) {
    e.preventDefault();

    var tr = $(btn).parent().parent();
	$('.article-id-info').val($(btn).attr('article_id'));
	$('.article-ref-info').text($(tr).children('.article-ref').text());
	$('.article-desig-info').text($(tr).children('.article-desig').text());

	$('#myModal').modal('hide');
}

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

function deleteElementArt(btn, e) {
    e.preventDefault();

    if (confirm("Are You Sure To Delete This Data?")) {
        var obj = {
            ajax_action : 'prs_clt.deleteArt',
            id_clt_art : $(btn).attr('id_clt_art')
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

function deleteElement(btn, e) {
	e.preventDefault();

	if (confirm("Are You Sure To Delete This Data?")) {
		var obj = {
			ajax_action : 'prs_clt.delete',
            id_prs_clt : $(btn).attr('id_prs_clt')
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
