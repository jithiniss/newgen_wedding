<?php

/**
 * This is the model class for table "admin_users".
 *
 * The followings are the available columns in table 'admin_users':
 * @property integer $id
 * @property integer $post_id
 * @property string $user_name
 * @property string $password
 * @property string $name
 * @property string $email
 * @property string $phone_no
 * @property integer $status
 * @property string $doc
 * @property string $dou
 * @property integer $cb
 * @property integer $ub
 *
 * The followings are the available model relations:
 * @property AdminPost $post
 */
class AdminUsers extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'admin_users';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('post_id, user_name, password, name, email, phone_no, status', 'required'),
                    array('post_id, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('user_name', 'length', 'max' => 50),
                    array('password', 'length', 'max' => 30),
                    array('name, email', 'length', 'max' => 100),
                    array('phone_no', 'length', 'max' => 15),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, post_id, user_name, password, name, email, phone_no, status, doc, dou, cb, ub', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'post' => array(self::BELONGS_TO, 'AdminPost', 'post_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'post_id' => 'Post',
                    'user_name' => 'User Name',
                    'password' => 'Password',
                    'name' => 'Name',
                    'email' => 'Email',
                    'phone_no' => 'Phone No',
                    'status' => 'Status',
                    'doc' => 'Doc',
                    'dou' => 'Dou',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
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
                $criteria->compare('post_id', $this->post_id);
                $criteria->compare('user_name', $this->user_name, true);
                $criteria->compare('password', $this->password, true);
                $criteria->compare('name', $this->name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('phone_no', $this->phone_no, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('ub', $this->ub);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return AdminUsers the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
