<?php

/**
 * This is the model class for table "wedding_planner_enquiry".
 *
 * The followings are the available columns in table 'wedding_planner_enquiry':
 * @property integer $id
 * @property integer $vendor_id
 * @property integer $user_id
 * @property string $name
 * @property string $email
 * @property string $contact_no
 * @property string $address
 * @property string $message
 * @property string $doc
 * @property integer $status
 */
class WeddingPlannerEnquiry extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'wedding_planner_enquiry';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('vendor_id, user_id, name, email,contact_no, address, message, doc, status', 'required'),
                    array('vendor_id, user_id, status', 'numerical', 'integerOnly' => true),
                    array('name, email', 'length', 'max' => 200),
                    array('email', 'email'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, vendor_id, user_id, name, email, address, message, doc, status,contact_no', 'safe', 'on' => 'search'),
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
                    'vendor_id' => 'Vendor',
                    'user_id' => 'User',
                    'name' => 'Name',
                    'email' => 'Email',
                    'address' => 'Address',
                    'message' => 'Message',
                    'doc' => 'Doc',
                    'status' => 'Status',
                    'contact_no' => 'Contact No',
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
                $criteria->compare('vendor_id', $this->vendor_id);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('name', $this->name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('address', $this->address, true);
                $criteria->compare('message', $this->message, true);
                $criteria->compare('contact_no', $this->contact_no, true);
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
         * @return WeddingPlannerEnquiry the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
