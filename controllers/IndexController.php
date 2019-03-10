<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Appli;
use app\models\News;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\data\Pagination;

class IndexController extends Controller
{
	public function actionIndex() //首页
	{
		$this->layout = "layout2";

		$mo = News::find();
		$count = $mo->count();
		$pagesize = Yii::$app->params['PageSize']['index_index'];
		$pager = new Pagination(['totalCount' => $count,'pageSize' => $pagesize]);
		$model = $mo->orderBy("createtime DESC")->offset($pager->offset)->limit($pager->limit)->all();


		return $this->render("index",['model' => $model,'pager' => $pager]);
	}

	public function actionArticle() //首页详细新闻
	{
		$this->layout = "layout2";
		$model = new News;
		$artid = Yii::$app->request->get('artid');
		if($artid)
		{
			$data = $model->find()->where('id = :id',[':id' => $artid])->one();
			if($data)
			{
				return $this->render("article",['model' => $data]);
			}else{
				$this->redirect(['index/index']);
			}
		}
		$this->redirect(['index/index']);
	}




	public function actionLoginre() //注册方法
	{
		$this->layout = false;
		$model = new User;
		if(Yii::$app->request->isPost)
		{
			$post = Yii::$app->request->post();
			if($model->reg($post))
			{
				Yii::$app->session->setFlash('info','注册成功');
			}else
			{
				Yii::$app->session->setFlash('info','注册失败');
			}
		}
		$model->passwd = '';
		$model->repasswd = '';
		$model->grade = '';
		return $this->render("loginre",['model' => $model]);
	}




	public function actionLogin()//登录方法
	{
		$this->layout = false;
		$model = new User;
		if(Yii::$app->request->isPost)
		{
			$post = Yii::$app->request->post();
			if($model->login($post))
			{
				$this->redirect(['index/index']);
				Yii::$app->end();
			}else
			{
				Yii::$app->session->setFlash('info','账号或密码错误');
			}
		}
		$this->redirect(['index/loginre']);
	}


	public function actionLogout() //退出登录方法
	{
		Yii::$app->session->removeAll();
        if (!isset(Yii::$app->session['user']['isLogin'])) {
            $this->redirect(['index/loginre']);
            Yii::$app->end();
        }
        $this->goback();
	}



	public function actionPerson() //个人中心
	{
		$this->layout = "layout2";
		$model = new User;
		$username = Yii::$app->session['user']['username'];//获取登录的用户名
		$user = $model->find()->where("username = :name",[':name' => $username])->one();//找到此用户
		if(Yii::$app->request->isPost)//如果点击修改
		{
			$post = Yii::$app->request->post();
			$isNewCov = 0;//没有上传新头像
			if(UploadedFile::getInstance($user,'avatar'))
			{
				$isNewCov = 1;
				$user->avatar = UploadedFile::getInstance($user,'avatar');
			}
			//echo "<pre>";print_r($user);die;
			if($user->changeself($post,$isNewCov))
			{
				Yii::$app->session->setFlash('info','修改成功');
			}else{
				Yii::$app->session->setFlash('info','修改失败');
			}
		}
		return $this->render("person",['model' => $user]);
	}

}

?>
