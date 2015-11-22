<?php
/* @var $this EventoController */
/* @var $model Evento */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evento-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name_event'); ?>
		<?php echo $form->textField($model,'name_event',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name_event'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description_event'); ?>
		<?php echo $form->textField($model,'description_event',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'description_event'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_event'); ?>
		<?php echo $form->textField($model,'start_event'); ?>
		<?php echo $form->error($model,'start_event'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Categoria_idCategoria'); ?>
		<?php echo $form->textField($model,'Categoria_idCategoria'); ?>
		<?php echo $form->error($model,'Categoria_idCategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Direccion_idDireccion'); ?>
		<?php echo $form->textField($model,'Direccion_idDireccion'); ?>
		<?php echo $form->error($model,'Direccion_idDireccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Patrocinador_idPatrocinador'); ?>
		<?php echo $form->textField($model,'Patrocinador_idPatrocinador'); ?>
		<?php echo $form->error($model,'Patrocinador_idPatrocinador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textArea($model,'image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->