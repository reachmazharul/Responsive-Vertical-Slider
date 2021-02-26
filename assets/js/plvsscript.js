jQuery( ".slider-container ul#carousel li:first-child" ).addClass( "active" );


var VerticalCarousel = function(element){
  this.slideUp = function(){
    window.setInterval(function(){
      jQuery(element+' .remove-next').remove();
      jQuery(element+' .post-active').clone().insertAfter(".slider-container ul#carousel li:last").toggleClass('post-active');
      jQuery(element+' .post-active').toggleClass('post-active remove-next');
      jQuery(element+' .active').toggleClass('active post-active').next().addClass('active');
    }, 2000);
  }
};

var c = new VerticalCarousel('#carousel');
c.slideUp();
