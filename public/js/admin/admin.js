var admin = {
	submitForm: function(obj) {
		var error = false;
		var name = '';
		var parent;

		$('.input-error').remove();

		$.each($(obj).find(':text:visible, :file:visible'), function() {
			parent = $(this).closest('.form-input');
			if ($(this).data('error') && $.trim($(this).val()) == '') {
				name = $(this).attr('id');
				parent.append('<p class="input-error" id="input-error-'+ name +'">' + $(this).data('error') + '</p>');
				error = true;
			} else {
				name = $(this).attr('id');
				parent.find('#input-error-'+ name).remove();
			}
		});
		return error ? false : true;
	}
}