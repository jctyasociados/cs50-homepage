$( document ).ready(function() {
    $('.hovered').hover(function(){
      $(this).css('border','2px solid blue');
    },function(){
      $(this).css('border','2px solid black');
    });    
  });