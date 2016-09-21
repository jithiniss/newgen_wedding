<?php

/**
 * This is the model class for table "api_clients".
 *
 * The followings are the available columns in table 'api_clients':
 * @property integer $id
 * @property string $client_id
 * @property string $client_secret
 * @property string $created_time
 * @property string $access_token
 * @property integer $status
 * @property string $expire_time
 * @property integer $created_by
 */
class ApiClients extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'api_clients';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('client_id, client_secret, created_time, created_by', 'required'),
                    array('status, created_by', 'numerical', 'integerOnly' => true),
                    array('client_id', 'length', 'max' => 250),
                    array('client_secret, access_token', 'length', 'max' => 255),
                    array('expire_time', 'safe'),
                    array('client_id', 'unique'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, client_id, client_secret, created_time, access_token, status, expire_time, created_by', 'safe', 'on' => 'search'),
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
                    'client_id' => 'Client Id',
                    'client_secret' => 'Client Secret',
                    'created_time' => 'Created Time',
                    'access_token' => 'Access Token',
                    'status' => 'Status',
                    'expire_time' => 'Expire Time',
                    'created_by' => 'Created By',
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
                $criteria->compare('client_id', $this->client_id, true);
                $criteria->compare('client_secret', $this->client_secret, true);
                $criteria->compare('created_time', $this->created_time, true);
                $criteria->compare('access_token', $this->access_token, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('expire_time', $this->expire_time, true);
                $criteria->compare('created_by', $this->created_by);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return ApiClients the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
