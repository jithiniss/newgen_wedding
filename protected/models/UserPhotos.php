<?php

/**
 * This is the model class for table "user_photos".
 *
 * The followings are the available columns in table 'user_photos':
 * @property integer $id
 * @property integer $user_id
 * @property string $photo_name
 * @property integer $approval
 * @property integer $status
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class UserPhotos extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'user_photos';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('user_id, photo_name, approval, status, cb, doc, ub', 'required'),
                    array('user_id, approval, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('photo_name', 'length', 'max' => 100),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, photo_name, approval, status, cb, doc, ub, dou', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'user' => array(self::BELONGS_TO, 'UserDetails', 'user_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'user_id' => 'User',
                    'photo_name' => 'Photo Name',
                    'approval' => 'Approval',
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
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('photo_name', $this->photo_name, true);
                $criteria->compare('approval', $this->approval);
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
         * @return UserPhotos the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
