<?php
use \yii\helpers\Html; ?>

<?php $product = $position->getProduct(); ?>
<li>
    <div class="cart-item <?php if(!$product->is_in_stock || !$product->is_active):?>absent<?php endif;?>">
        <div class="product-image">
            <a href="/catalog/<?= $product->category->slug?>/<?= $product->id?>" title="<?= Html::encode($product->title)?>">
                <?= Html::img($product->images[0]->getUrl('small'), ['width' => '100%', 'alt'=>$product->title]);?>
            </a>
        </div>
        <div class="product-body">
            <div class="product-name">
                <h3>
                    <a href="/catalog/<?= $product->category->slug?>/<?= $product->id?>" title="<?= $position->price?>"><?= Html::encode($product->title)?></a>
                </h3>
            </div>
            <div class="product-size">
                <span><?= $position->size?>рр</span>
            </div>
            <div class="product-count">
                <?php $quantity = $position->getQuantity()?>
                <!-- Html::a('-', ['cart/update', 'id' => $product->getId(), 'size' => $p->size, 'quantity' => $quantity - 1], ['class' => 'btn', 'disabled' => ($quantity - 1) < 1])-->
                <span><?= $quantity?>шт.</span>
                <!-- Html::a('+', ['cart/update', 'id' => $product->getId(), 'size' => $p->size, 'quantity' => $quantity + 1], ['class' => 'btn'])-->
            </div>
            <div class="product-price">
                <span><?= (int)$position->getCost()?>₽</span>
            </div>
        </div>
    </div><!-- /.cart-item -->
    <?= Html::a('<span class="icon icon-remove"></span>', ['cart/remove', 'id' => $product->getId(), 'size' => $position->size], ['class' => 'remove-cart', 'title' => "Удалить"])?>
</li>