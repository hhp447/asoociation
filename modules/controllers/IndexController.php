<?php
namespace app\modules\controllers;

use Yii;
use yii\web\Controller;
use app\modules\models\Asso;
use app\modules\models\Admin;
use yii\web\UploadedFile;
use app\models\UploadForm;
use app\models\Ins;
use app\models\News;
use app\models\Indexpic;
use yii\data\Pagination;
use app\models\Pub;
class IndexController extends Controller{


	public function actionIndex()//后台首页
	{
		$this->layout = "layout";
		$adminislogin = Yii::$app->session['admin']['adminisLogin'];
		if(!$adminislogin)
		{
			$this->redirect(['index/login']);
		}
		$mo = Asso::find();
		$count = $mo->count();
		$pagesize = Yii::$app->params['PageSize']['admin_index_asso'];
		$pager = new Pagination(['totalCount' => $count,'pageSize' => $pagesize]);
		$model = $mo->offset($pager->offset)->limit($pager->limit)->all();

		$ne = News::find();
		$count_ne = $ne->count();
		$pagesize_ne = Yii::$app->params['PageSize']['admin_index_news'];
		$pager_ne = new Pagination(['totalCount' => $count_ne,'pageSize' => $pagesize_ne]);
		$model_ne = $ne->offset($pager_ne->offset)->limit($pager_ne->limit)->all();
		return $this->render("index",[
									'model' => $model,
									'pager' => $pager,
									'count' => $count,
									'model_ne' => $model_ne,
									'pager_ne' => $pager_ne,
									'count_ne' => $count_ne
									]);
	}

	public function actionLogin()//登陆页面
	{
		$this->layout = false;
		$model = new Admin;
		if(Yii::$app->request->isPost)
		{
			$post = Yii::$app->request->post();
			if($model->login($post))
			{
				$this->redirect(['index/index']);
				Yii::$app->end();
			}
		}
		return $this->render("login",['model' => $model]);
	}

	public function actionFirst()//站内管理页面
	{
		$this->layout = "layout";
		$model = new Indexpic;
		$model2 = new Pub;


		$model3 = Pub::find();
		$count = $model3->count();
		$pagesize = Yii::$app->params['PageSize']['admin_first'];
		$pager = new Pagination(['totalCount' => $count,'pageSize' => $pagesize]);
		$model_3 = $model3->offset($pager->offset)->limit($pager->limit)->all();

		if(Yii::$app->request->isPost)
		{
			$model->pic = UploadedFile::getInstance($model, 'pic');
			if($model->add())
			{
				Yii::$app->session->setFlash('info','更改成功');
			}else{
				Yii::$app->session->setFlash('info','更改失败');
			}
		}
		return $this->render("first",['model' => $model,'model2' => $model2,'model_3' => $model_3,'pager' => $pager]);
	}

	public function actionNews()//站内新闻管理
	{
		$this->layout = "layout";
		$adminislogin = Yii::$app->session['admin']['adminisLogin'];
		if(!$adminislogin)
		{
			$this->redirect(['index/login']);
		}
		$mo = News::find();
		$count = $mo->count();
		$pagesize = Yii::$app->params['PageSize']['admin_news'];
		$pager = new Pagination(['totalCount' => $count,'pageSize' => $pagesize]);
		$model = $mo->offset($pager->offset)->limit($pager->limit)->all();
		return $this->render("news",['model' => $model,'pager' => $pager]);
	}
	
	public function actionPublish()//新闻发布
	{
		$this->layout = "layout";
		$adminislogin = Yii::$app->session['admin']['adminisLogin'];
		if(!$adminislogin)
		{
			$this->redirect(['index/login']);
		}
		$model = new News;
		if(Yii::$app->request->isPost)
		{
			$assoid = 0;//0代表后台发布
			$data = Yii::$app->request->post();
			if($model->pub($data,$assoid))
			{
				Yii::$app->session->setFlash('info','发布成功');
			}
			else{
				Yii::$app->session->setFlash('info','发布失败');
			}
			
		}
		return $this->render("publish",['model' => $model]);
	}

