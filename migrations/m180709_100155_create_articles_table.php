<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m180709_100155_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'file_id' => $this->integer()
        ]);

        $this->createIndex('idx-articles-file_id', 'articles', 'file_id');
        $this->addForeignKey('fk-articles_files-id', 'articles', 'file_id', 'articles_files', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('articles');
    }
}
