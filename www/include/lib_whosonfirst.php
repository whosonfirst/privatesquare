<?php

	loadlib("mapzen_whosonfirst_api");

 	#################################################################

	function whosonfirst_get_by_id($id, $more=array()){

		$method = "whosonfirst.places.getInfo";

		$args = array(
			"id" => $id,
			"extras" => "wof:hierarchy",
		);

		$rsp = mapzen_whosonfirst_api_call($method, $args);

		if (! $rsp["ok"]){
			return $rsp;
		}

		return array("ok" => 1, "record" => $rsp["rsp"]["record"]);
	}

 	#################################################################

	function whosonfirst_get_by_latlon($lat, $lon, $more=array()){

	}

 	#################################################################

	# the end	