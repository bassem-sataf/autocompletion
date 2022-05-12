<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8' , 'root', '');       
}
        
        
          
catch (Exception $e) {
             
    die('error : ' . $e->getMessage());
            
}       


// function getInfos($title)
// {
//     $con = $db->prepare("SELECT * FROM `mytable` WHERE `title` = ?");
//     $con->execute(array($title));
//     $contain = $con->fetchAll();
//     return $contain;
// }

$search = htmlspecialchars( $_POST['search']); 
$mot = "%$search%";

$arg = [":mot"=> $mot];
$con = $db->prepare("SELECT `title`, show_id FROM `mytable` WHERE `title` LIKE :mot LIMIT 10");
$con->execute($arg);
$contain = $con->fetchAll();


$mot2 = $search."%";
$arg2 = [":mot"=> $mot2];

$req = $db->prepare("SELECT `title`, show_id FROM `mytable` WHERE `title` LIKE :mot LIMIT 10");
$req->execute($arg2);
$start = $req->fetchAll();

$all = ['start' => $start,
'contain' => $contain];

echo json_encode($all);

