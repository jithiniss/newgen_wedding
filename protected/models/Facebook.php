<?php

/**
 * This is the model class for table "facebook".
 *
 * The followings are the available columns in table 'facebook':
 * @property integer $id
 * @property integer $user_id
 * @property string $facebook_link
 * @property integer $verify_status
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 * @property integer $status
 */
class Facebook extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'facebook';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('facebook_link', 'required'),
//			array('user_id, verify_status, cb, ub, status', 'numerical', 'integerOnly'=>true),
//			array('facebook_link', 'length', 'max'=>300),
//			array('facebook_link', 'link', 'max'=>300),
//			arr
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, facebook_link, verify_status, cb, ub, doc, dou, status', 'safe', 'on' => 'search'),
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
                    'user_id' => 'User',
                    'facebook_link' => 'Facebook Link',
                    'verify_status' => 'Verify Status',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'doc' => 'Doc',
                    'dou' => 'Dou',
                    'status' => 'Status',
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
                $criteria->compare('facebook_link', $this->facebook_link, true);
                $criteria->compare('verify_status', $this->verify_status);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);
                $criteria->compare('status', $this->status);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return Facebook the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
