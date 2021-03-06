<?php

/**
 * This is the model class for table "chat_box".
 *
 * The followings are the available columns in table 'chat_box':
 * @property integer $id
 * @property integer $sender
 * @property integer $reciever
 * @property string $message
 * @property string $date
 * @property integer $status
 * @property string $feild1
 */
class ChatBox extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'chat_box';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
//			array('sender, reciever, message, date, status, feild1', 'required'),
                    array('sender, reciever, status', 'numerical', 'integerOnly' => true),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, sender, reciever, message, date, status, feild1', 'safe', 'on' => 'search'),
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
                    'sender' => 'Sender',
                    'reciever' => 'Reciever',
                    'message' => 'Message',
                    'date' => 'Date',
                    'status' => 'Status',
                    'feild1' => 'Feild1',
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
                $criteria->compare('sender', $this->sender);
                $criteria->compare('reciever', $this->reciever);
                $criteria->compare('message', $this->message, true);
                $criteria->compare('date', $this->date, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('feild1', $this->feild1, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return ChatBox the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
