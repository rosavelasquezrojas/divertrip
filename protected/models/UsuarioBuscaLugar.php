<?php

/**
 * This is the model class for table "usuario_busca_lugar".
 *
 * The followings are the available columns in table 'usuario_busca_lugar':
 * @property integer $Usuario_idUsuario
 * @property integer $Lugar_Emblematico_idLugar_Emblematico
 *
 * The followings are the available model relations:
 * @property LugarEmblematico $lugarEmblematicoIdLugarEmblematico
 * @property Usuario $usuarioIdUsuario
 */
class UsuarioBuscaLugar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_busca_lugar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Usuario_idUsuario, Lugar_Emblematico_idLugar_Emblematico', 'required'),
			array('Usuario_idUsuario, Lugar_Emblematico_idLugar_Emblematico', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Usuario_idUsuario, Lugar_Emblematico_idLugar_Emblematico', 'safe', 'on'=>'search'),
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
			'lugarEmblematicoIdLugarEmblematico' => array(self::BELONGS_TO, 'LugarEmblematico', 'Lugar_Emblematico_idLugar_Emblematico'),
			'usuarioIdUsuario' => array(self::BELONGS_TO, 'Usuario', 'Usuario_idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Usuario_idUsuario' => 'Usuario Id Usuario',
			'Lugar_Emblematico_idLugar_Emblematico' => 'Lugar Emblematico Id Lugar Emblematico',
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

		$criteria->compare('Usuario_idUsuario',$this->Usuario_idUsuario);
		$criteria->compare('Lugar_Emblematico_idLugar_Emblematico',$this->Lugar_Emblematico_idLugar_Emblematico);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioBuscaLugar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
