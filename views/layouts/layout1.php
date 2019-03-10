<?php
/*use app\assets\AppAsset;
AppAsset::register($this);*/
use app\modules\models\Asso;
?>
<?php $this->beginPage() ?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    后台管理
    </title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/admin/css/style.css">
    <link rel="stylesheet" href="assets/admin/css/font01/iconfont.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font01/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="assets/admin/css/superstyle.css"/>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <script src="assets/admin/js/text/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/admin/js/text/jquery.hotkeys.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/admin/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <link href="assets/admin/js/text/index.css" rel="stylesheet">
    <link href="/basic0/web/assets/97a81f8b/redactor.css" rel="stylesheet">
    <script src="assets/admin/js/text/bootstrap-wysiwyg.js"></script>
  </head>
  <body>
    <?php $this->beginBody() ?> 
  <div class="admin-content clearfix">
    <nav class="main-nav">
      <h2>
      <?php
      $assoid = Yii::$app->session['houtai'];
      $data = Asso::find()->where('id = :id',[':id' => $assoid])->one();
      echo $data->asname;
      ?>
      </h2>
      <ul class="admin-nav">
        <li class="admin-li"><i class="icon iconfont icon-all"></i><a href="<?= yii\helpers\Url::to(['adindex/index']); ?>">社团信息</a></li>
        <li class="admin-li"><i class="icon iconfont icon-comments"></i><a href="<?= yii\helpers\Url::to(['adnews/index']); ?>">社团新闻</a></li>
        <li class="admin-li nav-active"><i class="icon iconfont icon-form"></i><a href="<?= yii\helpers\Url::to(['adnews/publish']); ?>">新闻发布</a></li>
        <li class="admin-li"><i class="icon iconfont icon-information"></i><a href="<?= yii\helpers\Url::to(['admember/index']); ?>">正式成员管理</a></li>
        <li class="admin-li"><i class="icon iconfont icon-pic"></i><a href="<?= yii\helpers\Url::to(['admember/application']); ?>">成员申请</a></li>
      </ul>
    </nav>
    <div class="admin-main">
      <div class="side-head">
        <div class="head-box">
        <!-- <a href="super-user.html"><img src="assets/admin/img/uses-img.png" alt="管理员头像" class="admin-headimg"></a> -->你好，<?= Yii::$app->session['user']['username'];  ?> &nbsp;&nbsp;
        <a href="<?= yii\helpers\Url::to(['index/index']) ?>" class="exit">返回首页</a>&nbsp;&nbsp;
        <a href="<?= yii\helpers\Url::to(['index/logout']) ?>" class="exit">退出</a>
      </div>
      </div>
      <?= $content; ?>
      </div>
    </div>
    <script type="text/javascript" src="assets/admin/js/exclejs.js"></script>
    <?php $this->endBody() ?> 
    </body>
    </html>
    <?php $this->endPage() ?> 