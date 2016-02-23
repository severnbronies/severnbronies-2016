var app = app || {};

app.navigation = function() {
	var self = this;
	this.init = function() {
		self.bindMenuToggler();
		self.bindDocumentClick();
		self.bindMenuSwipe();
		self.bindEscapeKey();
	};
	this.bindMenuToggler = function() {
		$(document).on("click", "[href='#navigation']", function(e) {
			e.preventDefault();
			$("body").toggleClass("menu-open");
		});
	};
	this.bindMenuSwipe = function() {
		var $menu = $(".menu");
		var touchStartX, touchMoveX; 
		$menu.hammer().on("panstart", function(e) {
			touchStartX = e.gesture.center.x;
		});
		$menu.hammer().on("panmove", function(e) {
			touchMoveX = e.gesture.center.x;
			var navMovement = touchStartX - touchMoveX;
			if(navMovement < 0) {
				$menu.css({
					"transform": "translate3d(" + Math.abs(navMovement) + "px, 0, 0)",
					"transition-duration": "0s",
					"transition-timing-function": "linear"
				});
			}
		});
		$menu.hammer().on("panend", function(e) {
			if((touchStartX - touchMoveX) < -50) {
				$("body").removeClass("menu-open");
			}
			$menu.removeAttr("style");
		});
	};
	this.bindDocumentClick = function() {
		$(document).on("click", ".menu-open .menu", function(e) {
			e.stopPropagation();
		});
		$(document).on("click", ".menu-open", function(e) {
			e.preventDefault();
			$("body").removeClass("menu-open");
		});
	};
	this.bindEscapeKey = function() {
		$(document).on("keyup", function(e) {
			if($("body").hasClass("menu-open") && e.keyCode === 27) {
				$("body").removeClass("menu-open");
			}
		});
	};
};

$(document).ready(function() {
	var navigation = new app.navigation();
	navigation.init();
});