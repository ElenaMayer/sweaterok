<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use Yii;

class CatalogController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }

    public function actionList($slug = null)
    {
        /** @var Category $category */
        $category = null;

        $categories = Category::find()->indexBy('id')->orderBy('id')->all();

        $productsQuery = Product::find();

        if ($slug !== null) {
            $category = Category::find()->where(['slug' => $slug])->one();
        }
        if ($category) {
            $productsQuery->where(['category_id' => $this->getCategoryIds($categories, $category->id)]);
        }

        $productsDataProvider = new ActiveDataProvider([
            'query' => $productsQuery,
            'pagination' => [
                'pageSize' => Yii::$app->params['catalogPageSize'],
            ],
        ]);

        return $this->render('list', [
            'category' => $category,
            'menuItems' => $this->getMenuItems($categories, isset($category->id) ? $category->id : null),
            'models' => $productsDataProvider->getModels(),
            'pagination' => $productsDataProvider->getPagination(),
            'pageCount' => $productsDataProvider->getCount(),
        ]);
    }

    public function actionProduct($categorySlug, $productId)
    {
        $category = Category::find()->where(['slug' => $categorySlug])->one();
        $product = Product::find()->where(['id' => $productId])->one();

        return $this->render('product', [
            'category' => $category,
            'product' => $product,
        ]);
    }

    /**
     * @param Category[] $categories
     * @param int $activeId
     * @param int $parent
     * @return array
     */
    private function getMenuItems($categories, $activeId = null, $parent = null)
    {
        $menuItems = [];
        foreach ($categories as $category) {
            if ($category->parent_id === $parent) {
                $menuItems[$category->id] = [
                    'active' => $activeId === $category->id,
                    'label' => $category->title,
                    'url' => ['catalog/list', 'id' => $category->id],
                    'items' => $this->getMenuItems($categories, $activeId, $category->id),
                ];
            }
        }
        return $menuItems;
    }

    /**
     * Returns IDs of category and all its sub-categories
     *
     * @param Category[] $categories all categories
     * @param int $categoryId id of category to start search with
     * @param array $categoryIds
     * @return array $categoryIds
     */
    private function getCategoryIds($categories, $categoryId, &$categoryIds = [])
    {
        foreach ($categories as $category) {
            if ($category->id == $categoryId) {
                $categoryIds[] = $category->id;
            }
            elseif ($category->parent_id == $categoryId){
                $this->getCategoryIds($categories, $category->id, $categoryIds);
            }
        }
        return $categoryIds;
    }
}
