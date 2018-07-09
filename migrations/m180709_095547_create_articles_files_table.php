<?php

use yii\db\Migration;

/**
 * Handles the creation of table `articles_files`.
 */
class m180709_095547_create_articles_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('articles_files', [
            'id' => $this->primaryKey(),
            'name' =>$this->text()->notNull(),
            'extension' => $this->text()->notNull()
        ]);

        $this->createIndex('idx-articles_files-id', 'articles_files', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('articles_files');
    }
}
