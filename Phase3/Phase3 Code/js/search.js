$().ready(function(){
  // Instant Search
  $('#q').keyup(function(){
    $('.search_item').each(function(){
      var re = new RegExp($('#q').val(), 'i')
      if($(this).children('.search_text')[0].innerHTML.match(re)){
        $(this).fadeIn();
      }else{
        $(this).fadeOut();
      };
    });
  });
});
