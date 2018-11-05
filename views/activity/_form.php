<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="activity-form">
    <?php print_r(Yii::$app->getUser()); ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label($model->getAttributeLabel('title')) ?>

    <div class="row" style="margin-bottom: 8px">
        <div class="col-sm-6">
            <?=
            $form->field($model, 'start_day')->textInput()->label('Дата начала активности')->widget(DateTimePicker::className(), [
                'name' => 'date_in_modal_1',
                'options' => ['placeholder' => 'Start time...'],
                'pluginOptions' => ['autoclose' => true]
            ]); ?>
        </div>
        <div class="col-sm-6">
            <?=
            DateTimePicker::widget([
                'name' => 'date_in_modal_2',
                'options' => ['placeholder' => 'End time...'],
                'pluginOptions' => ['autoclose' => true]
            ]); ?>
        </div>
    </div>

    <?= $form->field($model, 'start_day')->textInput()->label('Дата начала активности')->widget(DateTimePicker::className(), [
        'language' => 'es',
        'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => true,
        'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            'linkFormat' => Yii::$app->formatter->datetimeFormat, // if inline = true
            'todayBtn' => true
        ]
    ])?>

    <?= $form->field($model, 'end_day')->textInput()->label('Дата конца активности')->widget(DateTimePicker::className(), [
        'language' => 'es',
        'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => true,
        'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            'linkFormat' => Yii::$app->formatter->datetimeFormat, // if inline = true
            'todayBtn' => true
        ]
    ]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Описание') ?>

    <?= $form->field($model, 'is_repeat')->checkbox()->label('Повторяющееся') ?>

    <?= $form->field($model, 'is_block')->checkbox()->label('Блокирующее') ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id]) ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value' => date(Yii::$app->formatter->datetimeFormat, time())]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
