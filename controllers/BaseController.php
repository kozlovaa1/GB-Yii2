<?php

namespace app\controllers;

use yii\base\Controller;

class BaseController extends Controller
{
    public function afterAction($action, $result)
    {
        \Yii::$app->session->setFlash('previousPage', \Yii::$app->request->url);
        return parent::afterAction($action, $result);
    }

}
