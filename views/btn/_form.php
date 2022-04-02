<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Btn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="btn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'time')->textInput(); ?>


    <?= $form->field($model, 'curency')->textInput() ->dropDownList([
		'USD' => 'USD',
		'Bitcoin' => 'Bitcoin',
	]); ?>

    <?= $form->field($model, 'summa')->textInput() ?>

    <?= $form->field($model, 'exchange')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
