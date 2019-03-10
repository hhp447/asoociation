<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use app\models\User;
use app\models\Role;


class Appli extends ActiveRecord
{
	public static function tableName()
	{
		return "{{%appli}}";
	}


	public function rules()
	{
		return [
			['userid','required','message' => '用户ID不能为空','on' => ['add']],
			['assoid','required','message' => '社团ID不能为空','on' => ['add']],
			['introduction','required','message' => '简介不能为空','on' => ['add']],
		];
	}

	public function add($data){
		$this->scenario = "add";
		if($this->load($data) && $this->validate()){
			//做点有意义的事
			$this->createtime = time();
			if($this->save(false))
			{
				return true;
			}
			return false;
		}
		return false;
	}

	public function getUser($assoid,$result)//根据result查找此社团有关用户
	{
		$users = [];
		//先查找appli表中的记录
		$data = $this->find()->where('assoid = :id and result = :res',[':id' => $assoid,':res' => $result])->all();
		foreach($data as $val)//遍历所有记录
		{
			$userid = $val->userid;//获取有关用户ID
			$roleid = $val->roleid;//获取有关角色ID
			$da = User::find()->where('id = :id',[':id' => $userid])->one();//找到此用户
			if($result == 1)//如果是正式成员，还要记录下他们的角色名字
			{
				$role = Role::find()->where('id = :id',[':id' => $roleid])->one();
				$da->rolename = $role->rolename;
			}else{
				$da->introduction = $val->introduction;//非正式成员，记录下他们的自我介绍
			}
			array_push($users,$da);
		}
		return $users;
	}

	public function changeRole($assoid,$userid,$roleid)//改变社团的角色
	{
		 $app=Appli::find()->where('userid = :uid and assoid = :aid',[':uid' => $userid,':aid' => $assoid])->one();
		 $app->roleid = $roleid;
		 if($app->save(false))
		 {
		 	return true;
		 }
		 return false;
	}

	public function changeresult($assoid,$userid,$result)//是否同意该申请
	{
		 $app=$this->find()->where('userid = :uid and assoid = :aid',[':uid' => $userid,':aid' => $assoid])->one();
		 $app->result = $result;
		 if($app->save(false))
		 {
		 	return true;
		 }
		 return false;
	}

	public function delappli($assoid,$userid,$del)//删除申请
	{
		if($del == 1)
		{
			return (bool)$this->find()->where('userid = :uid and assoid = :aid',[':uid' => $userid,':aid' => $assoid])->one()->delete();
		}
	}

	public function getnumber($assoid)//获取某社团的总人数
	{
		return $this->find()->where('assoid = :id and result = 1',[':id' => $assoid])->count();
	}


	public function getleader($assoid)//获取某社团的社长资料
	{
		$a = $this->find()->where('assoid = :id and roleid = 1',[':id' => $assoid])->one();
		if($a)
		{
			$userid = $a->userid;
			$leader = User::find()->where('id = :id',[':id' => $userid])->one();
			return $leader;
		}else{
			return "无";
		}
	}
}

?>