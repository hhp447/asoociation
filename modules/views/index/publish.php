<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="admin-main">
      <div class="side-head">
        <div class="head-box">
        <?= Yii::$app->session['admin']['adminname'] ?>&nbsp;&nbsp;&nbsp;
        <a href="<?= yii\helpers\Url::to(['index/logout']) ?>" class="exit">退出</a>
      </div>
      </div>
      <?php $form = ActiveForm::begin(); ?> 
      <div style="color:red;margin:20px 0px 0px 30px">
      <?php 
        if(Yii::$app->session->hasFlash('info'))
        {
          echo Yii::$app->session->getFlash('info');
        }
      ?>
      </div>
      <div class="content-table modity-news">
        <?= $form->field($model,'title')->textInput(['class' => 'modift-title']); ?>  
        <div class="news-place">
          <?= $form->field($model,'source')->textInput(['class' => 'modift-title']); ?>   
        </div>
        <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className()); ?>   
      <?= Html::submitInput('发布',['class' => 'modify-btn','name' => 'success-modify']); ?>
      </div>
      <?php ActiveForm::end(); ?>
   </div>