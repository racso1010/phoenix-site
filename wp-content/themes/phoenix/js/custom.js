/*	assets/script.js	*/

  // Apply Parallax to Scene
  if (document.getElementById('scene')) {
    var scene = document.getElementById('scene');
    var parallax = new Parallax(scene);
  }

  // jQuery to collapse the navbar on scroll
jQuery(window).scroll(function() {
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 50) {
    jQuery('.fixed-top').addClass('top-nav-collapse');
    jQuery('.navbar-brand img').addClass('logo-max-height');
  } else {
    jQuery('.fixed-top').removeClass('top-nav-collapse');
    jQuery('.navbar-brand img').removeClass('logo-max-height');
  }
});
  
  //Responsive Height
  function dynamicScreen() {
    var paraHeight = jQuery(window).height();
    jQuery('.layer').css('height', paraHeight + 'px');
  }
  
  dynamicScreen();
  
  jQuery(window).resize(dynamicScreen);
  
  //Initial Page Load
  jQuery(document).ready(function() {
    function slowFade(class1, rate) {
      jQuery(class1).fadeIn(rate);
    }
    slowFade('.ashes img', 400);
    slowFade('.bird img', 1000);
    slowFade('.phoenix img', 2500);
    slowFade('.molecules img', 1500);
  });
  
  // Parallax animation
  function slowDance(movingClass) {
    jQuery(movingClass).animate({ left: '25px' }, 2500, function() {
      jQuery(this).animate({ left: '0px' }, 3000, slowDance(this));
    });
  }  
  function slowDance3(movingClass3) {
    jQuery(movingClass3).animate({ bottom: '0px' }, 2800, function() {
      jQuery(this).animate({ bottom: '-15px' }, 2300, slowDance3(this));
    });
  }
  slowDance('.molecules');
  slowDance3('.clouds');
 