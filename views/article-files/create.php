<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArticleFiles */

$this->title = 'Create Article Files';
$this->params['breadcrumbs'][] = ['label' => 'Article Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-files-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
