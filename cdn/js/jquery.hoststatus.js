var sortMode = 'original', hosts = new Array();

$(document).ready(function() {
	
	$('#results').isotope({
		itemSelector: '.response',
		layoutMode: 'fitRows'
	});
	
	$('#sort button').live('click', function() {
		
		var sortName = $(this).attr('class');
		
		sortMode = sortName;
		
		$('#results').isotope({sortBy: sortName});
		
		return false;
	});
	
	$('#display button').live('click', function() {
		
		$('#results').isotope({layoutMode: $(this).attr('class')});
		
		return false;
	});
	
	startPing();
});
	
function startPing() {
	
	console.log("Cycle started.");
	
	$('#results').empty();
	
	hosts = $('#hosts').val().split("\n");
	
	pingHost(0);
}

function pingHost(i) {
	
	if (i < hosts.length) {
		
		console.log("Start: " + hosts[i]);

		$.post('ajax/hoststatus.php', {
			
			host: hosts[i]
		}, function(response) {
			
			var json = parseJsonResponse(response),
			obj = $("<div class=\"response\" style=\"background: #" + json.level + "\" rel=\"" + parseInt(9 - json.status) + "\"><strong class=\"hostname\" style=\"font-size: 16px; text-align: center; display: block; background: black; color: white; padding: 5px;\">" + json.host + "</strong><br />" + json.response + "</div>");
		
			console.log("End: " + json.host);
			
			$('.response').each(function() {
				
				if ($(this).find('.hostname').text() == json.host) {
					
					$(this).remove();
				}
			});
				
			$('#results')
				.prepend(obj)
				.isotope('reloadItems')
				.isotope({
					sortBy: sortMode
				}).isotope({
					getSortData: {
						alphabetical: function (obj) {
							
							return obj.text();
						},
						status: function (obj) {
							
							return obj.attr('rel') + obj.text();
						},
						original: function (obj) {
							
							return 'original-order';
						}
					}
			});
			
			doCounts();
		
			/*setTimeout(function(){
				
				pingHost(++i);
			}, 1000);*/
		});
		
		setTimeout(function(){
				
			pingHost(++i);
		}, 1000);
	}
	else {
		
		/*console.log("Cycle complete... Restarting in 10 seconds");
		//spectrum();
		setTimeout(startPing, 10000);*/
	}
}

	
function spectrum() {
	
	var hue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')',
	hue2 = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
	
	$('body').animate({'backgroundColor': hue, 'color': hue2}, 1000);
		
	setTimeout(spectrum, 1000);
}

function shuffle(oldArray) {
	var newArray = oldArray.slice();
	var len = newArray.length;
	var i = len;
	 while (i--) {
		var p = parseInt(Math.random()*len);
		var t = newArray[i];
		newArray[i] = newArray[p];
		newArray[p] = t;
	}
	return newArray; 
}

function parseJsonResponse(response) {
	
	try {
		
		return $.parseJSON(response);
	}
	catch(e) {
		
		console.log(response);
		return response.replace(/(<([^>]+)>)/ig,"");
	}
}

function note(message) {
	
	var div = document.createElement('div');
	
	$(div).html(message).addClass('note');
	
	$('#notes').prepend($(div));
}

function doCounts() {
	
	$('#countDown').text($('.response[rel=0]').length);
	$('#countUp').text($('.response').not('[rel=0]').length);
	$('#countPercent').text(Math.round($('#countUp').text() / $('.response').length * 100) + '%');
}