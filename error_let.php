<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';


if(isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST"){

    $u_code = generateRandomString(20);
	$sql = "UPDATE users SET confirm_mail = '$u_code' WHERE email='" . $_POST['email'] . "'";
    $result = $conn->query($sql);
	if($result > 0) {
		echo "Вам на почту выслано подтверждение регистрации";
		$link = "<a href='http://shop-master.netxisp.host/register.php?u_code=$u_code'>Confirm</a>";
        mail($_POST['email'], 'Register', $link);
        
    } 
    else {
    	echo "Error";
    }


}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Error letter</title>
</head>
<body>

<form method="POST">
	<p>Подтвердите свою почту<br/>
	<p>Email<br/>   
	<input type="text" name="email">
    </p>
    <button type="submit">Send</button>
</form>	

</body>
</html>