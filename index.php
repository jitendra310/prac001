<?php
	# Webapp url: https://www.github.com 
	# Sample wordlist: D:\newxampp\htdocs\bruteForcer\wordlist.txt
	#

	// $webUrl = (string)readline('Enter Webapp url: '); 
	$webUrl = "https://www.github.com"; 
	// $webPath = (string)readline('Enter path of containing a list of webapp paths: '); 
	$webPath = 'D:\newxampp\htdocs\bruteForcer\wordlist.txt'; 
	// $statusCode = (int)readline('Enter Success status codes by comma separated: ');

	$paths = fopen("$webPath","r");
	while(! feof($paths)){
		$path = fgets($paths);
		echo pinUrlg($webUrl."/".$path);		
	}
	pinUrlg("https://www.google.com");
	fclose($paths);

	

	function pinUrlg($url=NULL) { 
		if($url == NULL) return false;  
		$ch = curl_init($url);  
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
		$data = curl_exec($ch);  
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
		curl_close($ch); 

		echo $url. "[status code ". $httpcode."]". "</br>";
		// if($httpcode>=200 && $httpcode<300){  
		// 	// echo $url;
		// 	// echo "yyyy";
		//     // return true;  
		// } else {  
		//     // return false;  
		// 	// echo $url;
		// 	// echo "nooo";
		// }  
	} 

 ?>