<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $auth_key
 * @property string $password
 * @property string $reset_token
 * @property string $email
 * @property int $status
 * @property string $created_at
 *
 * @property Activity[] $activities
 */
class User extends UserBase
{

}
