$=jQuery.noConflict();
$(document).ready(function() {
  setInterval(function() {
    var widthFirst = $('.slide-in-container-lcs ul .SlidePart:first-child '),
    resizeItems = $('.SlidePart');

    $resizeItems
      .width($widthFirst.width());
  }, 3500);

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
    }, 3000);

});
