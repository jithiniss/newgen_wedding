<?php

/**
 * This is the model class for table "master_state".
 *
 * The followings are the available columns in table 'master_state':
 * @property integer $id
 * @property integer $country_id
 * @property string $state
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 *
 * The followings are the available model relations:
 * @property MasterCity[] $masterCities
 * @property MasterCountry $country
 */
class MasterState extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'master_state';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('country_id, state, status', 'required'),
                    array('country_id, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('state', 'length', 'max' => 99),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, country_id, state, status, cb, ub, doc, dou', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'masterCities' => array(self::HAS_MANY, 'MasterCity', 'state_id'),
                    'country' => array(self::BELONGS_TO, 'MasterCountry', 'country_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'country_id' => 'Country',
                    'state' => 'State',
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
                $criteria->compare('country_id', $this->country_id);
                $criteria->compare('state', $this->state, true);
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
         * @return MasterState the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
