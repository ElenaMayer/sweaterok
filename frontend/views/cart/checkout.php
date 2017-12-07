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

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">Имя <sup>*</sup></label>
                    <input type="text" class="form-control dark" id="first_name" placeholder="Имя">
                </div><!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Фамилия</label>
                    <input type="text" class="form-control dark" id="last_name" placeholder="Фамилия">
                </div><!-- /.form-group -->
            </div>
        </div>
        <div class="form-group">
            <label for="address">Адрес <sup>*</sup></label>
            <input type="text" class="form-control dark" id="address" placeholder="Адрес">
        </div><!-- /.form-group -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="street-address">Город <sup>*</sup></label>
                    <input type="text" class="form-control dark" id="street-address" placeholder="Город">
                </div><!-- /.form-group -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($order, 'email')->textInput(['placeholder' => $labels['email'], 'class' => 'form-control dark']); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($order, 'phone')->textInput(['placeholder' => $labels['phone'], 'class' => 'form-control dark']); ?>
            </div>
        </div>
        <?= $form->field($order, 'notes')->textarea()->textInput(['class' => 'form-control dark', 'rows' => "3"]); ?>
        <?php if (Yii::$app->user->isGuest): ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <span>Создать аккаунт?</span>
                </label>
            </div><!-- /.checkbox -->
        <?php endif;?>
    </div>

    <div class="col-md-6">
        <div class="payment-right">
            <h2>Ваш заказ</h2>

            <div class="payment-detail-wrapper">
                <ul class="cart-list">
                    <?php foreach ($products as $product):?>
                    <li>
                        <div class="cart-item">
                            <div class="product-image">
                                <a href="<?= $product->images[0]->getUrl()?>" title="<?= Html::encode($product->title)?>">
                                    <?= Html::img($product->images[0]->getUrl(), ['width' => '100%', 'alt'=>$product->title]);?>
                                </a>
                            </div>
                            <div class="product-body">
                                <div class="product-name">
                                    <h3>
                                        <a href="/catalog/<?= $product->category->slug?>/<?= $product->id?>" title="<?= $product->price?>"><?= Html::encode($product->title)?></a>
                                    </h3>
                                </div>
                                <div class="product-price">
                                    <span><?= (int)$product->price?>₽</span>
                                </div>
                                <div class="product-count">
                                    <?php $quantity = $product->getQuantity()?>
                                    <?= Html::a('-', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity - 1], ['class' => 'btn btn-danger', 'disabled' => ($quantity - 1) < 1])?>
                                    <span><?= $quantity?></span>
                                    <?= Html::a('+', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity + 1], ['class' => 'btn btn-success'])?>
                                </div>
                                <div class="product-price">
                                    <span><?= (int)$product->getCost()?>₽</span>
                                </div>
                            </div>
                        </div><!-- /.cart-item -->
                        <?= Html::a('<span class="icon icon-remove"></span>', ['cart/remove', 'id' => $product->getId()], ['class' => 'remove-cart', 'title' => "Удалить"])?>
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
                <div class="checkbox">
                    <label>
                        <input type="radio" name="payment" chacked="checked" value="">
                        <span>Оплата при получении</span>
                    </label>
                </div><!-- /.checkbox -->
                <div class="checkbox">
                    <label>
                        <input type="radio" name="payment" value="">
                        <span>Оплата онлайн</span>
                    </label>

                    <ul class="list-payments list-inline">
                        <li>
                            <a href="#" title="">
                                <img src="/img/payments/mastercard.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#" title="">
                                <img src="/img/payments/visa.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div><!-- /.checkbox -->
            </div><!-- /.cart-checkboxes -->
            <div class="col-xs-12">
                <?= Html::submitButton('Отправить заказ', ['class' => 'btn btn-lg btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>