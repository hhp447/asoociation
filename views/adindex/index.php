<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
    <div class="content-table">
          <?php
            $form = ActiveForm::begin([
                'fieldConfig' => [
                  'template' => "{input}{error}"
                ],
                'options' => [
                  'enctype' => 'multipart/form-data'
                ]
              ]);
          ?>
    	<div class="info">
          <h4>社团简介</h4>
            <div style="color:red">
            <?php if(Yii::$app->session->hasFlash('info'))
                  {
                    echo Yii::$app->session->getFlash('info');
                  } 
            ?>
            </div>
          <div class="info-wrap">
          	 <table class="member-table">
             <thead>
               <tr>
                 <th>社团项目</th>
                 <th style="width: 80%">内容</th>
                 <th>操作</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>首页图片</td>
                 <td>
                  <?= $model->covpic; ?>
                  <?= $form->field($model,'covpic')->fileInput(['class' => 'change-btn']); ?>
                 </td>
                 <td>
                 </td>
               </tr>
               <tr>
                 <td>职责</td>
                 <td>
                  <?= $form->field($model,'responsibility')->textarea(['class' => 'stinfo-txt']); ?>
                 </td>
                 <td>
                 	
                 </td>
                
               </tr>

               <tr>
                 <td>简介</td>
                 <td>
                  <?= $form->field($model,'introduction')->widget(\yii\redactor\widgets\Redactor::className()); ?>
                 </td>
                 <td>
                  
                 </td>
               </tr>
             </tbody>
           </table>
          </div>
          <!-- <input type="submit" name="jianj-btn" class="jianj-btn" value="保存" /> -->
          <?= Html::submitButton('保存',['class' => 'jianj-btn']) ?>
         <?php ActiveForm::end();  ?>
      </div>
        <div class="divider"></div>




        <!-- <div class="info">
          <h4>社团成员</h4>
          <div class="member">
            <p class="allmember-num">正式成员总数：<span>12</span>人</p>
           <table class="member-table">
             <thead>
               <tr>
                 <th>姓名</th>
                 <th>年级</th>
                 <th>班级</th>
                 <th>联系方式</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>某某</td>
                 <td>16级</td>
                 <td>计算机科学</td>
                 <td>13612612789</td>
               </tr>
             </tbody>
           </table>
           <div class="pagebtn">
           <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou2"></i></button>
           <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou1"></i></button>
           </div>
          </div>
        </div>




        <div class="divider"></div>





        <div class="info">
          <h4>社团新闻</h4>
          <div class="member">
            <p class="allmember-num">新闻总数：<span>12</span>篇</p>
            <p class="allmember-num">新闻总阅读量：<span>12</span>次</p>
           <table class="member-table  striped">
             <thead>
               <tr>
                 <th>新闻名称</th>
                 <th>发布时间</th>
                 <th>阅读量</th>
                 <th>评论数</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>XXXXXX</td>
                 <td>2017-8-8</td>
                 <td>12次</td>
                 <td>
                 	2条
                 	<a href="news-modify.html#talkwrapper">查看</a>
                 </td>
               </tr>
             </tbody>
           </table>
           <div class="pagebtn">
           <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou2"></i></button>
           <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou1"></i></button>
           </div>
          </div>
        </div>
 -->


        <div class="divider"></div>
        
    </div>
    