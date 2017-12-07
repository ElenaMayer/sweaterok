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
                    <div class="swiper-slide">
                        <img src="./img/samples/products/product/tiny/thumb-1.jpg" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="./img/samples/products/product/tiny/thumb-2.jpg" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="./img/samples/products/product/tiny/thumb-3.jpg" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="./img/samples/products/product/tiny/thumb-4.jpg" alt="">
                    </div>



                    <div class="swiper-slide">
                        <img src="./img/samples/products/product/tiny/thumb-1.jpg" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="./img/samples/products/product/tiny/thumb-2.jpg" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="./img/samples/products/product/tiny/thumb-3.jpg" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="./img/samples/products/product/tiny/thumb-4.jpg" alt="">
                    </div>


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

            <div class="product-features">
                <h3>Special Features:</h3>

                <ul>
                    <li>1914 translation by H. Rackham</li>
                    <li>The standard Lorem Ipsum passage, used since the 1500s</li>
                    <li>Section 1.10.33 of "de Finibus Bonorum et Malorum</li>
                </ul>
            </div><!-- /.product-features -->

            <div class="product-actions-wrapper">
                <form action="product-quick-view.html" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="p_color">Color</label>
                                <select name="p_color" id="p_color" class="form-control">
                                    <option value="">Blue</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="p_size">Size</label>
                                <select name="p_size" id="p_size" class="form-control">
                                    <option value="">XL</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_qty">Qty</label>
                                <select name="p_qty" id="p_qty" class="form-control">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form><!-- /.form -->

                <div class="product-list-actions">
                        <span class="product-price">
                            <span class="amount"><?= (int)$product->price?>₽</span>
                        </span><!-- /.product-price -->
                    <?= Html::a('Add to cart', ['cart/add', 'id' => $product->id], ['class' => 'btn btn-lg btn-primary'])?>
                </div><!-- /.product-list-actions -->
            </div><!-- /.product-actions-wrapper -->
            <div class="product-meta">
                <span class="product-category">
                    <span>Category:</span>
                    <a href="#" title="">Outerwear</a>
                </span>
            </div><!-- /.product-meta -->
        </div><!-- /.product-details-wrapper -->
    </div>
</div>

<div class="product-socials">
    <ul class="list-socials">

        <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="icon icon-twitter"></i></a></li>
        <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="icon icon-facebook"></i></a></li>
        <li><a href="#" data-toggle="tooltip" title="Dot-Dot"><i class="icon icon-dot-dot"></i></a></li>
        <li><a href="#" data-toggle="tooltip" title="Google+"><i class="icon icon-google-plus"></i></a></li>
        <li><a href="#" data-toggle="tooltip" title="Pinterest"><i class="icon icon-pinterest"></i></a></li>

    </ul>
</div><!-- /.product-socials -->

