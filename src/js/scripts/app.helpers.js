var app = app || {};

app.helpers = {
	createCookie: function(name, value, days) {
		var expiryDate = new Date(new Date().getTime() + (days * 24 * 60 * 60 * 1000));
		document.cookie = name + "=" + value + ";path=/;expires=" + expiryDate.toUTCString();
	},
	deleteCookie: function(name) {
		app.helpers.createCookie(name, "", -1);
	}
};