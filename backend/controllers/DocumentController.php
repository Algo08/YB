<?php

namespace backend\controllers;

use common\models\Document;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class DocumentController extends \yii\web\Controller
{
    public function actionIndex($appeal_id)
    {
        return $this->renderPartial('document_table',['appeal_id'=>$appeal_id]);
    }
     public function actionFileUpload($appeal_id, $description='file')
     {
        $model = new Document();
        $model->load(Yii::$app->request->post());
        $model->appeal_id=$appeal_id;
        $model->description=$description;
        $model->file = UploadedFile::getInstances($model, 'file');

        $model->file[0]->saveAs('../../backend/web/uploads/' . $model->file[0]->baseName . '.' . $model->file[0]->extension);
        $model->file_location = '/backend/web/uploads/'. $model->file[0]->baseName . $appeal_id . '.' . $model->file[0]->extension;
        $model->name = $model->file[0]->baseName;
         // file size
         $base = log($model->file[0]->size, 1024);
         $suffixes = array('', 'K', 'M', 'G', 'T');
         $model->size = round(pow(1024, $base - floor($base)), 2) .' '. $suffixes[floor($base)].' mb';
         if ($model->save()){
             return true;
         };

         return false;

     }

    public function actionDownload($id)
    {
        $model = Document::findOne($id);

        $file =Yii::getAlias('@webroot/../..').$model->file_location;
        if(file_exists($file))
        {
            return Yii::$app->response->sendFile($file, basename($file), ['inline' => false]);
        }else{
            throw new ForbiddenHttpException('You do not have permission to view this page.');
        }
    }

    /**
     * @param $id
     * @return void|Response
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id){
        $model = Document::findOne($id);
        if ($model->file_location && is_file(Yii::getAlias('@webroot').'/../..'.$model->file_location)){
            unlink(Yii::getAlias('@webroot').'/../..'.$model->file_location);
        }
        $model->delete();
        if (!Yii::$app->request->isAjax) {
            return $this->redirect(['index']);
        }
    }
}