	public function actionModify()//修改新闻
	{
		$this->layout = "layout";
		$adminislogin = Yii::$app->session['admin']['adminisLogin'];
		if(!$adminislogin)
		{
			$this->redirect(['index/login']);
		}
		if(Yii::$app->request->get('newid'))
		{
			$newid = Yii::$app->request->get('newid');
			$model = News::find()->where('id = :id',[':id' => $newid])->one();
			if(Yii::$app->request->isPost)//如果有点击修改按钮
			{
				$post = Yii::$app->request->post();
				if($model->modify($post))
				{
					Yii::$app->session->setFlash('info','修改成功');
				}else
				{
					Yii::$app->session->setFlash('info','修改失败');
				}
			}
			return $this->render("modify",['model' => $model]);//没有点击修改按钮
		}else{
			$this->redirect(['index/news']);
		}
	}

	public function actionAddasso()//添加社团页面
	{
		$this->layout = "layout";
		$adminislogin = Yii::$app->session['admin']['adminisLogin'];
		if(!$adminislogin)
		{
			$this->redirect(['index/login']);
		}
		$model = new Asso;
		if(Yii::$app->request->isPost)
		{
			$model->covpic = UploadedFile::getInstance($model, 'covpic');
			$post = Yii::$app->request->post();
			$model->asname = $post['Asso']['asname'];
			$model->introduction = $post['Asso']['introduction'];
			$model->insid = $post['Asso']['insid'];
			$model->responsibility = $post['Asso']['responsibility'];
			/*echo "<pre>";print_r($model);die;*/
			if($model->add())
			{
				Yii::$app->session->setFlash('info','添加成功');
			}
			else{
				Yii::$app->session->setFlash('info','添加失败');
			}
		}
		return $this->render("addasso",['model' => $model]);
	}

	public function actionPerson()//个人页面
	{
		$this->layout = "layout";
		return $this->render("person");
	}

	public function actionDel()
	{
		$adminislogin = Yii::$app->session['admin']['adminisLogin'];
		if(!$adminislogin)
		{
			$this->redirect(['index/login']);
		}
		if(Yii::$app->request->get('delid'))
		{
			$model = new News;
			$delid = Yii::$app->request->get('delid');
			if($model->del($delid))
			{
				Yii::$app->session->setFlash('info','删除成功');
				$this->redirect(['index/news']);
			}else{
				Yii::$app->session->setFlash('info','删除失败');
			}
		}else{
			$this->redirect(['index/news']);
		}
	}

	public function actionDelpub()//删除pub表中的数据
	{
		$this->layout = "layout";
		$adminislogin = Yii::$app->session['admin']['adminisLogin'];
		if(!$adminislogin)
		{
			$this->redirect(['index/login']);
		}
		if(Yii::$app->request->get('delid'))
		{
			$model = new Pub;
			$delid = Yii::$app->request->get('delid');
			if($model->del($delid))
			{
				Yii::$app->session->setFlash('info','删除成功');
				$this->redirect(['index/first']);
			}else{
				Yii::$app->session->setFlash('info','删除失败');
				$this->redirect(['index/first']);
			}
		}else{
			$this->redirect(['index/first']);
		}
	}

	public function actionAddpub()
	{
		if(Yii::$app->request->isPost)
		{
			$post = Yii::$app->request->post();
			$model = new Pub;
			if($model->add($post))
			{
				Yii::$app->session->setFlash('info','添加成功');
				$this->redirect(['index/first']);
			}else{
				Yii::$app->session->setFlash('info','添加失败');
				$this->redirect(['index/first']);
			}
		}
	}

	public function actionLogout() //退出登录方法
	{
		Yii::$app->session->removeAll();
        if (!isset(Yii::$app->session['admin']['adminisLogin'])) {
            $this->redirect(['index/login']);
            Yii::$app->end();
        }
        $this->goback();
	}


}




?>