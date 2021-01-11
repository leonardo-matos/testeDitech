<?php
session_start();
// session_unset();
include '../modelo/ModDashboard.php';
include '../persistencia/PerDashboard.php';

if(isset($_GET['op'])){
	switch($_GET['op']){
		case 'consultar':
			header('location:../interface/Dashboard.php');
		break;
	}
}
?>