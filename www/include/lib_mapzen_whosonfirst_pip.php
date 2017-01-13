<?php

	loadlib("http");

	$GLOBALS["mapzen_whosonfirst_pip_endpoint"] = "https://pip.mapzen.com";

 	#################################################################

	function mapzen_whosonfirst_pip_call($lat, $lon, $more=array()){

		$defaults = array(
			"placetype" => null,
		);

		$more = array_merge($defaults, $more);

		$query = array(
			"latitude" => $lat,
			"longitude" => $lon,
		);

		if ($pt = $more["placetype"]){
			$query["placetype"] = $pt;
		}

		$query = http_build_query($query);

		$url = $GLOBALS["mapzen_whosonfirst_pip_endpoint"] . "?" . $query;
		$rsp = http_get($url);

		if (! $rsp["ok"]){
			return $rsp;
		}

		$data = json_decode($rsp["body"], "as hash");

		if (! $data){
			return array("ok" => 0, "error" => "Failed to parse response");
		}

		return array("ok" => 1, "rsp" => $data);
	}

 	#################################################################

	# the end