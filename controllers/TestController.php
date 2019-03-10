<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\UploadForm2;
use yii\web\UploadedFile;

class TestController extends Controller
{
    public function actionIndex()//pic
    {       
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {                
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }
        }

        return $this->render('index', ['model' => $model]);
    }

    public function actionUp2()//pics
    {
    	$model = new UploadForm2();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstances($model, 'file');

            if ($model->file && $model->validate()) {
                foreach ($model->file as $file) {
                    $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
                }
            }
        }
        return $this->render('upload', ['model' => $model]);
    }
}

?>