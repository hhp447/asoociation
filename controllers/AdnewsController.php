<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\News;
use app\controllers\CommonController;
use yii\data\Pagination;

class AdnewsController extends CommonController{

	public function actionIndex()//社团新闻页面
	{
		$this->layout = 'layout1';
		$assoid = Yii::$app->session['houtai'];//获取session中的社团ID
		$mo = News::find();
		$count = $mo->where('assoid = :id',[':id' => $assoid])->count();
		$pagesize = Yii::$app->params['PageSize']['adnews'];
		$pager = new Pagination(['totalCount' => $count,'pageSize' => $pagesize]);
		$model = $mo->offset($pager->offset)->limit($pager->limit)->all();
		return $this->render("index",['model' => $model,'pager' => $pager]);
	}

	public function actionDel()
	{
		if(Yii::$app->request->get('delid'))
		{
			$model = new News;
			$delid = Yii::$app->request->get('delid');
			if($model->del($delid))
			{
				Yii::$app->session->setFlash('info','删除成功');
				$this->redirect(['adnews/index']);
			}else{
				Yii::$app->session->setFlash('info','删除失败');
			}
		}else{
			$this->redirect(['adindex/index']);
		}
	}

	public function actionModify()//修改社团新闻
	{
		$this->layout = 'layout1';
		if(Yii::$app->request->get('newid'))
		{
			$newid = Yii::$app->request->get('newid');
			$model = News::find()->where('id = :id',[':id' => $newid])->one();
			if(Yii::$app->request->isPost)
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
			return $this->render("modify",['model' => $model]);
		}else{
			$this->redirect(['adnews/index']);
		}
	}

	public function actionPublish()//发布新闻
	{
		$this->layout = 'layout1';
		$model = new News;
		if(Yii::$app->request->isPost)
		{
			$assoid = Yii::$app->session['houtai'];//获取session中的社团ID
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

	
}


?>