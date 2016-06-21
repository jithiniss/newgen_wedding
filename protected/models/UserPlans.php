<?php

/**
 * This is the model class for table "user_plans".
 *
 * The followings are the available columns in table 'user_plans':
 * @property integer $id
 * @property integer $plan_id
 * @property integer $user_id
 * @property string $plan_name
 * @property integer $amount
 * @property integer $view_contact
 * @property integer $view_contact_left
 * @property integer $send_message
 * @property integer $send_message_left
 * @property integer $search
 * @property integer $Interest
 * @property integer $sms_alerts
 * @property integer $email_alerts
 * @property integer $premium_tag
 * @property integer $featured
 * @property integer $number_of_days
 * @property integer $number_of_days_left
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 */
class UserPlans extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'user_plans';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
//			array('plan_id, user_id, plan_name, amount, view_contact, view_contact_left, send_message, send_message_left, search, Interest, sms_alerts, email_alerts, premium_tag, featured, number_of_days, number_of_days_left, status, cb, ub, doc, dou', 'required'),
                    array('plan_id, user_id, amount, view_contact, view_contact_left, send_message, send_message_left, search, Interest, sms_alerts, email_alerts, premium_tag, featured, number_of_days, number_of_days_left, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('plan_name', 'length', 'max' => 200),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, plan_id, user_id, plan_name, amount, view_contact, view_contact_left, send_message, send_message_left, search, Interest, sms_alerts, email_alerts, premium_tag, featured, number_of_days, number_of_days_left, status, cb, ub, doc, dou', 'safe', 'on' => 'search'),
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
                    'plan_id' => 'Plan',
                    'user_id' => 'User',
                    'plan_name' => 'Plan Name',
                    'amount' => 'Amount',
                    'view_contact' => 'View Contact',
                    'view_contact_left' => 'View Contact Left',
                    'send_message' => 'Send Message',
                    'send_message_left' => 'Send Message Left',
                    'search' => 'Search',
                    'Interest' => 'Interest',
                    'sms_alerts' => 'Sms Alerts',
                    'email_alerts' => 'Email Alerts',
                    'premium_tag' => 'Premium Tag',
                    'featured' => 'Featured',
                    'number_of_days' => 'Number Of Days',
                    'number_of_days_left' => 'Number Of Days Left',
                    'status' => 'Status',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'doc' => 'Doc',
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
                $criteria->compare('plan_id', $this->plan_id);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('plan_name', $this->plan_name, true);
                $criteria->compare('amount', $this->amount);
                $criteria->compare('view_contact', $this->view_contact);
                $criteria->compare('view_contact_left', $this->view_contact_left);
                $criteria->compare('send_message', $this->send_message);
                $criteria->compare('send_message_left', $this->send_message_left);
                $criteria->compare('search', $this->search);
                $criteria->compare('Interest', $this->Interest);
                $criteria->compare('sms_alerts', $this->sms_alerts);
                $criteria->compare('email_alerts', $this->email_alerts);
                $criteria->compare('premium_tag', $this->premium_tag);
                $criteria->compare('featured', $this->featured);
                $criteria->compare('number_of_days', $this->number_of_days);
                $criteria->compare('number_of_days_left', $this->number_of_days_left);
                $criteria->compare('status', $this->status);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return UserPlans the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
