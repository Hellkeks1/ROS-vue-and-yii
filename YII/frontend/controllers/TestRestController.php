<?php

namespace frontend\controllers;

use Yii;
use yii\rest\ActiveController;
use common\models\User;

class TestRestController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['update']);
        unset($actions['read']);
        unset($actions['create']);
        return$actions;
    }

    public function actionIndex(){
        return User::findOne(2);
    }

    public function actionGetAll()
    {
        return User::find()->all();
    }
    public function actionRead(){
        $post = Yii::$app->request->post();
        $id = $post["id"];
        return User::findOne($id);
    }

    public function actionCreate(){
        $model = new User();
        if($model->load(Yii::$app->request->post(), '')&& $model->validate()){
            $model->save();
        }
    }
    public function actionGoodMorning(){
        $array =[];
        $user = User::find()->select(["id"])->orderBy("id")->all();
        foreach ($user as $user_id){
            array_push($array,"Good Morning user with id: ".$user_id["id"]);
        }
        return $array;
    }

    public function actionGetUserById($id){
        return User::find()->where(["id"=>$id])->one();
    }

    public function actionUpdate(){
        $post = Yii::$app->request->post();
        $id = $post["id"];
        $username = $post["username"];
        $user = User::findOne($id);
        $user->username = $username;
        if($user->save(false)){
            return "succesfully updated";
        }
        return "id not found";
    }
}