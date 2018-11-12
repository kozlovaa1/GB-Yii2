<?php
/**
 * Created by PhpStorm.
 * User: kozlo
 * Date: 08.11.2018
 * Time: 22:09
 */

namespace app\commands;


use app\models\Activity;
use yii\base\Event;
use yii\console\Controller;
use yii\helpers\Console;

class NotificationController extends Controller
{
    /** @var Максимальное количество активностей в уведомлении */
    public $max_activity;

    public function options($actionID)
    {
        return ['max_activity'];
    }

    public function optionAliases()
    {
        return ['m' => 'max_activity'];
    }

    public function actionSendActivityDay()
    {
        $activity = Activity::find()->andWhere('start_day>=:start_day', [':start_day' => date('Y-m-d')])
            ->limit($this->max_activity)
            ->all();
        if (!$activity) {
            $this->sendErrorMessage('Нет активностей для уведомления');
        } else {
            $this->sendSuccessMessage('Получено '.count($activity).' уведомлений');
        }

        foreach ($activity as $activeRecord) {
            $mailer=\Yii::$app->mailer;
           if($mailer->compose('notify_day',['model'=>$activeRecord])
                ->setFrom('kozlovaa1@yandex.ru')
                ->setTo($activeRecord->user->email)
                ->setCc()
                ->setSubject('Активности за '.date('d.m.Y'))
                ->setCharset('utf-8')
                ->send()){
               $this->sendSuccessMessage('Успешно отправлено');
           }else{
               $this->sendErrorMessage('Ошибка отправления ');
           }

        }
    }

    public function sendSuccessMessage($text)
    {
        echo $this->ansiFormat($text, Console::FG_GREEN) . PHP_EOL;
    }

    public function sendErrorMessage($text)
    {
        echo $this->ansiFormat($text, Console::FG_RED) . PHP_EOL;
    }


}