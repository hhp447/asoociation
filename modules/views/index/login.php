<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>管理员登录</title>
	<link rel="stylesheet" type="text/css" href="assets/admin/css/registe-login.css">
</head>
<body>
		<div class="login-wrap">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
				<label for="tab-1" class="tab">后台管理员</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up">
				<label for="tab-2" class="tab"></label>
				<div class="login-form" action="" method="post">

					<?php
						$form = ActiveForm::begin([
								'fieldConfig' => [
									'template' => "{input}{error}"
								],
								'options' => [
									'class' => 'sign-in-htm'
								]
							]);
					?>

					<?php
						if(Yii::$app->session->hasFlash('info'))
						{
							echo Yii::$app->session->getFlash('info');
						}

					?>
						<div class="group">
							<label for="user" class="label">用户名</label>
							<?= $form->field($model,'adminname')->textInput(['class' => 'input']); ?>
						</div>
						<div class="group">
							<label for="pass" class="label">密码</label>
							<?= $form->field($model,'passwd')->passwordInput(['class' => 'input']); ?>
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

					
				</div>
			</div>
		</div>

</body>
</html>
