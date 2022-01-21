<?php

use TechStore\Classes\Models\Admin;

require_once ("../../app.php");

$admin = new Admin;

$admin->logout($session);

$request->aredirect("login.php");