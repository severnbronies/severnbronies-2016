var app = app || {};

app.socialFeed = function() {
	var self = this;
	var $container = $("[data-socialfeed]");
	this.init = function() {
		self.load();
	};
	this.load = function() {
		$container.addClass("template-home__social-feed--loading");
		$.ajax({
			url: "/social-feed",
			method: "GET",
			cache: false
		}).done(function(html) {
			$container.html(html);
			$container.removeClass("template-home__social-feed--loading");
		}).fail(function() {
			$container.remove();
		});
	};
};

$(document).ready(function() {
	var socialFeed = new app.socialFeed();
	socialFeed.init();
});