<?php
/* @var $order common\models\Order */
use yii\helpers\Html;
?>

<h1>Новый заказ #<?= $order->id ?></h1>

<h2>Контакты</h2>

<ul>
    <li>ФИО: <?= Html::encode($order->fio) ?></li>
    <li>Адрес: <?= Html::encode($order->address) ?></li>
    <li>Телефон: <?= Html::encode($order->phone) ?></li>
    <li>Email: <?= Html::encode($order->email) ?></li>
    <li>Доставка: <?= Html::encode(\common\models\Order::getShippingMethod()[$order->shipping_cost]) ?></li>
    <?php if($order->shipping_cost == 'boxberry_point'):?>
        <li>Город: <?= Html::encode($order->city) ?></li>
        <li>Пункт выдачи: <?= Html::encode($order->shipping_point) ?></li>
    <?php else:?>
        <li>Индекс: <?= Html::encode($order->zip) ?></li>
    <?php endif;?>
</ul>

<h2>Комментарий</h2>

<?= Html::encode($order->notes) ?>

<h2>Заказ</h2>

<ul>
<?php
$sum = 0;
foreach ($order->orderItems as $item): ?>
    <?php $sum += $item->quantity * $item->price ?>
    <li><?= Html::encode($item->title . ' x ' . $item->quantity . ' x ' . (int)$item->price . '₽') ?></li>
<?php endforeach ?>
</ul>

<p><string>Итого: </string> <?php echo $sum?>₽</p>

