<?php

use yii\db\Migration;

/**
 * Handles the creation of table `books_articles`.
 */
class m180709_100757_create_books_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books_articles', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'article_id' => $this->integer()->notNull()
        ]);

        $this->createIndex('idx-books_articles-id', 'books_articles', 'id');
        $this->createIndex('idx-books_articles-book_id', 'books_articles', 'book_id');
        $this->createIndex('idx-books_articles-article_id', 'books_articles', 'article_id');

        $this->addForeignKey('fk-book-id', 'books_articles', 'book_id', 'authors', 'id');
        $this->addForeignKey('fk-article-id', 'books_articles', 'article_id', 'articles', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('books_articles');
    }
}
