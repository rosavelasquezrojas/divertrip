<?php

/**
 * This is the model class for table "filtro".
 *
 * The followings are the available columns in table 'filtro':
 * @property integer $idFiltro
 * @property integer $Filtrocol1
 * @property integer $Filtrocol2
 * @property integer $Filtrocol3
 * @property integer $Filtrocol4
 * @property integer $Filtrocol5
 * @property integer $Filtrocol6
 * @property integer $Filtrocol7
 *
 * The followings are the available model relations:
 * @property Preferencia[] $preferencias
 */
class Filtro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'filtro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFiltro, Filtrocol1, Filtrocol2, Filtrocol3, Filtrocol4, Filtrocol5, Filtrocol6, Filtrocol7', 'required'),
			array('idFiltro, Filtrocol1, Filtrocol2, Filtrocol3, Filtrocol4, Filtrocol5, Filtrocol6, Filtrocol7', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idFiltro, Filtrocol1, Filtrocol2, Filtrocol3, Filtrocol4, Filtrocol5, Filtrocol6, Filtrocol7', 'safe', 'on'=>'search'),
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
			'preferencias' => array(self::HAS_MANY, 'Preferencia', 'Filtro_idFiltro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFiltro' => 'Id Filtro',
			'Filtrocol1' => 'Filtrocol1',
			'Filtrocol2' => 'Filtrocol2',
			'Filtrocol3' => 'Filtrocol3',
			'Filtrocol4' => 'Filtrocol4',
			'Filtrocol5' => 'Filtrocol5',
			'Filtrocol6' => 'Filtrocol6',
			'Filtrocol7' => 'Filtrocol7',
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

		$criteria->compare('idFiltro',$this->idFiltro);
		$criteria->compare('Filtrocol1',$this->Filtrocol1);
		$criteria->compare('Filtrocol2',$this->Filtrocol2);
		$criteria->compare('Filtrocol3',$this->Filtrocol3);
		$criteria->compare('Filtrocol4',$this->Filtrocol4);
		$criteria->compare('Filtrocol5',$this->Filtrocol5);
		$criteria->compare('Filtrocol6',$this->Filtrocol6);
		$criteria->compare('Filtrocol7',$this->Filtrocol7);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Filtro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
