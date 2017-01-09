<?php
	#
	# $Id$
	#

	$GLOBALS['cfg'] = array();

	# Things you may want to change in a hurry

	$GLOBALS['cfg']['site_name'] = 'privatesquare';

	$GLOBALS['cfg']['site_disabled'] = 0;
	$GLOBALS['cfg']['site_disabled_retry_after'] = 0;	# seconds; if set will return HTTP Retry-After header

	# Known special values for 'environment':
	#
	# 'prod': This will cause privatesquare to use minimized JS libraries, where possible
	# 'localhost' : This will make the rest of the code assume that you're running privatesquare
	#               on a machine not otherwise connected to the (public) Internets. See the section
	#               on a 'here-be-dragons' locally hosted version in README.md

	$GLOBALS['cfg']['environment'] = 'dev';

	# Display a message in the page header (for all pages)

	$GLOBALS['cfg']['display_message'] = 0;
	$GLOBALS['cfg']['display_message_text'] = 'This is the text that will appear in the message header.';

	$GLOBALS['cfg']['autoload_libs'] = array(
		'cache',
		'urls',
		'users',
		'venues',
		'venues_providers',
	);

	# Valid venues providers

	$GLOBALS['cfg']['privatesquare_venues_providers'] = array(
		0 => 'privatesquare',
		1 => 'foursquare',
		2 => 'stateofmind',
		3 => 'nypl',
	);

	# You will need valid foursquare OAuth credentials
	# See also: https://foursquare.com/oauth/register

	$GLOBALS['cfg']['foursquare_oauth_key'] = 'READ-FROM-SECRETS';
	$GLOBALS['cfg']['foursquare_oauth_secret'] = 'READ-FROM-SECRETS';
	$GLOBALS['cfg']['foursquare_oauth_callback'] = 'auth/';

	# See notes in lib_api_foursquare_venues
	$GLOBALS['cfg']['foursquare_venues_sort'] = 'name';

	# You will need a valid Flickr API key or access to a running
	# instance of the 'reverse-geoplanet' web service. By default
	# all the code that runs the reverse geocoder is includes with
	# privatesquare (hence the requirement for an API key)
	# See also: https://github.com/straup/reverse-geoplanet
	# See also: http://www.flickr.com/services/apps/create/apply/

	$GLOBALS['cfg']['reverse_geoplanet_remote_endpoint'] = 'READ-FROM-SECRETS';
	$GLOBALS['cfg']['flickr_api_key'] = 'READ-FROM-SECRETS';

	# You will need to setup a MySQL database
	# See also: https://github.com/straup/privatesquare/blob/master/schema
	# See also: https://github.com/straup/flamework-tools/blob/master/bin/setup-db.sh

	$GLOBALS['cfg']['db_main'] = array(
		'host' => 'localhost',
		'name' => 'privatesquare',
		'user' => 'privatesquare',
		'pass' => 'READ-FROM-SECRETS',
		'auto_connect' => 0,
	);

	$GLOBALS['cfg']['db_accounts'] = array(
		'host' => 'localhost',
		'name' => 'privatesquare',
		'user' => 'privatesquare',
		'pass' => 'READ-FROM-SECRETS',
		'auto_connect' => 0,
	);

	# You will need to set up secrets for the various parts of the site
	# that need to be encrypted.
	# See also: https://github.com/straup/privatesquare/blob/master/bin/generate_secret.php

	$GLOBALS['cfg']['crypto_cookie_secret'] = 'READ-FROM-SECRETS';
	$GLOBALS['cfg']['crypto_crumb_secret'] = 'READ-FROM-SECRETS';
	$GLOBALS['cfg']['crypto_password_secret'] = 'READ-FROM-SECRETS';

	# If you don't have memcache installed (or don't even know what that means)
	# just leave this blank. Otherwise change the 'cache_remote_engine' to
	# 'memcache'.

	$GLOBALS['cfg']['cache_remote_engine'] = '';
	$GLOBALS['cfg']['memcache_host'] = 'localhost';
	$GLOBALS['cfg']['memcache_port'] = '11211';

	# This is only relevant if are running privatesquare on a machine where you
	# can not make the www/templates_c folder writeable by the web server. If that's
	# the case set this to 0 but understand that you'll need to pre-compile all
	# of your templates before they can be used by the site.
	# See also: https://github.com/straup/privatesquare/blob/master/bin/compile-templates.php

	$GLOBALS['cfg']['smarty_compile'] = 1;

	# Trips

	$GLOBALS['cfg']['enable_feature_trips'] = 1;
	$GLOBALS['cfg']['enable_feature_trips_calendars'] = 1;
	$GLOBALS['cfg']['enable_feature_trips_calendars_include_past'] = 0;

	# See also: 'Configuring fancy stuff – Artisanal Integers'
	# in the README.md file for details

	# Use an artisanal integer provider to generate local privatesquare database IDs
	# The seriously long version is here: http://www.aaronland.info/weblog/2012/12/01/coffee-and-wifi#timepixels

	$GLOBALS['cfg']['enable_feature_artisanal_integers'] = 0;
	$GLOBALS['cfg']['artisanal_integers_provider'] = '';	# defaults to a random provider
								# possible values are: mission, brooklyn, london
	
	$GLOBALS['cfg']['enable_feature_deferred_checkins'] = 1;
	$GLOBALS['cfg']['enable_feature_delete_checkins'] = 1;

	$GLOBALS['cfg']['enable_feature_export'] = 1;
	$GLOBALS['cfg']['enable_feature_export_static'] = 1;
	$GLOBALS['cfg']['export_static_path'] = '';

	$GLOBALS['cfg']['enable_feature_weather_tracking'] = 1;
	$GLOBALS['cfg']['weather_tracking_measure'] = 'Metric';		# change to 'US' for degrees Farenheit

	# Internals. Go ahead and tweak these if you want (and understand
	# how Flamework projects are set up) but you don't need to.

	##################################################################

	$GLOBALS['cfg']['enable_feature_api'] = 1;
	$GLOBALS['cfg']['enable_feature_api_documentation'] = 0;

	$GLOBALS['cfg']['db_users'] = array(

		'host' => array(
			1 => 'localhost',
			2 => 'localhost',
		),

		'user' => 'root',
		'pass' => 'root',

		'name' => array(
			1 => 'user1',
			2 => 'user2',
		),
	);

	$GLOBALS['cfg']['abs_root_url']		= 'http://'.($_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : 'fake.com').'/';
	$GLOBALS['cfg']['safe_abs_root_url']	= $GLOBALS['cfg']['abs_root_url'];

	$GLOBALS['cfg']['smarty_template_dir'] = realpath(dirname(__FILE__) . '/../templates/');
	$GLOBALS['cfg']['smarty_compile_dir'] = realpath(dirname(__FILE__) . '/../templates_c/');

	$GLOBALS['cfg']['auth_cookie_domain'] = parse_url($GLOBALS['cfg']['abs_root_url'], 1);
	$GLOBALS['cfg']['auth_cookie_name'] = 'a';

	$GLOBALS['cfg']['crumb_ttl_default'] = 300;	# seconds

	$GLOBALS['cfg']['rewrite_static_urls'] = array(
		# '/foo' => '/bar/',
	);

	$GLOBALS['cfg']['user'] = null;

	$GLOBALS['cfg']['http_timeout'] = 3;

	$GLOBALS['cfg']['check_notices'] = 1;

	$GLOBALS['cfg']['db_profiling'] = 0;


	#
	# db_enable_poormans_*
	#
	# If enabled, then the relevant database configs and handles
	# will be automagically prepopulated using the relevant information
	# in 'db_main'
	#

	#
	# You should enable/set these flags if you want to
	# use flamework in a setting where you only have access
	# to a single database.
	#

	$GLOBALS['cfg']['db_enable_poormans_federation'] = 1;

	$GLOBALS['cfg']['db_enable_poormans_slaves'] = 0;

	$GLOBALS['cfg']['db_poormans_slaves_user'] = '';
	$GLOBALS['cfg']['db_poormans_slaves_pass'] = '';


	#
	# For when you want to use tickets but can't tweak
	# your my.cnf file or set up a dedicated ticketing
	# server. flamework does not use tickets as part of
	# core (yet) so this is really only necessary if your
	# application needs db tickets.
	#

	$GLOBALS['cfg']['db_enable_poormans_ticketing'] = 1;


	#
	# This will assign $pagination automatically for smarty
	#
	
	$GLOBALS['cfg']['pagination_assign_smarty_variable'] = 1;

	$GLOBALS['cfg']['pagination_per_page'] = 10;
	$GLOBALS['cfg']['pagination_spill'] = 2;
	$GLOBALS['cfg']['pagination_style'] = 'pretty';

	$GLOBALS['cfg']['pagination_keyboard_shortcuts'] = 1;
	$GLOBALS['cfg']['pagination_touch_shortcuts'] = 1;

	#
	# Feature flags
	#

	$GLOBALS['cfg']['enable_feature_signup'] = 1;
	$GLOBALS['cfg']['enable_feature_signin'] = 1;
	$GLOBALS['cfg']['enable_feature_persistent_login'] = 1;
	$GLOBALS['cfg']['enable_feature_account_delete'] = 1;
	$GLOBALS['cfg']['enable_feature_password_retrieval'] = 1;

	# OAuth token swapping - use this with extreme caution and paranoia.
	# This allows a user to login in and update an mismatched oauth token
	# that comes back from foursquare by using the token to lookup a user
	# via the foursquare api and to then check for a corresponding local
	# user by the email address (included in the foursquare response). If
	# a match is found then the oauth token associated with the local user
	# (and foursquare_user) will be updated. You might want to do this if
	# you need to migrate your privatesquare instance from one domain to
	# another and you need to create a new foursquare application.
	# (20140302/straup)

	$GLOBALS['cfg']['enable_feature_oauth_token_swap'] = 0;

	#
	# enable this flag to show a full call chain (instead of just the
	# immediate caller) in database query log messages and embedded in
	# the actual SQL sent to the server.
	#

	$GLOBALS['cfg']['db_full_callstack'] = 0;

	$GLOBALS['cfg']['allow_prefetch'] = 0;

	# end of standard stuff

	# START OF flamework-api stuff
	
	# API methods and "blessings" are defined at the bottom
	# API feature flags

	$GLOBALS['cfg']['enable_feature_api'] = 1;

	$GLOBALS['cfg']['enable_feature_api_documentation'] = 1;
	$GLOBALS['cfg']['enable_feature_api_explorer'] = 1;
	$GLOBALS['cfg']['enable_feature_api_logging'] = 1;
	$GLOBALS['cfg']['enable_feature_api_throttling'] = 0;

	$GLOBALS['cfg']['enable_feature_api_require_keys'] = 0;		# because oauth2...
	$GLOBALS['cfg']['enable_feature_api_register_keys'] = 1;

	$GLOBALS['cfg']['enable_feature_api_delegated_auth'] = 1;
	$GLOBALS['cfg']['enable_feature_api_authenticate_self'] = 1;

	# API URLs and endpoints

	$GLOBALS['cfg']['api_abs_root_url'] = '';	# leave blank - set in api_config_init()
	$GLOBALS['cfg']['site_abs_root_url'] = '';	# leave blank - set in api_config_init()

	$GLOBALS['cfg']['api_subdomain'] = '';
	$GLOBALS['cfg']['api_endpoint'] = 'api/rest/';

	$GLOBALS['cfg']['api_require_ssl'] = 1;

	$GLOBALS['cfg']['api_auth_type'] = 'oauth2';
	$GLOBALS['cfg']['api_oauth2_require_authentication_header'] = 0;	// require means it must be present
	$GLOBALS['cfg']['api_oauth2_check_authentication_header'] = 0;		// check means it can be present (and takes precedence over query parameters)
	$GLOBALS['cfg']['api_oauth2_allow_get_parameters'] = 1;

	# API site keys (TTL is measured in seconds)

	$GLOBALS['cfg']['enable_feature_api_site_keys'] = 1;
	$GLOBALS['cfg']['enable_feature_api_site_tokens'] = 1;

	$GLOBALS['cfg']['api_site_keys_ttl'] = 28800;		# 8 hours
	$GLOBALS['cfg']['api_site_tokens_ttl'] = 28000;		# 8 hours
	$GLOBALS['cfg']['api_site_tokens_user_ttl'] = 3600;	# 1 hour

	$GLOBALS['cfg']['api_explorer_keys_ttl'] = 28800;		# 8 hours
	$GLOBALS['cfg']['api_explorer_tokens_ttl'] = 28000;		# 8 hours
	$GLOBALS['cfg']['api_explorer_tokens_user_ttl'] = 28000;	# 8 hours

	# We test this in lib_api_auth_oauth2.php to see whether or
	# not we need to throw an error - it's possible that we want
	# this to be computed in lib_api_config for example but right
	# now we're explicit about everything (20141114/straup)

	$GLOBALS['cfg']['enable_feature_api_oauth2_tokens_null_users'] = 1;

	# As in API key roles - see also: api_keys_roles_map()
	# (20141114/straup)

	$GLOBALS['cfg']['api_oauth2_tokens_null_users_allowed_roles'] = array(
		'site',
		'api_explorer',
		'infrastructure',
	);

	$GLOBALS['cfg']['enable_feature_api_cors'] = 1;
	$GLOBALS['cfg']['api_cors_allow_origin'] = '*';

	# API pagination

	$GLOBALS['cfg']['api_per_page_default'] = 100;
	$GLOBALS['cfg']['api_per_page_max'] = 500;

	# The actual API config

	$GLOBALS['cfg']['api'] = array(

		'formats' => array( 'json' ),
		'default_format' => 'json',

		# We're defining methods using the method_definitions
		# hooks defined below to minimize the clutter in the
		# main config file, aka this one (20130308/straup)
		'methods' => array(),

		# We are NOT doing the same for blessed API keys since
		# it's expected that their number will be small and
		# manageable (20130308/straup)

		'blessings' => array(
			'xxx-apikey' => array(
				'hosts' => array('127.0.0.1'),
				# 'tokens' => array(),
				# 'environments' => array(),
				'methods' => array(
					'foo.bar.baz' => array(
						'environments' => array('sd-931')
					)
				),
				'method_classes' => array(
					'foo.bar' => array(
						# see above
					)
				),
			),
		),
	);

	# Load api methods defined in separate PHP files whose naming
	# convention is FLAMEWORK_INCLUDE_DIR . "/config_api_{$definition}.php";
	#
	# IMPORTANT: This is syntactic sugar and helper code to keep the growing
	# number of API methods out of the main config. Stuff is loaded in to
	# memory in lib_api_config:api_config_init (20130308/straup)

	$GLOBALS['cfg']['api_method_definitions'] = array(
		'methods',
	);

	# END OF flamework-api stuff