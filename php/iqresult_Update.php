<?php
ob_start();
session_start();
?>
<?php
$errMsg = "";
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "update member set intelligence = :intelligence,strength= :strength,agile = :agile, luck = :luck,memLv = 7,memExp = 0,memMoney = 1000,playedTimes = 5  where memId = ':memId'";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(":intelligence",$_REQUEST["int"]);
  $statement->bindValue(":strength",$_REQUEST["str"]);
  $statement->bindValue(":agile",$_REQUEST["agi"]);
  $statement->bindValue(":luck",$_REQUEST["lcu"]);
  $statement->bindValue(":memId",$_SESSION["memId"]);
  $statement->execute();

  // echo "異動{$affectedRows}筆資料成功";
  $affectedRows = $pdo->exec( $sql );//下指令
  echo "異動{$affectedRows}筆資料成功";
}catch (PDOException $e) {
  $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
  $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}
  echo $errMsg;
?>