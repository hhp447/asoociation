<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\modules\models\Asso;

class News extends ActiveRecord
{
	public $assoname;
	public static function tableName()
	{
		return "{{%news}}";
	}

	public function rules()
	{
		return [
			['title','required','message' => '标题不能为空','on' => ['pub','modify']],
			['source','required','message' => '来源不能为空','on' => ['pub','modify']],
			['content','required','message' => '内容不能为空','on' => ['pub','modify']],

		];
	}



	public function attributeLabels(){
		return [
			'title' => '标题：',
			'source' => '来源：',
			'content' => '新闻内容：'
		];	
	}



	public function pub($data,$assoid)//发表新闻
	{
		$this->scenario = "pub";
		if($this->load($data) && $this->validate())
		{
			//做点有意义的事
			$this->assoid = $assoid;//发布此新闻的社团ID
			$this->createtime = time();
			if($this->save(false))
			{
				return true;
			}
			return false;
		}
		return false;
	}

	public function del($id)//删除新闻方法
	{
		return (bool)$this->find()->where('id = :id',[':id' => $id])->one()->delete();
	}


	public function modify($data)//修改新闻方法
	{
		$this->scenario = "modify";
		if($this->load($data) && $this->validate())
		{
			if($this->save(false))
			{
				return true;
			}
			return false;
		}

	}

	public function passimg($string)//绕过内容中的img标签
	{
		$start = strpos($string,"<img");
		$re = substr_replace($string,"...",$start,60);
		return substr($re, 0,200);	
	}

	public function getAssoName()//暂时没用到
	{
		$model = $this->find()->all();
		foreach($model as $val)
		{
			$assoid = $val->assoid;
			if($assoid == 0)
			{
				$val->assoname = "管理员";
			}else{
				$as = Asso::find()->where('id = :id',[':id' => $assoid])->one();
				$val->assoname = $as->asname;
			}
		}
		return $model;
	}


}



?>