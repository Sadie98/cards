/* global sknet */

$(function(){
	// выбор тарифа
	sknet.$tariffs.on('click', 'div[class*=tariff]', function(){
		var tariffId = $(this).attr('class').split(/\s+/).filter(function(className){return className.match(/tariff/)})[0].split('-')[1];
		$('.plan-' + tariffId, sknet.$plans).css('display', 'flex');
		sknet.$tariffs.hide();
	});

	// назад к тарифам
	sknet.$plans.on('click', '.back', function(){
		$('> div', sknet.$plans).hide();
		sknet.$tariffs.show();
	});

	// вставить карточку покупки плана
	sknet.$plans.on('click', '.card', function(){
		var title = $(this).siblings('.header').text();
		var months = $(this).find('.title').text();
		var price = $(this).find('.prices').text();
		var payment = $(this).data('price');
		var exDate = $(this).data('ex-date');

		sknet.$plans.hide();

		sknet.$selection.show();

		sknet.$selection.append('<div class="header back"><span>Выбор тарифа</span></div>');
		sknet.$selection.append('<div class="card"></div>');

		var $card = $('.card', sknet.$selection);
		$card.append('<div class="title">' + title + '</div>');
		$card.append('<div class="prices">Период оплаты - ' + months + '<br>' + price + '</div>');
		$card.append('<div class="additional">разовый платёж - ' + payment + '₽<br>со счёта спишется - ' + payment+ '₽</div>');
		$card.append('<div class="comment">вступит в силу - сегодня<br>активно до - ' + exDate + '</div>');

		$card.append('<div class="link"><a class="btn">Выбрать</a></div>');
	});

	// назад к выбору плана
	sknet.$selection.on('click', '.back', function(){
		sknet.$selection.html('');
		sknet.$selection.hide();
		sknet.$plans.show();
	});
});