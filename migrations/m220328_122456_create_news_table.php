<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m220328_122456_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
   /*      $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
			
			
        ]);
		 */
		$this->createTable('news', [
            'id' => 'pk',
            'time' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'content' => Schema::TYPE_TEXT,
        ]);

        $this->insert('news', [
            'time' => '1648475250',
            'content' => 'content 1',
        ]);
			
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }
}
