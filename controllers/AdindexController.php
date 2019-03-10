<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\controllers\CommonController;
use app\modules\models\Asso;
use yii\models\UploadForm;
use yii\web\UploadedFile;

class AdindexController extends CommonController{

	public function actionIndex()//后台首页
	{
		$this->layout = "layout1";
		$assoid = Yii::$app->session['houtai'];//获取session中的社团ID
		$model = Asso::find()->where('id = :id',[':id' => $assoid])->one();
		if(Yii::$app->request->isPost)
		{
			$post = Yii::$app->request->post();
			$isNewCovpic = 0;//默认没有换社团封面
			if(UploadedFile::getInstance($model,'covpic'))//如果有上传新社团封面
			{
				$isNewCovpic = 1;
				$model->covpic = UploadedFile::getInstance($model,'covpic');
			}
			if($model->change($post,$isNewCovpic))
			{
				Yii::$app->session->setFlash('info','修改成功');
			}else{
				Yii::$app->session->setFlash('info','修改失败');
			}
		}
		if($assoid)//显示视图
		{
			return $this->render("index.php",['model' => $model]);
		}
		
	}
}


?>