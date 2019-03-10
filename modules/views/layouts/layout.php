<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/admin/css/superstyle.css"/>
     <link rel="stylesheet" href="assets/admin/css/font01/iconfont.css">
     <link rel="stylesheet" type="text/css" href="assets/css/font01/iconfont.css"/>
   <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link href="assets/admin/js/text/index.css" rel="stylesheet">
    <script src="assets/admin/js/text/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/admin/js/text/jquery.hotkeys.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/admin/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <link href="/basic0/web/assets/97a81f8b/redactor.css" rel="stylesheet">
    <script src="assets/admin/js/text/bootstrap-wysiwyg.js"></script>
    </head>
  <body>
  <?php $this->beginBody(); ?>
  <div class="admin-content clearfix">
    <nav class="main-nav">
      <h2>后台管理</h2>
      <ul class="admin-nav">
        <li class="admin-li"><i class="icon iconfont icon-all"></i><a href="<?= yii\helpers\Url::to(['index/index']); ?>">社团管理</a></li>
        <li class="admin-li"><i class="icon iconfont icon-information"></i><a href="<?= yii\helpers\Url::to(['index/first']); ?>">站内管理</a></li>
        <li class="admin-li"><i class="icon iconfont icon-comments"></i><a href="<?= yii\helpers\Url::to(['index/news']); ?>">站内新闻管理</a></li>
        <li class="admin-li"><i class="icon iconfont icon-form"></i><a href="<?= yii\helpers\Url::to(['index/publish']); ?>">新闻发布</a></li>
        <li class="admin-li"><i class="icon iconfont icon-pic"></i><a href="<?= yii\helpers\Url::to(['index/addasso']); ?>">添加社团</a></li>
      </ul>
    </nav>
    <?= $content; ?>
    </div>
    <?php $this->endBody(); ?>
  </body>
  <?php $this->endPage(); ?>