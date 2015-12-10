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
				'actions'=>array('index','view','login','setNewPassword'),
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

	public function actionRestorePassword($email) {
		$emptyResult = '{"email": null}';
		if(isset($email)) {
			$criteria = new CDbCriteria();
			$criteria->select = 'email';
			$criteria->condition = 'email = :email';
			$criteria->params = array(':email' => $email);
			$em = Patrocinador::model()->find($criteria);
			if($em != null) {
				/**
				 * [$random_password Genera una password aleatoria según el tiempo, acortándola a 10 caracteres.]
				 * @var [string]
				 */
				$random_password = substr(md5(time()), 0, 10);

				/* Guardar */
				$pat = Patrocinador::model()->findByAttributes(array('email' => $email));
				$log = Login::model()->findByAttributes(array('user_name' => $pat->Login_user_name, 'password' => $pat->Login_password));
				if(!empty($log)) {
					$log->attributes = array('password' => $random_password);
					$log->save();
				}
				/* Enviar correo */
				$mail = new YiiMailer();
				//$mail->clearLayout();//if layout is already set in config
				$mail->setFrom(Yii::app()->params['adminEmail'], Yii::app()->name);
				$mail->setTo($email);
				$mail->setSubject('Recuperar contraseña');
				$mail->setBody('Se acaba de restablecer su contraseña. Su contraseña nueva es <b>' . $random_password . '</b>');
				$mail->send();
			}
			echo ($em == null ? $emptyResult : CJSON::encode($em));
		} else {
			echo $emptyResult;
		}
	}
}
