<?php

/**
 * This is the model class for table "couple_details".
 *
 * The followings are the available columns in table 'couple_details':
 * @property integer $id
 * @property string $bride_id
 * @property string $bride_password
 * @property string $groom_id
 * @property string $groom_password
 * @property string $couple_password
 * @property string $confirm_password
 * @property string $photo
 * @property integer $status
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class CoupleDetails extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'couple_details';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('bride_id, couple_name,email,bride_password, groom_id, groom_password, couple_password, confirm_password', 'required'),
                    array('status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('bride_id, bride_password, groom_id, groom_password, couple_password, confirm_password, photo', 'length', 'max' => 250),
                    array('dou', 'safe'),
                    array('bride_id', 'unique'),
                    array('groom_id', 'unique'),
                    array('email', 'unique'),
                    array('email', 'email'),
                    array('confirm_password', 'compare', 'compareAttribute' => 'couple_password'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, bride_id, bride_password, groom_id,email, groom_password, couple_password, confirm_password, photo, status, couple_name,cb, doc, ub, dou', 'safe', 'on' => 'search'),
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
                    'couple_name' => 'Couple Name',
                    'email' => 'Email',
                    'bride_id' => 'Bride',
                    'bride_password' => 'Bride Password',
                    'groom_id' => 'Groom',
                    'groom_password' => 'Groom Password',
                    'couple_password' => 'Couple Password',
                    'confirm_password' => 'Confirm Password',
                    'photo' => 'Photo',
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
                $criteria->compare('couple_name', $this->couple_name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('bride_id', $this->bride_id, true);
                $criteria->compare('bride_password', $this->bride_password, true);
                $criteria->compare('groom_id', $this->groom_id, true);
                $criteria->compare('groom_password', $this->groom_password, true);
                $criteria->compare('couple_password', $this->couple_password, true);
                $criteria->compare('confirm_password', $this->confirm_password, true);
                $criteria->compare('photo', $this->photo, true);
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
         * @return CoupleDetails the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
