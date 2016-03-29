var app = app || {};

app.ui = {
	fitvids: function() {
		$(document).fitVids();
	}
};

$(document).ready(function() {
	app.ui.fitvids();
});