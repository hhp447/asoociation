<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?> 
<div class="admin-main">
      <div class="side-head">
        <div class="head-box">
       <?= Yii::$app->session['admin']['adminname'] ?>&nbsp;&nbsp;&nbsp;
        <a href="<?= yii\helpers\Url::to(['index/logout']) ?>" class="exit">退出</a>
      </div>
      </div>

      <?php
        $form = ActiveForm::begin([
            'options' => [
              'enctype' => 'multipart/form-data'
            ],
            'fieldConfig' => [
              'template' => '{input}{error}'
            ]
          ]);
      ?>
      <div style="margin:20px 0px 0px 30px;color:red">
        <?php
            if(Yii::$app->session->hasFlash('info'))
            {
              echo Yii::$app->session->getFlash('info');
            }
          ?>
      </div>
      <div class="content-table modity-news">
        <p>标题：</p>
        <?= $form->field($model,'title')->textInput(['class' => 'modift-title']) ?>
        <div class="news-place">
          <span>来源:</span>
          <?= $form->field($model,'source')->textInput(['class' => 'modift-title']) ?>
        </div>
        <?= $form->field($model,'content')->widget(\yii\redactor\widgets\Redactor::className()) ?>
        <?= Html::submitInput('保存修改',['class' => 'modify-btn','name' => 'success-modify']) ?>
      </div>
      <?php ActiveForm::end(); ?>



      
      <!-- <div id="talkwrapper">
      	<h2>用户评论</h2>
      	<div class="comment-talk">
        <img src="assets/img/uses-img.png" alt="用户头像">
        <div class="use-comment">
         <span class="use-name">神乐<small class="comment-time">2017-8-3</small></span>
         <p class="usecomment-txt">你说剑断了？ 剑的话还有呢，备用的还有一把！</p>
         <i class="icon iconfont icon-dianzan"></i>
         <span class="icon-txt">(12)</span>
          
         <span class="icon-txt delect-txt">删除</span> 
        </div>
        </div>
      	<div class="comment-talk">
         <img src="assets/img/uses-img.png" alt="用户头像">
        <div class="use-comment">
         <span class="use-name">神乐<small class="comment-time">2017-8-3</small></span>
         <p class="usecomment-txt">你说剑断了？ 剑的话还有呢，备用的还有一把！</p>
         <i class="icon iconfont icon-dianzan icon-super"></i>
         <span class="icon-txt">(12)</span>
         <span class="icon-txt delect-txt">删除</span> 
        </div>
       </div>
      </div> -->
      
   </div>