var i = new Array();
var counter = 0;
var first = true;
$().ready(function(){  // Instant Search
$('html, body').animate({ scrollTop: 0 }, 0);
  $('#i').keyup(function(){
	  $('.search_item1').each(function(){
		  $(this).parent().parent().show();
	  });
  });
  $('#s1').click(function(){
  $('.search_item1').each(function(){
		  $(this).parent().parent().show();
	  });
  });
  $('#s2').click(function(){
  $('.search_item1').each(function(){
		  $(this).parent().parent().show();
	  });
  });
  $('#s3').click(function(){
  $('.search_item1').each(function(){
		  $(this).parent().parent().show();
	  });
  });
  $('#s4').click(function(){
  $('.search_item1').each(function(){
		  $(this).parent().parent().show();
	  });
  });
	  
  if (first)
  {
	  first = false;
		$('#i').keyup(function(){
	counter = 0;
	$('.search_item1').each(function(){
		i[counter] = false;
      var re = new RegExp($('#i').val(), 'i')
	  if (!(i[counter]))
	  {
		if($(this).children('.search_text')[0].innerHTML.match(re)){
		  i[counter] = true;
        $(this).parent().parent().show();
		
      }else{
	  i[counter] = false;
        $(this).parent().parent().hide();
      };
	  }
	  counter++;
      
    });
	counter = 0;
	$('.search_item2').each(function(){
      var re = new RegExp($('#i').val(), 'i')
	  if (!(i[counter]))
	  {
		if($(this).children('.search_text')[0].innerHTML.match(re)){
		  i[counter] = true;
        $(this).parent().parent().show();
		
      }else{
	  i[counter] = false;
        $(this).parent().parent().hide();
      };
	  }
	  counter++;
      
    });
	counter = 0;
	$('.search_item3').each(function(){
      var re = new RegExp($('#i').val(), 'i')
	  if (!(i[counter]))
	  {
		if($(this).children('.search_text')[0].innerHTML.match(re)){
		  i[counter] = true;
        $(this).parent().parent().show();
		
      }else{
	  i[counter] = false;
        $(this).parent().parent().hide();
      };
	  }
	  counter++;
      
    });
  });
  }
  $('#s1').click(function()
	{
		$('#i').keyup(function(){

	$('.search_item1').each(function(){
      var re = new RegExp($('#i').val(), 'i')
		if($(this).children('.search_text')[0].innerHTML.match(re)){
        $(this).parent().parent().show();
		
      }else{
        $(this).parent().parent().hide();
      };
	});
    });
	});
	$('#s2').click(function()
	{
		$('#i').keyup(function(){

	$('.search_item2').each(function(){
      var re = new RegExp($('#i').val(), 'i')
		if($(this).children('.search_text')[0].innerHTML.match(re)){
        $(this).parent().parent().show();
		
      }else{
        $(this).parent().parent().hide();
      };
	});
    });
	});
	$('#s3').click(function()
	{
		$('#i').keyup(function(){

	$('.search_item3').each(function(){
      var re = new RegExp($('#i').val(), 'i')
		if($(this).children('.search_text')[0].innerHTML.match(re)){
        $(this).parent().parent().show();
		
      }else{
        $(this).parent().parent().hide();
      };
	});
    });
	});

		$('#s4').click(function(){
$('#i').keyup(function(){
	counter = 0;
	$('.search_item1').each(function(){
		i[counter] = false;
      var re = new RegExp($('#i').val(), 'i')
	  if (!(i[counter]))
	  {
		if($(this).children('.search_text')[0].innerHTML.match(re)){
		  i[counter] = true;
        $(this).parent().parent().show();
		
      }else{
	  i[counter] = false;
        $(this).parent().parent().hide();
      };
	  }
	  counter++;
      
    });
	counter = 0;
	$('.search_item2').each(function(){
      var re = new RegExp($('#i').val(), 'i')
	  if (!(i[counter]))
	  {
		if($(this).children('.search_text')[0].innerHTML.match(re)){
		  i[counter] = true;
        $(this).parent().parent().show();
		
      }else{
	  i[counter] = false;
        $(this).parent().parent().hide();
      };
	  }
	  counter++;
      
    });
	counter = 0;
	$('.search_item3').each(function(){
      var re = new RegExp($('#i').val(), 'i')
	  if (!(i[counter]))
	  {
		if($(this).children('.search_text')[0].innerHTML.match(re)){
		  i[counter] = true;
        $(this).parent().parent().show();
		
      }else{
	  i[counter] = false;
        $(this).parent().parent().hide();
      };
	  }
	  counter++;
      
    });
  });

		});
	$('#i').keyup(function()
	{
		$('#s1').click(function()
		{
	$('.search_item1').each(function(){
      var re = new RegExp($('#i').val(), 'i')
		if($(this).children('.search_text')[0].innerHTML.match(re)){
        $(this).parent().parent().show();
		
      }else{
        $(this).parent().parent().hide();
      };
	});
    });
	});
	$('#i').keyup(function(){	
		$('#s2').click(function()
		{
	$('.search_item2').each(function(){
      var re = new RegExp($('#i').val(), 'i')
		if($(this).children('.search_text')[0].innerHTML.match(re)){
        $(this).parent().parent().show();
		
      }else{
        $(this).parent().parent().hide();
      };
	});
    });
	});
	$('#i').keyup(function(){
		$('#s3').click(function()
		{

	$('.search_item3').each(function(){
      var re = new RegExp($('#i').val(), 'i')
		if($(this).children('.search_text')[0].innerHTML.match(re)){
        $(this).parent().parent().show();
		
      }else{
        $(this).parent().parent().hide();
      };
	});
    });
	});

		
	$('#i').keyup(function(){
	$('#s4').click(function(){
	counter = 0;
	$('.search_item1').each(function(){
		i[counter] = false;
      var re = new RegExp($('#i').val(), 'i')
	  if (!(i[counter]))
	  {
		if($(this).children('.search_text')[0].innerHTML.match(re)){
		  i[counter] = true;
        $(this).parent().parent().show();
		
      }else{
	  i[counter] = false;
        $(this).parent().parent().hide();
      };
	  }
	  counter++;
      
    });
	counter = 0;
	$('.search_item2').each(function(){
      var re = new RegExp($('#i').val(), 'i')
	  if (!(i[counter]))
	  {
		if($(this).children('.search_text')[0].innerHTML.match(re)){
		  i[counter] = true;
        $(this).parent().parent().show();
		
      }else{
	  i[counter] = false;
        $(this).parent().parent().hide();
      };
	  }
	  counter++;
      
    });
	counter = 0;
	$('.search_item3').each(function(){
      var re = new RegExp($('#i').val(), 'i')
	  if (!(i[counter]))
	  {
		if($(this).children('.search_text')[0].innerHTML.match(re)){
		  i[counter] = true;
        $(this).parent().parent().show();
		
      }else{
	  i[counter] = false;
        $(this).parent().parent().hide();
      };
	  }
	  counter++;
      
    });
  });

		});
		    });