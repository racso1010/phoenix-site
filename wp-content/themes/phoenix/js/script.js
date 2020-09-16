/*	assets/script.js	*/

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if (scroll >= 50) {
    $('.navbar-fixed-top').addClass('top-nav-collapse');
    $('.navbar-brand img').addClass('logo-max-height');
  } else {
    $('.navbar-fixed-top').removeClass('top-nav-collapse');
    $('.navbar-brand img').removeClass('logo-max-height');
  }
});

// jQuery to vertically, horizontally align banner text
$('.vertical-outer').css({ height: $(document).height() + 'px' });

$('#product-thumbs').delegate('img', 'click', function() {
  var $large = $('#large-image');
  $large.attr('src', $(this).attr('src'));
  $large.attr('data-zoom', $(this).attr('data-big'));
  $('#featured').attr('href', $(this).attr('src'));

  console.log('click');
});

// Apply Parallax to Scene
if (document.getElementById('scene')) {
  var scene = document.getElementById('scene');
  var parallax = new Parallax(scene);
}

//Responsive Height
function dynamicScreen() {
  var paraHeight = $(window).height();
  $('.layer').css('height', paraHeight + 'px');
}

dynamicScreen();

$(window).resize(dynamicScreen);

//Initial Page Load
$(document).ready(function() {
  function slowFade(class1, rate) {
    $(class1).fadeIn(rate);
  }
  slowFade('.ashes img', 400);
  slowFade('.bird img', 1000);
  slowFade('.phoenix img', 2500);
  slowFade('.molecules img', 1500);
});

// Parallax animation
function slowDance(movingClass) {
  $(movingClass).animate({ left: '25px' }, 2500, function() {
    $(this).animate({ left: '0px' }, 3000, slowDance(this));
  });
}

function slowDance2(movingClass) {
  $(movingClass).animate({ left: '-25px' }, 2800, function() {
    $(this).animate({ left: '0px' }, 2300, slowDance2(this));
  });
}

function slowDance3(movingClass3) {
  $(movingClass3).animate({ top: '15px' }, 2800, function() {
    $(this).animate({ top: '0px' }, 2300, slowDance3(this));
  });
}

slowDance2('#m2');
slowDance('.molecules');
slowDance3('.clouds');
//Konami Code
var easter_egg = new Konami();
easter_egg.code = function() {
  document.getElementById('zeldaMp3').play();
  $('.phoenix').fadeOut(3000, function() {
    $('.zeldaLink img').fadeIn(3000);
    $('.zeldaLink img').animate({ left: '105%' }, 20000, 'linear', function() {
      $('.zeldaLink img').fadeOut(200);
      $('#zeldaMp3').animate({ volume: 0 }, 5000, function() {
        document.getElementById('zeldaMp3').pause();
      });
      $('.phoenix').fadeIn(3000);
    });
  });
};
easter_egg.load();

$('.promo_slider').slick({
  autoplay: true,
  autoplaySpeed: 3500,
  pauseOnHover: true,
  prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
  nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>'
});

// Ajax Cart
if (document.getElementById('AddToCartForm')) {
  let $form = $('#AddToCartForm');
  $form.submit(function(e) {
    e.preventDefault();
    $('#AddToCartText').text('Pending...');
    $.ajax({
      url: $form.attr('action'),
      type: 'post',
      data: $form.serialize(),
      success: function(farm) {
        console.log(farm);
        updateCartCount();
        $('#AddToCartText').text('Success!');
        setTimeout(() => {
          $('#AddToCartText').text('Add To Cart');
        }, 1300);
      }
    });
  });
}

function updateCartCount() {
  $.getJSON('/cart.js', function(cart) {
    console.log(cart.item_count);
    $('#cartNumber').text(cart.item_count);
  });
}
