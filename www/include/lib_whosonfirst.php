<?php

	loadlib("mapzen_whosonfirst_api");
	loadlib("mapzen_whosonfirst_pip");

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

		$rsp = mapzen_whosonfirst_pip_call($lat, $lon, array("placetype" => "neighbourhood"));

		if (! $rsp["ok"]){
			return $rsp;
		}

		$rsp = $rsp["rsp"];

		if (count($rsp) == 0){
			return array("ok" => 0, "error" => "No matches");
		}

		if (count($rsp) > 1){
			return array("ok" => 0, "error" => "Multiple matches");
		}

		$id = $rsp[0]["Id"];

		$rsp = whosonfirst_get_by_id($id);

		if (! $rsp["ok"]){
			return $rsp;
		}

		return array("ok" => 1, "hierarchy" => $rsp["record"]["wof:hierarchy"]);
	}

 	#################################################################

	# the end	