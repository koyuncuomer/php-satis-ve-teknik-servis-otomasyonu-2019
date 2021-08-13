<?php 
session_start();
session_destroy();

if ($_GET['gelis']=="admin") {
	Header("Location:../login.php?durum=cikis");
} 
elseif ($_GET['gelis']=="user") { 
	Header("Location:../login.php?durum=cikis");
}
?>