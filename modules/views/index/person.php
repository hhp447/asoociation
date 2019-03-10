<div class="admin-main">
      <div class="side-head">
        <div class="head-box">
        <?= Yii::$app->session['admin']['adminname'] ?>&nbsp;&nbsp;&nbsp;
        <a href="<?= yii\helpers\Url::to(['index/logout']) ?>" class="exit">退出</a>
      </div>
    </div>

    <div class="content-table">
        <form class="info">
          <h4>个人信息</h4>
          <div class="person-wrapper clearfix">
          <div class="person-info clearfix">
            <span class="left-info">头像</span>
            <span class="right-info">
              <img src="assets/img/uses-img.png" alt="">
              <button type="button" class="upload" name="button">点击上传</button>
            </span>
          </div>
          <div class="person-info clearfix">
            <span class="left-info">姓名</span>
            <input type="text" class="right-info" value="某某">
          </div>
          <div class="person-info clearfix">
            <span class="left-info">年级</span>
            <input type="text" class="right-info" value="某某">
          </div>
          <div class="person-info clearfix">
            <span class="left-info">班级</span>
            <input type="text" class="right-info" value="某某">
          </div>
          <div class="person-info clearfix">
            <span class="left-info">联系方式</span>
            <input type="text" class="right-info" value="某某">
          </div>
          </div>
          <input type="submit" name="submit" class="submit-btn" value="保存" />
        </form>

    </div>
    </div>