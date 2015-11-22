<?php
/* @var $this EventoController */
/* @var $data Evento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEvento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEvento), array('view', 'id'=>$data->idEvento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_event')); ?>:</b>
	<?php echo CHtml::encode($data->name_event); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_event')); ?>:</b>
	<?php echo CHtml::encode($data->description_event); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_event')); ?>:</b>
	<?php echo CHtml::encode($data->start_event); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Categoria_idCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->Categoria_idCategoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Direccion_idDireccion')); ?>:</b>
	<?php echo CHtml::encode($data->Direccion_idDireccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Patrocinador_idPatrocinador')); ?>:</b>
	<?php echo CHtml::encode($data->Patrocinador_idPatrocinador); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	*/ ?>

</div>