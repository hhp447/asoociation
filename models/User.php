<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Appli;

class User extends ActiveRecord
{
	public $repasswd;
	public $rolename;
	public $introduction;
	public static function tableName()
	{
		return "{{%user}}";
	}


	public function rules()
	{
		return [
			['username','required','message' => '用户名不能为空','on' => ['reg','login']],
			['passwd','required','message' => '密码不能为空','on' => ['reg','login']],
			['repasswd','required','message' => '确认密码不能为空','on' => ['reg']],
			['username','unique','message' => '该用户名已经存在','on' => ['reg']],
			['repasswd','compare','compareAttribute' => 'passwd','message' => '两次密码不一致','on' => ['reg']],
			['passwd','validatePass','on' => ['login']],
		];
	}


	public function validatePass()//验证账号密码方法
	{
		if(!$this->hasErrors())
		{
			$data = self::find()->where('username = :name and passwd = :pass',[':name' => $this->username,':pass' => md5($this->passwd)])->one();
			if(is_null($data))
			{
				$this->addError('passwd','用户名或者密码不正确');
			}
		}
	}

	public function myid($name)//获取此用户ID
	{
		$data = self::find()->where("username = :name",[':name' => $name])->one();
		return $data->id;
	}




	public function reg($data)//注册方法
	{
		$this->scenario = "reg";
		if($this->load($data) && $this->validate())
		{
			$this->passwd = md5($this->passwd);
			$this->class = $data['User']['class'];
			$this->createtime = time();
			if ($this->save(false)) {
                return true;
            }
            return false;
		}
		return false;
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
			//标记下这个用户
			
			//找出他所属社团的ID和他是否为部长
			$userid = $this->myid($this->username);//获取此用户id
			$model = new Appli;
			$data_1 = $model->find()->where('userid = :id and result = :res',[':id' => $userid,':res' => 1])->all();
			$assoid = [];
			foreach ($data_1 as $value) {
				 $assoid[$value->assoid] = $value->roleid;
			}
			//写session
			$session['user'] = [ 
				'username' => $this->username,
				'isLogin' => 1,
				'asso' => $assoid //键值对，键代表所在社团ID，值表示在社团内的角色ID
			];
			$session['houtai'] = 0;
			return (bool)$session['user']['isLogin'];
		}
		return false;
	}

	public function changeself($data,$isNewCov)//修改个人信息方法
	{
		$this->scenario = "changeself";
		if($isNewCov)//如果有上传新头像
		{
			$this->avatar->saveAs('assets/avatar/' . $this->avatar->baseName . '.' . $this->avatar->extension);
			//上传新头像
			$this->avatar ="<img src='assets/avatar/".$this->avatar->basename.".".$this->avatar->extension."' class='head-img'>";
			//修改新头像路径
		}
		$this->grade = $data['User']['grade'];
		$this->class = $data['User']['class'];
		$this->phone = $data['User']['phone'];
		if($this->save(false)){
			return true;
		}
		return false;
	}

	public function isComplete($id)//判断个人信息是否完整函数
	{
		$data = $this->find()->where('id = :id',[':id' => $id])->one();
		if($data->grade && $data->class && $data->phone)
		{
			return true;
		}
		return false;
	}
}
?>