
      <div class="content-table modity-news">
        <h3 class="admin-new">正式成员
          <span>共<?= $count ?>人</span>
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
        <table class="news-table" id="member">
           <thead>
             <tr>
               <th style="width:15%">成员名字</th>
               <th style="width:10%">年级</th>
               <th style="width:25%">班级</th>
               <th style="width:10%">身份</th>
               <th style="width:20%">联系方式</th>
               <th style="width:20%">设置为</th>
             </tr>
           </thead>
           <tbody>
           <?php foreach($users as $user): ?>
             <tr>
               <td><?= $user->username; ?></td>
               <td><?= $user->grade; ?></td>
               <td><?= $user->class; ?></td>
               <td><?= $user->rolename; ?></td>
               <td><?= $user->phone; ?></td>
               <td>
                 <a href="<?= yii\helpers\Url::to(['admember/changerole','role' => 1,'userid' => $user->id]) ?>">
                 <button type="button" name="button">部长</button>
                 </a>
                 <a href="<?= yii\helpers\Url::to(['admember/changerole','role' => 2,'userid' => $user->id]) ?>">
                 <button type="button" name="button">副部</button>
                 </a> 
                 <a href="<?= yii\helpers\Url::to(['admember/changerole','role' => 3,'userid' => $user->id]) ?>">
                 <button type="button" name="button">干事</button>
                 </a>
               </td>
             </tr>
             <?php endforeach; ?>
           </tbody>
        </table>
        <!-- <div class="pagebtn">
        <button type="button" name="button"onclick="javascript:method1('member')">导出excel</button>
        <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou2"></i></button>
        <button class="btn-page" type="button" name="button"><i class="icon iconfont icon-jiantou1"></i></button>
        </div> -->
        </div>
   
