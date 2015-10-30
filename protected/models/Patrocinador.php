<?php

/**
 * This is the model class for table "patrocinador".
 *
 * The followings are the available columns in table 'patrocinador':
 * @property integer $idPatrocinador
 * @property string $first_name
 * @property string $last_name
 * @property string $Login_user_name
 * @property string $Login_password
 * @property integer $Estado_idEstado
 *
 * The followings are the available model relations:
 * @property Evento[] $eventos
 * @property Estado $estadoIdEstado
 * @property Login $loginUserName
 * @property Login $loginPassword
 */
class Patrocinador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'patrocinador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Login_user_name, Login_password, Estado_idEstado', 'required'),
			array('Estado_idEstado', 'numerical', 'integerOnly'=>true),
			array('first_name', 'length', 'max'=>12),
			array('last_name', 'length', 'max'=>45),
			array('Login_user_name, Login_password', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPatrocinador, first_name, last_name, Login_user_name, Login_password, Estado_idEstado', 'safe', 'on'=>'search'),
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
			'eventos' => array(self::HAS_MANY, 'Evento', 'Patrocinador_idPatrocinador'),
			'estadoIdEstado' => array(self::BELONGS_TO, 'Estado', 'Estado_idEstado'),
			'loginUserName' => array(self::BELONGS_TO, 'Login', 'Login_user_name'),
			'loginPassword' => array(self::BELONGS_TO, 'Login', 'Login_password'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPatrocinador' => 'Id Patrocinador',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'Login_user_name' => 'Login User Name',
			'Login_password' => 'Login Password',
			'Estado_idEstado' => 'Estado Id Estado',
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

		$criteria->compare('idPatrocinador',$this->idPatrocinador);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('Login_user_name',$this->Login_user_name,true);
		$criteria->compare('Login_password',$this->Login_password,true);
		$criteria->compare('Estado_idEstado',$this->Estado_idEstado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Patrocinador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
