<?php

use common\models\User;
use yii\helpers\Html;
use kartik\icons\FontAwesomeAsset;

// FontAwesomeAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */

$user = User::getCurrent();

backend\assets\AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<!-- <body class="hold-transition skin-black-light fixed sidebar-mini"> -->
<!-- <body class="skin-purple fixed sidebar-mini"> -->
<!-- <body class="skin-black-light sidebar-image fixed sidebar-mini"> -->
<body class="hold-transition <?= $user->getTheme() ?> sidebar-mini fixed-without-expand <?= $user->getSidebarCollapsed() ? 'sidebar-collapse' : '' ?>">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>

    <?= $this->render(
        'left.php',
        ['directoryAsset' => $directoryAsset]
    )
    ?>

    <?= $this->render(
        'content.php',
        ['content' => $content, 'directoryAsset' => $directoryAsset]
    ) ?>
    <?= $this->render('modal.php') ?>


</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
