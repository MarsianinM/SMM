

$(document).ready(function(event){
	$('.autor-button').click(function(event){
		$('.custom-button').removeClass('active__btn2');
		$('.autor-button').addClass('active__btn');
		$('.customer-menu').css('display','none');
		$('.autor-menu').css('display','block');
	});
	$('.custom-button').click(function(event){
		$('.custom-button').addClass('active__btn2');
		$('.autor-button').removeClass('active__btn');
		$('.autor-menu').css('display','none');
		$('.customer-menu').css('display','block');
	});
	$('.open__menu').click(function(event){

    $('.account').toggleClass('account-active');
		$('.customer-menu').css('display','none');
		$('.autor-menu').css('display','block');
		$('.custom-button').removeClass('active__btn2');
		$('.autor-button').addClass('active__btn');
	});


  var counter1= 0;
    var counter2= 0;
    var counter3= 0;
    if($(".run1").is('h2')) {
        var scroll = $(window).scrollTop() + $(window).height();
        var offset1 = $(".run1").offset().top
        if (scroll > offset1 && counter1 == 0) {
            counter1=1;
            var numb_finish = parseInt($(".run1").text().replaceAll(' ','')); // Получаем начальное число
            $({numberValue: 0}).animate({numberValue: numb_finish}, {
                duration: 1000, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд 
                easing: "linear",
                step: function(val) {
                    $(".run1").html(Math.ceil(val).toLocaleString()); // Блок, где необходимо сделать анимацию
                }
            });
        }
        var offset2 = $(".run2").offset().top
        if (scroll > offset2 && counter2 == 0) {
            counter2=1;
            var numb_finish = parseInt($(".run2").text().replaceAll(' ','')); // Получаем начальное число
            $({numberValue: 0}).animate({numberValue: numb_finish}, {
                duration: 1000, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд 
                easing: "linear",
                step: function(val) {
                    $(".run2").html(Math.ceil(val).toLocaleString()); // Блок, где необходимо сделать анимацию
                }
            });
        }
        var offset3 = $(".run3").offset().top
        if (scroll > offset3 && counter3 == 0) {
            counter3=1;
            var numb_finish = parseInt($(".run3").text().replaceAll(' ','')); // Получаем начальное число
            $({numberValue: 0}).animate({numberValue: numb_finish}, {
                duration: 1000, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд 
                easing: "linear",
                step: function(val) {
                    $(".run3").html(Math.ceil(val).toLocaleString()); // Блок, где необходимо сделать анимацию
                }
            });
        }
        $(window).scroll(function() {
            var scroll = $(window).scrollTop() + $(window).height();
            var offset1 = $(".run1").offset().top
            if (scroll > offset1 && counter1 == 0) {
                counter1=1;
                var numb_finish = parseInt($(".run1").text().replaceAll(' ','')); // Получаем начальное число
                $({numberValue: 0}).animate({numberValue: numb_finish}, {
                    duration: 1000, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд 
                    easing: "linear",
                    step: function(val) {
                        $(".run1").html(Math.ceil(val).toLocaleString()); // Блок, где необходимо сделать анимацию
                    }
                });
            }
            var offset2 = $(".run2").offset().top
            if (scroll > offset2 && counter2 == 0) {
                counter2=1;
                var numb_finish = parseInt($(".run2").text().replaceAll(' ','')); // Получаем начальное число
                $({numberValue: 0}).animate({numberValue: numb_finish}, {
                    duration: 1000, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд 
                    easing: "linear",
                    step: function(val) {
                        $(".run2").html(Math.ceil(val).toLocaleString()); // Блок, где необходимо сделать анимацию
                    }
                });
            }
            var offset3 = $(".run3").offset().top
            if (scroll > offset3 && counter3 == 0) {
                counter3=1;
                var numb_finish = parseInt($(".run3").text().replaceAll(' ','')); // Получаем начальное число
                $({numberValue: 0}).animate({numberValue: numb_finish}, {
                    duration: 1000, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд 
                    easing: "linear",
                    step: function(val) {
                        $(".run3").html(Math.ceil(val).toLocaleString()); // Блок, где необходимо сделать анимацию
                    }
                });
            }
        });
    }
  $('.personal1, .country').mouseenter(function(event){
    $('.country').addClass('oppppeeeennn');
  });
  $('.personal1, .country').mouseleave(function(event){
    $('.country').removeClass('oppppeeeennn');
  });

  let hamburger = document.querySelector('.open__menu');
  let menu = document.querySelector('.personal-dropdown');

  const toggleMenu = () => {
    menu.classList.toggle('active__dropdown');
  }

  hamburger.addEventListener('click', e => {
    e.stopPropagation();

    toggleMenu();
  });

  document.addEventListener('click', e => {
    let target = e.target;
    let its_menu = target == menu || menu.contains(target);
    let its_hamburger = target == hamburger;
    let menu_is_active = menu.classList.contains('active__dropdown');
    
    if (!its_menu && !its_hamburger && menu_is_active) {
      toggleMenu();
    }
  })
  
	
	

	$('.one').hover(function(event){
		$('.img-one').toggleClass('img-pass');
		$('.img-first').toggleClass('img-active');
	});
	$('.two').hover(function(event){
		$('.img-two').toggleClass('img-pass');
		$('.img-second').toggleClass('img-active');
	});
	$('.three').hover(function(event){
		$('.img-three').toggleClass('img-pass');
		$('.img-third').toggleClass('img-active');
	});

	$( ".hint" ).each(function() {
        $(this).mouseover(function() {
            $( this ).next('.text__hint').toggleClass('active__hint');
            
        });
        $(this).mouseout(function() {
            $('.text__hint').removeClass('active__hint');
            
        });
    });
	
});

