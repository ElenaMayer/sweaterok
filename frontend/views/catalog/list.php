<?php
use yii\widgets\LinkPager;
use yii\widgets\Menu;
use common\models\Product;
use common\models\StaticFunction;

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
            <form method="POST" class="form-inline">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="view-count">
                            <?php
                            $begin = $pagination->getPage() * $pagination->pageSize + 1;
                            $end = $begin + $pageCount - 1;
                            ?>
                            <span class="text-muted">Товар с <?= $begin ?> по <?= $end ?> из <?= $pagination->totalCount ?></span>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <div class="form-show-sort">
                            <div class="form-group pull-left">
                                <label for="p_show">Показать</label>
                                <select name="p_show" id="p_show" class="form-control input-sm" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="<?= StaticFunction::addGetParamToCurrentUrl('limit', '12') ?>" <?php if(!Yii::$app->request->get('limit') || Yii::$app->request->get('limit') == '12'):?>selected="selected"<?php endif;?>>12</option>
                                    <option value="<?= StaticFunction::addGetParamToCurrentUrl('limit', '24') ?>" <?php if(Yii::$app->request->get('limit') && Yii::$app->request->get('limit') == '24'):?>selected="selected"<?php endif;?>>24</option>
                                    <option value="<?= StaticFunction::addGetParamToCurrentUrl('limit', '48') ?>" <?php if(Yii::$app->request->get('limit') && Yii::$app->request->get('limit') == '48'):?>selected="selected"<?php endif;?>>48</option>
                                </select>
                                <strong>на странице</strong>
                            </div><!-- /.form-group -->
                            <div class="form-group pull-right text-right">
                                <label for="p_sort_by">Сортировка</label>
                                <select name="p_sort_by" id="p_sort_by" class="form-control input-sm" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'popular') ?>" <?php if(!Yii::$app->request->get('order') || Yii::$app->request->get('order') == 'popular'):?>selected="selected"<?php endif;?>>По популярности</option>
                                    <option value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'novelty') ?>" <?php if(Yii::$app->request->get('order') && Yii::$app->request->get('order') == 'novelty'):?>selected="selected"<?php endif;?>>По новинкам</option>
                                    <option value="<?= StaticFunction::addGetParamToCurrentUrl('order', 'price') ?>" <?php if(Yii::$app->request->get('order') && Yii::$app->request->get('order') == 'price'):?>selected="selected"<?php endif;?>>По цене</option>
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
                            <select name="product-sizes" class="form-control"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="<?= StaticFunction::addGetParamToCurrentUrl('size', 'all') ?>" <?php if(!Yii::$app->request->get('size') || Yii::$app->request->get('size') == 'all'):?>selected="selected"<?php endif;?>>Все</option>
                                <?php $model = new Product;?>
                                <?php foreach ($model->getSizesArray() as $size):?>
                                    <option value="<?= StaticFunction::addGetParamToCurrentUrl('size', $size) ?>" <?php if(Yii::$app->request->get('size') && Yii::$app->request->get('size') == $size):?>selected="selected"<?php endif;?>><?=$size?></option>
                                <?php endforeach;?>
                            </select>
                        </label>
                    </div>
                </div><!-- /.widget -->
                <div class="widget">
                    <h3 class="widget-title">Цвет</h3>
                    <div class="wiget-content">
                        <div class="colors square">
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('color', 'all') ?>" title="На задано">
                                <span class="color white all <?php if(!Yii::$app->request->get('color') || Yii::$app->request->get('color') == 'all'):?>active<?php endif;?>"></span>
                            </a>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('color', 'Азалия') ?>" title="Азалия">
                                <span class="color red <?php if(Yii::$app->request->get('color') && Yii::$app->request->get('color') == 'Азалия'):?>active<?php endif;?>"></span>
                            </a>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('color', 'Жемчужный') ?>" title="Жемчужный">
                                <span class="color beige <?php if(Yii::$app->request->get('color') && Yii::$app->request->get('color') == 'Жемчужный'):?>active<?php endif;?>"></span>
                            </a>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('color', 'Синий') ?>" title="Синий">
                                <span class="color blue <?php if(Yii::$app->request->get('color') && Yii::$app->request->get('color') == 'Синий'):?>active<?php endif;?>"></span>
                            </a>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('color', 'Черный') ?>" title="Черный">
                                <span class="color dark <?php if(Yii::$app->request->get('color') && Yii::$app->request->get('color') == 'Черный'):?>active<?php endif;?>"></span>
                            </a>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('color', 'Серый') ?>" title="Серый">
                                <span class="color gray <?php if(Yii::$app->request->get('color') && Yii::$app->request->get('color') == 'Серый'):?>active<?php endif;?>"></span>
                            </a>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('color', 'Белый') ?>" title="Белый">
                                <span class="color white <?php if(Yii::$app->request->get('color') && Yii::$app->request->get('color') == 'Белый'):?>active<?php endif;?>"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="widget woocommerce widget_product_prices">
                    <h3 class="widget-title">Цена</h3>
                    <ul>
                        <li <?php if(!Yii::$app->request->get('price') || Yii::$app->request->get('price') == 'all'):?>class="active"<?php endif;?>>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('price', 'all') ?>" title="Не задано">Не задано</a>
                        </li>
                        <li <?php if(Yii::$app->request->get('price') && Yii::$app->request->get('price') == '0,1000'):?>class="active"<?php endif;?>>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('price', '0,1000') ?>" title="">0₽ - 1000₽</a>
                        </li>
                        <li <?php if(Yii::$app->request->get('price') && Yii::$app->request->get('price') == '1000,3000'):?>class="active"<?php endif;?>>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('price', '1000,3000') ?>" title="">1000₽ - 3000₽</a>
                        </li>
                        <li <?php if(Yii::$app->request->get('price') && Yii::$app->request->get('price') == '3000,5000'):?>class="active"<?php endif;?>>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('price', '3000,5000') ?>" title="">3000₽ - 5000₽</a>
                        </li>
                        <li <?php if(Yii::$app->request->get('price') && Yii::$app->request->get('price') == '5000,10000'):?>class="active"<?php endif;?>>
                            <a href="<?= StaticFunction::addGetParamToCurrentUrl('price', '5000,10000') ?>" title="">5000₽ - 10000₽</a>
                        </li>
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
