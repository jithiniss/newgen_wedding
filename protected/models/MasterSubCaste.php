<?php

/**
 * This is the model class for table "master_sub_caste".
 *
 * The followings are the available columns in table 'master_sub_caste':
 * @property integer $id
 * @property integer $religion_id
 * @property integer $caste_id
 * @property string $sub_caste
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 *
 * The followings are the available model relations:
 * @property MasterReligion $religion
 * @property MasterCaste $caste
 */
class MasterSubCaste extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'master_sub_caste';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('religion_id, caste_id, sub_caste, status', 'required'),
                    array('religion_id, caste_id, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('sub_caste', 'length', 'max' => 99),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, religion_id, caste_id, sub_caste, status, cb, ub, doc, dou', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'religion' => array(self::BELONGS_TO, 'MasterReligion', 'religion_id'),
                    'caste' => array(self::BELONGS_TO, 'MasterCaste', 'caste_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'religion_id' => 'Religion',
                    'caste_id' => 'Caste',
                    'sub_caste' => 'Sub Caste',
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
                $criteria->compare('religion_id', $this->religion_id);
                $criteria->compare('caste_id', $this->caste_id);
                $criteria->compare('sub_caste', $this->sub_caste, true);
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
         * @return MasterSubCaste the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
