<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\models\Pub;
?>
<link rel="stylesheet" href="assets/css/aa.css">
   <div class="stinfo-all clearfix">
   <div class="stinfo">
   <?= $model->introduction; ?>
   </div>
   <div class="st-new">
     <p class="new-p">社团新闻</p>
     <ul class="new-ul">
     <?php foreach($model2 as $m2): ?>
       <li><a href="<?= yii\helpers\Url::to(['index/article','artid' => $m2->id]);  ?>"><?= $m2->title; ?></a></li>
     <?php endforeach; ?>
     </ul>
     <p class="new-p">关联公众号</p>
     <ul class="new-ul">
        <?php
          $val = Pub::find()->all();
          foreach($val as $va){
            echo "<li><a href=''>".$va->name."</a></li>";
          }
        ?>
     </ul>
     <p class="new-p">申请加入</p>
     <a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $model->id,'asname' => $model->asname]) ?>" class="new-join">
     想加入戳我</a>
   </div>
   </div>
   <!-- <div class="talk-community">
     <p class="talk-txt">评论</p>
     <a href="#" class="login-a">登录|注册</a>
     <div class="comments-box">
      <img src="assets/img/uses-img.png" alt="用户头像" class="usehead-img">
      <div class="textarea-wrapper">
        <div class="text-box">
          <textarea name="talk-txt" class="for-talk"></textarea>
        </div>      
        <div class="talk-btn">
          <input type="button" class="btn-talk" value="发表评论">
        </div>
      </div>

     <div class="comment-talk">
       <img src="assets/img/uses-img.png" alt="用户头像">
       <div class="use-comment">
         <span class="use-name">神乐<small class="comment-time">2017-8-3</small></span>
         <p class="usecomment-txt">你说剑断了？ 剑的话还有呢，备用的还有一把！</p>
         <i class="icon iconfont icon-dianzan"></i>
         <span class="icon-txt">(12)</span>
       </div>
     </div>

   </div>
 </div>
    -->