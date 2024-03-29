<?php
ob_start();
session_start();
$errMsg = "";

try {
    require_once("connectPirates.php");
    $sql = "select * from manager";
    $manager = $pdo->query($sql);
} catch (PDOException $e) {
    $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
    $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}

echo $errMsg;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/backStage.css">
    <link rel="stylesheet" href="../css/wavebtn.css">
</head>

<body>
    <div class="backstage">
        <?php
        require_once("backMenu.php");
        ?>
        <div class="contentWrap">
            <div class="content">
                <h3 class="titlePri">管理員帳號管理</h3>
                <a href="backNewAdministrator.php">
                    <button>新增</button>
                </a>
                <div class="dataTable">
                    <table>
                        <tr>
                            <th>管理員帳號</th>
                            <th>註冊時間</th>
                            <th>權限</th>
                        </tr>
                        <?php
                        while ($memberRow = $manager->fetch()) {
                            ?>
                            <td><?php echo $memberRow['managerAcc'] ?></td>
                            <td><?php echo $memberRow['managerSignUpTime'] ?></td>
                            <td><?php echo $memberRow['managerStatus'] ?></td>
                            </tr>
                        <?php
                    }
                    ?>
                    </table>
                </div>
                <div class="pagination">
                    <ul>
                        <li id="left"> <a href="#">
                                < </a> </li> <li> <a href="#">1</a></li>
                        <li> <a href="#">2</a></li>
                        <li> <a href="#">3</a></li>
                        <li> <a href="#">4</a></li>
                        <li> <a href="#">5</a></li>
                        <li class="right"> <a href="#"> > </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/wavebtn.js"></script>
</body>

</html>