<?php

class EventoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	//permisos
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','getEventsList'),
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	//Rolo
	public function actionGetEventsList()
	{
		$model = Evento::model()->findAll();
        //$posts=$user->posts(array('condition'=>'status=1'));

        $event_array = array_map(create_function('$m',
            'return $m->getAttributes(array(\'idEvento\',
            	\'name_event\',\'description_event\',
            	\'Categoria_idCategoria\',\'Direccion_idDireccion\',
            	\'Patrocinador_idPatrocinador\',\'date\',
            	\'hour\'));')
        	,$model
        );
		echo json_encode($event_array);
		//print_r($event_array);
	}

}	
