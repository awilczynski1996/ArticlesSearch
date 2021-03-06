<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;


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
    /**
     * @var UploadedFile
     */
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
            [['file'], 'file', 'maxSize' => 10000000]
        ];
    }

    public function upload()
    {
        $filesConfig = Yii::$app->getComponents()['files'];
        $dirId = ceil((ArticleFiles::find()->max('id') + 1) / $filesConfig['files_limit']);

        if($this->validate()) {
            $path = $filesConfig['path'] . DIRECTORY_SEPARATOR . $dirId . DIRECTORY_SEPARATOR;

            FileHelper::createDirectory($path);
            $this->file->saveAs($path . $this->hash . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
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
