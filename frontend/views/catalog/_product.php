<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php /** @var $model \common\models\Product */ ?>

<div class="product product-grid">
    <div class="product-media">
        <div class="product-thumbnail">
            <a href="/catalog/<?= $category->slug?>/<?= $model->id?>" title="<?= $model->title?>">
                <?php
                $images = $model->images;?>
                <?php if (isset($images[0])):?>
                    <?= Html::img($images[0]->getUrl(), ['width' => '100%']);?>
                <?php else: ?>
                    <img src="/img/samples/products/grid/1.jpg" alt="" class="current">
                <?php endif;?>
                <?php if (isset($images[1])):?>
                    <?= Html::img($images[1]->getUrl(), ['width' => '100%']);?>
                <?php else: ?>
                    <img src="/img/samples/products/index/clothing/2.jpg" alt="">
                <?php endif;?>
            </a>
        </div><!-- /.product-thumbnail -->
        <div class="product-hover">
            <div class="product-actions">
                <?= Html::a('<i class="icon icon-box"></i>', ['cart/add', 'id' => $model->id, 'returnUrl' => '/cart/checkout'], ['class' => 'awe-button', 'title' => "Купить", 'data-toggle' => "tooltip"])?>
                <?= Html::a('<i class="icon icon-shopping-bag"></i>', ['cart/add', 'id' => $model->id], ['class' => 'awe-button product-add-cart', 'title' => "В корзину", 'data-toggle' => "tooltip"])?>
                <?= Html::a('<i class="icon icon-eye"></i>', ['catalog/quickview', 'id' => $model->id, 'returnUrl' => Url::current([],true)],
                    ['class' => 'awe-button product-quick-view', 'data-toggle' => "tooltip", 'title' => "Подробнее"])?>
            </div>
        </div><!-- /.product-hover -->
<!--        <span class="product-label hot">-->
<!--            <span>hot</span>-->
<!--        </span>-->
    </div><!-- /.product-media -->
    <div class="product-body">
        <h2 class="product-name">
            <a href="#" title="<?= Html::encode($model->title) ?>"><?= Html::encode($model->title) ?></a>
        </h2><!-- /.product-product -->
        <div class="product-category">
            <span><?= $category->title?></span>
        </div><!-- /.product-category -->
        <div class="product-price">
            <span class="amount"><?= (int)$model->price ?>₽</span>
        </div><!-- /.product-price -->
    </div><!-- /.product-body -->
</div><!-- /.product -->