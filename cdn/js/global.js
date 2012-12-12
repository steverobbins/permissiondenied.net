$(document).ready(function() {
	
	$('.messages').attr("title", "Click to dismiss").slideDown("fast").click(function() {
		
		$(this).slideUp("fast", function() {
			
			$(this).remove();
		});
	});
	
	if ($('table.sortable').length > 0) $('table.sortable').tablesorter();
	
	$('.codesample').not("[data-noparse]").each(function() {
		
		if ($(this).attr('data-lang')) $(this).html(hljs.highlight($(this).attr('data-lang'), $(this).text()).value);
		else $(this).html(hljs.highlightAuto($(this).text()).value);
	});
});