var app = app || {};

app.ui = {
	yesJs: function() {
		$("html").removeClass("no-js").addClass("js");
	},
	fitvids: function() {
		$(document).fitVids();
	}
};

$(document).ready(function() {
	app.ui.yesJs();
	app.ui.fitvids();
});