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
<?php $iCdArr = []; $iCd = 1; $iCdi = 0; foreach($arrGet as $item ) { $iCdArr[$iCdi] = date("m", strtotime($item["month"])); ?>
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

                <?php $iCdN = $iCdi-1; if( $iCdi == 0 ){ ?>
                        <?= $iCd ?></br>
                <?php }else{ ?>
                        <?php  if( $iCdArr[$iCdN] === $iCdArr[$iCdi] ) { ?>
                                <?= $iCd ?></br>
                        <?php }else{  $iCd = 1; ?>
                                <?= $iCd ?></br>
                        <?php } ?>
                <?php } ?>
        </div>
    </div>
<?php $iCdi++; $iCd++;}?>

<?php
//$file = $_SERVER['DOCUMENT_ROOT'].'/good.txt';
//$current = file_get_contents($file);
// $ps = $_SERVER["REMOTE_ADDR"];
// echo $ps.' date: '.date("d-m-Y H:i:s").' url: '.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].' ';
//file_put_contents($file, $current);

?>
</div>
</div>
</div>
