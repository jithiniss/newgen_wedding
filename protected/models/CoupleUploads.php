<?php

/**
 * This is the model class for table "couple_uploads".
 *
 * The followings are the available columns in table 'couple_uploads':
 * @property integer $id
 * @property string $title
 * @property string $file_type
 * @property string $file
 * @property string $texts
 * @property string $comment
 * @property integer $status
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class CoupleUploads extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'couple_uploads';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array(' file_type', 'required'),
//                    array('status, cb, ub', 'numerical', 'integerOnly' => true),
//                    array('title, file_type, file', 'length', 'max' => 250),
//                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, title, file_type, file, texts, comment, status, cb, doc, ub, dou', 'safe', 'on' => 'search'),
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
                    'title' => 'Title',
                    'file_type' => 'File Type',
                    'file' => 'File',
                    'texts' => 'Texts',
                    'comment' => 'Comment',
                    'status' => 'Status',
                    'cb' => 'Cb',
                    'doc' => 'Doc',
                    'ub' => 'Ub',
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
                $criteria->compare('title', $this->title, true);
                $criteria->compare('file_type', $this->file_type, true);
                $criteria->compare('file', $this->file, true);
                $criteria->compare('texts', $this->texts, true);
                $criteria->compare('comment', $this->comment, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return CoupleUploads the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
