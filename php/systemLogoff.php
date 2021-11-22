<?php
$jsonString = file_get_contents('../json/login.json');
$data = json_decode($jsonString, true);
$data['idLogado'] = "";
$data['tipoConta'] = "";
$newJsonString = json_encode($data);
file_put_contents('../json/login.json', $newJsonString);
header("Location: ../html/login.html");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logoff</title>
</head>

<body>

</body>

</html>