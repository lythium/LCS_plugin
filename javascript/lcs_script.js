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

	function reverseAnimation(anim) {
		if (anim == "slideInLeft") {
			var animReverse = "slideOutRight";
			return animReverse;
		} else if (anim == "fadeIn") {
			var animReverse = "fadeOut";
			return animReverse;
		} else if (anim == "slideInDown") {
			var animReverse = "slideOutDown";
			return animReverse;
		}
	};

	var anim = variableAnimation();
		animReverse = reverseAnimation(anim);

	console.log(anim);
	console.log(animReverse);

	function cycleItems() {
		var item = $('.SlidePart').eq(currentIndex);
		items.removeClass(anim).addClass(animReverse).fadeOut(500);
		item.removeClass(animReverse).addClass(anim).delay(500).fadeIn(1250);
	};

	var autoSlide = setInterval(function() {
		currentIndex += 1;
		if (currentIndex > itemAmt - 1) {
			currentIndex = 0;
		}
		cycleItems( );
	}, 7000);



});
