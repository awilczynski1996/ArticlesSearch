<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\ArticleFiles */

$this->title = 'Create Article Files';
$this->params['breadcrumbs'][] = ['label' => 'Article File Upload', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>
