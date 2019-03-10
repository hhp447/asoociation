<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Ins extends ActiveRecord{

	public static function tableName()
	{
		return "{{%ins}}";
	}

	public function getName($id)
	{
		$a = $this->find()->where('id = :id',[':id' => $id])->one();
		return $a->name;
	}
}

?>