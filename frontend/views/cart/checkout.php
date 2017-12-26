<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use \common\models\Order;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $products common\models\Product[] */

$this->title = Yii::$app->params['title'].' - Оформление заказа';
$this->params['breadcrumbs'][] = 'Оформление заказа';
?>

<?php if (Yii::$app->user->isGuest): ?>
    <?php Yii::$app->user->setReturnUrl($_SERVER['REQUEST_URI']); ?>
    <div class="text-alert">
        <p>Уже зарегистрированы? <a href="/user/login">Войти</a></p>
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
                        <?= $this->render('_products', ['position'=>$p]); ?>
                    <?php endforeach ?>
                </ul> <!-- /.cart-list -->
            </div><!-- /.payment-detail-wrapper -->
            <div class="cart-checkboxes">

                <h3>Способ доставки</h3>

                <?php echo $form->field($order, 'shipping_method')->dropDownList(Order::getShippingMethod(), ['id'=>'shipping_method-id']); ?>

                <div class="shipping_method_boxberry_courier" style="display: none">
                    <?= $form->field($order, 'zip')->textInput(['class' => 'form-control']); ?>
                </div>

                <div class="shipping_method_boxberry_point">
                    <?php echo $form->field($order, 'city')->widget(Select2::classname(), [
                        'data' => $cities,
                        'options' => ['placeholder' => 'Выбрать город ...'],
                    ]);

                    // Child level 1
                    echo $form->field($order, 'shipping_point')->widget(DepDrop::classname(), [
                        'data'=> [],
                        'options' => ['placeholder' => 'Выбрать ...'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                        'pluginOptions'=>[
                            'depends'=>['order-city'],
                            'url' => Url::to(['/ajax/points']),
                            'loadingText' => 'Загрузка ...',
                        ]
                    ]);
                    ?>
                </div>

                <script>
                    $(function() { checkoutShipping(); });
                </script>

            </div><!-- /.cart-checkboxes -->

            <div class="cart-total">
                <table>
                    <tbody>
                    <tr class="shipping">
                        <th>Доставка:</th>
                        <td class="shipping-cost">0₽</td>
                    </tr>
                    <tr class="cart-subtotal">
                        <th>Подитог:</th>
                        <td><span class="amount"><?=$total?>₽</span></td>
                    </tr>
                    <tr class="order-total">
                        <th>Итого:</th>
                        <td><strong><span class="amount"><?=$total?>₽</span></strong> </td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.cart-total -->

            <div class="cart-offer">Нажимая на кнопку "Отправить заказ",</br> вы принимаете условия <?= Html::a('Публичной оферты', ['site/offer'])?></div>

            <div class="col-xs-12">
                <?= Html::submitButton('Отправить заказ', ['class' => 'btn btn-lg btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>