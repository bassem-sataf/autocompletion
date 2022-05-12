<?php
    $title = $_GET['id'];

try {
    $db = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8' , 'root', '');       
}        
            
catch (Exception $e) {

    die('error : ' . $e->getMessage());       

}

$arg = [":mot"=> $title];
$con = $db->prepare("SELECT * FROM `mytable` WHERE `show_id` = :mot");
$con->execute($arg);
$res = $con->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <h3>durée :</h3> <p><?php echo $res[0]['duration'] ?></p> 
        <h3>title :</h3> <p><?php echo $res[0]['title'] ?></p> 
        <h3>date de sortie :</h3> <p><?php echo $res[0]['release_year'] ?></p> 
        <h3>catégorie :</h3> <p><?php echo $res[0]['listed_in'] ?></p> 
        <h3>résumé :</h3> <p><?php echo $res[0]['description'] ?></p> 
    </div>
</body>
</html>




