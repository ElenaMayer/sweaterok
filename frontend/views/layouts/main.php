<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\MyAppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
MyAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/favicon-16x16.png', 'sizes' => '16x16']); ?>
    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/favicon-32x32.png', 'sizes' => '32x32']); ?>
    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/favicon-96x96.png', 'sizes' => '96x96']); ?>
    <?php $this->head() ?>
    <script>window.SHOW_LOADING = false;</script>
</head>
<body>
    <?php $this->beginBody() ?>

    <!--[if lt IE 8]>
    <p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browsehappy.com/">обновите ваш браузер</a>.</p>
    <![endif]-->

    <!-- // LOADING -->
    <div class="awe-page-loading">
        <div class="awe-loading-wrapper">
            <div class="awe-loading-icon">
                <span class="icon icon-logo"></span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    <!-- // END LOADING -->

    <div id="wrapper" class="main-wrapper">
        <header id="header" class="awe-menubar-header">
            <nav class="awemenu-nav headroom" data-responsive-width="1200">
                <div class="container">
                    <div class="awemenu-container">
                        <div class="navbar-header">
                            <ul class="navbar-icons">
                                <li class="menubar-account">
                                    <a href="#" title="Аккаунт" class="awemenu-icon">
                                        <i class="icon icon-user-circle"></i>
                                        <span class="awe-hidden-text">Аккаунт</span>
                                    </a>
                                    <?php if (Yii::$app->user->isGuest):?>
                                        <ul class="submenu dropdown">
                                            <li>
                                                <a href="/user/login" title="Вход">Вход</a>
                                            </li>
                                            <li>
                                                <a href="/user/register" title="Регистрация">Регистрация</a>
                                            </li>
                                        </ul>
                                    <?php else:?>
                                        <ul class="submenu megamenu">
                                            <li>
                                                <div class="container-fluid">
                                                    <div class="header-account">
                                                        <div class="header-account-username">
                                                            <h4><a href="#"><?= Yii::$app->user->identity->username ?></a></h4>
                                                        </div>
                                                        <ul>
                                                            <li><a href="#">Мои заказы</a></li>
                                                            <li><a href="#">Мои данные</a></li>
                                                            <li><a href="/user/security/logout" data-method='post'>Выйти</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php endif;?>
                                </li>
                                <li class="menubar-cart">
                                    <?php /* @var $cart ShoppingCart */
                                    $cart = Yii::$app->cart;

                                    $positions = $cart->getPositions();
                                    $itemsInCart = $cart->getCount();
                                    ?>
                                    <?php if($itemsInCart): ?>
                                        <a href="/cart/checkout" title="Корзина" class="awemenu-icon menu-shopping-cart">
                                            <i class="icon icon-shopping-bag"></i>
                                            <span class="awe-hidden-text">Корзина</span>
                                            <?php $itemsInCart = Yii::$app->cart->getCount(); ?>
                                            <span class="cart-number"><?= $itemsInCart ?></span>
                                        </a>
                                    <?php else:?>
                                        <a href="#" title="Корзина" class="awemenu-icon menu-shopping-cart">
                                            <i class="icon icon-shopping-bag"></i>
                                        </a>
                                    <?php endif;?>
                                    <?php if($itemsInCart): ?>
                                        <ul class="submenu megamenu">
                                        <li>
                                            <div class="container-fluid">
                                                <ul class="whishlist">
                                                    <?php foreach ($positions as $p):?>
                                                        <?php $product = $p->getProduct(); ?>
                                                        <li>
                                                        <div class="whishlist-item">
                                                            <div class="product-image">
                                                                <a href="<?= $product->images[0]->getUrl()?>" title="<?= Html::encode($product->title)?>">
                                                                    <?= Html::img($product->images[0]->getUrl(), ['width' => '100%', 'alt'=>$product->title]);?>
                                                                </a>
                                                            </div>
                                                            <div class="product-body">
                                                                <div class="whishlist-name">
                                                                    <h3><a href="/catalog/<?=$product->category->slug?>/<?=$product->id?>" title="<?= Html::encode($product->title)?>"><?= Html::encode($product->title)?></a></h3>
                                                                </div>
                                                                <div class="whishlist-size">
                                                                    <span>Размер:</span>
                                                                    <strong><?=$p->size?></strong>
                                                                </div>
                                                                <?php if($quantity = $p->getQuantity() > 1):?>
                                                                    <div class="whishlist-quantity">
                                                                        <span>Количество:</span>
                                                                        <span><?=$p->getQuantity()?></span>
                                                                    </div>
                                                                <?php endif;?>
                                                                <div class="whishlist-price">
                                                                    <span>Стоимость:</span>
                                                                    <strong><?= (int)$p->getCost()?>₽</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?= Html::a('<span class="icon icon-remove"></span>', ['cart/remove', 'id' => $product->id, 'size' => $p->size], ['class' => 'remove-cart', 'title' => "Удалить"])?>
                                                    </li>
                                                    <?php endforeach ?>
                                                </ul>
                                                <div class="menu-cart-total">
                                                    <span>Итого</span>
                                                    <span class="price"><?= $cart->getCost() ?>₽</span>
                                                </div>
                                                <div class="cart-action">
                                                    <a href="/cart/checkout" title="В корзину" class="btn btn-lg btn-dark btn-outline btn-block">В корзину</a>
                                                    <a href="/cart/checkout" title="Оформить заказ" class="btn btn-lg btn-primary btn-block">Оформить заказ</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <?php else:?>
                                        <ul class="submenu megamenu">
                                            <li>
                                                <div class="container-fluid">
                                                    <span class="text-muted">Корзина пуста</span>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php endif;?>
                                </li>
                            </ul>
                        </div>
                        <div class="awe-logo">
                            <a href="<?= Yii::$app->homeUrl ?>" title="Главная"><img src="/img/logo.png?2" alt=""></a>
                        </div><!-- /.awe-logo -->
                        <ul class="awemenu awemenu-right">
                            <?php
                            $categories = \common\models\Category::find()->where(['is_active' => 1])->all();
                            ?>
                            <?php foreach ($categories as $category): ?>
                                <li class="awemenu-item">
                                    <a href="/catalog/<?=$category->slug ?>" title="<?=$category->title ?>">
                                        <span><?=$category->title ?></span>
                                    </a>
                                </li>
                            <?php endforeach;?>
                            <li class="awemenu-item">
                                <a href="/site/contact" title="Контакты">
                                    <span>Контакты</span>
                                </a>
                            </li>
                            <li class="awemenu-item">
                                <a href="/site/shipping" title="Доставка">
                                    <span>Доставка</span>
                                </a>
                            </li>
                            <li class="awemenu-item">
                                <a href="/site/payment" title="Оплата">
                                    <span>Оплата</span>
                                </a>
                            </li>
                            <li class="awemenu-item">
                                <a href="/site/about" title="О нас">
                                    <span>О нас</span>
                                </a>
                            </li>
                        </ul><!-- /.awemenu -->
                    </div>
                </div><!-- /.container -->
            </nav><!-- /.awe-menubar -->
        </header><!-- /.awe-menubar-header -->
        <div id="main">
            <?php if(!($this->context->action->id == 'index')): ?>
                <div class="main-header background background-image-heading-products <?= $this->context->action->id ?>">
                    <div class="container">
                        <h1>
                            <?php
                            if(isset($this->params['breadcrumbs'][0])){
                                if(is_array($this->params['breadcrumbs'][0])){
                                    if (isset($this->params['breadcrumbs'][0]['label']))
                                        echo $this->params['breadcrumbs'][0]['label'];
                                } else {
                                    echo $this->params['breadcrumbs'][0];
                                }
                            }
                            ?>
                        </h1>
                    </div>
                </div>
                <div id="breadcrumb">
                    <div class="container">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </div>
                </div>
            <?php endif;?>

        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <script>
            $(function() { aweProductSidebar(); });
        </script>
    </div><!-- /#wrapper -->

    <footer class="footer">
        <div class="footer-wrapper">
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <div class="widget">
                                        <h3 class="widget-title">О нас</h3>
                                        <div class="widget-content">
                                            <p>Компания существует на рынке с 2000 года, занимается производством современного верхнего мужского и женского трикотажа.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <div class="widget">
                                        <h3 class="widget-title">Как с нами связаться</h3>
                                        <div class="widget-content">
                                            <p>Телефон: 8 (495) 989—20—11</p>
                                            <p>Время работы: 09:00-21:00</p>
                                            <p>Mail: hosoren@gmail.com</p>
                                        </div>
                                    </div><!-- /.widget -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Доставка</h3>
                                <ul>
                                    <li><a href="/cart/checkout" title="Корзина">Корзина</a></li>
                                    <li><a href="/site/shipping" title="Доставка">Доставка</a></li>
                                    <li><a href="/site/payment" title="Оплата">Оплата</a></li>
                                    <li><a href="#" title="">Возврат</a></li>
                                    <li><a href="#" title="">Ваши заказы</a></li>
                                </ul>
                            </div><!-- /.widget -->
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Помощь</h3>
                                <ul>
                                    <li><a href="/contact" title="Контакты">Контакты</a></li>
                                    <li><a href="#" title="">Как сделать заказ</a></li>
                                    <li><a href="#" title="">Оферта</a></li>
                                    <li><a href="#" title="">Как выбрать размер</a></li>
                                </ul>
                            </div><!-- /.widget -->
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <h3 class="widget-title">Мы в социальных сетях</h3>

                                <ul class="list-socials">
                                    <li><a href="#" title="instagram"><i class="icon fa fa-instagram"></i></a></li>
                                    <li><a href="#" title="vk"><i class=" fa fa-vk"></i></a></li>
                                    <li><a href="#" title="facebook"><i class="icon icon-facebook"></i></a></li>
                                </ul>
                            </div>
