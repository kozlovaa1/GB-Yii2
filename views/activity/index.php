<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $activities app\controllers\ActivityController */

$this->title = Yii::t('app', 'Activities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">
    <h1>Активность: <?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Activity'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <div class="col-md-12 panel panel-default">
            <div class="panel-body">
                <?php ActiveForm::begin(['method' => 'GET']); ?>
                <label>Имя активности</label>
                <?= Html::input('text', 'name', Yii::$app->request->get('name')) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h3>Список активностей</h3>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Дата старта</th>
                    <th>Дата окончания</th>
                    <th>Пользователь</th>
                    <th>Повторяется</th>
                    <th>Блокирующая</th>
                </tr>
                </thead>
                <tbody>
                <? foreach ($activities as $activity) {
                    print_r($activity);?>
                    <!--<td><?/*= ArrayHelper::getValue($activity, 'id'); */?></td>
                    <td><?/*= ArrayHelper::getValue($activity, 'title'); */?></td>
                    <td><?/*= ArrayHelper::getValue($activity, 'start_day'); */?></td>
                    <td><?/*= ArrayHelper::getValue($activity, 'end_day'); */?></td>
                    <td><?/*= ArrayHelper::getValue($activity, 'user_id'); */?></td>
                    <td><?/*= ArrayHelper::getValue($activity, 'is_repeat'); */?></td>
                    <td><?/*= ArrayHelper::getValue($activity, 'is_block'); */?></td>-->
                <? } ?>
                </tbody>
            </table>
        </div>
    </div>
    <? /*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'start_day',
            'end_day',
            'user_id',
            'body',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>
</div>