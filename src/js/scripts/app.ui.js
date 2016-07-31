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
	imageTransition: function($image) {
		var image = new Image();
		image.onload = function() {
			$image.addClass("img-ready");
		};
		image.onerror = function() {
			console.log("Could not load", $image.attr("src"));
		};
		image.src = $image.attr("src");
	}
};

$(document).ready(function() {
	app.ui.fitvids();
});

$(window).load(function() {
	$("[data-counter]").each(function() {
		app.ui.counter($(this));
	});
	$("img").each(function() {
		app.ui.imageTransition($(this));
	});
});