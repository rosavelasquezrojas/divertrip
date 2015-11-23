<?php
class LoginController extends Controller
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
				'actions'=>array('view','setNewPassword'),
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

	public function actionSetNewPassword($id_Patrocinador,$passwd,$newpasswd){
		$password_array='error';
		if(!empty($id_Patrocinador) && !(empty($passwd)) && !(empty($newpasswd))){
			//$model=$this->loadModel($idPatrocinador);
			$avatar=Login::model()->findByAttributes(array('password'=>$passwd));
			if(!empty($avatar)){
				$avatar->attributes=array('password'=>$newpasswd);
				$avatar->save();
				$password_array='success';
			}
		}
		echo json_encode($password_array);
	}
}