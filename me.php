<?php
ob_start();
session_start();
$errMsg = "";
require_once("meToDB/meToDB.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>《大海賊帝國》去追尋吧！</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/me.css">
    <link rel="stylesheet" href="css/wavebtn.css">
    
    

    <style>
   canvas{
        outline: 2px solid rgb(46, 44, 44);
    }
    #tools img{
        width: 100px;
    }
    #shipArea{
        position: relative;
        height: 100%;
        width: 100%;
    }
    /* #shipArea img{
        width: 750px;
        position: absolute;
    } */
    #partSail,#partBody,#partHead,#drawFrame{
        width: 100%;
        position: absolute;
    }
    #drawFlag,#combineShip{
        width: 100%;
        height: 100%;
        position: absolute;
    }
    </style>
</head>

<body>





    <!--------------------------------- 選單 ------------------------------------->
    <label for="burgerCtrl">
        <input type="checkbox" name="" id="burgerCtrl">
        <div id="burger">
            <div class="burgerLine"></div>
            <div class="burgerLine"></div>
        </div>
    </label>
    <header class=""><!-- homeHeadHide-->
        <h1 id="headerLogo"><a href="index.php">
            <img src="image/logo.svg" alt="大海賊帝國">
        </a></h1>
        <nav id="headerMenu" >
            <ul>
                <li class="menuSwitch">
                    <a href="play.php">海賊試煉場</i></a>
                    <ul class="headerSub">
                        <li><a href="play.php#game">海賊試煉</a></li>
                        <li><a href="play.php#gpsWrap">啟航尋寶</a></li>
                    </ul>
                </li>
                <li class="menuSwitch">
                    <a href="market.php">海上市集</i></a>
                    <ul class="headerSub">
                        <li><a href="market.php">黑市</a></li>
                        <li><a href="market.php">造船廠</a></li>
                    </ul>
                </li>
                <li class="menuSwitch"><a href="bar.php">情報酒館</a></li>
                <li class="menuSwitch">
                    <a href="me.php">俺の海賊船</i></a>
                    <ul class="headerSub">
                        <li><a href="javascript:;" class="loginHere">登入</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
<!------------------------------------------------------------------------------->


<!-- --------------------------------標題---------------------------------------->
    <div class="meTitle">
        <h1 class="titlePri">俺の海賊船</h1>
    </div>
<!-- --------------------------------------------------------------------------->


