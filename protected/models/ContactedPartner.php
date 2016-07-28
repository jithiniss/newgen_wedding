<?php

/**
 * This is the model class for table "contacted_partner".
 *
 * The followings are the available columns in table 'contacted_partner':
 * @property integer $id
 * @property integer $user_plan_id
 * @property integer $user_id
 * @property integer $plan_id
 * @property string $doc
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property UserPlans $userPlan
 */
class ContactedPartner extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'contacted_partner';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
//                    array('user_plan_id, user_id, plan_id, doc', 'required'),
//			array('user_plan_id, user_id, plan_id, status', 'numerical', 'integerOnly'=>true),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_plan_id, user_id, plan_id, doc, status', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'userPlan' => array(self::BELONGS_TO, 'UserPlans', 'user_plan_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'user_plan_id' => 'User Plan',
                    'user_id' => 'User',
                    'plan_id' => 'Plan',
                    'doc' => 'Doc',
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
                $criteria->compare('user_plan_id', $this->user_plan_id);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('plan_id', $this->plan_id);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('status', $this->status);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return ContactedPartner the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
