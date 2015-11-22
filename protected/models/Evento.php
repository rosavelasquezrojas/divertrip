<?php

/**
 * This is the model class for table "evento".
 *
 * The followings are the available columns in table 'evento':
 * @property integer $idEvento
 * @property string $name_event
 * @property string $description_event
 * @property string $start_event
 * @property integer $Categoria_idCategoria
 * @property integer $Patrocinador_idPatrocinador
 * @property string $image
 * @property string $address
 * @property string $latitude
 * @property string $longitude
 *
 * The followings are the available model relations:
 * @property Categoria $categoriaIdCategoria
 * @property Patrocinador $patrocinadorIdPatrocinador
 */
class Evento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Categoria_idCategoria, Patrocinador_idPatrocinador, address, latitude, longitude', 'required'),
			array('Categoria_idCategoria, Patrocinador_idPatrocinador', 'numerical', 'integerOnly'=>true),
			array('name_event, description_event', 'length', 'max'=>45),
			array('address', 'length', 'max'=>100),
			array('start_event, image', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEvento, name_event, description_event, start_event, Categoria_idCategoria, Patrocinador_idPatrocinador, image, address, latitude, longitude', 'safe', 'on'=>'search'),
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
			'categoriaIdCategoria' => array(self::BELONGS_TO, 'Categoria', 'Categoria_idCategoria'),
			'patrocinadorIdPatrocinador' => array(self::BELONGS_TO, 'Patrocinador', 'Patrocinador_idPatrocinador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEvento' => 'Id Evento',
			'name_event' => 'Name Event',
			'description_event' => 'Description Event',
			'start_event' => 'Start Event',
			'Categoria_idCategoria' => 'Categoria Id Categoria',
			'Patrocinador_idPatrocinador' => 'Patrocinador Id Patrocinador',
			'image' => 'Image',
			'address' => 'Address',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
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

		$criteria->compare('idEvento',$this->idEvento);
		$criteria->compare('name_event',$this->name_event,true);
		$criteria->compare('description_event',$this->description_event,true);
		$criteria->compare('start_event',$this->start_event,true);
		$criteria->compare('Categoria_idCategoria',$this->Categoria_idCategoria);
		$criteria->compare('Patrocinador_idPatrocinador',$this->Patrocinador_idPatrocinador);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
