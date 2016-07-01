<?php

/**
 * This is the model class for table "file_uploads".
 *
 * The followings are the available columns in table 'file_uploads':
 * @property integer $id
 * @property string $heading
 * @property string $file
 * @property integer $cb
 * @property string $dou
 */
class FileUploads extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'file_uploads';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('heading', 'required'),
                    array('file', 'file', 'types' => 'jpg, gif, png, pdf, doc, docx, txt', 'allowEmpty' => false),
                    array('cb', 'numerical', 'integerOnly' => true),
                    array('heading', 'length', 'max' => 300),
                    array('file', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, heading, file, content, cb, dou', 'safe', 'on' => 'search'),
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
                    'id' => 'ID',
                    'heading' => 'Heading',
                    'file' => 'File',
                    'content' => 'Content',
                    'cb' => 'Cb',
                    'dou' => 'Dou',
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
                $criteria->compare('heading', $this->heading, true);
                $criteria->compare('file', $this->file, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return FileUploads the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
