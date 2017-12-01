<?php
/**
 * Created by PhpStorm.
 * User: Utshaw
 * Date: 12/1/2017
 * Time: 11:41 AM
 */

ob_start();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

unset($_SESSION['admin_id']);
unset($_SESSION['admin_name']);

header("Location: index.php");

?>