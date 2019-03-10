<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
	public static function tableName()
	{
		return "{{%comment}}";
	}

	public function add()
	{
		$this->deleteAll();
		$this->pic->saveAs('assets/pic/' . $this->pic->baseName . '.' . $this->pic->extension);
		$this->pic ="<img src='assets/pic/".$this->pic->basename.".".$this->pic->extension."'>";
		$this->createtime = time();
		if($this->save(false))
		{
			return true;
		}
		return false;
	}
}

?>