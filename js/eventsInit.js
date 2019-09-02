$(function(){
	$('#tariffs').on('click', 'div[class*=tariff]', function(){
		var tariffId = $(this).attr('class').split(/\s+/).filter(function(className){return className.match(/tariff/)})[0].split('-')[1];
		$('#plans div.plan-' + tariffId).css('display', 'flex');
		$('#tariffs').hide();
	});

	$('#plans').on('click', '.back', function(){
		$('#plans > div').hide();
		$('#tariffs').show();
	});

	$('#plans').on('click', '.card', function(){
		var title = $(this).siblings('.header').text();
		var months = $(this).find('.title').text();
		var price = $(this).find('.prices').text();
		var payment = $(this).data('price');
		var exDate = $(this).data('ex-date');

		$('#plans').hide();

		var $selection = $('#selection');
		$selection.show();

		$selection.append('<div class="header back"><span>Выбор тарифа</span></div>');
		$selection.append('<div class="card"></div>');

		var $card = $('.card', $selection);
		$card.append('<div class="title">' + title + '</div>');
		$card.append('<div class="prices">Период оплаты - ' + months + '<br>' + price + '</div>');
		$card.append('<div class="additional">разовый платёж - ' + payment + '₽<br>со счёта спишется - ' + payment+ '₽</div>');
		$card.append('<div class="comment">вступит в силу - сегодня<br>активно до - ' + exDate + '</div>');

		$card.append('<div class="link"><a class="btn">Выбрать</a></div>');
	});

	$('#selection').on('click', '.back', function(){
		$('#selection').html('');
		$('#selection').hide();
		$('#plans').show();
	});
});