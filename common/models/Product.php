<?php

namespace common\models;

use yii\behaviors\SluggableBehavior;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property integer $category_id
 * @property string $price
 * @property string $article
 * @property string $sex
 * @property integer $is_in_stock
 * @property integer $is_active
 * @property integer $is_novelty
 * @property string $color
 * @property string $structure
 * @property string $time
 *
 * @property Image[] $images
 * @property OrderItem[] $orderItems
 * @property Category $category
 * @property ProductSizes[] $productSizes
 */
class Product extends \yii\db\ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'product';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['category_id', 'is_in_stock', 'is_active', 'is_novelty'], 'integer'],
            [['price'], 'number'],
            [['time, color'], 'safe'],
            [['title', 'slug', 'article', 'sex', 'structure'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'slug' => 'Slug',
            'description' => 'Описание',
            'category_id' => 'Категория',
            'price' => 'Цена',
            'article' => 'Артикул',
            'sex' => 'Пол',
            'is_in_stock' => 'В наличии',
            'is_active' => 'Показывать',
            'is_novelty' => 'Новинка',
            'color' => 'Цвет',
            'structure' => 'Состав',
            'time' => 'Время создания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSizes()
    {
        return $this->hasMany(ProductSizes::className(), ['product_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    public function getColors()
    {
        $models = $this->find()->all();
        $colors = [];
        foreach ($models as $m)
        {
            $cs = explode(",",$m->color);
            foreach ($cs as $c)
            {
                if (!in_array($c,$colors))
                {
                    $colors[$c] = $c;
                }
            }
        }
        return $colors;
    }
}
