<?php
/**
 * Created by PhpStorm.
 * User: kozlo
 * Date: 04.11.2018
 * Time: 16:42
 */

namespace app\models;


use app\behaviors\DurationBehavior;
use app\behaviors\InfoBehavior;

class Activity extends ActivityBase
{
    public function behaviors()
    {
        return [
            'duration' => [
                'class' => DurationBehavior::class,
                'start_attribute' => 'start_day',
                'finish_attribute' => 'end_day'
            ],
            InfoBehavior::class
        ];
    }

    public function beforeValidate()
    {
        $date = \DateTime::createFromFormat('d.m.Y H:i',$this->start_day);
        $this->start_day = $date->format('Y-m-d H:i:s');
        $dateEnd = \DateTime::createFromFormat('d.m.Y H:i',$this->end_day);
        $this->end_day = $dateEnd->format('Y-m-d H:i:s');
    }
}