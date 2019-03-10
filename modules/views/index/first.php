<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\models\Indexpic;
?>
 <div class="admin-main" >
      <div class="side-head">
        <div class="head-box">
        <?= Yii::$app->session['admin']['adminname'] ?>&nbsp;&nbsp;&nbsp;
        <a href="<?= yii\helpers\Url::to(['index/logout']) ?>" class="exit">退出</a>
        </div>
      </div>

    <div class="content-table">
        <div class="info">
          <h4>更换首页版图</h4>
          <div style="color:red">
          <?php
            if(Yii::$app->session->hasFlash('info'))
            {
              echo Yii::$app->session->getFlash('info');
            }
          ?>
          </div>
          <p>现首页版图</p>
          <?php echo Indexpic::find()->one()->pic; ?>
          <?php $form=ActiveForm::begin([
            'fieldConfig' => [
              'template' => '{input}'
            ],
            'options' => [
              'enctype' => 'multipart/form-data'
            ]
          ]); ?>
          <?= $form->field($model,'pic')->fileInput() ?>
          <?= Html::submitButton('确定'); ?>
          <?php ActiveForm::end(); ?>
        </div>
        <div class="divider"></div>
        <div class="info">
          <h4>关联公众号</h4>
          <div class="member">
            <p class="allmember-num">推送公众号：<span><?= "12" ?></span>个</p>
           <table class="member-table  striped">
             <thead>
               <tr>
                 <th>公众号</th>
                 <th>所属</th>
                 <th>操作</th>
               </tr>
             </thead>
             <tbody>
             <?php foreach($model_3 as $m3): ?>
               <tr>
                 <td><?= $m3->name; ?></td>
                 <td><?= $m3->belong; ?></td>
                 <td>
                   <a href="<?= yii\helpers\Url::to(['index/delpub','delid' => $m3->id]) ?>"><button type="button" class="change-btn"  name="button">删除</button></a>
                 </td>
               </tr>
             <?php endforeach; ?>
             </tbody>
           </table>
           <div class="pagebtn">
           <div class="container large">
           <?php 
            echo yii\widgets\LinkPager::widget([
              'pagination' => $pager,
              'prevPageLabel' => '<i class="icon iconfont icon-jiantou2"></i>',
              'nextPageLabel' => '<i class="icon iconfont icon-jiantou1"></i>'
            ]); 
          ?>
          </div>


           



           </div>



           <form id="add-gz" style="z-index: 10;">
              <a href="javascript:hideDialog();" class="closebutton">X</a>           
            <div>
              <label>
              公众号名称
            </label>
            <input type="text" name="name"  /><br />
            <label>
              公众号所属
            </label>
            <input type="text" name="name"  />
            <input type="submit" name="" class="cart-btn" value="提交" />
            </div>
           </form>



          </div>
        </div>
        <div class="divider"></div>

          <?php
              $form = ActiveForm::begin([
                  'fieldConfig' => [
                    'template' => '{input}{error}'
                  ],
                  'action' => '?r=admin/index/addpub',
                  'options' => [
                    'class' => 'add-communityform'
                  ]
                ]);
            ?>
             <label>名称</label>
             <?= $form->field($model2,'name')->textInput(['class ' => 'add-input']); ?>
             <label>所属</label>
             <?= $form->field($model2,'belong')->textInput(['class ' => 'add-input']); ?>
           <?= Html::submitButton('添加',['class' => 'btn-page']) ?>
           <?php ActiveForm::end(); ?>

        <div class="divider"></div>
    </div>
    </div>



  <script src="assets/admin/js/text/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="assets/admin/js/znei.js" type="text/javascript" charset="utf-8"></script>
  