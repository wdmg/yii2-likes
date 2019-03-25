<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model wdmg\likes\models\Likes */

$this->title = Yii::t('app/modules/likes', 'Update Likes: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/likes', 'Likes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/modules/likes', 'Update');
?>
<div class="likes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
