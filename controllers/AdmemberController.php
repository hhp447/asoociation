<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\controllers\CommonController;
use app\models\Appli;
use app\models\User;

class AdmemberController extends CommonController{

	public function actionIndex()//正式成员首页
	{
		$this->layout = 'layout1';
		$assoid = Yii::$app->session['houtai'];
		$model = new Appli;
		$users = $model->getUser($assoid,1);
		$count = count($users);
		return $this->render("index.php",['users' => $users,'count' => $count]);
	}

	public function actionApplication()//成员申请
	{
		$this->layout = 'layout1';
		$assoid = Yii::$app->session['houtai'];
		$model = new Appli;
		$waitPerson = $model->getUser($assoid,0);
		$disagreePerson = $model->getUser($assoid,2);
		return $this->render("appli",['wPersons' => $waitPerson,'dPersons' => $disagreePerson]);
	}

	public function actionChangerole()
	{
		$this->layout = 'layout1';
		$assoid = Yii::$app->session['houtai'];
		if(Yii::$app->request->get('role') && Yii::$app->request->get('userid'))
		{
			$role = Yii::$app->request->get('role');
			$userid = Yii::$app->request->get('userid');
			$model = new Appli;
			if($model->changeRole($assoid,$userid,$role))
			{
				Yii::$app->session->setFlash('info','设置成功');
				$this->redirect(['admember/index']);
			}else{
				Yii::$app->session->setFlash('info','设置失败');
				$this->redirect(['admember/index']);
			}
		}else{
			$this->redirect(['admember/index']);
		}
	}

	public function actionIsagreejoin()
	{
		$this->layout = 'layout1';
		$assoid = Yii::$app->session['houtai'];
		if(Yii::$app->request->get('userid'))
		{
			$agree = Yii::$app->request->get('agree');
			$userid = Yii::$app->request->get('userid');
			$model = new Appli;
			if($model->changeresult($assoid,$userid,$agree))
			{
				Yii::$app->session->setFlash('info','设置成功');
				$this->redirect(['admember/application']);
			}else{
				Yii::$app->session->setFlash('info','设置失败');
				$this->redirect(['admember/application']);
			}
		}else{
			$this->redirect(['admember/application']);
		}
	}

	public function actionDelappli()//删除不同意的申请
	{
		$this->layout = 'layout1';
		$assoid = Yii::$app->session['houtai'];
		if(Yii::$app->request->get('userid'))
		{
			$del = Yii::$app->request->get('del');
			$userid = Yii::$app->request->get('userid');
			$model = new Appli;
			if($model->delappli($assoid,$userid,$del))
			{
				Yii::$app->session->setFlash('info','删除成功');
				$this->redirect(['admember/application']);
			}else{
				Yii::$app->session->setFlash('info','删除失败');
				$this->redirect(['admember/application']);
			}
		}else{
			$this->redirect(['admember/application']);
		}
	}

}


?>