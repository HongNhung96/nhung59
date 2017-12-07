<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'BBS';
?>
<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- <?= $this->Html->css('profile.css') ?> -->
    <!-- <?= $this->Html->css('cake.css') ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="/imdev/webroot/css/profile.css">
</head>
<body>
<div id="header">
    

    <div id="tab">
    <img src="/imdev/webroot/img/jvb.png" alt="logojvb" id="logo"> 
    <a href="#" class="col-md-1">Trang chủ</a>
    <a href="#" class="col-md-1">Hồ sơ</a>
    <a href="#" class="col-md-1">Thành viên</a>
    <a href="#" class="col-md-2">Quản lý thời gian</a>
    <a href="#" class="col-md-1">Nhóm</a>
    <a href="#" class="col-md-1">Dự án</a>
    <a href="#" class="col-md-1">Phòng họp</a>
    <a href="#" class="col-md-1">Hỗ Trợ</a>
    <a href="#" class="col-md-1">Nội quy</a>
    <a href="/imdev/users/logout">Logout</a>
    <!-- <li class=""><?php echo $this->HTML->link('Đăng xuất',array('controller' => 'Users', 'action' => 'logout')); ?></li> -->
    </div>
    </div>
    
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    
    </footer>
</body>
</html>
