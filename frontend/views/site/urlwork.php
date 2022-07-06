<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\UrlForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Статистика по ссылкам';
$this->params['breadcrumbs'][] = $this->title;

//print_r ($arrGet);
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Таблица с переходами по ссылкам
    </p>


    <div class="table" >
    <div class="row table-success table-striped">
        <div class="col-lg-3">
            
                <p>Месяц</p>
               
           
        </div>
        <div class="col-lg-3">
            
                <p>Ссылка:</p>
                
            
        </div>
        <div class="col-lg-3">
           
                <p>Колличество переходов</p>
               
            
        </div>
        <div class="col-lg-3">
            
                <p>Позиция в топе месяца по переходам</p>
                
            
        </div>
    </div>

<div style="overflow-y: scroll; width:100%;" >
<?php foreach($arrGet as $item ) {?>
    <div class="row">
        <div class="col-lg-3">
            
                
                 <?= $item["month"] ?></br>
            
        </div>
        <div class="col-lg-3" style="
    overflow: hidden;" >
            
               <p>
                <a href="<?= $item["url"] ?>"><?= $item["url"] ?></a></br>
                </p>
        </div>
        <div class="col-lg-3">
            
                
                <?= $item["count"] ?></br>
            
        </div>
        <div class="col-lg-3">
            
                
                <?= $item["count"] ?></br>
            
        </div>
    </div>
<?php }?>
</div>
</div>
</div>
