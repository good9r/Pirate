<?php
session_start();
// exit("hello");
// $memId = '$_REQUEST["memId"]';
$errMsg = "";
$_SESSION["memId"] = "test03";  //........................should delete this line
// exit($_SESSION["memId"]);
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "select * from customlist JOIN mycustom ON customlist.modelId = mycustom.modelId where memId = :memId";
  $mycustom = $pdo->prepare( $sql );
  $mycustom -> bindValue( ":memId", $_SESSION["memId"] );
  $mycustom -> execute( );

  if( $mycustom->rowCount() == 0 ){
    echo "[]";
  }else{

    $mycustomRows = $mycustom->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($mycustomRows);
  }	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>