<?php

/**
 * This is the model class for table "admin_post".
 *
 * The followings are the available columns in table 'admin_post':
 * @property integer $id
 * @property string $post_name
 * @property string $rfp_rfq
 * @property string $btob
 * @property string $btoc
 * @property string $quotes
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 *
 * The followings are the available model relations:
 * @property AdminUsers $cB
 * @property AdminUsers $uB
 * @property AdminUsers[] $adminUsers
 */
class AdminPost extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_name, rfp_rfq, btob, btoc, quotes, CB, UB, DOC, DOU', 'required'),
			array('CB, UB', 'numerical', 'integerOnly'=>true),
			array('post_name, rfp_rfq, btob, btoc', 'length', 'max'=>100),
			array('quotes', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, post_name, rfp_rfq, btob, btoc, quotes, CB, UB, DOC, DOU', 'safe', 'on'=>'search'),
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
			'cB' => array(self::BELONGS_TO, 'AdminUsers', 'CB'),
			'uB' => array(self::BELONGS_TO, 'AdminUsers', 'UB'),
			'adminUsers' => array(self::HAS_MANY, 'AdminUsers', 'post'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'post_name' => 'Post Name',
			'rfp_rfq' => 'Rfp Rfq',
			'btob' => 'Btob',
			'btoc' => 'Btoc',
			'quotes' => 'Quotes',
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
		$criteria->compare('post_name',$this->post_name,true);
		$criteria->compare('rfp_rfq',$this->rfp_rfq,true);
		$criteria->compare('btob',$this->btob,true);
		$criteria->compare('btoc',$this->btoc,true);
		$criteria->compare('quotes',$this->quotes,true);
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
	 * @return AdminPost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
