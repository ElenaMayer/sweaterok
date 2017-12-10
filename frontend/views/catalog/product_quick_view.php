<?php
use yii\helpers\Html;
?>
<div class="white-popup product-quickview-popup">
    <div class="product">
        <div class="product-media">
            <div class="product-quickview-slider owl-carousel owl-carousel-inset">
                <?php foreach ($product->images as $image):?>
                    <?= Html::img($image->getUrl(), ['width' => '100%', 'alt'=>$product->title]);?>
                <?php endforeach;?>
            </div>
        </div><!-- /.product-media -->
        <div class="product-body">
            <h2 class="product-name">
                <a href="/catalog/<?= $product->category->slug?>/<?= $product->id?>" title="<?= $product->title?>"><?= $product->title?></a>
            </h2><!-- /.product-name -->
            <div class="product-status">
                <span>В наличии</span>
                <span>-</span>
                <span>Арт: 12345678</span>
            </div><!-- /.product-status -->
            <div class="product-price">
                <span class="amount"><?= (int)$product->price?>₽</span>
            </div><!-- /.product-price -->
            <div class="product-description">
                <p><?= $product->description?></p>
            </div>
            <div class="product-list-actions-wrapper">
                <form action="product-quick-view.html" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="p_size">Размер</label>
                                <select name="p_size" id="p_size" class="form-control">
                                    <option value="">42</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form><!-- /.form -->
                <div class="product-list-actions">
                    <?= Html::a('В корзину', ['cart/add', 'id' => $product->id, 'returnUrl' => $returnUrl], ['class' => 'btn btn-lg btn-primary'])?>
                    <?= Html::a('Купить', ['cart/add', 'id' => $product->id, 'returnUrl' => '/cart/checkout'], ['class' => 'btn  btn-primary btn-lg btn-outline'])?>
                </div><!-- /.product-actions -->
            </div>
            <div class="product-meta">
                <span class="product-category">
                    <span>Категория:</span>
                    <a href="/catalog/<?= $product->category->slug?>" title="<?= $product->category->title?>"><?= $product->category->title?></a>
                </span>
            </div>
        </div><!-- /.product-body -->
    </div>
</div>

<script>
    $(function() {
        $('.product-quickview-slider').owlCarousel({
            items: 1,
            nav: true,
            dots: false
        });
    });
</script>
