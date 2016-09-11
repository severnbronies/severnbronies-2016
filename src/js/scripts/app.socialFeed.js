var app = app || {};

app.socialFeed = function() {
	var self = this;
	var $container = $(".page-home__grid");
	this.init = function() {
		if($container.length > 0) {
			self.load();
		}
	};
	this.load = function() {
		$.ajax({
			url: "/social-feed",
			method: "GET",
			cache: false
		}).done(function(html) {
			$container.append(html);
			// Chrome won't always run the each below in time because the 
			// browser does the above append in a semi-asynchronous fashion. 
			// We can resolve this by causing this part of the page to be 
			// forcibly reflowed by hiding and showing it. 
			$container.hide().show(0); 
			$("img:not(.img-ready)").each(function() {
				app.ui.imageTransition($(this));
			});
		});
	};
};

$(document).ready(function() {
	var socialFeed = new app.socialFeed();
	socialFeed.init();
});