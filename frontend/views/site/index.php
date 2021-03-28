<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $provider \yii\data\ArrayDataProvider*/
/* @var $model \core\forms\GitHubSearchForm*/

?>
<div class="site-index">
    <?php

    ?>
    <div class="site-login">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-md-12">
                <?php $form = ActiveForm::begin([
                        'id' => 'search-form',
                        'action' => 'request',
                        'method' => 'get'
                ]); ?>
                <?= $form->field($model, 'search')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>


</div>
