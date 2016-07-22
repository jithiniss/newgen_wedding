<?php

/**
 * This is the model class for table "report_misuse".
 *
 * The followings are the available columns in table 'report_misuse':
 * @property integer $id
 * @property integer $user_id
 * @property integer $report_id
 * @property integer $report_reason
 * @property string $description
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 * @property integer $status
 */
class ReportMisuse extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'report_misuse';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('user_id, report_id, report_reason,', 'required'),
                    array('user_id, report_id, report_reason, cb, ub, status', 'numerical', 'integerOnly' => true),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, report_id, report_reason, description, cb, doc, ub, dou, status', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'user' => array(self::BELONGS_TO, 'UserDetails', 'user_id'),
                    'user0' => array(self::BELONGS_TO, 'UserDetails', 'report_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'user_id' => 'User',
                    'report_id' => 'Report',
                    'report_reason' => 'Report Reason',
                    'description' => 'Description',
                    'cb' => 'Cb',
                    'doc' => 'Doc',
                    'ub' => 'Ub',
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
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('report_id', $this->report_id);
                $criteria->compare('report_reason', $this->report_reason);
                $criteria->compare('description', $this->description, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('ub', $this->ub);
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
         * @return ReportMisuse the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
