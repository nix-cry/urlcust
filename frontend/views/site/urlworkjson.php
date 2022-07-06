<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\UrlJson $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Короткие ссылки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Создание ссылки
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'url-work-json']); ?>

                <?= $form->field($model, 'nameurl')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Создать', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
                </div>

               
                
                <label>Выша короткая ссылка</label>: <?= Html::encode("{$newurl}") ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
