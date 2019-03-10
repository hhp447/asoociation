<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;/*
use yii\widgets\ActiveForm;*/

?> 


      <?php $form = ActiveForm::begin(); ?> 
      <div class="content-table modity-news">
      <div style="color:red">
      <?php 
        if(Yii::$app->session->hasFlash('info'))
        {
          echo Yii::$app->session->getFlash('info');
        }
      ?>
      </div>

        <p>标题：</p>
        <?= $form->field($model,'title')->textInput(['class' => 'modift-title']); ?>   
        <div class="news-place">
          <!-- <span>来源:</span>
          <input type="text"  value="">
          <input type="text" name="time-new" value="">
          <input type="text" name="supplementary-infor" value=""> -->
          <?= $form->field($model,'source')->textInput(['class' => 'modift-title']); ?>   
        </div>
        <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className()); ?>


        <!-- <input type="submit" name="success-modify" class="modify-btn" value="发布"> -->
        <?= Html::submitInput('发布',['class' => 'modify-btn','name' => 'success-modify']); ?>
        </div>
        <?php ActiveForm::end(); ?>

   
