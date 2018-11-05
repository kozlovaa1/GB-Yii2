<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">
    <?php print_r(Yii::$app->getUser()); ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label($model->getAttributeLabel('title')) ?>

    <?= $form->field($model, 'start_day')->textInput()->label('Дата начала активности')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => Yii::$app->formatter->datetimeFormat,
        ]
    ]) ?>

    <?= $form->field($model, 'end_day')->textInput()->label('Дата конца активности') ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Описание') ?>

    <?= $form->field($model, 'is_repeat')->checkbox()->label('Повторяющееся') ?>

    <?= $form->field($model, 'is_block')->checkbox()->label('Блокирующее') ?>

    <?= $form->field($model, 'user_id')->hiddenInput(Yii::$app->user->id) ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value' => date(Yii::$app->formatter->datetimeFormat, time())]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
