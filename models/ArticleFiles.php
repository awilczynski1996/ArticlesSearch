<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_files".
 *
 * @property int $id
 * @property string $hash
 * @property string $name
 * @property string $extension
 */
class ArticleFiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hash', 'name', 'extension'], 'string'],
            [['name', 'extension'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hash' => 'Hash',
            'name' => 'Name',
            'extension' => 'Extension',
        ];
    }
}
