<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model wdmg\likes\models\Likes */

$this->title = Yii::t('app/modules/likes', 'Create Likes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/likes', 'Likes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="likes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
