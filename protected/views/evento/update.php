<?php
/* @var $this EventoController */
/* @var $model Evento */

$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	$model->idEvento=>array('view','id'=>$model->idEvento),
	'Update',
);

$this->menu=array(
	array('label'=>'List Evento', 'url'=>array('index')),
	array('label'=>'Create Evento', 'url'=>array('create')),
	array('label'=>'View Evento', 'url'=>array('view', 'id'=>$model->idEvento)),
	array('label'=>'Manage Evento', 'url'=>array('admin')),
);
?>

<h1>Update Evento <?php echo $model->idEvento; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>