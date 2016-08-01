<?php

/**
 * This is the model class for table "tell_us_story".
 *
 * The followings are the available columns in table 'tell_us_story':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $partner_name
 * @property string $partner_email
 * @property string $feedback
 * @property string $wedding_date
 * @property string $image
 * @property integer $field1
 * @property integer $field2
 * @property integer $admin_approve
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 * @property integer $status
 */
class TellUsStory extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'tell_us_story';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('name, email, partner_name, partner_email, feedback, wedding_date', 'required'),
                    array('image', 'file', 'allowEmpty' => FALSE, 'types' => 'jpg,jpeg,gif,png', 'on' => 'create'),
                    array('email, partner_email', 'email'),
                    array('name, email, partner_name, partner_email', 'length', 'max' => 200),
                    array('feedback', 'min' => 180),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, name, email, partner_name, partner_email, feedback, wedding_date, image, field1, field2, admin_approval, cb, ub, doc, dou, status', 'safe', 'on' => 'search'),
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
                    'name' => 'Name',
                    'email' => 'Email',
                    'partner_name' => 'Partner Name',
                    'partner_email' => 'Partner Email',
                    'feedback' => 'Feedback',
                    'wedding_date' => 'Wedding Date',
                    'image' => 'Image',
                    'field1' => 'Field1',
                    'field2' => 'Field2',
                    'admin_approval' => 'Admin Approval',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'doc' => 'Doc',
                    'dou' => 'Dou',
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
                $criteria->compare('name', $this->name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('partner_name', $this->partner_name, true);
                $criteria->compare('partner_email', $this->partner_email, true);
                $criteria->compare('feedback', $this->feedback, true);
                $criteria->compare('wedding_date', $this->wedding_date, true);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('field1', $this->field1);
                $criteria->compare('field2', $this->field2);
                $criteria->compare('admin_approval', $this->admin_approval);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);
                $criteria->compare('status', $this->status);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return TellUsStory the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
