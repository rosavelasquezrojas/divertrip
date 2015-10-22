<?php

/**
 * This is the model class for table "direccion".
 *
 * The followings are the available columns in table 'direccion':
 * @property integer $idDireccion
 * @property string $latitud
 * @property string $longitud
 *
 * The followings are the available model relations:
 * @property Evento[] $eventos
 * @property LugarEmblematico[] $lugarEmblematicos
 */
class Direccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'direccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idDireccion', 'required'),
			array('idDireccion', 'numerical', 'integerOnly'=>true),
			array('latitud, longitud', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idDireccion, latitud, longitud', 'safe', 'on'=>'search'),
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
			'eventos' => array(self::HAS_MANY, 'Evento', 'Direccion_idDireccion'),
			'lugarEmblematicos' => array(self::HAS_MANY, 'LugarEmblematico', 'Direccion_idDireccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idDireccion' => 'Id Direccion',
			'latitud' => 'Latitud',
			'longitud' => 'Longitud',
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

		$criteria->compare('idDireccion',$this->idDireccion);
		$criteria->compare('latitud',$this->latitud,true);
		$criteria->compare('longitud',$this->longitud,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Direccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
