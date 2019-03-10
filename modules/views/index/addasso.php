<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ins;
?>
<div class="admin-main">
      <div class="side-head">
        <div class="head-box">
        <?= Yii::$app->session['admin']['adminname'] ?>&nbsp;&nbsp;&nbsp;
        <a href="<?= yii\helpers\Url::to(['index/logout']) ?>" class="exit">退出</a>
      </div>
    </div>

    <div class="content-table">
        
       <?php
        $form = ActiveForm::begin([
            'fieldConfig' => [
              'template' => '{label}{input}{error}',
            ],
            'options' => [
              'class' => 'info',
              'enctype' => 'multipart/form-data'
            ]
          ]);
       ?>
          <h4>新增社团</h4>
          <div style="color:red">
          <?php if(Yii::$app->session->hasFlash('info'))
                {
                  echo Yii::$app->session->getFlash('info');
                } 
          ?>
          </div>
          <div class="person-wrapper clearfix">
          <div class="person-info clearfix">
            <?= $form->field($model,'asname')->textInput(['class' => 'right-info']); ?>
          </div>
           <div class="person-info clearfix">
            <span class="left-info">封面图</span>
            <span class="right-info">
            	<!-- <button class="upload" type="button" name="button">点击上传</button> -->
              <?= $form->field($model,'covpic')->fileInput(); ?>
            </span>
            
          </div>
          <div class="person-info clearfix">
            <?= $form->field($model,'responsibility')->textarea(['class' => 'right-info']); ?>
          </div>
          <div class="person-info clearfix">
            <?= $form->field($model,'introduction')->widget(\yii\redactor\widgets\Redactor::className()); ?>
          </div>
         
          <div class="person-info clearfix">
            <!-- <span class="left-info">类别</span> -->
            <!-- <div class="right-info"> --> 
            	<!-- <select>
               <option value ="stu">学生会</option>
               <option value ="msc">团委秘书处</option>
               <option value="jg">机构</option>
             </select> -->
             <?= $form->field($model,"insid")->dropdownList(Ins::find()->select(['name','id'])->indexBy('id')->column()); ?>
            <!-- </div> -->
          </div>
          </div>
          <?= Html::submitButton('保存',['class' => 'submit-btn']) ?>
        <?php ActiveForm::end(); ?>
        <div class="divider"></div>
    </div>
    </div>