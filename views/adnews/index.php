
      <div class="content-table">
       <h3 class="admin-new">社团新闻</h3>
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
              <th>来源</th>
              <th>发布时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($model as $val): ?>
            <tr>
              <td><?= $val->title;?></td>
              <td><?= $val->source;?></td>
              <td>
                <!-- 2条
                <a href="news-modify.html#talkwrapper">查看</a> -->
                <?= date('Y-m-d H:i:sa',$val->createtime);?>
              </td>
              <td>
                <a href="<?= yii\helpers\Url::to(['adnews/modify','newid' => $val->id]) ?>">修改</a>
                <a href="<?= yii\helpers\Url::to(['adnews/del','delid' => $val->id]) ?>">删除</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
       </table>
       <div class="pagebtn">
       <!-- <button class="btn-page" type="button" name="button">1</button>
       <button class="btn-page" type="button" name="button">2</button>
       <ul>
       <li class="btn-page"><a href="">1</a></li>
       <li class="btn-page"><a href="">1</a></li>
       <li class="btn-page"><a href="">1</a></li>
       <li class="btn-page"><a href="">1</a></li>
       </ul> -->
       <!-- <?php 
            echo yii\widgets\LinkPager::widget([
              'pagination' => $pager,
              'prevPageLabel' => '<i class="icon iconfont icon-jiantou2"></i>',
              'nextPageLabel' => '<i class="icon iconfont icon-jiantou1"></i>'
            ]); 
          ?> -->


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
  
