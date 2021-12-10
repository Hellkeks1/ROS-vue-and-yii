<?php

namespace frontend\controllers;

use Yii;
use yii\rest\ActiveController;
use common\models\University;

class UniversityController extends ActiveController
{
    public $modelClass = 'common\models\University';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['update']);
        unset($actions['read']);
        unset($actions['create']);
        unset($actions['delete']);
        return$actions;
    }

    public function actionGetAll()
    {
        return University::find()->all();
    }

    public function actionRead(){
        $post = Yii::$app->request->post();
        $id = $post["id"];
        return University::findOne($id);
    }

/*    public function actionCreate(){
        $model = new University();
        if($model->load(Yii::$app->request->post(), '')&& $model->validate()){
            $model->save();
        }
    }*/
    public function actionCreate(){
        $model = new University();
        $post = Yii::$app->request->post();
        $id = $post["id"];
        $name = $post["name"];
        $count_of_students = $post["count_of_students"];
        $count_of_teachers = $post["count_of_teachers"];
        if($model->load(Yii::$app->request->post(), '')&& $model->validate()){
            $model->id =$id;
            $model->name =$name;
            $model->count_of_students =$count_of_students;
            $model->count_of_teachers =$count_of_teachers;
            $model->save();
        }
    }
    public function actionDelete($id){
        if(Yii::app()->request->isPostRequest) {
            $this->loadModel($id)->delete();
        }
    }

    public function actionUpdate(){
        $post = Yii::$app->request->post();
        $id = $post["id"];
        $name = $post["name"];
        $user = University::findOne($id);
        $user->name = $name;
        if($user->save(false)){
            return "succesfully updated";
        }
        return "id not found";
    }
}