jQuery(document).ready(function(){

  //Helper Functions

  function scrollY() {
  	return window.pageYOffset || document.documentElement.scrollTop;
  }

  jQuery('.slider').slick({
  	slidesToShow: 1,
  	slidesToScroll: 1,
  	autoplay: true,
  	fade: true,
  	speed: 900,
  	autoplaySpeed: 3500,
  	arrows: false,
  	dots: true,
  });

    jQuery('.scroller').slick({
    slidesToShow: 8,
    slidesToScroll: 1,
    autoplay: true,
    fade: false,
    speed: 700,
    autoplaySpeed: 300,
    arrows: false,
    dots: true,
  });

  /* Tabs */

  jQuery('.tabs ul li').click(function(){
    var targetTab = jQuery(this).index();

    jQuery('.tabs ul li.active').removeClass('active');
    jQuery(this).addClass('active');

    jQuery('.tab.active').slideUp(function(){
      jQuery('.tab.active').removeClass('active');
    });

    jQuery('.tab').eq(targetTab).slideDown(function(){
        jQuery('.tab').eq(targetTab).addClass('active');
    });
  });

  /* Make list items go into two columns when desired */
(function(jQuery){
    var initialContainer = jQuery('.columns'),
        columnItems = jQuery('.columns li'),
        columns = null,
        column = 1; // account for initial column
    function updateColumns(){
        column = 0;
        columnItems.each(function(idx, el){
            if (idx !== 0 && idx > (columnItems.length / columns.length) + (column * idx)){
                column += 1;
            }
            console.log(column, el, idx);
            jQuery(columns.get(column)).append(el);
        });
    }
    function setupColumns(){
        columnItems.detach();
        while (column++ < initialContainer.data('columns')){
            initialContainer.clone().insertBefore(initialContainer);
            column++;
        }
        columns = jQuery('.columns');
        updateColumns();
    }

    jQuery(setupColumns);
})(jQuery);
(function(jQuery){
    var initialContainer = jQuery('.columns-alpha'),
        columnItems = jQuery('.columns-alpha li'),
        columns = null,
        column = 1; // account for initial column
    function updateColumns(){
        column = 0;
        columnItems.each(function(idx, el){
            if (idx !== 0 && idx > (columnItems.length / columns.length) + (column * idx)){
                column += 1;
            }
            console.log(column, el, idx);
            jQuery(columns.get(column)).append(el);
        });
    }
    function setupColumns(){
        columnItems.detach();
        while (column++ < initialContainer.data('columns')){
            initialContainer.clone().insertBefore(initialContainer);
            column++;
        }
        columns = jQuery('.columns-alpha');
        updateColumns();
    }

    jQuery(setupColumns);
})(jQuery);

jQuery('img').click(function(){

if (jQuery(this).hasClass('.nolb')) {
return false;
}
else {
var storedImg = jQuery(this).attr('src');
jQuery('.img-lightbox').append('<img src='+storedImg+'>');
jQuery('.img-lightbox').fadeToggle();
jQuery('.modal-bg').fadeToggle();
}

});

jQuery('.modal-bg').click(function(){
jQuery('.modal').fadeToggle();
jQuery('.modal-bg').fadeToggle();
});


});