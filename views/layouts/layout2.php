<?php
use app\models\Indexpic;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community info</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/font01/iconfont.css">
    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
  </head>
  <body>
    <div class="head">
      <?php echo Indexpic::find()->one()->pic; ?>
    </div>
    <nav class="main-navigation">
      <div class="collapse navbar-collapse" id="main-menu">
           <ul class="menu">
             <li><a href="<?php echo yii\helpers\Url::to(['index/index']);?>">首页</a></li>
             <li><a href="<?php echo yii\helpers\Url::to(['association/index']); ?>">社团信息</a></li>
             <li><a href="<?php echo yii\helpers\Url::to(["association/join"]); ?>">加入社团</a></li>
             <?php if(!Yii::$app->session['user']['isLogin']): ?>
             <li><a href="<?php echo yii\helpers\Url::to(["index/loginre"]); ?>">登录/注册</a></li>
              <?php else: ?>
                <li><a href="<?php echo yii\helpers\Url::to(["index/person"]); ?>">
                <?= Yii::$app->session['user']['username'] ?></a></li>
                <li><a href="<?php echo yii\helpers\Url::to(["index/logout"]); ?>">退出</a></li> 
               <?php foreach(Yii::$app->session['user']['asso'] as $key => $val): ?>
                  <?php if($val == 1):  ?>
                    <li><a href="<?php echo yii\helpers\Url::to(["adindex/index"]); ?>">进入后台</a></li>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
              
             <!-- <li><a href="<?php echo yii\helpers\Url::to(["index/loginre"]); ?>">注册</a></li> -->
            </ul>
      </div>
   </nav>

   <?= $content; ?>










   <footer class="index-footer clearfix">
     <div class="foot-box clearfix">
       <p class="yqlj">最新资讯</p>
       <div class="new">
         <a href="#">IT“乡”约其田111</a>
         <p class="article-time">2017年7月13日</p>
       </div>
     </div>
     <div class="foot-box clearfix">
       <p class="yqlj">友情链接</p>
       <div class="lj">
         <a href="http://www.sgu.edu.cn/">韶关学院校园网</a>
       </div>
     </div>

   </footer>
   <a class="totop"  onclick="backToTop()">^</a>
   <script src="js/index.js"></script>
  </body>

</html>