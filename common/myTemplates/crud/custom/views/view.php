<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Default box -->
<div class="box">
    <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
        <div class="box-header with-border">
            <h3 class="box-title"><?= "<?= " ?>Html::encode($this->title) ?></h3>
        </div>
        <div class="box-body">
            <?= "<?= " ?>Html::a('<span> Manage <?= Inflector::camel2words(StringHelper::basename($generator->modelClass)); ?></span>', ['index'], ['class' => 'btn btn-warning mrg-bot-15']) ?>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary mrg-bot-15']) ?>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-danger mrg-bot-15',
            'data' => [
            'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
            'method' => 'post',
            ],
            ]) ?>

            <?= "<?= " ?>DetailView::widget([
            'model' => $model,
            'attributes' => [
            <?php
            if (($tableSchema = $generator->getTableSchema()) === false) {
                foreach ($generator->getColumnNames() as $name) {
                    echo "            '" . $name . "',\n";
                }
            } else {
                foreach ($generator->getTableSchema()->columns as $column) {
                    $format = $generator->generateColumnFormat($column);
                    echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                }
            }
            ?>
            ],
            ]) ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


