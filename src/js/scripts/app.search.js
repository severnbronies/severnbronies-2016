var app = app || {};

app.search = function($form) {
	var self = this;
	var keyTimeout;
	this.init = function() {
		self.bindControls();
	};
	this.bindControls = function() {
		$(document).on("submit", $form, function(e) {
			e.preventDefault();
			$form.closest(".search").addClass("search--loading");
			var query = $form.find("[name='s']").val();
			$.ajax({
				url: $form.attr("action"),
				method: $form.attr("method"),
				data: {
					s: query
				}
			}).done(function(data) {
				$("[data-search-results]").replaceWith($(data).find("[data-search-results]"));
				$("img:not(.img-ready)").each(function() {
					app.ui.imageTransition($(this));
				});
			}).fail(function(jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
				alert("An error occurred.");
			}).always(function() {
				$form.closest(".search").removeClass("search--loading");
				self.updateHash(query);
			});
		});
		$(document).on("keyup", $form.find("[name='s']"), function(e) {
			if((e.keyCode >= 48 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 111)) {
				var query = $form.find("[name='s']").val();
				clearTimeout(keyTimeout);
				keyTimeout = setTimeout(function() {
					if(query !== "") {
						$form.trigger("submit");
					}
				}, 500);
			}
		});
	};
	this.updateHash = function(query) {
		query = query.replace(/ /g, "+");
		history.replaceState({}, "", "/search/" + query);
	};
};

$(document).ready(function() {
	$("[data-search-form]").each(function() {
		var searchForm = new app.search($(this));
		searchForm.init();
	});
});