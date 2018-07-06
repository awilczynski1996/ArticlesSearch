<?php
/**
 * Created by PhpStorm.
 * User: Arek
 * Date: 06.07.2018
 * Time: 17:47
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Users;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = Users::find()->all();
        return $this->render('index', ['users' => $users]);
    }
}