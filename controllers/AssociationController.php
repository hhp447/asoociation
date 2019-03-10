<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\modules\models\Asso;
use app\models\Appli;
use app\models\User;
use app\models\News;
use app\models\Comment;

class AssociationController extends Controller
{
	public function actionIndex() //社团信息首页
	{
		$this->layout = "layout2";
		$model = new Asso;
		$data = $model->find()->where('insid = :id',[':id' => 2])->all();
		return $this->render('index',['model' => $data]);
	}

	public function actionFind_asso()
	{
		if(Yii::$app->request->isAjax)
		{
			if(Yii::$app->request->isPost)
			{
				$post = Yii::$app->request->post();
				$id = $post['id'];
				$model = new Asso;
				$data = $model->find()->where('insid = :id',[':id' => $id])->all();
				$data_return = "";
				foreach ($data as $key => $value) {
					$data_return = $data_return."<div class='community-content  clearfix'>".
									$value->covpic."<div class='community-info'><h3>".
									$value->asname."</h3><span>职责：</span></br>".
									$value->responsibility."<a href='index.php?r=association/detail&assoid=".
									$value->id.
									"'>有兴趣加入戳我<i class='icon iconfont icon-arrow1'></i></a></div></div>";
				}
				return json_encode($data_return);
			}
		}
	}

	public function actionDetail() //社团详细信息页面
	{
		$this->layout = "layout2";
		if(Yii::$app->request->isGet)
		{
			$id = Yii::$app->request->get('assoid');
			$model = new Asso;
			$data = $model->find()->where('id = :id',[':id' => $id])->one();

			$model2 = News::find()->where('assoid = :id',[':id' => $id])->limit(5)->all();
			return $this->render("detail",['model' => $data,'model2' => $model2]);
		}
		return $this->render("detail");
	}

	public function actionJoin() //加入社团页面
	{
		$this->layout = "layout2";
		$model = new Asso;
		$data1 = $model->find()->where('insid = :id',[':id' => 1])->all();//社团联合会
		$data2 = $model->find()->where('insid = :id',[':id' => 2])->all();//学生会
		$data3 = $model->find()->where('insid = :id',[':id' => 3])->all();//团务中心
		$data4 = $model->find()->where('insid = :id',[':id' => 4])->all();//宣传中心
		$data5 = $model->find()->where('insid = :id',[':id' => 5])->all();//青年志愿者中心
		$data6 = $model->find()->where('insid = :id',[':id' => 6])->all();//艺术中心
		$data7 = $model->find()->where('insid = :id',[':id' => 7])->all();//创新创业中心
		$data8 = $model->find()->where('insid = :id',[':id' => 8])->all();//团干培训中心
		$data9 = $model->find()->where('insid = :id',[':id' => 9])->all();//文化中心
		return $this->render("join",[
									'da1' => $data1,
									'da2' => $data2,
									'da3' => $data3,
									'da4' => $data4,
									'da5' => $data5,
									'da6' => $data6,
									'da7' => $data7,
									'da8' => $data8,
									'da9' => $data9,
									]);
	}

	public function actionJoininput() //加入社团表单
	{
		$this->layout = "layout2";
		$username = Yii::$app->session['user']['username'];//获取登录时的用户名,有登录就有
		$userid = 0;
		if($username)
		{
			$mo = new User;
			$userid = $mo->myid($username);//获取此登录用户的ID
		}
		$assoid = Yii::$app->request->get('assoid');//获取想加入的社团id
		$asname = Yii::$app->request->get('asname');//获取想加入的社团名称


		if(Yii::$app->request->isPost)//如果提交表单
		{
			$usermodel = new User;
			if($usermodel->isComplete($userid))
			{
				$post = Yii::$app->request->post();
				$post['Appli']['userid'] = $userid;
				$post['Appli']['assoid'] = $assoid;
				/*echo "<pre>";print_r($post);die;*/	
				$appli = new Appli;
				if($appli->add($post))
				{
					Yii::$app->session->setFlash('info','提交成功');
				}else{
					Yii::$app->session->setFlash('info','提交失败');
				}
			}else{
				Yii::$app->session->setFlash('info','提交失败,请完善个人信息');
			}
		}


		if($userid && $assoid)//已经登录，去填写加入的表单
		{
			$model = new Appli;
			return $this->render("joininput",['model' => $model,'asname' => $asname]);
		}
		else{                  //想加入社团但是没有登录。
			Yii::$app->session->setFlash('info','请先登录');
			$this->redirect(['association/join']);
		}
		
	}
}

?>