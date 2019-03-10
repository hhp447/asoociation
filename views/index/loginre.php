<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>学生登录/注册</title>
	<link rel="stylesheet" type="text/css" href="assets/css/registe-login.css">

</head>
<body>
		<div class="login-wrap">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">登录</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">注册</label>
				<?php 
					if(Yii::$app->session->hasFlash('info')){
						echo Yii::$app->session->getFlash('info');
					}
				 ?>
				
				<?php $form = ActiveForm::begin([
						'options' => ['class' => 'login-form'],
						"fieldConfig" => [
							'template' => '{input}{error}'
						]
					]); ?>


				<div class="login-form">



					
					<?php $form = ActiveForm::begin([
						'action' => '?r=index/login',
						'options' => ['class' => 'sign-in-htm'],
						"fieldConfig" => [
							'template' => '{input}{error}'
						]
					]); ?>
						<div class="group">
							<label for="user" class="label">用户名</label>
							<?= $form->field($model,'username')->textInput(['class' => "input"]); ?> 
						</div>
						<div class="group">
							<label for="pass" class="label">密码</label>
							<?= $form->field($model,'passwd')->passwordInput(['class' => "input"]); ?>
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span>记住密码</label>
						</div>
						<div class="group">
							<?= Html::submitButton('登录',['class' => 'button']); ?>
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<a href="#forgot">忘记密码？</a>
						</div>
					<?php ActiveForm::end(); ?>



					
					<?php $form = ActiveForm::begin([
						'options' => ['class' => 'sign-up-htm'],
						"fieldConfig" => [
							'template' => '{input}{error}'
						]
					]); ?>
						<div class="group">
							<label for="user" class="label">用户名</label>
							<?= $form->field($model,'username')->textInput(['class' => "input"]); ?>
						</div>
						<div class="group">
							<label for="pass" class="label">密码</label>
							<?= $form->field($model,'passwd')->passwordInput(['class' => "input"]); ?>
						</div>
						<div class="group">
							<label for="pass" class="label">确认密码</label>
							<?= $form->field($model,'repasswd')->passwordInput(['class' => "input"]); ?>
						</div>
						<div class="group">
							<label for="pass" class="label">班级</label>
							<?= $form->field($model,'class')->textInput(['class' => "input"]); ?>
						</div>
						<div class="group">
							<?php echo Html::submitButton('注册',['class' => 'button']); ?>
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<label for="tab-1">已有账户？</a>
						</div>
					<?php ActiveForm::end(); ?>



				</div>
			</div>
		</div>

</body>
</html>
