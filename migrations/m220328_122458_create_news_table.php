<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m220328_122458_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
 
		$this->createTable('btn', [
            'id' => 'pk',
            'time' => Schema::TYPE_DATETIME,
            'curency' => Schema::TYPE_CHAR . '(7) NOT NULL',
            'summa' => Schema::TYPE_FLOAT,
            'exchange' => Schema::TYPE_FLOAT,
        ]);

        $this->insert('btn', [
            'time' => '',
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
