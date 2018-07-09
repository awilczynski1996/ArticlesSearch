<?php

use yii\db\Migration;

/**
 * Handles the creation of table `authors`.
 */
class m180709_100729_create_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('authors', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'surname' => $this->text()->notNull()
        ]);

        $this->createIndex('idx-authors-id', 'authors', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('authors');
    }
}
