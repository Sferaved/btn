<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "btn".
 *
 * @property int $id
 * @property int $time
 * @property string $curency
 * @property float|null $summa
 * @property float|null $exchange
 */
class Btn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'btn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time', 'curency'], 'required'],
            [['time'], 'required'],
            [['curency'], 'string'],
            [['summa', 'exchange'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'curency' => 'Curency',
            'summa' => 'Summa',
            'exchange' => 'Exchange',
        ];
    }
}
