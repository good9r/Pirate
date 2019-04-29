// var memPsw,memLv,memExp,memMoney,intelligence,strength,agile,luck,shipImgAll,avatarImg,talentPointsRemain;
// 寶物造型頁籤
function jsTabs(evt, tabId) {
    var tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabs-panel");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tabs-menu");
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" tabs-menu-active", "");
    }
    var tab = document.getElementById(tabId);
    tab.style.display = "block";
    evt.currentTarget.className += " tabs-menu-active";
    return false;
}

//交易發文頁籤
function jsTabs1(evt, tabId) {
    var tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabs-panel1");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tabs-menu1");
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" tabs-menu-active1", "");
    }
    var tab = document.getElementById(tabId);
    tab.style.display = "block";
    evt.currentTarget.className += " tabs-menu-active1";
    return false;
}

//換船-------------------------------------------------------------
window.addEventListener("load", function () {
    //set image click
    let imgs = document.querySelectorAll(".myCustomer");
    for (let i = 0; i < imgs.length; i++) {
        imgs[i].onclick = function (e) {
            let myImage = e.target;
            let partNo = myImage.className.substr(1, 1);
            let partName;
            console.log(partNo);
            switch (partNo) {
                case "1":
                    partName = "partHead";
                    break;

                case "2":
                    partName = "partBody";
                    break;

                case "3":
                    partName = "partSail";
                    break;

            }
            console.log(partName);
            if (partNo == 3) {
                document.getElementById(partName).data = e.target.src;
            } else {
                document.getElementById(partName).src = e.target.src;
                document.getElementById(partName).data = e.target.data;
            }
        }
    }

    
    var penBut = document.querySelectorAll(".fa-pen");
    // for( var i=0; i<penBut.length; i++){
    $('.fa-pen').click(function () {
        $(this).siblings().attr("readonly", false);
    })
})
//-----------------------------------------------------------------


// var carryOut = document.querySelector('#carryOut');

// carryOut.addEventListener('click',function(e){
//     console.log('123');
// },false)


function login() {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {
            alert("修改成功");
        } else {
            alert(xhr.status);
        }
    }

    var myData = new FormData(document.getElementById("meShipForm"));

    var url = "meToDB/meShipFormData.php";
    xhr.open("Post", url, true);
    xhr.send(myData);
}


window.addEventListener("load", function () {
    $id("carryOut").onclick = login;
})







