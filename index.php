<?php
include "config.php";
include "class/Database.php";
include "class/Form.php";

session_start();
$db = new Database();

// Routing Logic
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/user/index';
$segments = explode('/', trim($path, '/'));

$mod = isset($segments[0]) && !empty($segments[0]) ? $segments[0] : 'user';
$page = isset($segments[1]) && !empty($segments[1]) ? $segments[1] : 'index';
$id = isset($segments[2]) ? $segments[2] : null;

$file = "module/{$mod}/{$page}.php";

include "template/header.php";
include "template/sidebar.php";

echo '<div id="content">';
if (file_exists($file)) {
    include $file;
} else {
    echo "<div class='alert alert-danger'>Modul <b>{$mod}/{$page}</b> tidak ditemukan.</div>";
}
echo '</div>';

include "template/footer.php";
?>