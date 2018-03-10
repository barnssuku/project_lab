/**
 * This script will be use to toggle on-off the content of the listed projects 
 * on a click to any of the list tab.
 */
$(document).ready(function(){
	$('.my-list').on('click', function(){		
		var id = this.id;
		// call the method to do the removal of all show classes
		remShow($('div.display-div'));
		// after then we call the hide class on
		$('.item_'+id).addClass('show');		
	});
	
	/**
	 * This function will take any element and set its 
	 * class display attribute to 'hide' if it is having
	 * 'show' and vice versa. 
	 */
	var remShow = function($elem) {
		// At this point $elem is an object
		$elem.each(function() {			
			$(this).removeClass('show');
			$(this).addClass('hide');
		});
	}	
});