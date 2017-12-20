<?php

namespace common\models;

use yii\behaviors\SluggableBehavior;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $slug
 * @property integer $is_active
 * @property string $description
 * @property string $time
 *
 * @property Category $parent
 * @property Category[] $categories
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['parent_id', 'is_active'], 'integer'],
            [['time'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'title' => 'Название',
            'slug' => 'Slug',
            'is_active' => 'Показывать',
            'description' => 'Описание',
            'imageFile' => 'Картинка для главной (540х980)',
            'time' => 'Time',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if($this->imageFile)
                $this->imageFile->saveAs($this->getImagePath());
            return true;
        } else {
            return false;
        }
    }

    public function getImagePath()
    {
        return Yii::getAlias('@frontend/web/uploads/category/' . $this->slug . '.jpg');
    }

    /**
     * @return string URL of the image
     */
    public function getImageUrl()
    {
        return Yii::getAlias('@web/uploads/category/' . $this->slug . '.jpg');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
