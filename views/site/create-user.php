<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="site-create-user">

    <?php if(Yii::$app->request->getQueryParam('user')) {
        echo '<div class="alert alert-info">Пользователь '.Yii::$app->request->getQueryParam('user').' успешно создан.</div>';
    }?>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'status')->hiddenInput(['value' => '1']) ?>
        <?= $form->field($model, 'username')->textInput()->label('Имя пользователя') ?>
        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
        <?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Создать'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-create-user -->
