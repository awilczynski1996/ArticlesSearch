<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book_articles`.
 */
class m180709_113902_create_book_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('book_articles', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'article_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('fk-book-id', 'book_articles', 'book_id', 'authors', 'id');
        $this->addForeignKey('fk-article-id', 'book_articles', 'article_id', 'articles', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('book_articles');
    }
}
