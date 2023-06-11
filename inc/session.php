<?php
session_start();
function isAdmin(){
	if (!isset($_SESSION['id_user'])) {
	  header("Location: ../");
	}
	if (isset($_SESSION['role'])) {
	  if ($_SESSION['role']=="bendahara") {
	    header("Location: ../bendahara");
	  }else if ($_SESSION['role']=="user"){
	  	header("Location: ../user");
	  }
	}
}

function isBendahara(){
	if (!isset($_SESSION['id_user'])) {
	  header("Location: ../");
	}
	if (isset($_SESSION['role'])) {
	  if ($_SESSION['role']=="admin") {
	    header("Location: ../admin");
	  }else if ($_SESSION['role']=="user"){
	  	header("Location: ../user");
	  }
	}
}

function isUser(){
	if (!isset($_SESSION['id_user'])) {
	  header("Location: ../");
	}
	if (isset($_SESSION['role'])) {
	  if ($_SESSION['role']=="admin") {
	    header("Location: ../admin");
	  }else if ($_SESSION['role']=="bendahara"){
	  	header("Location: ../bendahara");
	  }
	}
}

function isLogin(){
	if (isset($_SESSION['id_user'])) {
	  header("Location: admin");
	}
}
?>