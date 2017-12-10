<?php
use yii\helpers\Html;

$this->title = Yii::$app->params['title'].' - '.$product->title;
$this->params['breadcrumbs'][] = [
    'label' => $category->title,
    'url' => '/catalog/'.$category->slug,
];
$this->params['breadcrumbs'][] = $product->title;
?>

<div class="row">
    <div class="col-md-6">
        <div class="product-slider-wrapper thumbs-bottom">
            <div class="swiper-container product-slider-main">
                <div class="swiper-wrapper">
                    <?php foreach ($product->images as $image):?>
                        <div class="swiper-slide">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="<?= $image->getUrl()?>" title="<?= $product->title?>">
                                    <?= Html::img($image->getUrl(), ['width' => '100%', 'alt'=>$product->title]);?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
                <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
            </div><!-- /.swiper-container -->
            <div class="swiper-container product-slider-thumbs">
                <div class="swiper-wrapper">
                    <?php foreach ($product->images as $image):?>
                        <div class="swiper-slide">
                            <?= Html::img($image->getUrl(), ['width' => '100%', 'alt'=>$product->title]);?>
                        </div>
                    <?php endforeach;?>
                </div>
            </div><!-- /.swiper-container -->
        </div><!-- /.product-slider-wrapper -->
    </div>
    <div class="col-md-6">
        <nav class="pnav">
            <div class="pull-right">
                <a href="#" class="btn btn-sm btn-arrow btn-default">
                    <i class="fa fa-chevron-left"></i>
                </a>
                <a href="#" class="btn btn-sm btn-arrow btn-default">
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
            <a href="/catalog/<?=$category->slug?>" class="back-to-pcate">
                <i class="fa fa-chevron-left"></i>
                <span>Обратно к разделу <?=$category->title?></span>
            </a>
        </nav><!-- /header -->
        <div class="product-details-wrapper">
            <h2 class="product-name">
                <a href="#" title=" Gin Lane Greenport Cotton Shirt"><?= $product->title?></a>
            </h2><!-- /.product-name -->
            <div class="product-status">
                <span>В наличии</span>
                <span>-</span>
                <small>Арт: 12345678</small>
            </div><!-- /.product-status -->
            <div class="product-stars">
                    <span class="rating">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                    </span>
            </div><!-- /.product-stars -->
            <div class="product-description">
                <p><?= $product->description?></p>
            </div><!-- /.product-description -->
            <div class="product-actions-wrapper">
                <form action="product-quick-view.html" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="p_size">Размер</label>
                                <select name="p_size" id="p_size" class="form-control">
                                    <option value="">XL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form><!-- /.form -->
                <div class="product-list-actions">
                        <span class="product-price">
                            <span class="amount"><?= (int)$product->price?>₽</span>
                        </span><!-- /.product-price -->
                    <?= Html::a('В корзину', ['cart/add', 'id' => $product->id], ['class' => 'btn btn-lg btn-primary'])?>
                    <?= Html::a('Купить', ['cart/add', 'id' => $product->id, 'returnUrl' => '/cart/checkout'], ['class' => 'btn  btn-primary btn-lg btn-outline'])?>
                </div><!-- /.product-list-actions -->
            </div><!-- /.product-actions-wrapper -->
            <div class="product-meta">
                <span class="product-category">
                    <span>Категория:</span>
                    <a href="/catalog/<?= $category->slug?>" title="<?= $category->title?>"><?= $category->title?></a>
                </span>
            </div><!-- /.product-meta -->
        </div><!-- /.product-details-wrapper -->
    </div>
</div>
<div class="product-socials">
    <ul class="list-socials">
        <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="icon fa fa-instagram"></i></a></li>
        <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="icon fa fa-vk"></i></a></li>
        <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="icon icon-facebook"></i></a></li>
    </ul>
</div><!-- /.product-socials -->
<div class="product-details-left">
    <div role="tabpanel" class="product-details">
        <nav>
            <ul class="nav" role="tablist">
                <li role="presentation" class="active">
                    <a href="#product-infomation"  data-toggle="tab">Хорактеристики</a>
                </li>
<!--                <li role="presentation">-->
<!--                    <a href="#product-review"  data-toggle="tab">Отзывы <span>(2)</span></a>-->
<!--                </li>-->
            </ul><!-- /.nav -->
        </nav><!-- /nav -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="product-infomation">
                <ul>
                    <li>
                        <span>Цвет</span>
                        <span class="value">Yellow, Brown</span>
                    </li>
                    <li>
                        <span>Состав</span>
                        <span class="value">Nylon, Coton</span>
                    </li>
                </ul>
            </div><!-- /.tab-pane -->
            <!-- $this->render('_product_review', []); -->
        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- /.product-details-left -->
<div class="related-products">
    <div class="related-products-header margin-bottom-50">
        <h3 class="upper">Популярное</h3>
    </div>
    <div class="products owl-carousel" data-items="4">
        <?php foreach (array_values($relatedProducts) as $index => $model) :?>
            <?= $this->render('_product', ['model'=>$model, 'category' => $category]); ?>
        <?php endforeach;?>
    </div>
</div><!-- /.related-products -->