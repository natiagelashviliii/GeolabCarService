var contact = {
	check: function(obj) {
		var error = false;
		var name = '';
		var parent;

		$('.input-error').remove();

		$.each($(obj).find(':text:visible, :file:visible, textarea:visible, :radio:visible'), function() {
			parent = $(this).closest('.form-input');
			if ($(this).data('error') && $.trim($(this).val()) == '' ||
				($(this).attr('id') == 'Email' && !isEmail($(this).val())) ||
				($(this).data('error') && $(this).is(':radio') && $(obj).find('input[name="' + $(this).attr('name') + '"]:checked').length == 0) ) 
			{
				name = $(this).attr('id');
				parent.append('<p class="input-error" id="input-error-'+ name +'">' + $(this).data('error') + '</p>');
				error = true;
			} else {
				name = $(this).attr('id');
				parent.find('#input-error-'+ name).remove();
			}
		});

		if (error) {
			return false;
		} else {
			contact.send(obj);
			return false;
		}
	},

	send: function(obj) {
		$.post('/sendMail', $(obj).serialize(), function(data) {
		    	$('.success-message').text('Message was successfully sent');
		    	$(obj)[0].reset();
		    });
	}


}