<div class="product-details-left">
    <div role="tabpanel" class="product-details">
        <nav>
            <ul class="nav" role="tablist">
                <li role="presentation" class="active">
                    <a href="#product-description"  data-toggle="tab">Description</a>
                </li>
                <li role="presentation">
                    <a href="#product-infomation"  data-toggle="tab">Additional Infomation</a>
                </li>
                <li role="presentation">
                    <a href="#product-review"  data-toggle="tab">Review <span>(2)</span></a>
                </li>
            </ul><!-- /.nav -->
        </nav><!-- /nav -->

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="product-description">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div><!-- /.tab-pane -->

            <div role="tabpanel" class="tab-pane" id="product-infomation">
                <ul>
                    <li>
                        <span>Weight</span>
                        <span class="value">8.6kg</span>
                    </li>

                    <li>
                        <span>Color</span>
                        <span class="value">Yellow, Brown</span>
                    </li>

                    <li>
                        <span>Size</span>
                        <span class="value">S, M, L, XL, XXL</span>
                    </li>

                    <li>
                        <span>Material</span>
                        <span class="value">Nylon, Coton</span>
                    </li>
                </ul>
            </div><!-- /.tab-pane -->

            <div role="tabpanel" class="tab-pane" id="product-review">
                <h3>Review <span>(2)</span></h3>

                <ol class="product-review-list">
                    <li>
                        <h4 class="review-title">Goodale Rutledge Navy/White</h4>
                        <div class="rating small">
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </div>

                        <div class="review-comment">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        </div>

                        <div class="review-meta">
                            <span>Posted by</span>
                            <a href="#" class="author">Join Doe</a>
                            <span>-</span>
                            <span>February 17, 2015</span>
                        </div>
                    </li>

                    <li>
                        <h4 class="review-title">The standard Lorem Ipsum passage, used since the 1500s </h4>
                        <div class="rating small">
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </div>

                        <div class="review-comment">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>

                        <div class="review-meta">
                            <span>Posted by</span>
                            <a href="#" class="author">Join Doe</a>
                            <span>-</span>
                            <span>February 17, 2015</span>
                        </div>
                    </li>
                </ol><!-- /.product-review-list -->

                <h3>Add a review</h3>

                <form action="product-fullwidth.html" method="POST" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="reply-name">Name <sup>*</sup></label>
                                <input type="text" class="form-control" id="reply-name" placeholder="Name">
                            </div><!-- /.form-group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="reply-email">Email <sup>*</sup></label>
                                <input type="email" class="form-control" id="reply-email" placeholder="Email">
                            </div><!-- /.form-group -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reply-title">Title <sup>*</sup></label>
                        <input type="text" class="form-control" id="reply-title" placeholder="title">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label for="reply-text">Your review <sup>*</sup></label>
                        <textarea name="reply-text" class="form-control" id="reply-text" rows="7" placeholder="Your review"></textarea>
                    </div><!-- /.form-group -->

                    <div class="form-submit clearfix">
                        <div class="review-rating">
                            <span class="title">Your rating:</span>

                            <span class="rating small live">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>

                        </div>

                        <div class="pull-right">
                            <button type="submit" class="submit btn btn-lg btn-default">Submit</button>
                        </div>
                    </div><!-- /.form-submit -->
                </form><!-- /form -->
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- /.product-details-left -->

