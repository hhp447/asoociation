<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;

class CommonController extends Controller
{


	public function init()
	{
		$session = Yii::$app->session;
		if($session['user']['isLogin'] == 1)
		{
			foreach($session['user']['asso'] as $key => $val)
			{
				if($val == 1)//是否为社长
				{
					$session['houtai'] = $key;
				}
			}
			if(!isset($session['houtai']) || $session['houtai'] == 0)//如果有登录但不是某个社团的社长
			{
				$this->redirect(['/index/loginre']);
			}
		}else{
			$this->redirect(['/index/loginre']);//如果没登录
		}
	}


}

?>