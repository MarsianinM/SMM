$(document).ready(function(event){
	$('.autor-button').click(function(event){
		$('.custom-button').removeClass('active__btn');
		$('.autor-button').addClass('active__btn');
		$('.customer-menu').css('display','none');
		$('.autor-menu').css('display','block');
	});
	$('.custom-button').click(function(event){
		$('.custom-button').addClass('active__btn');
		$('.autor-button').removeClass('active__btn');
		$('.autor-menu').css('display','none');
		$('.customer-menu').css('display','block');
	});
	$('.open__menu').click(function(event){
		$('.personal-dropdown').slideToggle();
		$('.account').toggleClass('account-active');
		$('.customer-menu').css('display','none');
		$('.autor-menu').css('display','block');
		$('.custom-button').removeClass('active__btn');
		$('.autor-button').addClass('active__btn');
	});
	$('.personal1').click(function(event){
		$('.country').slideToggle();
	});
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



// 숫자 3자리마다 콤마 찍기
function numberWithCommas(x) {
    if (x !== null) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
}

$(function() {
    //slider range init set
    $( "#slider-range" ).slider({
        range: true,
        min: 1,
        max: 100,
        values: [ 1, 100 ],
        slide: function( event, ui ) {
            $( ".min" ).html(numberWithCommas(ui.values[ 0 ]) );
            $( ".max" ).html(numberWithCommas(ui.values[ 1 ]) );
        }
    });
  
    //slider range data tooltip set
    var $handler = $("#slider-range .ui-slider-handle");
  
    $handler.eq(0).append("<b class='amount'><span class='min'>"+numberWithCommas($( "#slider-range" ).slider( "values", 0 )) +"</span></b>");
    $handler.eq(1).append("<b class='amount'><span class='max'>"+numberWithCommas($( "#slider-range" ).slider( "values", 1 )) +"</span></b>");

    //slider range pointer mousedown event
    $handler.on("mousedown",function(e){
        e.preventDefault();
        $(this).children(".amount").fadeIn(300);
    });

    //slider range pointer mouseup event
    $handler.on("mouseup",function(e){
        e.preventDefault();
        $(this).children(".amount").fadeOut(300);
    });
});


$(function() {
    //slider range init set
    $( "#slider-range1" ).slider({
        range: true,
        min: 1,
        max: 100,
        values: [ 1, 100 ],
        slide: function( event, ui ) {
            $( ".min" ).html(numberWithCommas(ui.values[ 0 ]) );
            $( ".max" ).html(numberWithCommas(ui.values[ 1 ]) );
        }
    });
  
    //slider range data tooltip set
    var $handler = $("#slider-range1 .ui-slider-handle");
  
    $handler.eq(0).append("<b class='amount'><span class='min'>"+numberWithCommas($( "#slider-range1" ).slider( "values", 0 )) +"</span></b>");
    $handler.eq(1).append("<b class='amount'><span class='max'>"+numberWithCommas($( "#slider-range1" ).slider( "values", 1 )) +"</span></b>");

    //slider range pointer mousedown event
    $handler.on("mousedown",function(e){
        e.preventDefault();
        $(this).children(".amount").fadeIn(300);
    });

    //slider range pointer mouseup event
    $handler.on("mouseup",function(e){
        e.preventDefault();
        $(this).children(".amount").fadeOut(300);
    });
});


$(function() {
    //slider range init set
    $( "#slider-range2" ).slider({
        range: true,
        min: 1,
        max: 100,
        values: [ 1, 100 ],
        slide: function( event, ui ) {
            $( ".min" ).html(numberWithCommas(ui.values[ 0 ]) );
            $( ".max" ).html(numberWithCommas(ui.values[ 1 ]) );
        }
    });
  
    //slider range data tooltip set
    var $handler = $("#slider-range2 .ui-slider-handle");
  
    $handler.eq(0).append("<b class='amount'><span class='min'>"+numberWithCommas($( "#slider-range2" ).slider( "values", 0 )) +"</span></b>");
    $handler.eq(1).append("<b class='amount'><span class='max'>"+numberWithCommas($( "#slider-range2" ).slider( "values", 1 )) +"</span></b>");

    //slider range pointer mousedown event
    $handler.on("mousedown",function(e){
        e.preventDefault();
        $(this).children(".amount").fadeIn(300);
    });

    //slider range pointer mouseup event
    $handler.on("mouseup",function(e){
        e.preventDefault();
        $(this).children(".amount").fadeOut(300);
    });
});


