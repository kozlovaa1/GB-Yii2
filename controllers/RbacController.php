<?php
/**
 * Created by PhpStorm.
 * User: kozlo
 * Date: 01.11.2018
 * Time: 23:16
 */

namespace app\controllers;


use app\rbac\AuthorActivityRule;
use yii\web\Controller;

class RbacController extends Controller
{
    public function actionGen()
    {
        $auth=\Yii::$app->authManager;

        $auth->removeAll();

        $admin=$auth->createRole('admin');
        $simple=$auth->createRole('simple');

        $auth->add($admin);
        $auth->add($simple);

        $authorActivityRule=new AuthorActivityRule();
        $auth->add($authorActivityRule);

        $updateActivity=$auth->createPermission('updateActivity');
        $updateActivity->description='Редактирование своего события';

        $updateActivity->ruleName=$authorActivityRule->name;

        $auth->add($updateActivity);
        $auth->addChild($simple, $updateActivity);

        $createActivity=$auth->createPermission('createActivity');
        $createActivity->description='Создание события';

        $viewActivity=$auth->createPermission('viewActivity');
        $viewActivity->description='Просмотр события';

        $auth->add($createActivity);
        $auth->add($viewActivity);

        $auth->addChild($simple, $viewActivity);

        $auth->addChild($admin, $viewActivity);

        $auth->addChild($admin, $createActivity);

        $auth->assign($admin, 2);
        $auth->assign($simple, 3);
    }
}