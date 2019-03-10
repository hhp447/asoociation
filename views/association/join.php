  <div class="info-content">


    <h2 class="xyname">韶关学院</h2>
    <?php 
      if(Yii::$app->session->hasFlash('info'))
      {
        echo "<br/><h2 style='color:red'>".Yii::$app->session->getFlash('info')."</h2>";
      }
    ?>



    <h4 class="stfj">学生会</h4>
    <ul class="info-nav">
    <?php foreach($da2 as $val2): ?>
      <li><a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $val2->id,'asname' => $val2->asname]) ?>">
      <?= $val2->asname; ?>
      </a></li>
    <?php endforeach;?>
    </ul>





    <h4 class="stfj">社团联合会</h4>
    <ul class="info-nav">
    <?php foreach($da1 as $val): ?>
      <li><a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $val->id,'asname' => $val->asname]) ?>">
      <?= $val->asname;?>
      </a></li>
    <?php endforeach;?>
    </ul>





    <h4 class="stfj">团务中心</h4>
    <ul class="info-nav">
    <?php foreach($da3 as $val3): ?>
      <li><a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $val3->id,'asname' => $val3->asname]) ?>">
      <?= $val3->asname; ?>
      </a></li>
    <?php endforeach;?>
    </ul>



    <h4 class="stfj">宣传中心</h4>
    <ul class="info-nav">
    <?php foreach($da4 as $val4): ?>
      <li><a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $val4->id,'asname' => $val4->asname]) ?>">
      <?= $val4->asname; ?>
      </a></li>
    <?php endforeach;?>
    </ul>



    <h4 class="stfj">青年志愿者中心</h4>
    <ul class="info-nav">
    <?php foreach($da5 as $val5): ?>
      <li><a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $val5->id,'asname' => $val5->asname]) ?>">
      <?= $val5->asname; ?>
      </a></li>
    <?php endforeach;?>
    </ul>





    <h4 class="stfj">艺术中心</h4>
    <ul class="info-nav">
    <?php foreach($da6 as $val6): ?>
      <li><a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $val6->id,'asname' => $val6->asname]) ?>">
      <?= $val6->asname; ?>
      </a></li>
    <?php endforeach;?>
    </ul>




    <h4 class="stfj">创新创业中心</h4>
    <ul class="info-nav">
    <?php foreach($da7 as $val7): ?>
      <li><a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $val7->id,'asname' => $val7->asname]) ?>">
      <?= $val7->asname; ?>
      </a></li>
    <?php endforeach;?>
    </ul>


    <h4 class="stfj">团干培训中心</h4>
    <ul class="info-nav">
    <?php foreach($da8 as $val8): ?>
      <li><a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $val8->id,'asname' => $val8->asname]) ?>">
      <?= $val8->asname; ?>
      </a></li>
    <?php endforeach;?>
    </ul>

    <h4 class="stfj">文化中心</h4>
    <ul class="info-nav">
    <?php foreach($da9 as $val9): ?>
      <li><a href="<?= yii\helpers\Url::to(['association/joininput',"assoid" => $val9->id,'asname' => $val9->asname]) ?>">
      <?= $val9->asname; ?>
      </a></li>
    <?php endforeach;?>
    </ul>




  </div>

  