<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categories, 'id', 'title')) ?>

    <?= $form->field($model, 'is_in_stock')->checkbox() ?>

    <?= $form->field($model, 'is_active')->checkbox() ?>

    <?= $form->field($model, 'is_novelty')->checkbox() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->dropDownList(['female' => 'Женский', 'male' => 'Мужской']) ?>

    <?= $form->field($model, 'color')->widget(Select2::classname(), [
        'options' => [
            'multiple' => true,
            'placeholder' => Yii::t('app','Выберите цвет ...'),
        ],
        'data'=>$model->getColorsArray(),
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators'=>[',',' '],
        ],
    ]) ?>

    <?= $form->field($model, 'sizes')->widget(Select2::classname(), [
        'options' => [
            'multiple' => true,
            'placeholder' => Yii::t('app','Выберите размер ...'),
        ],
        'data'=>$model->getSizesArray(),
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators'=>[',',' '],
        ],
    ]) ?>

    <?= $form->field($model, 'structure')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
