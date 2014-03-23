<?
$this->pageTitle = Yii::app()->name . ' - Предолжить кандидата';
$this->breadcrumbs = array(
    'Предложить своего кандидада',
);
?>
<div class="form">
    <?
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contact-form',
        'enableClientValidation' => true,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
        <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 128)); ?>
<?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'about'); ?>
<?php $this->widget('application.extensions.ckeditor.CKEditor', array('model' => $model, 'attribute' => 'about', 'language' => 'ru', 'editorTemplate' => 'full',)); ?>
<?php echo $form->error($model, 'about'); ?>
    </div>
   <div class="row">
        <?php echo $form->labelEx($model, 'biografy'); ?>
<?php $this->widget('application.extensions.ckeditor.CKEditor', array('model' => $model, 'attribute' => 'biografy', 'language' => 'ru', 'editorTemplate' => 'full',)); ?>
<?php echo $form->error($model, 'about'); ?>
    </div> 

    <div class="row">
        <?php echo $form->labelEx($model, 'picture'); ?>
<?php echo $form->fileField($model, 'picture'); ?>
        <?php echo $form->error($model, 'picture'); ?>
    </div>
    <div class="row">
            <?php if (CCaptcha::checkRequirements() && Yii::app()->user->isGuest): ?>
            <p>
    <?php echo CHtml::activeLabelEx($model, 'verifyCode') ?>
                <?php $this->widget('CCaptcha') ?>
            </p>
            <p>
            <?php echo CHtml::activeTextField($model, 'verifyCode') ?>
            <?php echo CHtml::error($model, 'verifyCode') ?>
            </p>
<?php endif ?>
    </div>  

    <div class="row buttons">
    <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>
</div>