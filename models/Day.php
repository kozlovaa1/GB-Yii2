<?php

namespace app\models;

/**
 * Day класс
 *
 * Отражает сущность день в календаре
 */

use yii\base\Model;

class Day extends Model
{
    /**
     * Рабочий день или нет
     *
     * @var boolean
     */
    public $working;

    /**
     * Связь с событиями по ID
     *
     * @var array
     */
    public $activityID;
}