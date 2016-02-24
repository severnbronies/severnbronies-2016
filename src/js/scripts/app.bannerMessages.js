var app = app || {};

app.bannerMessages = function() {
	this.init = function() {
		$(document).on("click", "[data-close-banner]", function(e) {
			e.preventDefault();
			var $this = $(this);
			$this.closest(".banner-message").remove();
			var cookieName = $this.attr("data-close-banner");
			app.helpers.createCookie(cookieName, "1", 28);
		});
	};
};

$(document).ready(function() {
	var bannerMessages = new app.bannerMessages();
	bannerMessages.init();
});