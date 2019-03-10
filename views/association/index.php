
   <section class="community-section">
           <article class="community-article">
             <div class='tabs tabs_default'>
               <ul class='horizontal'>
                 <li class="horizontal-li" id="2"><a>学生会</a></li>
                 <li class="horizontal-li" id="1"><a>社团联合会</a></li>
                 <li class="horizontal-li" id="3"><a>团务中心</a></li>
                 <li class="horizontal-li" id="4"><a>宣传中心</a></li>
                 <li class="horizontal-li" id="5"><a>青年志愿者中心</a></li>
                 <li class="horizontal-li" id="6"><a>艺术中心</a></li>
                 <li class="horizontal-li" id="7"><a>创新创业中心</a></li>
                 <li class="horizontal-li" id="8"><a>团干培训中心</a></li>
                 <li class="horizontal-li" id="9"><a>文化中心</a></li>
               </ul>

               <div id='tab-1'>
               <?php foreach($model as $val): ?>
                 <div class="community-content  clearfix">
                   <?= $val->covpic; ?>
                   <div class="community-info">
                     <h3><?= $val->asname; ?></h3>
                     <span>职责：</span></br>
                      <?= $val->responsibility; ?> 
                     <a href="<?= yii\helpers\Url::to(['association/detail','assoid' => $val->id]) ?>">有兴趣加入戳我<i class="icon iconfont icon-arrow1"></i></a>
                   </div>
                 </div>
               <?php endforeach; ?>
               </div>

             </div>
           </article>
 </section> 
 <script type="text/javascript">
    $("li").click(function(){
      var id = $(this).attr("id");
      $.post("<?= yii\helpers\Url::to(['association/find_asso']); ?>",
             {"id":id,"<?PHP echo Yii::$app->request->csrfParam;?>":"<?php echo yii::$app->request->csrfToken?>"},
             function(data){
              /*alert(data);*/
              $("#tab-1").html(data);
             },
             "json"
            );
  });
 </script>
  