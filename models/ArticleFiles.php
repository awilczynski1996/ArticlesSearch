<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_files".
 *
 * @property int $id
 * @property int $article_id
 * @property string $hash
 * @property string $name
 * @property string $extension
 *
 * @property Articles $article
 */
class ArticleFiles extends \yii\db\ActiveRecord
{
    public $file;
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
            [['article_id'], 'integer'],
            [['hash', 'name', 'extension'], 'string'],
            [['name', 'extension'], 'required'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['article_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'hash' => 'Hash',
            'name' => 'Name',
            'extension' => 'Extension',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['id' => 'article_id']);
    }
}
