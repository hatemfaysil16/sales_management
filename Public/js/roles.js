$(document).ready(function() {

});




function deleteElement(btn, e) {
	e.preventDefault();

	if (confirm("Are You Sure To Delete This Data?")) {
		var obj = {
			ajax_action : 'roles.delete',
			id_role : $(btn).attr('id_role')
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
