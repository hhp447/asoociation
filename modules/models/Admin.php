<?php
namespace app\modules\models;
use Yii;
use yii\db\ActiveRecord;

class Admin extends ActiveRecord{

	public static function tableName()
	{
		return "{{%admin}}";
	}

	public function rules()
	{
		return [
			['adminname','required','message' => '用户名不能为空','on' => ['login']],
			['passwd','required','message' => '密码不能为空','on' => ['login']],
			['passwd','validatePass','on' => ['login']],
		];
	}


	public function validatePass()//验证账号密码方法
	{
		if(!$this->hasErrors())
		{
			$data = self::find()->where('adminname = :name and passwd = :pass',[':name' => $this->adminname,':pass' => md5($this->passwd)])->one();
			if(is_null($data))
			{
				$this->addError('passwd','用户名或者密码不正确');
			}
		}
	}


	public function login($data)//登录方法
	{
		$this->scenario = "login";
		if($this->load($data) && $this->validate())
		{
			//记住我保存时间
			$time = 24*3600;
			$session = Yii::$app->session;
			session_set_cookie_params($time);
			$session['admin'] = [ 
				'adminname' => $this->adminname,
				'adminisLogin' => 1
			];
			return (bool)$session['admin']['adminisLogin'];
		}
		return false;
	}
}
?>