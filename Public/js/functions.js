
	function showBox(classname, e) {
		e.preventDefault();
		

		$('.'+classname).toggle();
	}

	function readUrl(input) {
		if (input.files && input.files[0]) {
			var file = input.files[0];

			var reader = new FileReader();

			reader.readAsDataURL(file);

			reader.onload = function (e) {
				$('.thumb-preview').attr("src", e.target.result);
				$('.reset-thumb').css('display', 'inline-block');
			}
		}
	}

	function thumbInputFile(e) {
		e.preventDefault();
		$('.thumb-hidden').click();
	}

	function resetThumb(e) {
		e.preventDefault();

		$('.thumb-preview').attr('src', 'images/item.png');
		$('.reset-thumb').hide();
	}

	function nFormat(number) {
		number = parseFloat(Math.round(number * 100) / 100).toFixed(2);
		return (""+number).replace(/\B(?=(?:\d{3})+(?:\d))/g, " ");
	}


