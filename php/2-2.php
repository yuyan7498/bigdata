<?php 
require_once 'DBConnectionHandler.php';

$serverName = "localhost";  
$userName   = "root";       
$password   = "";       
$db         = "practice";   

try {
    DBConnectionHandler::setConnection($serverName, $userName, $password, $db);
    $connection = DBConnectionHandler::getConnection();
    echo "連接成功！".'<br>';
}catch(PDOException $e) {
    echo "連接錯誤" . $e->getMessage();
}

$idValue = 281;
$score = 100;

$sql = "SELECT COUNT(dp001_prac_score_rate) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID AND dp001_prac_score_rate=:SCORE"  ;
$stmt = $connection->prepare($sql);
$stmt->bindParam(":ID", $idValue);
$stmt->bindParam(":SCORE", $score);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
print_r($stmt->fetchAll());

?>