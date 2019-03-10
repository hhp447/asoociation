
      <div class="content-table modity-news">
        <h3 class="admin-new">成员申请
          <span>共12人</span>
        </h3>
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
               <th style="width:10%">成员名字</th>
               <th style="width:10%">年级</th>
               <th style="width:10%">班级</th>
               <th style="width:10%">联系方式</th>
               <th style="width:40%">简介</th>
               <th style="width:20%">操作</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach($wPersons as $wperson): ?>
             <tr>
               <td><?= $wperson->username ?></td>
               <td><?= $wperson->grade ?></td>
               <td><?= $wperson->class ?></td>
               <td><?= $wperson->phone ?></td>
               <td><?= $wperson->introduction ?></td>

               <td>

                 <a href="<?= yii\helpers\Url::to(['admember/isagreejoin','agree' => 1,'userid' => $wperson->id]) ?>">
                 <button type="button" name="button">同意</button>
                 </a>
                 <a href="<?= yii\helpers\Url::to(['admember/isagreejoin','agree' => 2,'userid' => $wperson->id]) ?>">
                 <button type="button" name="button">不同意</button>
                 </a>
               </td>
             </tr>
             <?php endforeach; ?>
           </tbody>
        </table>

        <!-- <div class="pagebtn">
        <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou2"></i></button>
        <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou1"></i></button>
        </div> -->
        <h3 class="admin-new">不同意成员
          <span>共12人</span>
        </h3>
        <div class="divider"></div>
        <table class="news-table">
           <thead>
             <tr>
               <th style="width:10%">成员名字</th>
               <th style="width:10%">年级</th>
               <th style="width:10%">班级</th>
               <th style="width:10%">联系方式</th>
               <th style="width:40%">简介</th>
               <th style="width:20%">操作</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach($dPersons as $dperson): ?>
             <tr>
               <td><?= $dperson->username ?></td>
               <td><?= $dperson->grade ?></td>
               <td><?= $dperson->class ?></td>
               <td><?= $dperson->phone ?></td>
               <td><?= $dperson->introduction ?></td>

               <td>

                 <a href="<?= yii\helpers\Url::to(['admember/isagreejoin','agree' => 1,'userid' => $dperson->id]) ?>">
                 <button type="button" name="button">同意</button>
                 </a>
                 <a href="<?= yii\helpers\Url::to(['admember/delappli','del' => 1,'userid' => $dperson->id]) ?>">
                 <button type="button" name="button">删除</button>
                 </a>
               </td>
             </tr>
             <?php endforeach; ?>
            
           </tbody>
        </table>

        <!-- <div class="pagebtn">
        <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou2"></i></button>
        <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou1"></i></button>
        </div> -->

        </div>
 
