<?php
	// made to handle requests

	if(isset($_GET['req'])){
		$what = file_get_contents("sitedata.json");
		$req = $_GET['req'];

		$thelist = json_decode($what);
		$found = 0;

		foreach($thelist as $item){
			if($item["resource"] == $req && $found == 0){
				$found += 1;
				$thelink = $item["link"];
			}
		}

		if($found == 0){
			echo "invalid request";
			exit();
		} else {
			header("refresh: 1.2;url=$thelink");
		}
		echo "processing your request";
	} else {
		echo "invalid request format";
	}
?>