<?php

$payInfoDe= json_decode($payInfo['content']);
$payInfoDe= json_decode(json_encode($payInfoDe),true);
$payInfoDe = array_shift($payInfoDe);
//$test=$payInfo['content'];
//$test=$test[0];
$payUserInfo= json_encode($payUserInfo);
$r=json_decode($payUserInfo);
$r=$r[0];
//echo '<pre>';
//print_r($test);die;
//print_r($payInfo);die;
//print_r($payInfoDe);die;
//print_r($payUserInfo[0]);die;
//print_r($r);die;


if(isset($_POST['submit'])){
    
        
        $curl = curl_init();

$items = [
    "Quantity" => $payInfoDe['quantity'],
    "UnitPrice" => $payInfoDe['price'],
    "Description" => json_encode($payInfoDe),
];

$data = [
    "GroupPrivateToken" => "167a2e10-5081-4997-90e9-57ba8400245c",
    "Items" => [
        $items
    ],
    "RedirectURL" => "http://www.rivhit.co.il/",
];

$dataEn = json_encode($data);

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://testicredit.rivhit.co.il/API/PaymentPageRequest.svc/GetUrl",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "$dataEn",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "cache-control: no-cache",
    ),
));

$response = curl_exec($curl);
$dataDe = json_decode($response);
//header("Location: $dataDe->URL");
//echo '<pre>';
//print_r($dataDe->URL);die;
curl_close($curl);
print_r($dataDe);die;
//
//
        
        
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <form action="#"  method="post">
            @csrf
            First name:<br>
            <input type="text" name="firstname" value="{{$r->name}}">
            <br>
            Price:<br>
            <input type="text" name="price" value="{{$payInfoDe['price']}}$">
            <br>
            Description:
            <br>
            <textarea type="text" name="price" value="">{{json_encode($payInfoDe)}}</textarea>
            <br><br>
            <input type="submit" value="submit" name="submit">
        </form> 
    </body>
</html>