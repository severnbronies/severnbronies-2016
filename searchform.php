<form class="search-form search__form" method="get" action="<?php echo home_url("/"); ?>" role="search" data-search-form>
	<label class="search-form__label" for="search-query">Search</label>
	<input class="search-form__input" type="search" name="s" id="search-query" placeholder="Type to search" value="<?php echo get_search_query() ?>" autofocus>
	<div class="search-form__buttons">
		<button type="submit" class="search-form__submit">Search</button>
	</div>
</form>