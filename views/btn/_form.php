<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Btn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="btn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'time')->widget(
    DatePicker::class, 
    [
        'model' => $model,
                'value' => $model->time,
                'attribute' => 'date',
                'language' => 'ru',
                
                'options' => ['placeholder' => 'Выбрать дату'],
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'format' => 'yyyy-mm-dd'
    ]
    ]); ?>

    <?= $form->field($model, 'curency')->textInput() ?>

    <?= $form->field($model, 'summa')->textInput() ?>

    <?= $form->field($model, 'exchange')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
