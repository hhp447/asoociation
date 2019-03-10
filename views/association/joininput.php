<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'join-form clearfix'
        ],
        'fieldConfig' => [
            'template' => '{input}{error}'
        ]
    ]); ?>
     <div class="form-left">
     <p class="join-us">加入我们,<?= $asname; ?></p>
     <div style="color:red;font-size:12px;text-indent:25px">
     <?php
        if(Yii::$app->session->hasFlash('info'))
        {
            echo Yii::$app->session->getFlash('info');
        }
     ?>
     </div>
     <label>简单的自我介绍</label> 
     <?= $form->field($model,'introduction')->textarea(['class' => "use-info"]); ?>
     <div style="color:red;font-size:12px;text-indent:25px">
     温馨提醒：提交申请之前必须完善好个人资料，包括：年级，班级，电话等。
     </div>
     <?= Html::submitButton('提交',['class' => 'submit-btn']) ?>
     </div>
     <?php ActiveForm::end(); ?>

 