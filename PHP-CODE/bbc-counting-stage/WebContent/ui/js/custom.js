$(window).on("load resize scroll",function(e){
    $('.fit-viewport').height($(window).height()-165);
});

$(function() {
    var header = $(".dash-toolset");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 20) {
            header.addClass("affix");
        } else {
            header.removeClass("affix");
        }
    });
});

$(function() {
    var toolset = $("#deep-filtering-search");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 20) {
            toolset.addClass("affix");
        } else {
            toolset.removeClass("affix");
        }
    });
});

$(document).ready(function() {
    $('#toggle-overhead').click(function() {
	    $(this).toggleClass("open");
        $('#overhead').toggleClass("opened");
        $('#navigator[role="head"]').toggleClass("lowered");
        $('#vessel').toggleClass("lowered");
        $('#overhead ul').toggleClass("opened");
        $('#curtain').toggleClass("active");
        $('#navigator[role="left"]').toggleClass("lowered");
    });
    $('#curtain').click(function() {
	    $('#toggle-overhead').toggleClass("open");
        $('#overhead').toggleClass("opened");
        $('#navigator[role="head"]').toggleClass("lowered");
        $('#vessel').toggleClass("lowered");
        $('#overhead ul').toggleClass("opened");
        $('#curtain').toggleClass("active");
        $('#navigator[role="left"]').toggleClass("lowered");
    });
	$('#navigator[role="left"]').hover(
	       function(){ $('.vessel').addClass('dimmed') },
	       function(){ $('.vessel').removeClass('dimmed') }
	);	
});

$( 
	function(){
		$('a.remove').click(
		function(){
			var sel = confirm('do you want to delete the widget?');
			if(sel)
			{
				//del code here
			}
		}
		);

		$('.column').sortable({
		connectWith: '.column',
		handle: '.header',
		cursor: 'move',
		forcePlaceholderSize: true,
		opacity: 0.6,	
		stop: function(event, ui)
			{
				$(ui.item).find('.header').click();
				var sortorder='';
				$('.column').each(function(){
					var itemorder=$(this).sortable('toArray');
					var columnId=$(this).attr('id');
					sortorder+=columnId+'='+itemorder.toString()+'&';
				});
				sortorder = sortorder.substring(0, sortorder.length - 1)
			}
		}).disableSelection();
	});
	