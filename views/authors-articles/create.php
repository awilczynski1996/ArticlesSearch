<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthorsArticles */

$this->title = 'Create Authors Articles';
$this->params['breadcrumbs'][] = ['label' => 'Authors Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
