<?php
error_reporting(E_ALL^(E_NOTICE | E_WARNING));
@session_start();
$_SESSION['start_time'] = time();
?>