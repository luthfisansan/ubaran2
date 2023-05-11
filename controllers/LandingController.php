<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class LandingController extends \yii\web\Controller
{
    public function behaviors()
    {
        $this->layout = "landing/landing";
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
}
