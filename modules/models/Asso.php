<?php
namespace app\modules\models;

use Yii;
use yii\db\ActiveRecord;

class Asso extends ActiveRecord
{
	public static function tableName()
	{
		return "{{%asso}}";
	}

	public function rules()
	{
		return [
			['asname','required','message' => '社团名称不能为空','on' => ['add']],
			['insid','required','message' => '所属机构不能为空','on' => ['add']],
			['covpic','required','message' => '封面照片不能为空','on' => ['add']],
			['introduction','required','message' => '社团简介不能为空','on' => ['add']],
		];
	}

	public function add()
	{
		$this->scenario = "add";
		if($this->validate())
		{
			$this->createtime = time();
			$this->covpic->saveAs('assets/covpic/' . $this->covpic->baseName . '.' . $this->covpic->extension);
			$this->covpic ="<img src='assets/covpic/".$this->covpic->basename.".".$this->covpic->extension."' alt='' class='community-headimg'>";
			if($this->save(false))
			{
				return true;
			}
			return false;
		}
		return false;
	}




	public function attributeLabels()
	{
		return [
			'asname' => '社团名称：',
			'responsibility' => '职责：',
			"introduction" => '社团简介：',
			'insid' => '类别：'
		];
	}


	public function change($data,$isNew)
	{
		if($isNew)
		{
			$this->covpic->saveAs('assets/covpic/'.$this->covpic->baseName.'.'.$this->covpic->extension);
			$this->covpic = "<img src='assets/covpic/".$this->covpic->basename.".".$this->covpic->extension."' alt='' class='community-headimg'>";
		}
		$this->responsibility = $data['Asso']['responsibility'];
		$this->introduction = $data['Asso']['introduction'];
		if($this->save(false))
		{
			return true;
		}
		return false;
	}
} 



?>