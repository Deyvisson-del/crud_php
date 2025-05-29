<?php
session_start();

if (!isset($_SESSION['pessoas'])) {
    $_SESSION['pessoas'] = [];
}
?>