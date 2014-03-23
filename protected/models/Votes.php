<?php

/**
 * This is the model class for table "votes".
 *
 * The followings are the available columns in table 'votes':
 * @property integer $id
 * @property integer $condidat_id
 * @property integer $ip
 * @property string $protiv_za
 */
class Votes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'votes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('candidat_id', 'numerical', 'integerOnly'=>true),
			array('protiv_za', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, candidat_id, ip, protiv_za', 'safe', 'on'=>'search'),
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
                    'Candidat'=>array(self::BELONGS_TO, 'Candidats', 'candidat_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'candidat_id' => 'Кандидат',
			'ip' => 'Ip',
			'protiv_za' => 'Против или За',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('candidat_id',$this->condidat_id);
		$criteria->compare('ip',$this->ip);
		$criteria->compare('protiv_za',$this->protiv_za,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Votes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
