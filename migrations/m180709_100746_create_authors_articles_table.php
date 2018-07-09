<?php

use yii\db\Migration;

/**
 * Handles the creation of table `authors_articles`.
 */
class m180709_100746_create_authors_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('authors_articles', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'article_id' => $this->integer()->notNull()
        ]);

        $this->createIndex('idx-authors_articles-id', 'authors_articles', 'id');
        $this->createIndex('idx-authors_articles-author_id', 'authors_articles', 'author_id');
        $this->createIndex('idx-authors_articles-article_id', 'authors_articles', 'article_id');

        $this->addForeignKey('fk-authors-id', 'authors_articles', 'author_id', 'authors', 'id');
        $this->addForeignKey('fk-articles-id', 'authors_articles', 'article_id', 'articles', 'id');
}

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('authors_articles');
    }
}
