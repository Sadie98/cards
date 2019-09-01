$(function(){
	$('#tariffs').on('click', 'div[class*=tariff]', function(){
		var tariffId = $(this).attr('class').split(/\s+/).filter(function(className){return className.match(/tariff/)})[0].split('-')[1];
		$('#plans div.plan-' + tariffId).css('display', 'flex');
		$('#tariffs').hide();
	});

	$('#plans').on('click', 'div.back', function(){
		$('#plans > div').hide();
		$('#tariffs').show();
	});
});