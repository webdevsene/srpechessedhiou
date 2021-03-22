<?php

    require_once 'rapidapi-subcribe.php'; 
    
    // kvstore API url

    // Initializes a new cURL session
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://kvstore.p.rapidapi.com/collections",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{   \"collection\" : \"rapidApiCollection\"}",
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
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container d-flex justify-content-center p-4">
        <h3 class="text-center text-light bg-danger p-3"> <?php 
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }?> 
        </h3>
    </div>
</body>
</html>