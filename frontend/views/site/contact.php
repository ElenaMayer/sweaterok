<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="contact-wrapper">
    <div class="margin-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-content">
                        <h2>Наши магазины</h2>

                        <div class="contact-block">
                            <dl class="dl-horizontal">
                                <dt>Адрес</dt>
                                <dd>Новосибирск, пр.Дзержинского, 2/2, ТЦ “Холидей Family“, 2 этаж</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Часы работы</dt>
                                <dd>Ежедневно, с 10 до 21 часов</dd>
                            </dl>
                            <div class="contact-header">
                                <div class="contact-image">
                                    <img src="/img/samples/banners/contact/banner-contact-1.jpg" alt="">
                                </div>
                            </div><!-- /.contact-header -->
                        </div><!-- /.contact-block -->

                        <div class="contact-block">
                            <dl class="dl-horizontal">
                                <dt>Адрес</dt>
                                <dd>Новосибирск, ул. Курчатова,1, ТЦ “Голден Парк“, 3 этаж</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Часы работы</dt>
                                <dd>Ежедневно, с 10 до 22 часов</dd>
                            </dl>
                        </div><!-- /.contact-block -->

                        <div class="contact-block">
                            <dl class="dl-horizontal">
                                <dt>Адрес</dt>
                                <dd>Новосибирск, Троллейная, 130а, ТРК “Континент”, 2 этаж</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Часы работы</dt>
                                <dd>Ежедневно, с 10 до 22 часов</dd>
                            </dl>
                        </div><!-- /.contact-block -->

                        <div class="contact-block">
                            <dl class="dl-horizontal">
                                <dt>Адрес</dt>
                                <dd>Кемерово, пр.Ленина, 50</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Часы работы</dt>
                                <dd>Ежедневно, с 10 до 19 часов</dd>
                            </dl>
                        </div><!-- /.contact-block -->

                    </div><!-- /.contact-content -->
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <div class="contact-content">
                        <div class="contact-form-heading">
                            <h2>Напишите нам</h2>
                        </div><!-- /.contact-content -->

                        <div id="ajax-message"></div>

                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control dark']); ?>
                        <?= $form->field($model, 'email')->textInput(['class' => 'form-control dark']); ?>
                        <?= $form->field($model, 'subject')->textInput(['class' => 'form-control dark']); ?>
                        <?= $form->field($model, 'body')->textArea(['rows' => 6, 'class' => 'form-control dark']); ?>
                        <?= $form->field($model, 'verifyCode')->textInput(['class' => 'form-control dark'])->widget(Captcha::className(), [
                            'template' => '<div class="row dark"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>
                        <div class="form-group">
                            <?= Html::submitButton('Отправить', ['class' => 'btn btn-lg btn-dark', 'name' => 'contact-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.margin-bottom-100 -->

    <div class="contact-map" id="contact-map"  data-lat="-37.849333" data-lng="144.962086">
        <!-- // -->
    </div><!-- /.contact-map -->

</div><!-- /.contact-wrapper -->
