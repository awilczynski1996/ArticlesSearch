<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BookArticles */

$this->title = 'Create Book Articles';
$this->params['breadcrumbs'][] = ['label' => 'Book Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
