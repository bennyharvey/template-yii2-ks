<?php
use yii\widgets\Pjax;
use yii\helpers\Html;

/** @var object $adUser */
?>


<?php Pjax::begin(['enablePushState' => false]); ?>

<?php
$thumbnail = (!$adUser == null) ? $adUser->getThumbnail() : null;
$thumbnail = (!$thumbnail) ?
    "src=".Yii::getAlias('@web')."'/images/user_default.png'"
    : "src='data:image/jpeg;base64,".base64_encode($thumbnail)."'";

?>

User lookup:
<?= Html::beginForm(['ad/index'], 'get', ['data-pjax' => '', 'class' => 'form-inline']) ?>
<?= Html::input('text', 'userLogin', Yii::$app->request->get('userLogin'), ['class' => 'form-control']) ?>
<?= Html::submitButton('Find', ['class' => 'btn btn-flat btn-primary', 'name' => 'hash-button']) ?>
<?= Html::endForm() ?>
<br>
<?php if (!is_null($adUser)) { ?>
    <img style='width: 200px' <?= $thumbnail ?>/>
    <p> <b> Full Name: </b> <?= $adUser['cn'][0] ?></p>
    <p> <b> Title: </b> <?= $adUser['title'][0] ?? '' ?></p>
    <p> <b> Mail: </b> <?= $adUser['mail'][0] ?? '' ?></p>
    <p> <b> userprincipalname: </b> <?= $adUser['userprincipalname'][0] ?? '' ?></p>
    <p> <b> Department: </b> <?= $adUser['department'][0] ?? '' ?></p>
    <p> <b> Company: </b> <?= $adUser['company'][0] ?? '' ?></p>
    <p> <b> telephonenumber: </b> <?= $adUser['telephonenumber'][0] ?? '' ?></p>
    <p> <b> Mobile: </b> <?= $adUser['mobile'][0] ?? '' ?></p>
    <p> <b> whencreated: </b> <?= $adUser['whencreated'][0] ?? '' ?></p>
    <p> <b> msexchwhenmailboxcreated: </b> <?= $adUser['msexchwhenmailboxcreated'][0] ?? '' ?></p>
    <p> <b> Description: </b> <?= $adUser['description'][0] ?? '' ?></p>
    <p> <b> physicaldeliveryofficename: </b> <?= $adUser['physicaldeliveryofficename'][0] ?? '' ?></p>
    <p> <b> manager: </b> <?= $adUser['manager'][0] ?? '' ?></p>
    <p> <b> Description: </b> <?= $adUser['description'][0] ?? '' ?></p>
    <?php dump($adUser) ?>
<?php } ?>


<?php Pjax::end(); ?>
