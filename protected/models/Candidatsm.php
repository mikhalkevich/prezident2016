<?php

class Candidatsm extends EMongoDocument{
/** @virtual */
    public $verifyCode;
    
    function collectionName(){
        return 'candidats';
    }
    
     public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('picture, name, about,biografy', 'safe'),
            array('name, about,biografy', 'required'),
            array('picture', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true, 'maxSize' => Yii::app()->params['bannersFilesUploadSize'], 'tooLarge' => 'Слишком большой файл.',),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, picture, name, about,raiting,biografy', 'safe', 'on' => 'search'),
           array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
        );
    }
 /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
           '_id'=>'_id',
            'id' => 'ID',
            'picture' => 'Фото',
            'name' => 'Ф.И.О',
            'about' => 'Мировоззрение',
            'raiting' => 'Рейтинг',
            'biografy'=>'Достижения',
            'verifyCode'=>'Капча'
            
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('picture', $this->picture, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('about', $this->about, true);
        $criteria->compare('raiting', $this->raiting, true);
        $criteria->compare('biografy', $this->biografy, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className=__CLASS__){
        return parent::model($className);
    }
}
   ?>
