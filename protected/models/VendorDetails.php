<?php

/**
 * This is the model class for table "vendor_details".
 *
 * The followings are the available columns in table 'vendor_details':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $user_name
 * @property string $password
 * @property string $email
 * @property integer $country
 * @property integer $state
 * @property integer $city
 * @property string $street
 * @property string $dob
 * @property integer $gender
 * @property string $phone_no1
 * @property string $phone_no2
 * @property string $fax
 * @property integer $business_type
 * @property string $company_name
 * @property string $company_website_link
 * @property string $company_address
 * @property string $our_services
 * @property string $photo
 * @property integer $approval_status
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 *
 * The followings are the available model relations:
 * @property MasterBusiness $businessType
 * @property MasterCountry $country0
 * @property MasterState $state0
 * @property MasterCity $city0
 */
class VendorDetails extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'vendor_details';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('first_name, last_name, user_name, password, email, country, state, city, street, dob, gender, phone_no1, phone_no2, fax, business_type,  our_services, approval_status, status', 'required'),
                    array('id, country, state, city, gender, business_type, approval_status, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('first_name, last_name, user_name, password, email, dob, phone_no1, phone_no2, fax', 'length', 'max' => 50),
                    array('email', 'email'),
                    array('email,user_name', 'unique'),
                    array('street', 'length', 'max' => 100),
                    array('company_name,photo', 'length', 'max' => 200),
                    array('company_website_link', 'length', 'max' => 300),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, first_name, last_name, user_name, password, email, country, state, city, street, dob, gender, phone_no1, phone_no2, fax, business_type, company_name, company_website_link, company_address, our_services,photo, approval_status, status, cb, ub, doc, dou', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'businessType' => array(self::BELONGS_TO, 'MasterBusiness', 'business_type'),
                    'country0' => array(self::BELONGS_TO, 'MasterCountry', 'country'),
                    'state0' => array(self::BELONGS_TO, 'MasterState', 'state'),
                    'city0' => array(self::BELONGS_TO, 'MasterCity', 'city'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'user_name' => 'User Name',
                    'password' => 'Password',
                    'email' => 'Email',
                    'country' => 'Country',
                    'state' => 'State',
                    'city' => 'City',
                    'street' => 'Street',
                    'dob' => 'DOB',
                    'gender' => 'Gender',
                    'phone_no1' => 'Phone No 1',
                    'phone_no2' => 'Phone No 2',
                    'fax' => 'Fax',
                    'business_type' => 'Business Type',
                    'company_name' => 'Company Name',
                    'company_website_link' => 'Company Website Link',
                    'company_address' => 'Company Address',
                    'our_services' => 'Our Services',
                    'photo' => 'Photo',
                    'approval_status' => 'Approval Status',
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
                $criteria->compare('first_name', $this->first_name, true);
                $criteria->compare('last_name', $this->last_name, true);
                $criteria->compare('user_name', $this->user_name, true);
                $criteria->compare('password', $this->password, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('country', $this->country);
                $criteria->compare('state', $this->state);
                $criteria->compare('city', $this->city);
                $criteria->compare('street', $this->street, true);
                $criteria->compare('dob', $this->dob, true);
                $criteria->compare('gender', $this->gender);
                $criteria->compare('phone_no1', $this->phone_no1, true);
                $criteria->compare('phone_no2', $this->phone_no2, true);
                $criteria->compare('fax', $this->fax, true);
                $criteria->compare('business_type', $this->business_type);
                $criteria->compare('company_name', $this->company_name, true);
                $criteria->compare('company_website_link', $this->company_website_link, true);
                $criteria->compare('company_address', $this->company_address, true);
                $criteria->compare('our_services', $this->our_services, true);
                $criteria->compare('photo', $this->photo, true);
                $criteria->compare('approval_status', $this->approval_status);
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
         * @return VendorDetails the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
