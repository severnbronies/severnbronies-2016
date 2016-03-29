# Severn Bronies 2016
**We're slowly building the new Severn Bronies website here!** Watch along and learn how to code stuff! [Raise bugs or request a feature!](https://github.com/severnbronies/severnbronies-website/issues) Find weaknesses to exploit and tell us how to fix them! The choice is yours! 

This repository contains a theme that works on top of an average WordPress installation, which when combined with a bunch of plugins and some pretty schwifty coding is able to ingest a bunch of custom post types and fields and spit out a bunch of neat looking stuff. 

This code and documentation is provided as-is without support. This code is provided as part of our continuing dedication to transparency in just about everything we do. 

## Basic installation 
These instructions are basic and probably not for the faint hearted. You have been warned. 

- [ ] **Step 1:** Download and install [WordPress](https://wordpress.org/). 

- [ ] **Step 2:** Create a new directory (with any name you want!) in the `wp-content/themes` directory and clone the [severnbronies/severnbronies-2016](https://github.com/severnbronies/severnbronies-2016) repo into it. 

- [ ] **Step 3:** Clone the [severnbronies/severnbronies-plugins-2016](https://github.com/severnbronies/severnbronies-plugins-2016) repo into the `wp-content/plugins` directory.

- [ ] **Step 4:** In the WordPress admin interface, go to `Plugins > Add New`, click on the Favourites tab at the top of the page and use the WordPress.org username 'severnbronies' to get a list of our third-party plugins. Install them. (Disclaimer: You only need the Advanced Custom Fields plugins for functionality, the others are just useful.) 

- [ ] **Step 5:** Dump a bunch of configuration options somewhere as PHP constants. The `wp-config.php` file in the WordPress root would make sense for this. Quick links to registration/API key getting pages: [Google Analytics](https://analytics.google.com), [Google Maps](https://console.developers.google.com/), [Facebook](https://developers.facebook.com/docs/apps/register), [Twitter](https://apps.twitter.com/), [Tumblr API](https://www.tumblr.com/oauth/apps)
````
	// For the site
	define('GOOGLE_ANALYTICS_ID',     'UA-XXXXXXXX-X');
	define('GOOGLE_MAPS_API_KEY',     'XXXXXXXXXX');
	// For the social feed plugin
	define('FACEBOOK_APP_ID',         'XXXXXXXXXX');
	define('FACEBOOK_APP_SECRET',     'XXXXXXXXXX');
	define('TWITTER_OAUTH_TOKEN',     'XXXXXXXXXX');
	define('TWITTER_OAUTH_SECRET',    'XXXXXXXXXX');
	define('TWITTER_CONSUMER_KEY',    'XXXXXXXXXX');
	define('TWITTER_CONSUMER_SECRET', 'XXXXXXXXXX');
	define('TUMBLR_API_KEY',          'XXXXXXXXXX');
````

- [ ] **Step 6:** In WordPress, activate the 'Severn' theme and all of the plugins you've just installed. 

- [ ] **Step 7:** That's it(?)

If you have any questions then [raise it in the issue tracker](https://github.com/severnbronies/severnbronies-website/issues) and we might be able to help you. If you use this code for anything other than dicking around then a small acknowledgement would be appreciated. Thanks and have fun! 
