<?php
session_start();
include_once 'templates/parts/header.php';
include_once 'functions/controller.php';



// Gestion des requêtes
controller();

include_once 'templates/parts/footer.php';
?>
