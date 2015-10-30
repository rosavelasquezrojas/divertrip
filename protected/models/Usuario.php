<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $idUsuario
 * @property string $first_name
 * @property string $last_name
 * @property string $latitud
 * @property string $longitud
 * @property string $Login_user_name
 * @property string $Login_password
 * @property integer $Preferencia_idPreferencia
 *
 * The followings are the available model relations:
 * @property Categoria[] $categorias
 * @property Login $loginUserName
 * @property Login $loginPassword
 * @property Preferencia $preferenciaIdPreferencia
 * @property UsuarioBuscaLugar[] $usuarioBuscaLugars
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Login_user_name, Login_password, Preferencia_idPreferencia', 'required'),
			array('Preferencia_idPreferencia', 'numerical', 'integerOnly'=>true),
			array('first_name', 'length', 'max'=>12),
			array('last_name, latitud, longitud', 'length', 'max'=>45),
			array('Login_user_name, Login_password', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUsuario, first_name, last_name, latitud, longitud, Login_user_name, Login_password, Preferencia_idPreferencia', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'categorias' => array(self::MANY_MANY, 'Categoria', 'filtro_usuario(Usuario_idUsuario, Categoria_idCategoria)'),
			'loginUserName' => array(self::BELONGS_TO, 'Login', 'Login_user_name'),
			'loginPassword' => array(self::BELONGS_TO, 'Login', 'Login_password'),
			'preferenciaIdPreferencia' => array(self::BELONGS_TO, 'Preferencia', 'Preferencia_idPreferencia'),
			'usuarioBuscaLugars' => array(self::HAS_MANY, 'UsuarioBuscaLugar', 'Usuario_idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUsuario' => 'Id Usuario',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'latitud' => 'Latitud',
			'longitud' => 'Longitud',
			'Login_user_name' => 'Login User Name',
			'Login_password' => 'Login Password',
			'Preferencia_idPreferencia' => 'Preferencia Id Preferencia',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('latitud',$this->latitud,true);
		$criteria->compare('longitud',$this->longitud,true);
		$criteria->compare('Login_user_name',$this->Login_user_name,true);
		$criteria->compare('Login_password',$this->Login_password,true);
		$criteria->compare('Preferencia_idPreferencia',$this->Preferencia_idPreferencia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
