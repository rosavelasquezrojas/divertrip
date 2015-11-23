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
	/*public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}*/

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create','view', 'getEventsList','getEventsListByPartner'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
    {
        //read the post input (use this technique if you have no post variable name):
		$post = file_get_contents("php://input");

		//decode json post input as php array:
		$data = CJSON::decode($post, true);

		//Event is a Yii model:
		$evento = new Evento();

		//load json data into model:
		$evento->attributes = $data;

		//this is for responding to the client:
		$response = array();

		//save model, if that fails, get its validation errors:
		if ($evento->save() == false) {
			$response['success'] = false;
			$response['errors'] = $evento->errors;
		} else {
			$response['success'] = true;

			//respond with the saved contact in case the model/db changed any values
			//$response['evento'] = $evento; 
		}

		//respond with json content type:
		header('Content-type:application/json');


		//encode the response as json:
		echo CJSON::encode($response);

		exit();
    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evento']))
		{
			$model->attributes=$_POST['Evento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEvento));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Evento');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Evento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Evento']))
			$model->attributes=$_GET['Evento'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Evento the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Evento::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/////////////////////////////////////////////////////////////////////////
	/*Funciones agregadas de acuerdo al proyecto.*/
	//Devuelve la lista de eventos disponibles - sin filtro
	public function actionGetEventsList()
	{
		$model = Evento::model()->findAll();
        //$posts=$user->posts(array('condition'=>'status=1'));

        $event_array = array_map(create_function('$m',
            'return $m->getAttributes(array(\'idEvento\',
            	\'name_event\',\'description_event\',
            	\'Categoria_idCategoria\',\'Patrocinador_idPatrocinador\',
            	\'start_event\',\'image\',\'address\', \'latitude\', 
            	\'longitude\'));')
        	,$model
        );
		echo json_encode($event_array);
		//print_r($event_array);
	}
	
	//obtiene los eventos segund el patrocinador.
	public function actionGetEventsListByPartner($id_Patrocinador)
	{
		$event_array="false";
		if(isset($id_Patrocinador)){

			$criteria = new CDbCriteria();
			/*$criteria->attributes = array(':idEvento,:name_event,:description_event,
			:Categoria_idCategoria,:Patrocinador_idPatrocinador,:start_event,
			:image, :address,:latitude,:longitude');*/
			$criteria->condition = 'Patrocinador_idPatrocinador=:idPatrocinador';
			$criteria->params = array(':idPatrocinador'=>$id_Patrocinador);
			$event = Evento::model()->findAll($criteria);

			$event_array = array_map(create_function('$m',
	            'return $m->getAttributes(array(\'idEvento\',
	            	\'name_event\',\'description_event\',
	            	\'Categoria_idCategoria\',\'start_event\',\'image\',
	            	\'address\', \'latitude\',\'longitude\'));')
	        	,$event
	        );
		}
		echo json_encode($event_array);
	}
	/**
	 * Performs the AJAX validation.
	 * @param Evento $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
