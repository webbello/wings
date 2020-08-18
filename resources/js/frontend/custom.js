import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';
// import PerfectScrollbar from 'perfect-scrollbar'
// const ps = new PerfectScrollbar('.mid');

$(document).ready(function(){
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:false,
                loop:true
            }
        }
    });

    // Go to the next item
    $('.customNextBtn').click(function() {
        owl.trigger('stop.owl.autoplay');
        owl.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('.customPrevBtn').click(function() {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl.trigger('stop.owl.autoplay');
        owl.trigger('prev.owl.carousel', [300]);
    })
    $(".customNavigation").mouseout(function(){
        owl.trigger('play.owl.autoplay',[2000]);
    });

});