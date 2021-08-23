// scroll windows for navbar
window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.documentElement.scrollTop > 60) {
      $(".navbar").removeClass("bg-transparant");
      $(".navbar").addClass("bg-premiere");
    }else {
    $(".navbar").addClass("bg-transparant");
    $(".navbar").removeClass("bg-premiere");
  }
}


// smooth scroll for all element 'href'
$('a').click(function(e){

  var href = $(this).attr('href');
  var elemenHref = $(href);

$('html,body').animate({
  scrollTop: elemenHref.offset().top - 80
}, 800, 'easeInOutExpo');

  e.preventDefault();

});