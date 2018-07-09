<?php

use yii\db\Migration;

/**
 * Handles the creation of table `books`.
 */
class m180709_100720_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'description' => $this->text()
        ]);

        $this->createIndex('idx-books-id', 'books', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('books');
    }
}
