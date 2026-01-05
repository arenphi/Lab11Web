<?php
// Tentukan Base URL (sesuaikan dengan folder project Anda)
$base = "/lab11_php_oop/";

if (!function_exists('url')) {
    function url($route) {
        global $base;
        return $base . $route;
    }
}
?>
<div id="sidebar">
    <h3>Navigasi Modul</h3>
    <ul>
        <li><a href="<?php echo url('artikel/index'); ?>">Daftar Artikel</a></li>
        <li><a href="<?php echo url('artikel/tambah'); ?>">Tambah Artikel</a></li>
        <li><a href="<?php echo url('about'); ?>">Tentang Kami</a></li>
    </ul>
</div>