<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */

$this->title = Yii::$app->params['title'].' - Оформление заказа';
$this->params['breadcrumbs'][] = 'Оформление заказа';
?>

<?php if (Yii::$app->user->isGuest): ?>
    <div class="text-alert">
        <p>Уже зарегистрированы? <a href="#">Войти</a></p>
    </div><!-- /.text-alert -->
<?php endif;?>
<div class="row">
    <div class="col-md-6">
        <h2>Оформление заказа</h2>

        <?php
        /* @var $form ActiveForm */
        $form = ActiveForm::begin([
            'id' => 'order-form',
        ]);
        $labels = $order->attributeLabels(); ?>

        <?= $form->field($order, 'fio')->textInput(['placeholder' => 'Иванов Иван Иванович', 'class' => 'form-control dark']); ?>
        <?= $form->field($order, 'address')->textInput(['placeholder' => '630000, Новосибирск, ул.Ленина д.1 кв.1', 'class' => 'form-control dark']); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($order, 'email')->textInput(['placeholder' => 'name@mail.ru', 'class' => 'form-control dark']); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($order, 'phone')->textInput(['placeholder' => '+7900-000-00-00', 'class' => 'form-control dark']); ?>
            </div>
        </div>
        <?= $form->field($order, 'notes')->textarea(['class' => 'form-control dark', 'rows' => "3"]); ?>
        <?php if (Yii::$app->user->isGuest): ?>
<!--            <div class="checkbox">-->
<!--                <label>-->
<!--                    <input type="checkbox" value="">-->
<!--                    <span>Создать аккаунт?</span>-->
<!--                </label>-->
<!--            </div><!-- /.checkbox -->
        <?php endif;?>
    </div>

    <div class="col-md-6">
        <div class="payment-right">
            <h2>Ваш заказ</h2>

            <div class="payment-detail-wrapper">
                <ul class="cart-list">
                    <?php foreach ($products as $p):?>
                        <?php $product = $p->getProduct(); ?>
                    <li>
                        <div class="cart-item">
                            <div class="product-image">
                                <a href="<?= $product->images[0]->getUrl('small')?>" title="<?= Html::encode($product->title)?>">
                                    <?= Html::img($product->images[0]->getUrl('small'), ['width' => '100%', 'alt'=>$product->title]);?>
                                </a>
                            </div>
                            <div class="product-body">
                                <div class="product-name">
                                    <h3>
                                        <a href="/catalog/<?= $product->category->slug?>/<?= $product->id?>" title="<?= $p->price?>"><?= Html::encode($product->title)?></a>
                                    </h3>
                                </div>
                                <div class="product-size">
                                    <span><?= $p->size?>рр</span>
                                </div>
                                <div class="product-count">
                                    <?php $quantity = $p->getQuantity()?>
                                    <!-- Html::a('-', ['cart/update', 'id' => $product->getId(), 'size' => $p->size, 'quantity' => $quantity - 1], ['class' => 'btn', 'disabled' => ($quantity - 1) < 1])-->
                                    <span><?= $quantity?>шт.</span>
                                    <!-- Html::a('+', ['cart/update', 'id' => $product->getId(), 'size' => $p->size, 'quantity' => $quantity + 1], ['class' => 'btn'])-->
                                </div>
                                <div class="product-price">
                                    <span><?= (int)$p->getCost()?>₽</span>
                                </div>
                            </div>
                        </div><!-- /.cart-item -->
                        <?= Html::a('<span class="icon icon-remove"></span>', ['cart/remove', 'id' => $product->getId(), 'size' => $p->size], ['class' => 'remove-cart', 'title' => "Удалить"])?>
                    </li>
                    <?php endforeach ?>
                </ul> <!-- /.cart-list -->
            </div><!-- /.payment-detail-wrapper -->

            <div class="cart-total">
                <table>
                    <tbody>
                    <tr class="cart-subtotal">
                        <th>Подитог:</th>
                        <td><span class="amount"><?=$total?>₽</span></td>
                    </tr>
                    <tr class="shipping">
                        <th>Доставка:</th>
                        <td>Бесплатно</td>
                    </tr>
                    <tr class="order-total">
                        <th>Итого:</th>
                        <td><strong><span class="amount"><?=$total?>₽</span></strong> </td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.cart-total -->
            <div class="cart-checkboxes">
                <h3>Оплата при получении</h3>
            </div><!-- /.cart-checkboxes -->
            <div class="col-xs-12">
                <?= Html::submitButton('Отправить заказ', ['class' => 'btn btn-lg btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>