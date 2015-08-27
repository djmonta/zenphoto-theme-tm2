// init Masonry
var $grid = $('.thumbnails').masonry({
  itemSelector: 'figure',
  columnWidth: '.grid-sizer',
  percentPosition: true
});
// layout Masonry after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.masonry('layout');
});