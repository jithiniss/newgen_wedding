<?php

/**
 * This is the model class for table "admin_users".
 *
 * The followings are the available columns in table 'admin_users':
 * @property integer $id
 * @property integer $post
 * @property string $user_name
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * The followings are the available model relations:
 * @property AdminPost[] $adminPosts
 * @property AdminPost[] $adminPosts1
 * @property AdminPost $post0
 * @property Bid[] $bs
 * @property Bid[] $bs1
 * @property BidComments[] $bidComments
 * @property BidComments[] $bidComments1
 * @property BidQuotations[] $bidQuotations
 * @property BidQuotations[] $bidQuotations1
 * @property BidQuotationsComments[] $bidQuotationsComments
 * @property BusinessUsers[] $businessUsers
 * @property BusinessUsers[] $businessUsers1
 * @property ClientUsers[] $clientUsers
 * @property ClientUsers[] $clientUsers1
 * @property History[] $histories
 * @property History[] $histories1
 * @property MasterBrands[] $masterBrands
 * @property MasterBrands[] $masterBrands1
 * @property MasterCategory[] $masterCategories
 * @property MasterCategory[] $masterCategories1
 * @property MasterCountry[] $masterCountries
 * @property MasterCountry[] $masterCountries1
 * @property MasterDistrict[] $masterDistricts
 * @property MasterDistrict[] $masterDistricts1
 * @property MasterNotifications[] $masterNotifications
 * @property MasterNotifications[] $masterNotifications1
 * @property MasterState[] $masterStates
 * @property MasterState[] $masterStates1
 * @property MasterStatus[] $masterStatuses
 * @property MasterStatus[] $masterStatuses1
 * @property Notifications[] $notifications
 * @property Notifications[] $notifications1
 * @property RfpRfq[] $rfpRfqs
 * @property RfpRfq[] $rfpRfqs1
 * @property RfpRfqComments[] $rfpRfqComments
 * @property RfpRfqComments[] $rfpRfqComments1
 * @property RfpRfqQuotations[] $rfpRfqQuotations
 * @property RfpRfqQuotations[] $rfpRfqQuotations1
 * @property RfpRfqQuotationsComments[] $rfpRfqQuotationsComments
 * @property RfpRfqQuotationsComments[] $rfpRfqQuotationsComments1
 * @property TenderComments[] $tenderComments
 * @property TenderComments[] $tenderComments1
 * @property TenderQuotations[] $tenderQuotations
 * @property TenderQuotations[] $tenderQuotations1
 * @property TenderQuotationsComments[] $tenderQuotationsComments
 * @property TenderQuotationsComments[] $tenderQuotationsComments1
 * @property Tenders[] $tenders
 * @property Tenders[] $tenders1
 */
class AdminUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post, user_name, password, name, email, phone, address, CB, UB, DOC, DOU', 'required'),
			array('post, CB, UB', 'numerical', 'integerOnly'=>true),
			array('user_name, password, name, phone', 'length', 'max'=>100),
			array('email, address', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, post, user_name, password, name, email, phone, address, CB, UB, DOC, DOU', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'adminPosts' => array(self::HAS_MANY, 'AdminPost', 'CB'),
			'adminPosts1' => array(self::HAS_MANY, 'AdminPost', 'UB'),
			'post0' => array(self::BELONGS_TO, 'AdminPost', 'post'),
			'bs' => array(self::HAS_MANY, 'Bid', 'CB'),
			'bs1' => array(self::HAS_MANY, 'Bid', 'UB'),
			'bidComments' => array(self::HAS_MANY, 'BidComments', 'CB'),
			'bidComments1' => array(self::HAS_MANY, 'BidComments', 'UB'),
			'bidQuotations' => array(self::HAS_MANY, 'BidQuotations', 'CB'),
			'bidQuotations1' => array(self::HAS_MANY, 'BidQuotations', 'UB'),
			'bidQuotationsComments' => array(self::HAS_MANY, 'BidQuotationsComments', 'CB'),
			'businessUsers' => array(self::HAS_MANY, 'BusinessUsers', 'CB'),
			'businessUsers1' => array(self::HAS_MANY, 'BusinessUsers', 'UB'),
			'clientUsers' => array(self::HAS_MANY, 'ClientUsers', 'CB'),
			'clientUsers1' => array(self::HAS_MANY, 'ClientUsers', 'UB'),
			'histories' => array(self::HAS_MANY, 'History', 'CB'),
			'histories1' => array(self::HAS_MANY, 'History', 'UB'),
			'masterBrands' => array(self::HAS_MANY, 'MasterBrands', 'CB'),
			'masterBrands1' => array(self::HAS_MANY, 'MasterBrands', 'UB'),
			'masterCategories' => array(self::HAS_MANY, 'MasterCategory', 'CB'),
			'masterCategories1' => array(self::HAS_MANY, 'MasterCategory', 'UB'),
			'masterCountries' => array(self::HAS_MANY, 'MasterCountry', 'CB'),
			'masterCountries1' => array(self::HAS_MANY, 'MasterCountry', 'UB'),
			'masterDistricts' => array(self::HAS_MANY, 'MasterDistrict', 'CB'),
			'masterDistricts1' => array(self::HAS_MANY, 'MasterDistrict', 'UB'),
			'masterNotifications' => array(self::HAS_MANY, 'MasterNotifications', 'UB'),
			'masterNotifications1' => array(self::HAS_MANY, 'MasterNotifications', 'CB'),
			'masterStates' => array(self::HAS_MANY, 'MasterState', 'CB'),
			'masterStates1' => array(self::HAS_MANY, 'MasterState', 'UB'),
			'masterStatuses' => array(self::HAS_MANY, 'MasterStatus', 'CB'),
			'masterStatuses1' => array(self::HAS_MANY, 'MasterStatus', 'UB'),
			'notifications' => array(self::HAS_MANY, 'Notifications', 'CB'),
			'notifications1' => array(self::HAS_MANY, 'Notifications', 'UB'),
			'rfpRfqs' => array(self::HAS_MANY, 'RfpRfq', 'CB'),
			'rfpRfqs1' => array(self::HAS_MANY, 'RfpRfq', 'UB'),
			'rfpRfqComments' => array(self::HAS_MANY, 'RfpRfqComments', 'CB'),
			'rfpRfqComments1' => array(self::HAS_MANY, 'RfpRfqComments', 'UB'),
			'rfpRfqQuotations' => array(self::HAS_MANY, 'RfpRfqQuotations', 'CB'),
			'rfpRfqQuotations1' => array(self::HAS_MANY, 'RfpRfqQuotations', 'UB'),
			'rfpRfqQuotationsComments' => array(self::HAS_MANY, 'RfpRfqQuotationsComments', 'CB'),
			'rfpRfqQuotationsComments1' => array(self::HAS_MANY, 'RfpRfqQuotationsComments', 'UB'),
			'tenderComments' => array(self::HAS_MANY, 'TenderComments', 'CB'),
			'tenderComments1' => array(self::HAS_MANY, 'TenderComments', 'UB'),
			'tenderQuotations' => array(self::HAS_MANY, 'TenderQuotations', 'CB'),
			'tenderQuotations1' => array(self::HAS_MANY, 'TenderQuotations', 'UB'),
			'tenderQuotationsComments' => array(self::HAS_MANY, 'TenderQuotationsComments', 'CB'),
			'tenderQuotationsComments1' => array(self::HAS_MANY, 'TenderQuotationsComments', 'UB'),
			'tenders' => array(self::HAS_MANY, 'Tenders', 'CB'),
			'tenders1' => array(self::HAS_MANY, 'Tenders', 'UB'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'post' => 'Post',
			'user_name' => 'User Name',
			'password' => 'Password',
			'name' => 'Name',
			'email' => 'Email',
			'phone' => 'Phone',
			'address' => 'Address',
			'CB' => 'Cb',
			'UB' => 'Ub',
			'DOC' => 'Doc',
			'DOU' => 'Dou',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('post',$this->post);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('CB',$this->CB);
		$criteria->compare('UB',$this->UB);
		$criteria->compare('DOC',$this->DOC,true);
		$criteria->compare('DOU',$this->DOU,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
