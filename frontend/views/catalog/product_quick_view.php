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
                <span><?php if($product->is_in_stock):?>В наличии<?php else:?>Отсутствует<?php endif;?></span>
                <span>-</span>
                <span>Арт: <?= $product->article?></span>
            </div><!-- /.product-status -->
            <div class="product-price">
                <span class="amount"><?= (int)$product->price?>₽</span>
            </div><!-- /.product-price -->
            <div class="product-description">
                <p><?= $product->description?></p>
            </div>
            <?php if($product->is_in_stock):?>
                <div class="product-list-actions-wrapper">
                    <form action="product-quick-view.html" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="p_size">Размер</label>
                                    <select name="p_size" id="p_size" class="form-control">
                                        <?php $sizes = explode(',', $product->sizes);?>
                                        <?php foreach ($sizes as $size):?>
                                            <option value="<?= $size?>"><?= $size?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form><!-- /.form -->
                        <div class="product-list-actions">
                            <?= Html::a('В корзину', ['cart/add', 'id' => $product->id, 'size' => array_shift($sizes), 'returnUrl' => $returnUrl], ['class' => 'btn btn-lg btn-primary'])?>
                            <?= Html::a('Купить', ['cart/add', 'id' => $product->id, 'size' => array_shift($sizes), 'returnUrl' => '/cart/checkout'], ['class' => 'btn  btn-primary btn-lg btn-outline'])?>
                        </div><!-- /.product-actions -->
                </div>
            <?php endif;?>
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

<script>
    $(function() { editAddCartButtonOnSizeChange(); });
</script>