<?php

/**
 * This is the model class for table "evento".
 *
 * The followings are the available columns in table 'evento':
 * @property integer $idEvento
 * @property string $name_event
 * @property string $description_event
 * @property string $date
 * @property string $hour
 * @property integer $Categoria_idCategoria
 * @property integer $Direccion_idDireccion
 * @property integer $Patrocinador_idPatrocinador
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Categoria $categoriaIdCategoria
 * @property Direccion $direccionIdDireccion
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
			array('idEvento, Categoria_idCategoria, Direccion_idDireccion, Patrocinador_idPatrocinador', 'required'),
			array('idEvento, Categoria_idCategoria, Direccion_idDireccion, Patrocinador_idPatrocinador', 'numerical', 'integerOnly'=>true),
			array('name_event, description_event', 'length', 'max'=>45),
			array('date, hour, image', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEvento, name_event, description_event, date, hour, Categoria_idCategoria, Direccion_idDireccion, Patrocinador_idPatrocinador, image', 'safe', 'on'=>'search'),
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
			'direccionIdDireccion' => array(self::BELONGS_TO, 'Direccion', 'Direccion_idDireccion'),
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
			'date' => 'Date',
			'hour' => 'Hour',
			'Categoria_idCategoria' => 'Categoria Id Categoria',
			'Direccion_idDireccion' => 'Direccion Id Direccion',
			'Patrocinador_idPatrocinador' => 'Patrocinador Id Patrocinador',
			'image' => 'Image',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('hour',$this->hour,true);
		$criteria->compare('Categoria_idCategoria',$this->Categoria_idCategoria);
		$criteria->compare('Direccion_idDireccion',$this->Direccion_idDireccion);
		$criteria->compare('Patrocinador_idPatrocinador',$this->Patrocinador_idPatrocinador);
		$criteria->compare('image',$this->image,true);

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
