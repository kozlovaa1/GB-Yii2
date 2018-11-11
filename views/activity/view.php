<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?=Html::a('Назад в календарь', Yii::$app->session->getFlash('previousPage')) ?>

<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if ($model->start_day == $model->end_day): ?>
        <p>Событие на <?= $model->start_day; ?></p>
    <?php else: ?>
        <p>Событие c <?= $model->start_day; ?> по <?=$model->end_day;?></p>
    <?php endif; ?>
    <p>Продолжительность: <?=$model->getDuration();?></p>
    <h3><?= $model->getAttributeLabel('body') ?></h3>
    <div><?= $model->body ?></div>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'start_day',
            'end_day',
            'user_id',
            'body',
        ],
    ]) ?>

</div>
