<?php

/**
 * This is the model class for table "plans".
 *
 * The followings are the available columns in table 'plans':
 * @property integer $id
 * @property string $plan_name
 * @property integer $amount
 * @property integer $view_contact
 * @property integer $send_message
 * @property integer $search
 * @property integer $Interest
 * @property integer $sms_alerts
 * @property integer $email_alerts
 * @property integer $premium_tag
 * @property integer $set_featured
 * @property integer $number_of_days
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 */
class Plans extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, plan_name, amount, view_contact, send_message, search, Interest, sms_alerts, email_alerts, premium_tag, set_featured, number_of_days, status, cb, ub, doc, dou', 'required'),
			array('id, amount, view_contact, send_message, search, Interest, sms_alerts, email_alerts, premium_tag, set_featured, number_of_days, status, cb, ub', 'numerical', 'integerOnly'=>true),
			array('plan_name', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, plan_name, amount, view_contact, send_message, search, Interest, sms_alerts, email_alerts, premium_tag, set_featured, number_of_days, status, cb, ub, doc, dou', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'plan_name' => 'Plan Name',
			'amount' => 'Amount',
			'view_contact' => 'View Contact',
			'send_message' => 'Send Message',
			'search' => 'Search',
			'Interest' => 'Interest',
			'sms_alerts' => 'Sms Alerts',
			'email_alerts' => 'Email Alerts',
			'premium_tag' => 'Premium Tag',
			'set_featured' => 'Set Featured',
			'number_of_days' => 'Number Of Days',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('plan_name',$this->plan_name,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('view_contact',$this->view_contact);
		$criteria->compare('send_message',$this->send_message);
		$criteria->compare('search',$this->search);
		$criteria->compare('Interest',$this->Interest);
		$criteria->compare('sms_alerts',$this->sms_alerts);
		$criteria->compare('email_alerts',$this->email_alerts);
		$criteria->compare('premium_tag',$this->premium_tag);
		$criteria->compare('set_featured',$this->set_featured);
		$criteria->compare('number_of_days',$this->number_of_days);
		$criteria->compare('status',$this->status);
		$criteria->compare('cb',$this->cb);
		$criteria->compare('ub',$this->ub);
		$criteria->compare('doc',$this->doc,true);
		$criteria->compare('dou',$this->dou,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Plans the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
