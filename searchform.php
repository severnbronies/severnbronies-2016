<form class="search-form search__form" method="get" action="<?php echo home_url("/"); ?>" role="search" data-search-form>
	<label for="search-query">
		Search
	</label>
	<input class="search-form__field" type="search" name="s" id="search-query" placeholder="Search&hellip;" value="<?php echo get_search_query() ?>">
	<button type="submit" class="search-form__submit">Search</button>
</form>