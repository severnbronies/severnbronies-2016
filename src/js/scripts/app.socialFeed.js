var app = app || {};

app.socialFeed = function() {
	var self = this;
	var $container = $(".page-home__grid");
	this.init = function() {
		self.load();
	};
	this.load = function() {
		$.ajax({
			url: "/social-feed",
			method: "GET",
			cache: false
		}).done(function(html) {
			$container.append(html);
		});
	};
};

$(document).ready(function() {
	var socialFeed = new app.socialFeed();
	socialFeed.init();
});