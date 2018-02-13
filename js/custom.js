/*var browserName=navigator.appName;
if (browserName!="Google Chrome")
{
window.alert('Best viewed on Google Chrome.');
};
var notchrome = browser
window.alert('Best viewed on Google Chrome.');*/



$(".Qasize").on('click', function(){
  var quiz_id = $(this).attr('data-quiz');
  $('.quiz_'+quiz_id).each(function(){
    if (!$(this).hasClass('correct')){
      $(this).css('font-weight', '100').css('color', '#70706f');
    }
  });
      setTimeout(function(){  resetcolor(); Reveal.next();},1000);

        function resetcolor(){setTimeout(function(){$('.quiz_'+quiz_id).css('color', 'black').css('font-weight', '900');},2000)}
});



Reveal.addEventListener( 'slidechanged', function( event ) {
  // console.log($(event.currentSlide).hasClass('addFrag'));
  Reveal.navigateFragment( 0 );
  var hasFrag = $(event.currentSlide).hasClass('addFrag');
  if (hasFrag) {
    Reveal.nextFragment();
  }
  //  REveal.nexF
  //}
  // var fragadd = Reveal.nextFragment();
  // var addfrag = class="addfrag"
  // event.fragment = the fragment DOM element
} );



$(".next").on('click', function() {
  var state = Reveal.getState().indexh;
     Reveal.slide(state + 1);
console.log(state + 1);
});


  $(".prev").on('click', function() {
    var state = Reveal.getState().indexh;
       Reveal.slide(state - 1);
console.log(state - 1);
});

$(".home").on('click', function() {
     Reveal.slide(0);
});

/*Reveal.addEventListener( 'slidechanged', function( event ) {
  var  = $(event.currentSlide).hasClass('firstFrag');
  if (hasFirstFrag) {
    console.log(hasFirstFrag);
    Reveal.nextFragment();
  }
  else{

  }
});*/
