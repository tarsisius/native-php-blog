<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="<?php echo APP_URL; ?>css/admin.min.css" rel="stylesheet">
</head>

<body>
    <main>
        <section class="wrapper">
            <section class="sidebar-menu">
                <button class="sidebar-menu__icon">
                    <span class="sidebar-menu__layer"></span>
                </button>
            </section>
            <section class="menu--off">
            <div class="sidebar">
                <ul class="sidebarMenuInner">
                    <li><a href="<?php echo APP_URL; ?>admin">
                            <h2>Admoon</h2>
                        </a></li>
                    <li><a href="<?php echo APP_URL; ?>admin/category">Category</a></li>
                    <li><a href="<?php echo APP_URL; ?>admin/post">Post</a></li>
                    <li><a href="<?php echo APP_URL; ?>admin/setting">Setting</a></li>
                </ul>
            </div>
            </section>
            <div class="container">
            <div class="inner">
            <div class="admin">