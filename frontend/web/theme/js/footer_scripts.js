$("#menu-toggle").click(function(e){e.preventDefault();$("#menu-wrapper").toggleClass("toggled");var flag=false;if($('#menu-wrapper').css('padding-left')=='0px'){flag=true;}if(flag==true){$('#wrapper').addClass('toggled');$('#logo').css('display','none');}else{$('#wrapper').removeClass('toggled');$('#logo').css('display','block');}});$('.sidebar_menu > li > i').click(function(){$(this).closest('li').find('ul').toggle(500);});$(window).load(function(){if($(window).width()<=991){$(document).click(function(){$('.top-links').hide();});$('#top_link_trigger').click(function(e){e.preventDefault();e.stopPropagation();$('.top-links').toggle();});}});$('.filter_group a').click(function(){$(this).find('i').toggleClass('icon-angle-down');$(this).find('i').toggleClass('icon-angle-right');});$('.color_block').click(function(){$(this).parent().toggleClass('bordercolor');});$('.pagination li a').click(function(){scrollToShop(0)});function scrollToShop(margin){var locate=parseInt($('#content').offset().top)+margin;$('html, body').animate({scrollTop:locate},1000);return false;}