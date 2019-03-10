<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Pub extends ActiveRecord{

	public static function tableName()
	{
		return "{{%pub}}";
	}

	public function rules()
	{
		return [
			['name','required','message' => '公众号名称不能为空'],
			['belong','required','message' => '所属不能为空']
		];
	}

	public function del($id)//删除方法
	{
		return (bool)$this->find()->where('id = :id',[':id' => $id])->one()->delete();
	}

	public function add($data)//添加方法
	{
		if($this->load($data) && $this->validate())
		{
			$this->createtime = time();
			if($this->save(false))
			{
				return true;
			}
			return false;
		}
		return false;
	}

}

?>