<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="activity-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label($model->getAttributeLabel('title')) ?>

    <div class="row" style="margin-bottom: 8px">
        <div class="col-sm-6">
            <?=
            $form->field($model, 'start_day')->textInput()->widget(DateTimePicker::className(), [
                'name' => 'start_date',
                'options' => ['placeholder' => 'Начало активности...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd.mm.yyyy hh:ii',
                    'language' => 'ru',
                ]
            ]); ?>
        </div>
        <div class="col-sm-6">
            <?=
            $form->field($model, 'end_day')->textInput()->widget(DateTimePicker::className(), [
                'name' => 'end_date',
                'options' => ['placeholder' => 'Конец активности...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd.mm.yyyy hh:ii',
                    'language' => 'ru',
                ]
            ]); ?>
        </div>
    </div>

    <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Описание') ?>

    <?= $form->field($model, 'is_repeat')->checkbox()->label(false) ?>

    <?= $form->field($model, 'is_block')->checkbox()->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
