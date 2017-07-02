$=jQuery.noConflict();
$(document).ready(function() {
	var heightFirst = $(".lcs-slide-first .card-container").height(),
		widthFirst = $(".lcs-slide-first .card-container").width();
	setTimeout(function() {
		$('.SlidePart .card-container').height(heightFirst).width(widthFirst);
	}, 3000);

	var currentIndex = 0,
		items = $('.SlidePart'),
		itemAmt = items.length;
	function variableAnimation() {
		var varAnim = $('#variable-anim').val();
		return varAnim;
	};
	var anim = variableAnimation();
	console.log(anim);
	function cycleItems() {
		var item = $('.SlidePart').eq(currentIndex);
		items.removeClass('slideInLeft').addClass('slideOutRight').fadeOut(500);
		item.removeClass('slideOutRight').addClass('slideInLeft').delay(500).fadeIn(1250);
	};

	var autoSlide = setInterval(function() {
		currentIndex += 1;
		if (currentIndex > itemAmt - 1) {
			currentIndex = 0;
		}
		cycleItems( );
	}, 7000);

});
