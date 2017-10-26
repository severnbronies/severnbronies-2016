var app = app || {};

app.ui = {
	fitvids: function() {
		$(document).fitVids();
	},
	counter: function($counter) {
		var self = this;
		var text = $counter.text();
		$({ count: 0 }).animate({ count: parseInt(text) }, {
			duration: 4500,
			easing: "swing",
			step: function() {
				$counter.text(self.leftPad(Math.ceil(this.count), text.length, 0));
			}
		});
	},
	leftPad: function(string, length, character) {
		string = String(string);
		var i = -1; 
		if(!character && character !== 0) {
			character = " ";
		}
		length = length - string.length;
		while(++i < length) {
			string = character + string;
		}
		return string;
	},
	lazyload: function() {
		const $images = $('noscript.lazyload');
		loadMedia(
			$images.get(),
			function() {
				console.log(this);
				$(this).addClass('img-ready');
			},
			true
		);
	}
};

$(document).ready(function() {
	app.ui.fitvids();
	app.ui.lazyload();
});

$(window).load(function() {
	$("[data-counter]").each(function() {
		app.ui.counter($(this));
	});
});