<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'fio',
            'address',
            'phone',
            'email:email',
            'notes:ntext',
            'status',
            'shipping_cost',
            'city',
            'shipping_method',
            'shipping_point',
            'zip',
        ],
    ]) ?>
    <h2>Заказ:</h2>
    <?php
    $sum = 0;
    foreach ($model->orderItems as $item): ?>
        <?php $sum += $item->quantity * $item->price ?>
        <li><?= Html::encode($item->title . ' (' . $item->size . ' размер) x ' . $item->quantity . ' x ' . (int)$item->price . '₽') ?></li>
    <?php endforeach ?>
    </ul>

    <p><string>Итого: </string> <?php echo $sum?>₽</p>

</div>
