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

  function cycleItems() {
    var item = $('.SlidePart').eq(currentIndex);
      items.hide(0);
      item.fadeIn("slow");
    }

    var autoSlide = setInterval(function() {
      currentIndex += 1;
    if (currentIndex > itemAmt - 1) {
      currentIndex = 0;
    }
    cycleItems();
  }, 4500);

});
