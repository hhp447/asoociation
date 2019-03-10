<link rel="stylesheet" href="assets/css/aa.css">
   <div class="all-main clearfix">
   <main class="main-article clearfix">
     <article class="content">
       <div class="post-head">
       <h1 class="post-title"><?= $model->title; ?></h1>
       <div class="post-meta">
           <span class="author">来源：<a href="#"><?= $model->source; ?></a></span> &bull;
           <time class="post-date"><?= date('Y-m-d',$model->createtime); ?></time>
           <span></span>
       </div>
       </div>
       <div class="post-content">
       <?= $model->content; ?>
       </div>
     </article>
   </main>
   <aside class="aside-content clearfix">
     <div class="widget content">
        <h4 class="title">关联公众号</h4>
		    <a href="#" class="gzh">信息大爆炸</a>
        <a href="#" class="gzh">信息大爆炸</a>
        <a href="#" class="gzh">信息大爆炸</a>
        <a href="#" class="gzh">信息大爆炸</a>
        <a href="#" class="gzh">信息大爆炸</a>
        <a href="#" class="gzh">信息大爆炸</a>
     </div>
     <div class="widget content">
        <h4 class="title">标签</h4>
        <a href="#" class="bq">信息学院</a>
        <a href="#" class="bq">政务学院</a>
        <a href="#" class="bq">数统</a>
        <a href="#" class="bq">物理与机电学院</a>
        <a href="#" class="bq">教育学院</a>
        <a href="#" class="bq">文学院</a>
    </div>
   </aside>
 </div>


 <!-- <div class="talk-community">
     <a href="index.html" class="back-index">返回首页</a>
     <p class="talk-txt">评论</p>
     <a href="#" class="login-a">登录|注册</a>
     <div class="comments-box">
      <img src="img/uses-img.png" alt="用户头像" class="usehead-img">
      <div class="textarea-wrapper">
        <div class="text-box">
          <textarea name="talk-txt" class="for-talk"></textarea>
        </div>      
        <div class="talk-btn">
          <input type="button" class="btn-talk" value="发表评论">
        </div>
      </div>
     <div class="comment-talk">
       <img src="assets/img/uses-img.png" alt="用户头像">
       <div class="use-comment">
         <span class="use-name">神乐<small class="comment-time">2017-8-3</small></span>
         <p class="usecomment-txt">你说剑断了？ 剑的话还有呢，备用的还有一把！</p>
         <i class="icon iconfont icon-dianzan"></i>
         <span class="icon-txt">(12)</span>
       </div>
     </div>
   </div>
 </div> -->

  

