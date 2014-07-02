var $ = jQuery.noConflict();
		$(function($) {
            initSlider();
			$('select, input').styler();
		})


function initSlider(){
    $('div.top-slider ul').cycle({
        fx:      'cover',
        timeout:  5000,
        speed:    1000,
        pager: 'div.pager',
        next: '#myCarousel .right',
        prev: '#myCarousel .left'
    });
}