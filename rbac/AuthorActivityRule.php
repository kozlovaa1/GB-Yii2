<?php
/**
 * Created by PhpStorm.
 * User: kozlo
 * Date: 01.11.2018
 * Time: 23:15
 */

namespace app\rbac;


use yii\rbac\Item;
use yii\rbac\Rule;

class AuthorActivityRule extends Rule
{
    public $name='authorActivityRule';
    /**
     * Executes the rule.
     *
     * @param string|int $user the user ID. This should be either an integer or a string representing
     * the unique identifier of a user. See [[\yii\web\User::id]].
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to [[CheckAccessInterface::checkAccess()]].
     * @return bool a value indicating whether the rule permits the auth item it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['activity'])?$params['activity']->user_id==$user:false;
    }
}