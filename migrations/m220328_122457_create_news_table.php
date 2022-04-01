<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m220328_122457_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
 
		$this->createTable('btn', [
            'id' => 'pk',
            'time' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'curency' => Schema::TYPE_CHAR . '(7) NOT NULL',
            'summa' => Schema::TYPE_FLOAT,
            'exchange' => Schema::TYPE_FLOAT,
        ]);

        $this->insert('btn', [
            'time' => '1648475250',
            'curency' => 'USD',
            'summa' => '100',
            'exchange' => '1',
        ]);
			
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('btn');
    }
}
