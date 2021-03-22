<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://kvstore.p.rapidapi.com/users",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{  \"email\" : \"dt.master.ws@gmail.com\",  \"password\" : \"54030890\"}",
	CURLOPT_HTTPHEADER => array(
		"accept: application/json",
		"content-type: application/json",
		"x-rapidapi-host: kvstore.p.rapidapi.com",
		"x-rapidapi-key: fe6e28e237msh5ff70b959f97db6p1c8390jsn2a243c821dec"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
