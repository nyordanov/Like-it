jQuery(function($) {
	$('.likeit-canvote .likeit-text').click(function() {
		$.post(likeit.ajaxurl, {
			id: $(this).attr('id').split('_')[1],
			action: 'likeit_register_vote'
		}, function(data) {
			$(this).parent().find('.likeit-count span').fadeIn(250, function() {
				$(this).text(data);
			});
		})
	});
});