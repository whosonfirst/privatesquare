<?php

	loadlib("http");

	$GLOBALS["mapzen_whosonfirst_api_endpoint"] = "https://whosonfirst-api.mapzen.com";

 	#################################################################

	function mapzen_whosonfirst_api_call($method, $args=array()){

		$defaults = array(
			"api_key" => ""
		);

		$args["method"] = $method;

		$query = http_build_query($args);

		$url = $GLOBALS["mapzen_whosonfirst_api_endpoint"];
		$rsp = http_post($url, $query);

		if (! $rsp["ok"]){
			return $rsp;
		}

		$data = json_decode($rsp["body"], "as hash");

		if (! $data){
			return array("ok" => 0, "error" => "Failed to parse response");
		}

		if ($data["stat"] != "ok"){
			return array("ok" => 0, "error" => $rsp["error"]["message"]);
		}

		return array("ok" => 1, "rsp" => $data);
	}

 	#################################################################

	# the end