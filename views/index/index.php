<?php
use app\models\News;
use app\models\Pub;
?>
  <div class="all-main clearfix">
   <main class="main-article clearfix">
   <?php foreach($model as $k => $val): ?>
     <article class="content">
       <div class="post-head">
       <h1 class="post-title">
       <a href="<?= yii\helpers\Url::to(['index/article','artid' => $val->id]);  ?>"><?= $val->title; ?></a></h1>
       <div class="post-meta">
           <span class="author">来源：<a href="#"><?= $val->source; ?></a></span> &bull;
           <time class="post-date"><?= date('Y-m-d',$val->createtime); ?></time>
           <span> </span>
       </div>
       </div>
       <div class="post-content">
         <p><?php
          $model = new News;
          echo $model->passimg($val->content);
          /*substr($val->content,0,200);*/ 

          ?>...</p>
       </div>
       <div class="post-permalink">
          <a href="<?= yii\helpers\Url::to(['index/article','artid' => $val->id]);  ?>" class="btn btn-default">阅读全文</a>
       </div>
     </article>
   <?php endforeach; ?>
     <nav class="pagination">
        <!-- <span class="page-number">第 1 页 &frasl; 共 4 页</span>
        <a class="older-posts" href="#">></a>
        <a class="older-posts" href="#">></a>
        <a class="older-posts" href="#">></a>
        <a class="older-posts" href="#">></a> -->
         <!-- <ul>
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        </ul>  -->
        <?php 
            echo yii\widgets\LinkPager::widget([
              'pagination' => $pager,
            ]); 
          ?>
    </nav>
        <!-- <nav class="pagination">
        <span class="page-number">第 1 页 &frasl; 共 4 页</span>
           <?php 
            echo yii\widgets\LinkPager::widget([
              'pagination' => $pager,
              'prevPageLabel' => '<i class="icon iconfont icon-jiantou2"></i>',
              'nextPageLabel' => '<i class="icon iconfont icon-jiantou1"></i>'
            ]); 
          ?>
        </nav> -->
   </main>
   <aside class="aside-content clearfix">
     <div class="widget content">
        <h4 class="title">关联公众号</h4>

        <?php
          $val = Pub::find()->all();
          foreach($val as $va){
            echo "<a href='#' class='gzh'>".$va->name."</a>";
          }
        ?>
		    <!-- <a href="#" class="gzh">信息大爆炸</a> -->


     </div>
     <div class="widget content">
        <h4 class="title">标签</h4>
        <a href="#" class="bq">信息学院</a>
        <a href="#" class="bq">政务学院</a>
        <a href="#" class="bq">数统</a>
        <a href="#" class="bq">物理与机电学院</a>
        <a href="#" class="bq">教育学院</a>
        <a href="#" class="bq">文学院</a>
        <a href="#" class="bq">信息学院</a>
        <a href="#" class="bq">政务学院</a>
        <a href="#" class="bq">数统</a>
        <a href="#" class="bq">物理与机电学院</a>
        <a href="#" class="bq">教育学院</a>
        <a href="#" class="bq">文学院</a>
    </div>
   </aside>
 </div>



 