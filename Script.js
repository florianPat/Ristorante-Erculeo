$(document).ready(function(){
    $('.PictureAndDescription:first').css({'paddingTop': '4em'});

    if(document.title === "Home")
    {
	    $('#caption').click(function() {
	    	$('#caption').addClass('PinkBackgroundColor');
	    });

	    $('.PictureAndDescription:even').each(function(i, it) {
	    	$(it).css({'animationName': 'flyInRightToLeft', 'justifyContent': 'left'});
		});

	    $('.PictureAndDescription:odd').each(function(i, it) {
	    	let computedWidth = 0;

	    	$(it).find('*').each(function(i, it) {
	    		computedWidth += $(it).width();
	    	});

	    	let paddingLeft = $(it).width() - computedWidth;

	    	$(it).find('*:first').each(function(i, it) {
	    		$(it).css({'paddingLeft': paddingLeft});
	    	});

	    	$(it).css({'animationName': 'flyInLeftToRight'});
	    });
	}
	else
	{
		$('.PictureAndDescription:even').each(function(i, it) {
	    	$(it).css({'animationName': 'flyInRightToLeft'});
		});

		$('.PictureAndDescription:odd').each(function(i, it) {
	    	$(it).css({'animationName': 'flyInLeftToRight'});
	    });
	}
});