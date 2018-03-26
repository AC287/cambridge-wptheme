//javascript functions
// console.log('Javascript is running');

jQuery(document).ready(function($) {

  //Adding responsive class to header navigation.
  $('.header-navicon').click(function(){
    var x = $('#header-rnav').attr('class').split(' ');
    // console.log(x.length);
    if(x.length===1){
      $('#header-rnav').addClass('responsive');
    }
    else {
      $('#header-rnav').removeClass('responsive');
    }
  })
/*

  function getCurrentLocation() {
    var curLocation = $(location).attr('href').split('/');
    return (curLocation[3]);
  }

  switch (getCurrentLocation()) {
    case "":
      // $('.home').css('border-bottom', '1px solid #fff');
      // $('.home').css('box-shadow','0px 10px 0px -7px #fff');
      navigationSelector('home');
      break;
    default:
      navigationSelector(getCurrentLocation());
      break;
  }
  function navigationSelector(x){
    // $('.'+ x + ' . header-navi-title').css('height', '11px');
    // console.log(x);
    $('.'+ x + ' .header-navi-selector' ).css({'display' : 'block',});

    return;
  }
*/
  /* - - - index page - - - */

  $('.index-midcategory').on('click', function(){
    var currentSelection = $(this).attr('data-target').split('#')[1];
    $('.index-midcategory-contents').each(function(i,obj){
      // console.log(currentSelection);
      // console.log($(this).attr('id'));
      if($(this).attr('id')!=currentSelection){
        $(this).collapse('hide');
      }
    })
  })


  function classSplit(x){
    var mainclass=x.split(' ');
    return mainclass;
  }


// --- THIS IS FOR ACCORDION BUTTON SECTION ---

// source: https://codepen.io/brenden/pen/Kwbpyj
$('.custaccordion').click(function(e){
  var $this = $(this);
  if($this.next().hasClass('show')){
    $this.next().removeClass('show');
    $this.children('img').attr('src','http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png');
    $this.next();
  } else {
    // $this.parent().find('.panel').removeClass('show');
    // console.log('Else section. Find parent panel and removeClass show');
    $this.children('img').attr('src','http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png');
    // $this.parent().find('.panel').slideUp(350);
    // console.log('Else section. Find parent panel and slideup.');
    $this.next().toggleClass('show');
    $this.children('img').attr('src','http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-down.png');
    $this.next();
  }
});

$('.productaccordion-mobilemenu').click(function(){
  var x = $('.cat-bar').attr('class').split(' ');
  // console.log(x.length);
  if(x.length===1){
    $('.cat-bar').addClass('responsive');
    $('.productaccordion-mobilemenu span').removeClass('glyphicon-plus');
    $('.productaccordion-mobilemenu span').addClass('glyphicon-minus');

  }
  else {
    $('.cat-bar').removeClass('responsive');
    $('.productaccordion-mobilemenu span').removeClass('glyphicon-minus');
    $('.productaccordion-mobilemenu span').addClass('glyphicon-plus');
  }
})

var m0param = getURLparam('m0');
var s1param = getURLparam('s1');

if(m0param) {
  // console.log('m0param triggered');
  var m0paramInner = '.m0-'+m0param;
  console.log($(m0paramInner).next());
  $(m0paramInner).next().toggleClass('show');
  $(m0paramInner).children('img').attr('src','http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-down.png');
}
if(s1param) {
  console.log(s1param);
  var s1paramInner = '.s1-'+s1param;
  console.log($(s1paramInner).next());
  $(s1paramInner).next().toggleClass('show');
  $(s1paramInner).children('img').attr('src','http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-down.png');
}

function getURLparam(sParam) {
  /*
    source: http://www.jquerybyexample.net/2012/06/get-url-parameters-using-jquery.html
    source: https://stackoverflow.com/questions/3431512/javascript-equivalent-to-phps-urldecode
  */
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

  for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
          return (((sParameterName[1] === undefined ? true : sParameterName[1]).replace(/\+/g, '')).replace('"', '')).replace("'",'');
      }
  }
}


// - - - PRODUCT PS2 PAGE - - -
// source: cssglobe.com/lab/tooltip/03/
$('a.ipt').hover(function(e) {
  //This function run when mouse hover.
  xOffset = 10;
  yOffset = 30;
  var iptName = ".ipt-"+this.className.split('ipt ')[1];
  // var iptName = this.className.split('ipt ')[1];
  // var iptName = (iptName.split(/[^A-Za-z0-9]/)).join('');
  // console.log(iptName);
  $(iptName)
          .css("display","block")
          .css("top",(e.pageY - xOffset) + "px")
          .css("left",(e.pageX + yOffset) + "px")
          .fadeIn("fast");
}, function (){
  //This function run when mouse hover out.
  var iptName2 = ".ipt-"+this.className.split('ipt ')[1];
  $(iptName2).css("display","none");
});
$('a.ipt').mousemove(function(e) {
  var iptName3 = ".ipt-"+this.className.split('ipt ')[1];
  $(iptName3)
      .css("top",(e.pageY - xOffset) + "px")
      .css("left",(e.pageX + yOffset) + "px");
});

