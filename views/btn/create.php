<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Btn */

$this->title = 'Create Btn';
$this->params['breadcrumbs'][] = ['label' => 'Btns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="btn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
