<?php
use app\models\Ins;
use app\models\Appli;
?>
<div class="admin-main">
      <div class="side-head">
        <div class="head-box">您好，
        <?= Yii::$app->session['admin']['adminname'] ?>&nbsp;&nbsp;&nbsp;
        <a href="<?= yii\helpers\Url::to(['index/logout']) ?>" class="exit">退出</a>
      </div>
    </div>
    <div class="content-table">
        <div class="info">
          <h4>社团机构</h4>
          <div class="member">
            <p class="allmember-num">社团总数：<span><?= $count;?></span>个</p>
           <table class="member-table">
             <thead>
               <tr>
                 <th>社团名称</th>
                 <th>类别</th>
                 <th>成员总数</th>
                 <th>社长</th>
                 <th>联系方式</th>
               </tr>
             </thead>
             <tbody>
             <?php foreach($model as $mo): ?>
               <tr>
                 <td><?= $mo->asname; ?></td>
                 <td><?php $model = new Ins;echo $model->getName($mo->insid); ?></td>
                 <td><?php $m = new Appli;echo $m->getnumber($mo->id) ?></td>
                 <td><?php 
                      $a = new Appli;
                      $b = $a->getleader($mo->id);
                      if($b == '无')
                      {
                        echo $b."</td><td></td>";
                      }else{
                        echo $b->username."</td><td>".$b->phone."</td>";  
                      }
                      ?>
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
        <div class="divider"></div>
        <div class="info">
          <h4>站内新闻</h4>
          <div class="member">
            <p class="allmember-num">新闻总数：<span><?= $count_ne ?></span>篇</p>
           <table class="member-table  striped">
             <thead>
               <tr>
                 <th style="width: 30%;">新闻标题</th>
                 <th>来源</th>
                 <th>发布时间</th>
               </tr>
             </thead>
             <tbody>
             <?php foreach($model_ne as $mo_ne): ?>
               <tr>
                 <td><?= $mo_ne->title; ?></td>
                 <td><?= $mo_ne->source; ?></td>
                 <td><?= date('Y-m-d H:i:sa',$mo_ne->createtime); ?></td>
               </tr>
               <?php endforeach; ?>
             </tbody>
           </table>
           <div class="pagebtn">
           <div class="container large">
           <?php 
            echo yii\widgets\LinkPager::widget([
              'pagination' => $pager_ne,
              'prevPageLabel' => '<i class="icon iconfont icon-jiantou2"></i>',
              'nextPageLabel' => '<i class="icon iconfont icon-jiantou1"></i>'
            ]); 
          ?>
          </div>
           </div>
          </div>
        </div>
        <div class="divider"></div>
        <div class="divider"></div>
    </div>
    </div>