<!-- ------------------------------wrap----------------------------------------->
    <div class="wrap">
        <!-------------------------------- 左邊船體設計圖------------------------>
        <div class="col-12 col-md-12 col-xl-4 drawing">
            <img src="image/background/blueprint.png" alt="">
            <form id="Form">
                <input type="hidden" name="">
                <input type="hidden" name="">
                <input type="hidden" name="">
            </form>
            <div class="meShip">
                <div id="shipArea">
                    <!-- 為了取得外聯SVG的內文使用於船帆遮罩，使用object標籤 -->
                    <img src="image/ship/300.png" alt="挑選船身" id="partBody">
                    <!-- <img src="image/ship/200.svg" id="partSail" alt=""> -->
                    <object data="image/ship/200.svg" type="image/svg+xml" id="partSail"></object>
                    <img src="image/ship/100.png" alt="挑選船頭" id="partHead">
                        <canvas id="combineShip">
                           
                        </canvas>
                        <canvas id="drawFlag">
                            
                        </canvas>
                </div>
            </div>
            <a href="#">
                <button id="butStore" class="btnpri"><span>儲存</span></button>
            </a>
        </div>
        <!-- ------------------------------------------------------------------->

        <!--------------------------------- 中間個人資訊 ------------------------->
        <div class="col-12 col-md-12 col-xl-4 boxNews">
            <div class="meNews">
                
                <ul class="col-12 col-md-5 field">
                     <?php
                    $memId = $_SESSION["memId"];
                        while ($member->fetch(PDO::FETCH_ASSOC)) {
                            if ($memberId == $memId) {
                                ?> 
                    <li>
                        帳號: <span><?php echo $memId ?></span>
                    </li>
                    <form method="Post"  id="meShipForm" >      
                    <li>
                              <input type="hidden" name="memId" value="<?php echo $memberId ?>">
                        密碼: <input type="password" name="memPsw" value="<?php echo $memPsw?> " maxlength="12" readonly id="memPsw1">
                              <i class="fas fa-pen"></i>
                    </li>
                    
                    <li>
                        ID: <span><?php echo $memNic ?></span>
                    </li> 
                    </form>
                    <li>
                        LV: <span> <?php echo $memLv ?> </span>
                      
                    </li>
                    <li>
                        EXP:<span> <?php echo $memExp ?>/100 </span>
                    </li>
                    <li>
                        金幣: <span> <?php echo $memMoney ?> </span> G
                    </li>
                    <li>
                    <div id="OOXX">
                        <div id="str"><?php echo $strength ?></div>
                        <div id="int"><?php echo $intelligence ?></div>
                        <div id="lck"><?php echo $luck ?></div>
                        <div id="age"><?php echo $agile ?></div>
                    </div>
                        <button class="btnpri butNews" id="carryOut"><span>確認修改</span></button>
                    </li>
                    <?php
                            }
                        }
                    ?>  
                </ul>
                <!-- --------------------------------------------------------------------------->
                
                <!--------------------------------------------- 雷達圖 ------------------------->
                <div  class="col-12 col-md-7 radar">
                    <div id="btnArea">
                    <button id="butS" class="but" >力量</button>
                    <button id="butI" class="but" >智力</button>
                    <button id="butL" class="but" >幸運</button>
                    <button id="butA" class="but" >敏捷</button>
                    </div>
                    <h3>天賦值: <span id="points"> <?php echo $_SESSION["talentPointsRemain"];?> </span> 點</h3>
                    <canvas id="myChart"  style="display: inline-block; width:90%; height:90%;"></canvas>
                </div>
            </div>
            <!-- --------------------------------------------------------------------------->


            <!-- -------------------------------寶物造型頁籤 ------------------------------------>
            <div class="col-12  bookMark">
                <div id="js-tabs">
                    <div id="tabs-nav">
                        <a href="#tab0" onclick="jsTabs(event,'tab0');return false"
                            class="tabs-menu tabs-menu-active">寶物</a>
                        <a href="#tab1" onclick="jsTabs(event,'tab1');return false" class="tabs-menu">造型</a>
                    </div>
                    <div class="tabs-container">
                        <div id="tab0" class="tabs-panel" style="display:block">
                            <div class="content">
                                <ul>
                                <?php
                                $memId = $_SESSION["memId"];
                                    while ($treasurestorageRow = $treasurestorage->fetch(PDO::FETCH_ASSOC)) {
                                        if ($treasurestorageId == $memId) {
                                            ?> 
                                    <li>
                                        <img src="image/treasure/<?php echo $treaImg ?>" alt="">
                                    </li> 
                                <?php
                                        }
                                    }
                                ?>   
                                </ul>
                            </div>
                        </div>
                        <div id="tab1" class="tabs-panel">
                        <div class="content">
                            <ul>
                                <?php
                                $memId = $_SESSION["memId"];
                                    while ($mycustomrRow = $mycustom->fetch(PDO::FETCH_ASSOC)) {
                                        if ($mycustomrId == $memId) {
                                            ?>      
                                    <li>
                                        <img src="image/product/<?php echo $modelImg?>" alt="" class="p<?php echo $modelPart?> myCustomer">
                                    </li>
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --------------------------------------------------------------------------->
       
       
        </div>
        <!-- -------------------------------------------------------------------->

        <!-- -----------------------------右邊紀錄攔------------------------------>
        <div class="col-12 col-md-12 col-xl-4 filewrap">
            <div id="js-tabs1" class="js-tabs1">
                <div id="tabs-nav1">
                    <a href="#tab2" onclick="jsTabs1(event,'tab2');return false"
                        class="tabs-menu1 tabs-menu-active1">交易紀錄</a>
                    <a href="#tab3" onclick="jsTabs1(event,'tab3');return false" class="tabs-menu1">發文紀錄</a>
                </div>
                <div class="tabs-container1">
                    <div id="tab2" class="tabs-panel1" style="display:block">
                    <?php
                    $memId = $_SESSION["memId"];
                     while ($traderecord->fetch(PDO::FETCH_ASSOC)) {
                         if ($traderecordId == $memId) {
                             ?>
                            <div class="tt textS">
                            <ul>
                                <li>寶物名稱: <span><?php echo $treaName ?></span> </li>
                                <li>上架時間: <span><?php echo $saleTime?></span> </li>
                                <li>買家暱稱: <span><?php echo $salerId?></span> </li>
                                <li>交易時間: <span><?php echo $tradeTime?></span> </li>
                                <li>價格: <span> <?php echo $price?> </span> </li>
                            </ul>
                        </div>
                    <?php
                         }
                     }
                    ?>
                    </div>
                    <div id="tab3" class="tabs-panel1">
                    <?php
                    $memId = $_SESSION["memId"];
                    while ($articlelistRow = $articlelist->fetch(PDO::FETCH_ASSOC)) {
                        if ($articlelistId == $memId) {
                            ?>
                            <div class="tt textS">
                            <ul>
                                <li>主題: <span><?php echo $artTitle ?></span> </li>
                                <li>發文時間: <span><?php echo $artTime?></span> </li>
                                <li>討論人數: <span><?php echo $msgAmt?></span> 次</li>
                                <li>點擊次數: <span><?php echo $clickAmt?></span> 次</li>
                                <li><button class="btnpri"><span><a href="ber.php?from=me&artId=<?php echo $artId?>">前往文章</a></span></button></li>
                            </ul>
                    </div>
                    <?php
                        }
                    }
                    ?>
                    </div>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
        <!-- --------------------------------------------------------------------->
    </div>
    <!-- ------------------------------wrap結束------------------------------------>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/header.js"></script>
    <script src="js/radar5.js?<?php echo time();?>"></script>
    <script src="js/me.js?<?php echo time();?>"></script>
    <script src="js/wavebtn.js"></script>
    <!-- <script src="js/meShip.js"></script> -->

    <script>
    //雷達圖--------------------------------------------------------------

    str = parseInt($('#str').text());
    int = parseInt($('#int').text());
    lck = parseInt($('#lck').text());
    age = parseInt($('#age').text());
            console.log(parseInt(int));
    // str = graphDataNew[0];
    // int = graphDataNew[1];
    // lck = graphDataNew[2];
    // age = graphDataNew[3];
            
    var chart;//radar圖名稱
    var graphDataNew = [str, int, lck, age];//從資料庫載入的Radar數值
    function plusSkill(e) {
        point = parseInt($('#points').text());
        if (point) {
        $('#points').text(point - 1);
        graphDataNew[$(this).index()] += 10;
        chart.data.datasets[0].data = graphDataNew;
        chart.update();//更新radar圖
        }
    }
    $(document).ready(function () {
        chartRadar(graphDataNew);//從資料庫載入的Radar數值,初始化用
        $('.but').click(plusSkill);
    });

//-----------------------------------------------------------------
    </script>
</body>

</html>