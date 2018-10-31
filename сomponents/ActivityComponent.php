<?php
/**
 * Created by PhpStorm.
 * User: kozlo
 * Date: 01.11.2018
 * Time: 0:11
 */

namespace app\сomponents;


use yii\base\Component;

class ActivityComponent extends Component
{
    public function getAllActivitiesArray(){
        $sql='select * from activity';

        return \Yii::$app->db->createCommand($sql)->queryAll();
    }
}