$( ".proj_nav_item" ).each(function() {
        $(this).click(function() {
          $( '.proj_nav_item' ).removeClass('active__nav');
            $( this ).addClass('active__nav');
            
            
        });

    });


$( ".vip__span" ).each(function() {
        $(this).click(function() {
            $( this ).addClass('active__vip');      
        });

});


$( ".sposob__item" ).each(function() {
      $(this).click(function() {
        $( '.sposob__item' ).removeClass('active__sposob');
          $( this ).addClass('active__sposob');      
      });
});


    $( ".first__open" ).each(function() {
        $(this).click(function() {
          $('.new__of__navigation' ).hide();
          $( '.first__navigation' ).show();  
        });
    });

      $( ".second__open" ).each(function() {
        $(this).click(function() {
          $('.new__of__navigation' ).hide();
          $( '.second__navigation' ).show();
        });
      });

      $( ".third__open" ).each(function() {
        $(this).click(function() {
          $('.new__of__navigation' ).hide();
          $( '.third__navigation' ).show();
        });
      });

      $( ".fourth__open" ).each(function() {
        $(this).click(function() {
          $('.new__of__navigation' ).hide();
          $( '.fourth__navigation' ).show();
        });
      });

      $( ".fifth__open" ).each(function() {
        $(this).click(function() {
          $('.new__of__navigation' ).hide();
          $( '.fifth__navigation' ).show();
        });
      });

      $( ".sixth__open" ).each(function() {
        $(this).click(function() {
          $('.new__of__navigation' ).hide();
          $( '.sixth__navigation' ).show();
        });
      });



      $( ".first__tab" ).each(function() {
        $(this).click(function() {
          $('.all__tab__item' ).hide();
          $( '.item__tab1' ).show();  
        });
    });

      $( ".second__tab" ).each(function() {
        $(this).click(function() {
          $('.all__tab__item' ).hide();
          $( '.item__tab2' ).show();
        });
      });

      $( ".third__tab" ).each(function() {
        $(this).click(function() {
          $('.all__tab__item' ).hide();
          $( '.item__tab3' ).show();
        });
      });

      $( ".fourth__tab" ).each(function() {
        $(this).click(function() {
          $('.all__tab__item' ).hide();
          $( '.item__tab4' ).show();
        });
      });

      $( ".fifth__tab" ).each(function() {
        $(this).click(function() {
          $('.all__tab__item' ).hide();
          $( '.item__tab5' ).show();
        });
      });

      $( ".sixth__tab" ).each(function() {
        $(this).click(function() {
          $('.all__tab__item' ).hide();
          $( '.item__tab6' ).show();
        });
      });

$("#FileInput").on('change',function (e) {
            var labelVal = $(".title").text();
            var oldfileName = $(this).val();
                fileName = e.target.value.split( '\\' ).pop();

                if (oldfileName == fileName) {return false;}
                var extension = fileName.split('.').pop();

            if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
                $(".filelabel i").removeClass().addClass('fa fa-file-image-o');
                $(".filelabel i, .filelabel .title").css({'color':'#208440'});
                $(".filelabel").css({'border':' 2px solid #208440'});
            }
            else if(extension == 'pdf'){
                $(".filelabel i").removeClass().addClass('fa fa-file-pdf-o');
                $(".filelabel i, .filelabel .title").css({'color':'red'});
                $(".filelabel").css({'border':' 2px solid red'});

            }
  else if(extension == 'doc' || extension == 'docx'){
            $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
            $(".filelabel i, .filelabel .title").css({'color':'#2388df'});
            $(".filelabel").css({'border':' 2px solid #2388df'});
        }
            else{
                $(".filelabel i").removeClass().addClass('fa fa-file-o');
                $(".filelabel i, .filelabel .title").css({'color':'black'});
                $(".filelabel").css({'border':' 2px solid black'});
            }

            if(fileName ){
                if (fileName.length > 10){
                    $(".filelabel .title").text(fileName.slice(0,4)+'...'+extension);
                }
                else{
                    $(".filelabel .title").text(fileName);
                }
            }
            else{
                $(".filelabel .title").text(labelVal);
            }
        });


$(".custom-select").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
  template += '</div></div>';
  
  $(this).wrap('<div class="custom-select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
  $('html').one('click',function() {
    $(".custom-select").removeClass("opened");
  });
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function() {
  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
});




