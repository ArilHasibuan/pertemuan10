<?php
$mysqli = new mysqli("localhost","root","","db_retail");
if($mysqli->connect_error) {
    die("koneksi gagal:" . $mysqli->connect_error);
}
