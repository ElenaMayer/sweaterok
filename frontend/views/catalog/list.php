<?php
use yii\widgets\LinkPager;
use yii\widgets\Menu;

if($category) {
    $this->title = Yii::$app->params['title'] . ' - ' . $category->title;
    $this->params['breadcrumbs'][] = $category->title;
} else {
    $this->title = Yii::$app->params['title'] . ' - Каталог';
    $this->params['breadcrumbs'][] = 'Каталог';
}
?>

<div class="row">
    <div class="col-md-9 col-md-push-3">
        <div class="product-header-actions">
            <form action="product-grid.html" method="POST" class="form-inline" >
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group pull-left">
                            <label for="p_show">Показать</label>
                            <select name="p_show" id="p_show" class="form-control input-sm">
                                <option value="">10</option>
                                <option value="">25</option>
                                <option value="">50</option>
                            </select>
                            <strong>на странице</strong>

                        </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <div class="form-show-sort">
                            <div class="view-count">
                                <?php
                                $begin = $pagination->getPage() * $pagination->pageSize + 1;
                                $end = $begin + $pageCount - 1;
                                ?>
                                <span class="text-muted">Товар с <?= $begin ?> по <?= $end ?> из <?= $pagination->totalCount ?></span>
                            </div>
                            <div class="form-group pull-right text-right">
                                <label for="p_sort_by">Сортировка</label>
                                <select name="p_sort_by" id="p_sort_by" class="form-control input-sm">
                                    <option value="">По популярности</option>
                                    <option value="">По новинкам</option>
                                    <option value="">По цене</option>
                                </select>
                            </div><!-- /.form-group -->
                        </div>
                    </div>
                </div><!-- /.row -->
            </form>
        </div><!-- /.product-header-actions -->
        <div class="products products-grid-wrapper">
            <div class="row">
                <?php foreach (array_values($models) as $index => $model) :?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <?= $this->render('_product', ['model'=>$model, 'category' => $category]); ?>
                    </div>
                <?php endforeach;?>
            </div><!-- /.row -->
        </div><!-- /.products -->

        <?php echo LinkPager::widget([
            'pagination' => $pagination,
            'prevPageCssClass' => 'pagination-prev',
            'nextPageCssClass' => 'pagination-next',
            'prevPageLabel' => '<i class="icon icon-arrow-prev"></i>',
            'nextPageLabel' => '<i class="icon icon-arrow-next"></i>',
        ]); ?>

    </div><!-- /.col-* -->

    <div class="col-md-3 col-md-pull-9">
        <div id="shop-widgets-filters" class="shop-widgets-filters">
            <div id="widget-area" class="widget-area">
                <div class="widget woocommerce widget_product_categories">
                    <h3 class="widget-title">Категории</h3>
                    <?= Menu::widget([
                        'items' => $menuItems,
                        'options' => [
                            'class' => 'menu',
                        ],
                    ]) ?>
                </div><!-- /.widget -->
                <div class="widget woocommerce">
                    <h3 class="widget-title">Размеры</h3>

                    <div class="widget-content">
                        <label class="label-select">
                            <select name="product-sizes" class="form-control">
                                <option value="">42</option>
                                <option value="">44</option>
                                <option value="">46</option>
                                <option value="">48</option>
                            </select>
                        </label>
                    </div>
                </div><!-- /.widget -->
                <div class="widget">
                    <h3 class="widget-title">Цвет</h3>
                    <div class="wiget-content">
                        <div class="colors square">
                            <a href="#" title=""><span class="color orange"></span></a>
                            <a href="#" title=""><span class="color green"></span></a>
                            <a href="#" title=""><span class="color blue"></span></a>
                            <a href="#" title=""><span class="color dark"></span></a>
                            <a href="#" title=""><span class="color gray"></span></a>
                            <a href="#" title=""><span class="color white"></span></a>
                        </div>
                    </div>
                </div>

                <div class="widget woocommerce widget_product_prices">
                    <h3 class="widget-title">Цена</h3>
                    <ul>
                        <li><a href="#" title="">Не задана</a></li>
                        <li><a href="#" title="">$35  -  $100</a></li>
                        <li class="active"><a href="#" title="">$100 - $200</a></li>
                        <li><a href="#" title="">$200 - $300</a></li>
                        <li><a href="#" title="">$300  -  $400</a></li>
                        <li><a href="#" title="">$400  -  $500</a></li>
                        <li><a href="#" title="">$500  -  $600</a></li>
                    </ul>
                </div><!-- /.widget -->
            </div>
        </div>

        <div id="open-filters">
            <i class="fa fa-filter"></i>
            <span>Фильтр</span>
        </div>
    </div><!-- /.col-* -->
</div><!-- /.row -->
