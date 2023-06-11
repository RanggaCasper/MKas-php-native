<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_data = "mkas";

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_data);

function site_url($url){
	return "http://localhost/mkas/".$url;
}

function thisSite(){
  echo "http://localhost/mkas/";
}

function showFlashdata(){
  if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
  }
}

?>