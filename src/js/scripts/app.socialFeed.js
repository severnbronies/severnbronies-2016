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