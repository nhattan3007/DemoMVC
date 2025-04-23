<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Chỉ khởi động session nếu chưa có session nào chạy
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title site</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>

<body>
    <div class="container"> <!-- Thẻ mở .container -->