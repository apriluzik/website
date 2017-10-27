<?php
session_start();

//로그인 되었다면세션값이 존재..
$userid= $_SESSION['userid'];
$username=$_SESSION['username'];
$usernick= $_SESSION['usernick'];

?>
<meta charset="utf-8">

<?php
// 로그인이 안됀사람은 글 저장 불가
if(!$userid){
    echo ("<script>alert('로그인 후에 이용 가능합니다.'); history.go(-1);</script>");
    exit();
}

//글을 저장하려면 글 내용이 전달되어 왔겠죵 POST방식으루(form)
$content=$_POST['content'];

//혹시 글의 내용을 입력하지 않았을 수도 있으므로
if(!$content){
    echo ("<script>alert('내용을 입력하세요.'); history.go(-1);</script>");
    exit();
}

// 글 저장 시간 기록
$regist_day = date("Y-m-d (H:i)");

// memo테이블에 접속

include "../lib/db_conn.php";
mysqli_query($conn,"set names utf-8");

//저장을 위한 insert쿼리문

$sql= "INSERT INTO memo (id, name, nick, content, regist_day) VALUES ('$userid','$username','$usernick','$content','$regist_day')";

// 쿼리요청
mysqli_query($conn,$sql);
mysqli_close($conn);

// 다시 낙서글 페이지로 이동

echo ("<script>location.href='memo.php';</script>");

?>