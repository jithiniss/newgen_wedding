<?php

/**
 * This is the model class for table "partner_details".
 *
 * The followings are the available columns in table 'partner_details':
 * @property integer $id
 * @property integer $user_id
 * @property integer $age_from
 * @property integer $age_to
 * @property integer $height_from
 * @property integer $height_to
 * @property string $marital_status
 * @property string $religion
 * @property string $caste
 * @property string $mothertongue
 * @property string $profile_created_by
 * @property string $country_living_in
 * @property string $residency_status
 * @property string $country_grew_up
 * @property string $education
 * @property string $working_with
 * @property string $profession_area
 * @property string $annual_income_from
 * @property string $annual_income_to
 * @property string $diet
 * @property integer $smoke
 * @property integer $drink
 * @property string $body_type
 * @property string $skin_tone
 * @property integer $disability
 * @property integer $HIV_positive
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 *
 * The followings are the available model relations:
 * @property UserDetails $user
 */
class PartnerDetails extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'partner_details';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('user_id, age_from, age_to, height_from, height_to, marital_status, religion, caste, mothertongue, profile_created_by, country_living_in, residency_status, country_grew_up, education, working_with, profession_area, annual_income_from, annual_income_to, diet, smoke, drink, body_type, skin_tone, disability, HIV_positive, status, cb, ub, doc, dou', 'required'),
                    array('user_id, age_from, age_to, height_from, height_to, smoke, drink, disability, HIV_positive, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('marital_status, religion, caste, mothertongue, profile_created_by, country_living_in, residency_status, country_grew_up, education, working_with, profession_area, annual_income_from, annual_income_to, diet, body_type, skin_tone', 'length', 'max' => 99),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, age_from, age_to, height_from, height_to, marital_status, religion, caste, mothertongue, profile_created_by, country_living_in, residency_status, country_grew_up, education, working_with, profession_area, annual_income_from, annual_income_to, diet, smoke, drink, body_type, skin_tone, disability, HIV_positive, status, cb, ub, doc, dou', 'safe', 'on' => 'search'),
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
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'user_id' => 'User',
                    'age_from' => 'Age From',
                    'age_to' => 'Age To',
                    'height_from' => 'Height From',
                    'height_to' => 'Height To',
                    'marital_status' => 'Marital Status',
                    'religion' => 'Religion',
                    'caste' => 'Caste',
                    'mothertongue' => 'Mothertongue',
                    'profile_created_by' => 'Profile Created By',
                    'country_living_in' => 'Country Living In',
                    'residency_status' => 'Residency Status',
                    'country_grew_up' => 'Country Grew Up',
                    'education' => 'Education',
                    'working_with' => 'Working With',
                    'profession_area' => 'Profession Area',
                    'annual_income_from' => 'Annual Income From',
                    'annual_income_to' => 'Annual Income To',
                    'diet' => 'Diet',
                    'smoke' => 'Smoke',
                    'drink' => 'Drink',
                    'body_type' => 'Body Type',
                    'skin_tone' => 'Skin Tone',
                    'disability' => 'Disability',
                    'HIV_positive' => 'Hiv Positive',
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
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('age_from', $this->age_from);
                $criteria->compare('age_to', $this->age_to);
                $criteria->compare('height_from', $this->height_from);
                $criteria->compare('height_to', $this->height_to);
                $criteria->compare('marital_status', $this->marital_status, true);
                $criteria->compare('religion', $this->religion, true);
                $criteria->compare('caste', $this->caste, true);
                $criteria->compare('mothertongue', $this->mothertongue, true);
                $criteria->compare('profile_created_by', $this->profile_created_by, true);
                $criteria->compare('country_living_in', $this->country_living_in, true);
                $criteria->compare('residency_status', $this->residency_status, true);
                $criteria->compare('country_grew_up', $this->country_grew_up, true);
                $criteria->compare('education', $this->education, true);
                $criteria->compare('working_with', $this->working_with, true);
                $criteria->compare('profession_area', $this->profession_area, true);
                $criteria->compare('annual_income_from', $this->annual_income_from, true);
                $criteria->compare('annual_income_to', $this->annual_income_to, true);
                $criteria->compare('diet', $this->diet, true);
                $criteria->compare('smoke', $this->smoke);
                $criteria->compare('drink', $this->drink);
                $criteria->compare('body_type', $this->body_type, true);
                $criteria->compare('skin_tone', $this->skin_tone, true);
                $criteria->compare('disability', $this->disability);
                $criteria->compare('HIV_positive', $this->HIV_positive);
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
         * @return PartnerDetails the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
