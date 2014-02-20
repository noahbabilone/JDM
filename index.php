<?php

session_start();
require 'Controleurs/routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();
