<?php
error_reporting(0);
require_once("./setup.php");

if(isset($_GET['code'])){

    $token = $google->fetchAccessTokenWithAuthCode($_GET['code']);

    $_SESSION['token'] = $token;
    
    if(!isset($token['error'])){

        $google->setAccessToken($token['access_token']);
        $service = new Google_Service_Oauth2($google);

        $data = ($service->userinfo->get());
        
        // echo "First Name = ".$data['given_name'];
        // echo "Last Name = ".$data['family_name'];
        // echo "Full Name = ".$data['name'];
        // echo "<img src='". $data['picture'] ."' width='100'>";
        // echo "Email = ".$data['email'];

        $_SESSION['name'] = $data['name'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['src'] =  $data['picture'];
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container border">
        <div class="card" style="width:250px;margin:80px auto;">
            <img class="card-img-top" src="<?php echo $_SESSION['src'];  ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $_SESSION['name']; ?></h5>
                <p class="card-text"><?php echo $_SESSION['email'];  ?></p>
                <a href="./logout.php" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</body>

</html>