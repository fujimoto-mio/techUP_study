//scroll
$("html").easeScroll({
  frameRate: 60,
  animationTime: 1000,
  stepSize: 120,
  pulseAlgorithm: 1,
  pulseScale: 8,
  pulseNormalize: 1,
  accelerationDelta: 20,
  accelerationMax: 1,
  keyboardSupport: true,
  arrowScroll: 50,
  touchpadSupport: true,
  fixedBackground: true
});

// ページトップへのスクロール
$(function() {
    var topBtn = $('.gotop');    
    topBtn.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});
// ページ内スクロール
$(function() {
  var offsetY = -58;
  var time = 500;
  $('a[href^=#]').click(function() {
    var target = $(this.hash);
    if (!target.length) return ;
    var targetY = target.offset().top+offsetY;
    $('html,body').animate({scrollTop: targetY}, time, 'swing');
    return false;
  });
});

// スライダー
$(function() {
    $('#works .slider').slick({
      infinite: true,
      speed: 400,
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 10000,
      responsive: [
        {
          breakpoint: 880,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false
          }
        }
      ]
    });
    $('#works .slick-prev').click(function(){
    $('#works .slider').slick('slickPrev');
    })

    $('#works .slick-next').click(function(){
    $('#works .slider').slick('slickNext');
    })
});
$(function() {
    $('#voice .slider').slick({
      dots: false,
      infinite: true,
      speed: 400,
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 12000,
      responsive: [
        {
          breakpoint: 770,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            centerMode: false
          }
        }
      ]
    });
    $('#voice .slick-prev').click(function(){
    $('#voice .slider').slick('slickPrev');
    })

    $('#voice .slick-next').click(function(){
    $('#voice .slider').slick('slickNext');
    })
});

// sameheight
$.fn.equalHeights = function(){
  var max_height = 0;
  $(this).each(function(){
    max_height = Math.max($(this).height(), max_height);
  });
  $(this).each(function(){
    $(this).height(max_height);
  });
};

$(document).ready(function(){
    $('#strong-point .tx').equalHeights();
});

//自動ふりがな
document.addEventListener("DOMContentLoaded", function() {
    AutoKana.bind("#name", "#furigana", { debug: true });
  });

//アコーディオン
$(function() {
$(".termtx").hide();
$(".term .btn").on("click", function() {
    $(this).next().slideToggle("fast");
    $(this).toggleClass("active");
});
});

//フォーム validation
$(function() {
$('form').validate({
        rules: {
            お問い合わせ内容: {
                required: true
            },
            事業形態: {
                required: true
            },
            会社名: {
                required: true
            },
            お名前: {
                required: true
            },
            ふりがな: {
                required: true
            },
            メールアドレス: {
                required: true,
                email: true
            },
            電話番号: {
                required: true
            },
            詳しい内容: {
                required: true
            },
            個人情報の取扱いについて: {
                required: true
            }
        },
        messages: {
            お問い合わせ内容: {
                required: '* 選択してください'
            },
            事業形態: {
                required: '* 選択してください'
            },
            会社名: {
                required: '* 入力してください'
            },
            お名前: {
                required: '* 入力してください'
            },
            ふりがな: {
                required: '* 入力してください'
            },
            メールアドレス: {
                required: '* 入力してください',
                email: 'メールアドレスを正確に入力してください'
            },
            電話番号: {
                required: '* 入力してください'
            },
            詳しい内容: {
                required: '* 入力してください'
            },
            個人情報の取扱いについて: {
                required: '* 選択してください'
            }
        },
        errorPlacement: function(error, element){
        if (element.is(':radio,:checkbox')) {
          error.appendTo(element.parent());
        }else {
          error.insertAfter(element);
        }
    }
});
});


//header fixed
$(function(){
  var _window = $(window),
    _header = $('#header'),
    heroBottom;
  
  _window.on('scroll',function(){
    heroBottom = $('#trouble').height();
    if(_window.scrollTop() > heroBottom){
      _header.addClass('transform');   
    }
    else{
      _header.removeClass('transform');   
    }
  });
  
  _window.trigger('scroll');  
});


// タイトルアニメーション
jQuery(function($){
  /******************************************
  init
  ******************************************/ 
  var startPos = 0,winScrollTop = 0;
  $('.text-container').waypoint(function(direction){
    var activePoint = $(this.element);
    
    if (direction === 'down') {//scroll down
      activePoint.addClass('active');
    }
  },{offset : '70%'});
}); 


// accordion qa
$(function(){
  $('.toggle dt').on('click', function() {
    $(this).next('dd').slideToggle();
    $(this).siblings('dt').removeClass('active');
    $(this).toggleClass("active");
    $('dd').not($(this).next('dd')).slideUp();
     });
});


// sp nav
if (matchMedia('(max-width: 590px)').matches) {
$(function() {
    $('.menu-trigger').on('click', function() {
        $('.head-cta').slideToggle("fast");
        $(this).toggleClass('active');
    return false;
    });
    $('#header .head-cta ul li a').on('click', function() {
        $('.head-cta').slideToggle("fast");
        $('.menu-trigger').toggleClass('active');
    return false;
    });
});
} else {
  // それ以外
}

//popup
$(document).ready(function() {
  $('a.wklink').magnificPopup({
    type:'inline',
    fixedContentPos: true,
    fixedBgPos: true,
    gallery:{
    enabled:true
  }
  });
});
$(document).ready(function() {
  $('a.vclink').magnificPopup({
    type:'inline',
    fixedContentPos: true,
    fixedBgPos: true,
    gallery:{
    enabled:true
  }
  });
});