<!--                            <div class="widget">-->
<!--                                <h3 class="widget-title">Способы оплаты</h3>-->
<!--                                <ul class="list-socials">-->
<!--                                    <li>-->
<!--                                        <a href="#" title="">-->
<!--                                            <i class="fa fa-cc-mastercard"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#" title="">-->
<!--                                            <i class="fa fa-cc-visa"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div><!-- /.widget -->
                        </div>
                    </div>
                </div>
            </div><!-- /.footer-widgets -->
            <div class="footer-copyright">
                <div class="container">
                    <div class="copyright">
                        <p>Copyright &copy; 2017 <?= Yii::$app->params['domain'] ?> - Developed by <a href="<?= Yii::$app->params['developerSite'] ?>" rel="external"><?= Yii::$app->params['developer'] ?></a>.</p>
                    </div>
                </div>
            </div><!-- /.footer-copyright -->
        </div><!-- /.footer-wrapper -->
        <a href="#" class="back-top" title="">
                <span class="back-top-image">
                    <img src="/img/back-top.png" alt="">
                </span>
            <small>Наверх</small>
        </a><!-- /.back-top -->
    </footer><!-- /footer -->

    <?php $this->endBody() ?>
    <script>$.widget.bridge('uitooltip', $.ui.tooltip);</script>
</body>
</html>
<?php $this->endPage() ?>