<div class="relared-products">
    <div class="relared-products-header margin-bottom-50">
        <h3 class="upper">Related Products</h3>
    </div>

    <div class="products owl-carousel" data-items="4">


        <div class="product product-grid">
            <div class="product-media">
                <div class="product-thumbnail">
                    <a href="product-fullwidth.html" title="">
                        <img src="./img/samples/products/grid/1.jpg" alt="" class="current">
                        <img src="./img/samples/products/index/clothing/2.jpg" alt="">
                    </a>
                </div><!-- /.product-thumbnail -->


                <div class="product-hover">
                    <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                            <i class="icon icon-shopping-bag"></i>
                        </a>

                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                            <i class="icon icon-star"></i>
                        </a>

                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                            <i class="icon icon-eye"></i>
                        </a>
                    </div>
                </div><!-- /.product-hover -->



                <span class="product-label hot">
                                    <span>hot</span>
                                </span>

            </div><!-- /.product-media -->

            <div class="product-body">
                <h2 class="product-name">
                    <a href="#" title="Gin Lane Greenport Cotton Shirt">Gin Lane Greenport Cotton Shirt</a>
                </h2><!-- /.product-product -->

                <div class="product-category">
                    <span>Jackets</span>
                </div><!-- /.product-category -->

                <div class="product-price">

                    <span class="amount">$246</span>

                </div><!-- /.product-price -->
            </div><!-- /.product-body -->
        </div><!-- /.product -->



        <div class="product product-grid">
            <div class="product-media">
                <div class="product-thumbnail">
                    <a href="product-fullwidth.html" title="">
                        <img src="./img/samples/products/grid/2.jpg" alt="" class="current">
                        <img src="./img/samples/products/index/clothing/2.jpg" alt="">
                    </a>
                </div><!-- /.product-thumbnail -->


                <div class="product-hover">
                    <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                            <i class="icon icon-shopping-bag"></i>
                        </a>

                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                            <i class="icon icon-star"></i>
                        </a>

                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                            <i class="icon icon-eye"></i>
                        </a>
                    </div>
                </div><!-- /.product-hover -->



            </div><!-- /.product-media -->

            <div class="product-body">
                <h2 class="product-name">
                    <a href="#" title="Gin Lane Greenport Cotton Shirt">Gin Lane Greenport Cotton Shirt</a>
                </h2><!-- /.product-product -->

                <div class="product-category">
                    <span>Short</span>
                </div><!-- /.product-category -->

                <div class="product-price">

                    <span class="amount">$60</span>

                </div><!-- /.product-price -->
            </div><!-- /.product-body -->
        </div><!-- /.product -->



        <div class="product product-grid">
            <div class="product-media">
                <div class="product-thumbnail">
                    <a href="product-fullwidth.html" title="">
                        <img src="./img/samples/products/grid/3.jpg" alt="" class="current">
                        <img src="./img/samples/products/index/clothing/2.jpg" alt="">
                    </a>
                </div><!-- /.product-thumbnail -->


                <div class="product-hover">
                    <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                            <i class="icon icon-shopping-bag"></i>
                        </a>

                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                            <i class="icon icon-star"></i>
                        </a>

                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                            <i class="icon icon-eye"></i>
                        </a>
                    </div>
                </div><!-- /.product-hover -->



                <span class="product-label sale">
                                    <span>sale</span>
                                </span>

            </div><!-- /.product-media -->

            <div class="product-body">
                <h2 class="product-name">
                    <a href="#" title="Gin Lane Greenport Cotton Shirt">Gin Lane Greenport Cotton Shirt</a>
                </h2><!-- /.product-product -->

                <div class="product-category">
                    <span>Jackets</span>
                </div><!-- /.product-category -->

                <div class="product-price">

                    <span class="amount">$120</span>
                    <del class="amount">$320</del>

                </div><!-- /.product-price -->
            </div><!-- /.product-body -->
        </div><!-- /.product -->



        <div class="product product-grid">
            <div class="product-media">
                <div class="product-thumbnail">
                    <a href="product-fullwidth.html" title="">
                        <img src="./img/samples/products/grid/4.jpg" alt="" class="current">
                        <img src="./img/samples/products/index/clothing/2.jpg" alt="">
                    </a>
                </div><!-- /.product-thumbnail -->


                <div class="product-hover">
                    <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                            <i class="icon icon-shopping-bag"></i>
                        </a>

                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                            <i class="icon icon-star"></i>
                        </a>

                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                            <i class="icon icon-eye"></i>
                        </a>
                    </div>
                </div><!-- /.product-hover -->



                <span class="product-label hot">
                                    <span>hot</span>
                                </span>

            </div><!-- /.product-media -->

            <div class="product-body">
                <h2 class="product-name">
                    <a href="#" title="Gin Lane Greenport Cotton Shirt">Gin Lane Greenport Cotton Shirt</a>
                </h2><!-- /.product-product -->

                <div class="product-category">
                    <span>Shocks</span>
                </div><!-- /.product-category -->

                <div class="product-price">

                    <span class="amount">$12</span>

                </div><!-- /.product-price -->
            </div><!-- /.product-body -->
        </div><!-- /.product -->



        <div class="product product-grid">
            <div class="product-media">
                <div class="product-thumbnail">
                    <a href="product-fullwidth.html" title="">
                        <img src="./img/samples/products/grid/5.jpg" alt="" class="current">
                        <img src="./img/samples/products/index/clothing/2.jpg" alt="">
                    </a>
                </div><!-- /.product-thumbnail -->


                <div class="product-hover">
                    <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                            <i class="icon icon-shopping-bag"></i>
                        </a>

                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                            <i class="icon icon-star"></i>
                        </a>

                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                            <i class="icon icon-eye"></i>
                        </a>
                    </div>
                </div><!-- /.product-hover -->



                <span class="product-label new">
                                    <span>new</span>
                                </span>

            </div><!-- /.product-media -->

            <div class="product-body">
                <h2 class="product-name">
                    <a href="#" title="Gin Lane Greenport Cotton Shirt">Gin Lane Greenport Cotton Shirt</a>
                </h2><!-- /.product-product -->

                <div class="product-category">
                    <span>Jackets</span>
                </div><!-- /.product-category -->

                <div class="product-price">

                    <span class="amount">$145</span>

                </div><!-- /.product-price -->
            </div><!-- /.product-body -->
        </div><!-- /.product -->



        <div class="product product-grid">
            <div class="product-media">
                <div class="product-thumbnail">
                    <a href="product-fullwidth.html" title="">
                        <img src="./img/samples/products/grid/6.jpg" alt="" class="current">
                        <img src="./img/samples/products/index/clothing/2.jpg" alt="">
                    </a>
                </div><!-- /.product-thumbnail -->


                <div class="product-hover">
                    <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                            <i class="icon icon-shopping-bag"></i>
                        </a>

                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                            <i class="icon icon-star"></i>
                        </a>

                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                            <i class="icon icon-eye"></i>
                        </a>
                    </div>
                </div><!-- /.product-hover -->



            </div><!-- /.product-media -->

            <div class="product-body">
                <h2 class="product-name">
                    <a href="#" title="Gin Lane Greenport Cotton Shirt">Gin Lane Greenport Cotton Shirt</a>
                </h2><!-- /.product-product -->

                <div class="product-category">
                    <span>Shirts</span>
                </div><!-- /.product-category -->

                <div class="product-price">

                    <span class="amount">$50</span>

                </div><!-- /.product-price -->
            </div><!-- /.product-body -->
        </div><!-- /.product -->



        <div class="product product-grid">
            <div class="product-media">
                <div class="product-thumbnail">
                    <a href="product-fullwidth.html" title="">
                        <img src="./img/samples/products/grid/7.jpg" alt="" class="current">
                        <img src="./img/samples/products/index/clothing/2.jpg" alt="">
                    </a>
                </div><!-- /.product-thumbnail -->


                <div class="product-hover">
                    <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                            <i class="icon icon-shopping-bag"></i>
                        </a>

                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                            <i class="icon icon-star"></i>
                        </a>

                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                            <i class="icon icon-eye"></i>
                        </a>
                    </div>
                </div><!-- /.product-hover -->



            </div><!-- /.product-media -->

            <div class="product-body">
                <h2 class="product-name">
                    <a href="#" title="Gin Lane Greenport Cotton Shirt">Gin Lane Greenport Cotton Shirt</a>
                </h2><!-- /.product-product -->

                <div class="product-category">
                    <span>Shirts</span>
                </div><!-- /.product-category -->

                <div class="product-price">

                    <span class="amount">$125</span>

                </div><!-- /.product-price -->
            </div><!-- /.product-body -->
        </div><!-- /.product -->



        <div class="product product-grid">
            <div class="product-media">
                <div class="product-thumbnail">
                    <a href="product-fullwidth.html" title="">
                        <img src="./img/samples/products/grid/8.jpg" alt="" class="current">
                        <img src="./img/samples/products/index/clothing/2.jpg" alt="">
                    </a>
                </div><!-- /.product-thumbnail -->


                <div class="product-hover">
                    <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                            <i class="icon icon-shopping-bag"></i>
                        </a>

                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                            <i class="icon icon-star"></i>
                        </a>

                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                            <i class="icon icon-eye"></i>
                        </a>
                    </div>
                </div><!-- /.product-hover -->



            </div><!-- /.product-media -->

            <div class="product-body">
                <h2 class="product-name">
                    <a href="#" title="Gin Lane Greenport Cotton Shirt">Gin Lane Greenport Cotton Shirt</a>
                </h2><!-- /.product-product -->

                <div class="product-category">
                    <span>Jackets</span>
                </div><!-- /.product-category -->

                <div class="product-price">

                    <span class="amount">$360</span>

                </div><!-- /.product-price -->
            </div><!-- /.product-body -->
        </div><!-- /.product -->



        <div class="product product-grid">
            <div class="product-media">
                <div class="product-thumbnail">
                    <a href="product-fullwidth.html" title="">
                        <img src="./img/samples/products/grid/9.jpg" alt="" class="current">
                        <img src="./img/samples/products/index/clothing/2.jpg" alt="">
                    </a>
                </div><!-- /.product-thumbnail -->


                <div class="product-hover">
                    <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                            <i class="icon icon-shopping-bag"></i>
                        </a>

                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                            <i class="icon icon-star"></i>
                        </a>

                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                            <i class="icon icon-eye"></i>
                        </a>
                    </div>
                </div><!-- /.product-hover -->



            </div><!-- /.product-media -->

            <div class="product-body">
                <h2 class="product-name">
                    <a href="#" title="Gin Lane Greenport Cotton Shirt">Gin Lane Greenport Cotton Shirt</a>
                </h2><!-- /.product-product -->

                <div class="product-category">
                    <span>Shirts</span>
                </div><!-- /.product-category -->

                <div class="product-price">

                    <span class="amount">$125</span>

                </div><!-- /.product-price -->
            </div><!-- /.product-body -->
        </div><!-- /.product -->


    </div>
</div><!-- /.relared-products -->