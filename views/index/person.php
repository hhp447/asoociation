<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="content-table">
        <?php
          $form = ActiveForm::begin([
              'options' => [
                'class' => 'info',
                'enctype' => 'multipart/form-data'
              ],
              'fieldConfig' => [
                'template' => '{input}{error}'
              ]
            ]);
        ?>
          <h2>个人资料</h2>
          <div class="person-wrapper clearfix">
          <div style="color:red">
          <?php
            if(Yii::$app->session->hasFlash('info'))
            {
              echo Yii::$app->session->getFlash('info');
            }
          ?>
          </div>
          <div class="person-info clearfix"> 
            <span class="left-info">头像</span>
            <span class="right-info">
              <?= $model->avatar; ?>
              <span class="hint">支持 jpg、png 格式大小 5M 以内的图片</span>
              <?= $form->field($model,'avatar')->fileInput(['class' => 'right-info']); ?>
            </span>
          </div>
          <div class="person-info clearfix">
            <span class="left-info">用户名</span>
            <?= $form->field($model,'username')->textInput(['class' => 'right-info','disabled' => true]); ?>
          </div>
          
          <div class="person-info clearfix">
            <span class="left-info">年级</span>
            <?= $form->field($model,'grade')->textInput(['class' => 'right-info']); ?>
          </div>
          <div class="person-info clearfix">
            <span class="left-info">班级</span>
            <?= $form->field($model,'class')->textInput(['class' => 'right-info']); ?>
          </div>
          <div class="person-info clearfix">
            <span class="left-info">联系方式</span>
            <?= $form->field($model,'phone')->textInput(['class' => 'right-info']); ?>
          </div>
          </div>
          <?= Html::submitButton('保存',['class' => 'submit-btn']) ?>
       <?php ActiveForm::end(); ?>
    </div>