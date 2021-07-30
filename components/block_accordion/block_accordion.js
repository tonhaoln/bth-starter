(function($) {

	$('.question').click(function(e) {
	  	e.preventDefault();
	  
	    var $this = $(this);
	  
	    if ($this.next().hasClass('show')) {
	    	$this.removeClass('active');
	        $this.next().removeClass('show');
	        $this.next().slideUp(350);
	    } else {
	    	$this.toggleClass('active');
	        $this.parent().parent().find('li .answer').removeClass('show');
	        $this.parent().parent().find('li .answer').slideUp(350);
	        $this.next().toggleClass('show');
	        $this.next().slideToggle(350);
	    } 
	});

}(jQuery));
