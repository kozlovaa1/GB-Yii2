<?php
/**
 * Created by PhpStorm.
 * User: kozlo
 * Date: 05.11.2018
 * Time: 22:10
 */

namespace app\behaviors;

use yii\base\Behavior;

class DurationBehavior extends Behavior
{
    public $start_attribute;
    public $finish_attribute;

    public function getDuration()
    {
        $date1 = new \DateTime($this->owner->{$this->start_attribute});
        $date2 = new \DateTime($this->owner->{$this->finish_attribute});
        $interval = $date1->diff($date2);

        return $interval->days . ' дней ' . $interval->h . ' часов ' . $interval->m . ' минут.';
    }
}