// --- THIS IS FOR PRODUCT MAIN PAGE ---
var displayExtra = $('.display-extra');
// var prodChev = $('.show-hide .sh-chev img');
var i;
for (i=0; i< displayExtra.length; i++) {
  displayExtra[i].onclick = function () {
    var currentStatus = this.innerHTML.split(' ');
    if (currentStatus[0] == 'SHOW') {
      currentStatus[0] = 'HIDE';
      currentStatus.splice(1,1);
      this.innerHTML = currentStatus.join(' ');
      // This toggle chevron icon.
      $(this).closest('div').children().children().attr('src','http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev_up_blue.png');
    }
    else {
      currentStatus[0] = 'SHOW';
      currentStatus.splice(1,0,'ALL');
      this.innerHTML = currentStatus.join(' ');
      // This toggle chevron icon.
      $(this).closest('div').children().children().attr('src','http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev_down_blue.png');
    }
    var displayAll = $('.'+this.classList[1]);
    displayAll.each(function(index,object){
      if(($(this).css('display'))=='none'){
        $(this).css('display','block');
      }
      else if (($(this).css('display')=='block') && $(this).hasClass('extra-box')){
        $(this).css('display','none');
      }
    })
  }
  // displayExtra[i].onclick = function () {
  //
  // }
}

/* - - - PRODUCT MAIN PAGE FLEX WRAP SCRIPT - - - */
var $s1BoxFlexContainer = $('.s1-box-flex-container');
// console.log($s1BoxFlexContainer.length);
for(var j=0; j<$s1BoxFlexContainer.length; j++){
  // console.log($($s1BoxFlexContainer[j]).children().length)
}

// --- THIS IS FOR ITEM PAGE ---
var imgThumb = $('.single-thumb');
// console.log($('.main-view-lg'));
// console.log($('.main-view-lg').length);
imgThumb.click(function(){
  // console.log(this.className.split(' ')[1]);
  var getClickedClass = this.className.split(' ')[1].split('-')[1];
  // console.log(getClickedClass);
  $('.main-view-lg').each(function(index,object){
    // console.log(index);
    $(this).css('display','none');
  })
  var curThumbDisplay = '.img-content-box .main-' + getClickedClass;
  $(curThumbDisplay).css('display','initial');
})
var ipClickedImg = $('.main-view-lg');
ipClickedImg.click(function(){
  // var getMainClickedClass=this.className.split(' ')[1].split('-')[1];
  var getMainClickedClass='.modal-'+this.className.split(' ')[1].split('-')[1];
  // console.log(getMainClickedClass);
  $('.ip-modal').css('display','block');
  $(getMainClickedClass).css('display','block');
})
$('.ip-close').click(function(){
  $('.ip-modal').css('display','none');
  $('.ip-slides').css('display','none');
})


// - - - #replace this with slick plugin (fail. need revision) - - -

var clickToNext = $('.ip-slides');
// console.log(clickToNext.length);
clickToNext.click(function(){
  var getClickedIndex = parseInt(this.className.split(' ')[1].split('-')[1].split('img')[1]);
  var nextIndex = getClickedIndex+1;
  // console.log(getClickedIndex);
  var curClass = $('.modal-img'+getClickedIndex);
  // console.log(curClass);
  curClass.css('display','none');
  // console.log($('.modal-img'+(nextIndex+1)));
  // while ($('.modal-img'+(nextIndex+1))!="") {
  //   console.log('while is executed');
  //   // console.log('Image: '+ nextIndex + ' is empty. Adding one.');
  //   nextIndex++;
  //   if (nextIndex > 9){
  //     nextIndex = 0;
  //   }
  // }
  // console.log('aye capt!');
  // console.log(nextIndex);
  if($('.modal-img'+nextIndex).length!=0){
    $('.modal-img'+nextIndex).css('display','block');
    // console.log('inner if executed.');
  } else {
    // console.log('else executed.');
    for(var i=nextIndex; i < 10; i++){
      // console.log(i);
      if(i == 9) {
        i = 0;
      }
      if($('.modal-img'+i).length!=0){
        // console.log(i);
        $('.modal-img'+i).css('display','block');
        break;
      }
    }
  }


  // console.log(clickToNext.length);
    // # Will need to revise. If there are missing image at specific, it will stuck.
  // Image has 9 cells: img0 - img9.
  // var nextIndex = getClickedIndex+1;
  // if($('.modal-img'+nextIndex)!=""){
  //   $('.modal-img'+nextIndex).css('display','block');
  // } else {
  //   for ( var i=getClickedIndex; i <=9; i++){
  //   // #Do while loop
  //   }
  // }

  // if(getClickedIndex == clickToNext.length-1){
  //   $('.modal-img0').css('display','block');
  // } else {
  //   var curClass = $('.modal-img'+(getClickedIndex + 1));
  //   curClass.css('display','block');
  // }
})

