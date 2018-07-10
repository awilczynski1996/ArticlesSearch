<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $article_id int */
/* @var $files app\models\ArticleFiles[] */

$this->title = 'Files List';
$this->params['breadcrumbs'][] = ['label' => 'Articles Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Upload file', ['upload', 'id' => $article_id], ['class' => 'btn btn-success']) ?>
    </p>

    <table>
        <thead>
            <tr>
                <th>File name</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($files as $file): ?>
                <tr>
                    <td><?= $file->name. "." . $file->extension; ?></td>
                    <td><a href="<?= \yii\helpers\Url::to(['articles/download', 'fileId' => $file->id], true); ?>" >downlaod</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
