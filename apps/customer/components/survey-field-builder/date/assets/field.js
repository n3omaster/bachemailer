jQuery(document).ready(function($){

	// delete field button.
	$(document).on('click', 'a.btn-remove-date-field', function(){
		if ($(this).data('field-id') > 0 && !confirm($(this).data('message'))) {
			return false;
		}
		$(this).closest('.field-row').fadeOut('slow', function() {
			$(this).remove();
		});
		return false;
	});
	
	// add
	$('a.btn-add-date-field').on('click', function(){
		var currentIndex = -1;
		$('.field-row').each(function(){
			if ($(this).data('start-index') > currentIndex) {
				currentIndex = $(this).data('start-index');
			}
		});
		
		currentIndex++;
		var tpl = $('#field-date-javascript-template').html();
		tpl = tpl.replace(/\{index\}/g, currentIndex);
		$tpl = $(tpl);
		$('.survey-fields').append($tpl);
		
		$tpl.find('.has-help-text').popover();
		
		return false;	
	});
});