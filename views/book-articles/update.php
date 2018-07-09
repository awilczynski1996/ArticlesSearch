<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BookArticles */

$this->title = 'Update Book Articles: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Book Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="book-articles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
