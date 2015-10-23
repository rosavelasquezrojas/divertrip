<?php

class PatrocinadorController extends Controller
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
				'actions'=>array('index','view','login'),
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

	/*public function actionLogin()
	{
		$user = Patrocinador::model()->findAll();
		$user_array = array_map(create_function('$m',
            'return $m->getAttributes(array(\'idPatrocinador\',
            	\'first_name\',\'last_name\',
            	\'Login_user_name\',\'Login_password\',
            	\'Estado_idEstado\'));')
        	,$user);
        	echo json_encode($user_array);
	}*/
	public function actionLogin($user_name, $passwd){
		
		if(isset($user_name) && isset($passwd)){
			$criteria = new CDbCriteria();
			$criteria->select = 'idPatrocinador, first_name, last_name, Login_user_name, Login_password, Estado_idEstado' ;
			$criteria->condition = 'Login_user_name=:user AND Login_password=:pass';
			$criteria->params = array(':user'=>$user_name, ':pass'=>$passwd);
			$user = Patrocinador::model()->find($criteria);
			echo CJSON::encode($user);
		}
	}
}