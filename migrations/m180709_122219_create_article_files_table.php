<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_files`.
 */
class m180709_122219_create_article_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article_files', [
            'id' => $this->primaryKey(),
            'hash' => $this->text(),
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
        $this->dropTable('article_files');
    }
}
