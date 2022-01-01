<?php

/* @var $this yii\web\View */
/* @var string $stringHash */

use yii\widgets\Pjax;
use yii\helpers\Html;

$this->title = Yii::$app->name;

?>

<div class="jumbotron">
    <h1>php utils</h1>
</div>


<?php Pjax::begin(['enablePushState' => false]); ?>

BCrypt Hash:
<?= Html::beginForm(['site/index'], 'post', ['data-pjax' => '', 'class' => 'form-inline']) ?>
<?= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']) ?>
<?= Html::submitButton('Generate', ['class' => 'btn btn-flat btn-primary', 'name' => 'hash-button']) ?>
<?= Html::endForm() ?>
<h3><?= $stringHash ?></h3>

<?php Pjax::end(); ?>

