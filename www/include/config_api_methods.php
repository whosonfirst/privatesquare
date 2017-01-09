<?php

	########################################################################

	$GLOBALS['cfg']['api']['methods'] = array_merge(array(

		"test.echo" => array(
			"documented": 1,
			"enabled" => 0,
			"library" => "api_test"
		),

		"test.error" => array(
			"documented" => 1,
			"enabled" => 0,
			"library" => "api_test"
		),

		"foursquare.venues.search" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"library" => "api_foursquare_venues"
		),

		"nypl.venues.search" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"library" => "api_nypl_venues"
		),

		"privatesquare.trips.addTrip" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_trips"
		),

		"privatesquare.geo.geocode" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 0,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_geo"
		),

		"privatesquare.trips.deleteTrip" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_trips"
		),

		"privatesquare.trips.editTrip" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_trips"
		),

		"privatesquare.trips.calendars.addCalendar" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_trips_calendars"
		),

		"privatesquare.trips.calendars.deleteCalendar" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_trips_calendars"
		),

		"privatesquare.trips.calendars.editCalendar" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_trips_calendars"
		),

		"privatesquare.venues.create" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_venues"
		),

		"privatesquare.venues.checkin" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 1200,
			"library" => "api_privatesquare_venues"
		),

		"privatesquare.venues.delete" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_venues"
		),

		"privatesquare.venues.edit" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_venues"
		),

		"privatesquare.venues.search" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"library" => "api_privatesquare_venues"
		),

		"privatesquare.checkins.delete" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_checkins"
		),

		"privatesquare.checkins.updateStatus" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"requires_crumb" => 1,
			"crumb_ttl" => 600,
			"library" => "api_privatesquare_checkins"
		),

		"stateofmind.venues.search" => array(
			"documented" => 0,
			"enabled" => 1,
			"requires_auth" => 1,
			"library" => "api_stateofmind_venues"
		)

	), $GLOBALS['cfg']['api']['methods']);

	########################################################################

	# the end
