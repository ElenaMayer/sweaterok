<?php
use \common\models\Product;

/* @var $this yii\web\View */
$this->title = Yii::$app->params['title'];
?>
<div id="main">
    <section>
        <div class="main-slider-wrapper">
            <div class="main-slider owl-carousel owl-carousel-inset">
                <div class="main-slider-item">
                    <div class="main-slider-image">
                        <img src="./img/samples/sliders/1.jpg" alt="">
                    </div>
                    <div class="main-slider-text">
                        <div class="fp-table">
                            <div class="fp-table-cell center">
                                <div class="container">
                                    <h4>Только в декабре</h4>
                                    <h3>Доставка курьером бесплатно</h3>
                                    <div class="button">
                                        <a href="/payment" class="btn btn-lg btn-primary">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-slider-item">
                    <div class="main-slider-image">
                        <img src="./img/samples/sliders/2.jpg" alt="">
                    </div>
                    <div class="main-slider-text">
                        <div class="fp-table">
                            <div class="fp-table-cell center">
                                <div class="container">
                                    <h3 class="small">New Fashion For Winter</h3>
                                    <h2 class="small">New Jacket <br> only $60</h2>
                                    <div class="button">
                                        <a href="#" class="btn btn-lg btn-primary margin-right-15">Shop now</a>
                                        <a href="#" class="btn btn-lg btn-white btn-outline">Browse category</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-slider-item">
                    <div class="main-slider-image">
                        <img src="./img/samples/sliders/3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function() {  aweMainSlider(); });
        </script>
    </section><!-- /section -->
    <section class="border-bottom">
        <div class="container">
            <div class="policy-wrapper">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-8">
                        <div class="policy">
                            <div class="policy-icon">
                                <i class="icon icon-shirt"></i>
                            </div>
                            <div class="policy-text">
                                <h4>Свое производство</h4>
                                <p>С 2000 года</p>
                            </div>
                        </div><!-- /.policy -->
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-8">
                        <div class="policy">
                            <div class="policy-icon">
                                <i class="icon icon-car"></i>
                            </div>
                            <div class="policy-text">
                                <h4>Доставка курьером</h4>
                                <p>Boxberry</p>
                            </div>
                        </div><!-- /.policy -->
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-8">
                        <div class="policy">
                            <div class="policy-icon">
                                <i class="icon icon-dolar-circle"></i>
                            </div>
                            <div class="policy-text">
                                <h4>Оплата при получении</h4>
                                <p>Наложеный платеж</p>
                            </div>
                        </div><!-- /.policy -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.policy-wrapper -->
        </div><!-- /.container -->
    </section><!-- /section -->
    <section>
        <div class="container">
            <div class="home-products padding-vertical-60">
                <?php foreach ($categories as $category):?>
                    <div class="row">
                        <div class="col-md-3 col-sm-4 <?php if($category->id%2 == 0):?>col-md-push-9 col-sm-push-8<?php endif;?>">
                            <div class="awe-media home-cate-media">
                                <div class="awe-media-header">
                                    <div class="awe-media-image">
                                        <img src="./img/samples/collections/index-1/clothing.jpg" alt="">
                                    </div><!-- /.awe-media-image -->
                                    <div class="awe-media-overlay overlay-dark-50 fullpage">
                                        <div class="content">
                                            <div class="fp-table text-left">
                                                <div class="fp-table-cell">
                                                    <h2 class="upper"><?= $category->title ?></h2>
                                                    <p class="margin-bottom-50">At vero eos et accusamus et iusto odio dignissimosmus voluptatum deleniti</p>
                                                    <a href="/catalog/<?= $category->slug ?>" class="btn btn-sm btn-outline btn-white">Смотреть</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.awe-media-overlay -->
                                </div><!-- /.awe-media-header -->
                            </div><!-- /.awe-media -->
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <div class="products owl-carousel" data-items="3">
                                <?php
                                $models = Product::find()->where(['category_id'=>$category->id])->limit(Yii::$app->params['indexPageProductCount'])->all();
                                ?>
                                <?php foreach (array_values($models) as $index => $model) :?>
                                    <?= $this->render('../catalog/_product', ['model'=>$model, 'category' => $category]); ?>
                                <?php endforeach;?>
                            </div><!-- ./products -->
                        </div>
                    </div><!-- /.row -->
                <?php endforeach;?>
            </div><!-- /.home-products -->
        </div><!-- /.container -->
    </section><!-- /section -->

    <section>
        <div class="container">
            <div class="margin-bottom-50">
                <div class="subscible-wrapper subscible-inline">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="subscribe-title">Подписка на новости</h3>
                        </div>
                        <div class="col-md-4">
                            <div class="subscribe-comment">
                                <p>Будьте в курсе последнихновинок и наших акций</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form method="GET" action="index.html" class="subscible-form">
                                <div class="form-group">
                                    <label class="sr-only" for="subscribe-email">Email</label>
                                    <input type="email" placeholder="Введите ваш Email" class="form-control" id="subscribe-email">
                                </div>
                                <div class="form-submit">
                                    <button class="btn btn-lg btn-primary" type="submit">Подписаться</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.subscible-wrapper -->
            </div>
        </div><!-- /.container -->
    </section><!-- /section -->

    <section>
        <div class="container">
            <div class="padding-vertical-50">
                <div class="arrivals">
                    <div class="section-header center">
                        <h2>Новинки</h2>
                    </div><!-- /.section-header -->
                    <div class="products home-products owl-carousel" data-items="4">
                        <?php foreach (array_values($novelty) as $index => $model) :?>
                            <?= $this->render('../catalog/_product', ['model'=>$model, 'category' => $category]); ?>
                        <?php endforeach;?>
                    </div><!-- /.products -->
                </div><!-- /.arrivals -->
            </div>
        </div><!-- /.container -->
    </section><!-- /section -->
</div>