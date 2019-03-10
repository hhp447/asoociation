<?php
use app\modules\models\Asso;
?>
<div class="admin-main">
      <div class="side-head">
        <div class="head-box">
        <?= Yii::$app->session['admin']['adminname'] ?>&nbsp;&nbsp;&nbsp;
        <a href="<?= yii\helpers\Url::to(['index/logout']) ?>" class="exit">退出</a>
      </div>
    </div>
      <div class="content-table">
       <h3 class="admin-new">站内新闻</h3>
       <div style="color:red">
          <?php
            if(Yii::$app->session->hasFlash('info'))
            {
              echo Yii::$app->session->getFlash('info');
            }
          ?>
       </div>
       <div class="divider"></div>
       <table class="news-table">
          <thead>
            <tr>
              <th style="width:40%">新闻标题</th>
              <th>发布时间</th>
              <th>来自</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($model as $val): ?>
            <tr>
              <td><?= $val->title; ?></td>
              <td><?= date('Y-m-d H:i:sa',$val->createtime) ?></td>
              <td>
              <?php
                if($val->assoid)
                {
                  $asso = Asso::find()->where('id = :id',[':id' => $val->assoid])->one();
                  echo $asso->asname;
                }else{
                  echo "管理员";
                }
              ?>
              </td>
              <td>
                <a href="<?= yii\helpers\Url::to(['index/modify','newid' => $val->id]) ?>">修改</a>
                <a href="<?= yii\helpers\Url::to(['index/del','delid' => $val->id]) ?>">删除</a>
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
      </div>
    </div>