var app = app || {};

app.map = function() {
	var self = this;
	var $map;
	var map; 
	var coords = {};
	this.init = function($target) {
		$map = $target;
		var coordsArray = $target.attr("data-map").split(",");
		coords.latitude = coordsArray[0];
		coords.longitude = coordsArray[1];
		self.loadMap();
	};
	this.loadMap = function() {
		$.when(
			$.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyBbChsPXFcEPgXCAncMzV5FdaWc2W8_Hjk"),
			$.Deferred(function(deferred) {
				$(deferred.resolve);
			})
		).done(function() {
			self.initMap();
		});
	};
	this.initMap = function() {
		var location = new google.maps.LatLng(coords.latitude, coords.longitude);
		map = new google.maps.Map($map[0], {
			center: location,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoom: 15,
			disableDefaultUI: true
		});
		var marker = new google.maps.Marker({
			position: location,
			map: map,
			animation: google.maps.Animation.DROP
		});
		google.maps.event.addDomListener(window, "resize", function() {
			map.setCenter(location);
		});
	};
}

$(document).ready(function() {
	$("[data-map]").each(function() {
		var map = new app.map();
		map.init($(this));
	});
});