/* // - - - Slick code for modal section - - - */
// $('.ip-modal-content').slick({
//   // dots: true,
//   infinite: true,
//   speed: 500,
//   fade: true,
//   cssEase: 'linear'
// });
/*
- - - TEAM PAGE - - -
*/
$('.team-crop').click(function(){
  var displayingPerson = '.team-'+$(this).attr('id');
  // console.log($(this).attr('id'));
  $('.team-modal').css('display','block');
  $(displayingPerson).css('display', 'block');

  $('.team-close').click(function(){
    $('.team-modal').css('display','none');
    $(displayingPerson).css('display','none');
  })
})

// $('.team-salesmanager-each').hover(function(){
//   // console.log($(this).attr('class'));
//   var currState = '#'+$(this).attr('class').split(' ')[1].split('-')[2]+' .cls-1';
//   // console.log(currState);
//   $(currState).css({
//     'fill': '#fff',
//   })
// })

$('.team-salesmanager-each img').bind({
  mouseenter: function(){
    var currState = '#'+$(this).attr('class').split('-')[2]+' .cls-1';
    $(currState).css({
      // 'transform':'scale(1.5)',
      'fill':'rgb(112, 189, 255)',
    })
  },
  mouseleave: function(){
    // var currState = '#'+$(this).attr('class').split(' ')[1].split('-')[2]+' .cls-1';
    $('.cls-1').css({
      'fill':'#036',
    })
  }
});
// console.log($('.career-open-each').height());
/* - - - CAREER EXPAND SECTION - - - */
$('.career-open-expand a').click(function(){
  // console.log($(this).attr('id'));
  var clickedclass = '.'+$(this).attr('id');
  // var clickedID = '#'+$(this).attr('id');
  // var clickedclassHeight = $(clickedclass).height();
  // var clickedHeightInner = $( clickedclass + ' .career-open-each').height();
  // // console.log(typeof(clickedHeight));
  // if (clickedclassHeight > 150){
  //   $(clickedclass).css({
  //     'height': '150px',
  //   })
  //   $(clickedID).text('Click to expand');
  // } else {
  //   $(clickedclass).css({
  //     'height': clickedHeightInner+'px',
  //   })
  //   $(clickedID).text('Hide');
  // }
  $(clickedclass).css('display','block');

  $('.career-close').click(function(){
    $('.career-modal').css('display','none');
    $(displayingPerson).css('display','none');
  })
})

/* - - - catalog initial load - - - */
$('.catalog-custbtn').each(function(index){
  var currentClass = '.'+$(this).children('input').attr('id');
  if($(this).hasClass('active')){
    // var activeClass = '.'+ $(this).children('input').attr('id');
    $(currentClass).show();
  } else {
    $(currentClass).hide();
  }
});
/* - - - catalog click effect - - - */
$('.catalog-custbtn').click(function(){
  // console.log($(this).children('input').attr('id'));
  var clickedClass = $(this).children('input').attr('id');
  $('.catalog-thumbinner').each(function(index){
    // console.log(index+" "+clickedClass);
    if($(this).hasClass(clickedClass)){
      $('.'+clickedClass).show();
    } else {
      $(this).hide();
    };
  })
  // $catalogthumbinner = $('.catalog-thumbinner');
  // console.log($catalogthumbinner.length);
  // for (var i=0; i < $catalogthumbinner.length; i++) {
  //   $catalogthumbinner[i].style.display="none";
  // }
  // console.log('clicked');
  // console.log($(this).hasClass('active'));
  // $label ='.'+ $(this).find("input").attr('id');
  // console.log($label.attr('id'));
  // $($label).css({
  //   'display':'inline-flex',
  // })
});

/* - - - Pressing ESC will reset everything - - - */
$(document).keydown(function(e){
  // console.log(e);
  if(e.keyCode==27){  //this listen for "ESC" key.
    $('.ip-modal').css('display','none');
    $('.ip-slides').css('display','none');
    $('.team-modal').css('display', 'none');
    $('.team-modal-content').css('display','none');
    $('.career-modal').css('display','none');
  }
})

/* - - - tradeshows page archive height - - - */
checkSize();
$(window).resize(checkSize);

function checkSize() {
  var alltradeshowsSize = $('.tradeshowspage').height()+'px';
  $('.tradeshows-archive-col').css('min-height', alltradeshowsSize);

  if($('.tradeshows-archive-col').css('float')=='none') {
    // console.log(alltradeshowsSize);
    $('.tradeshows-archive-col').css('min-height','100%');
  }
}

/* - - - slick plugin - - - */

  $('.img-thumbnail-section').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1
  });

})

// console.log('JS is fully functional.');
