<?php

/**
 * This is the model class for table "user_details".
 *
 * The followings are the available columns in table 'user_details':
 * @property integer $id
 * @property string $user_id
 * @property string $email
 * @property string $password
 * @property string $contact_number
 * @property integer $profile_for
 * @property string $first_name
 * @property string $last_name
 * @property integer $gender
 * @property integer $dob_day
 * @property integer $dob_month
 * @property integer $dob_year
 * @property string $dob
 * @property integer $religion
 * @property integer $caste
 * @property integer $sub_caste
 * @property integer $nakshatra
 * @property integer $suddha_jadhagam
 * @property integer $regional_site
 * @property integer $marital_status
 * @property integer $mothertongue
 * @property integer $country
 * @property integer $state
 * @property integer $city
 * @property integer $zip_code
 * @property string $home_town
 * @property string $house_name
 * @property integer $height
 * @property integer $weight
 * @property integer $skin_tone
 * @property integer $body_type
 * @property integer $health_info
 * @property integer $blood_group
 * @property integer $disablity
 * @property integer $smoke
 * @property integer $drink
 * @property integer $diet
 * @property integer $education_level
 * @property integer $education_field
 * @property integer $working_with
 * @property integer $working_as
 * @property integer $annual_income
 * @property string $mobile_number
 * @property integer $father_status
 * @property integer $mother_status
 * @property integer $num_of_married_brother
 * @property integer $num_of_unmarried_brother
 * @property integer $num_of_married_sister
 * @property integer $num_of_unmarried_sister
 * @property integer $family_type
 * @property integer $family_value
 * @property integer $affluence_level
 * @property integer $grow_up_in
 * @property string $about_me
 * @property string $photo
 * @property integer $mob_num_verification
 * @property string $id_proof
 * @property integer $register_step
 * @property integer $status
 * @property string $last_login
 * @property integer $created_by
 * @property integer $profile_approval
 * @property integer $image_approval
 * @property integer $plan_id
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 *
 * The followings are the available model relations:
 * @property PartnerDetails[] $partnerDetails
 */
class UserDetails extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'user_details';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('email, password, contact_number, profile_for, first_name, last_name, gender, dob_day, dob_month, dob_year, dob, religion, mothertongue, country', 'required', 'on' => 'userFirstStep'),
                    //array('user_id, email, password, contact_number, profile_for, first_name, last_name, gender, dob_day, dob_month, dob_year, religion, caste, sub_caste, nakshatra, suddha_jadhagam, regional_site, marital_status, mothertongue, country, state, city, zip_code, height, weight, skin_tone, body_type, health_info, blood_group, disablity, smoke, drink, diet, education_level, education_field, working_with, working_as, annual_income, mobile_number, father_status, mother_status, num_of_married_brother, num_of_unmarried_brother, num_of_married_sister, num_of_unmarried_sister, family_type, family_value, affluence_level, grow_up_in, about_me, photo, mob_num_verification, id_proof, register_step, status, last_login, created_by, profile_approval, image_approval, cb, ub, doc, dou', 'required'),
                    array('email, password, contact_number, profile_for, first_name, last_name, gender, dob_day, dob_month, dob_year, dob, religion, caste, marital_status, mothertongue, country, state, city, zip_code, education_level, education_field, working_with, working_as, annual_income, mobile_number, grow_up_in, plan_id', 'required', 'on' => 'admin_create'),
                    array('profile_for, gender, dob_day, dob_month, dob_year, religion, caste, sub_caste, nakshatra, suddha_jadhagam, regional_site, marital_status, mothertongue, country, state, city, zip_code, height, weight, skin_tone, body_type, health_info, blood_group, disablity, smoke, drink, diet, education_level, education_field, working_with, working_as, annual_income, father_status, mother_status, num_of_married_brother, num_of_unmarried_brother, num_of_married_sister, num_of_unmarried_sister, family_type, family_value, affluence_level, grow_up_in, mob_num_verification, register_step, status, created_by, profile_approval, image_approval, plan_id, cb, ub', 'numerical', 'integerOnly' => true),
                    array('email', 'email'),
                    array('email', 'unique'),
                    array('profile_for, gender, dob_day, dob_month, dob_year, religion, caste, sub_caste, nakshatra, suddha_jadhagam, regional_site, marital_status, mothertongue, country, state, city, zip_code, height, weight, skin_tone, body_type, health_info, blood_group, disablity, smoke, drink, diet, education_level, education_field, working_with, working_as, annual_income, father_status, mother_status, num_of_married_brother, num_of_unmarried_brother, num_of_married_sister, num_of_unmarried_sister, family_type, family_value, affluence_level, grow_up_in, mob_num_verification, register_step, status, created_by, profile_approval, image_approval, cb, ub', 'numerical', 'integerOnly' => true),
                    array('user_id, password', 'length', 'max' => 50),
                    array('email, first_name, last_name', 'length', 'max' => 100),
                    array('contact_number, mobile_number', 'length', 'max' => 20),
                    array('home_town, house_name', 'length', 'max' => 200),
                    array('photo, id_proof', 'length', 'max' => 99),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, email, password, contact_number, profile_for, first_name, last_name, gender, dob_day, dob_month, dob_year, dob, religion, caste, sub_caste, nakshatra, suddha_jadhagam, regional_site, marital_status, mothertongue, country, state, city, zip_code, home_town, house_name, height, weight, skin_tone, body_type, health_info, blood_group, disablity, smoke, drink, diet, education_level, education_field, working_with, working_as, annual_income, mobile_number, father_status, mother_status, num_of_married_brother, num_of_unmarried_brother, num_of_married_sister, num_of_unmarried_sister, family_type, family_value, affluence_level, grow_up_in, about_me, photo, mob_num_verification, id_proof, register_step, status, last_login, created_by, profile_approval, image_approval, plan_id, cb, ub, doc, dou', 'safe', 'on' => 'search'),
                );
        }

        public function userId($id) {
                $model = UserDetails::model()->findByPk($id);
                $model->user_id = 'SH' . $model->id;
                return $model;
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'partnerDetails' => array(self::HAS_MANY, 'PartnerDetails', 'user_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'user_id' => 'User',
                    'email' => 'Email',
                    'password' => 'Password',
                    'contact_number' => 'Contact Number',
                    'profile_for' => 'Profile For',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'gender' => 'Gender',
                    'dob_day' => 'Day',
                    'dob_month' => 'Month',
                    'dob_year' => 'Year',
                    'dob' => 'Date of birth',
                    'religion' => 'Religion',
                    'caste' => 'Caste',
                    'sub_caste' => 'Sub Caste',
                    'nakshatra' => 'Nakshatra',
                    'suddha_jadhagam' => 'Suddha Jadhagam',
                    'regional_site' => 'Regional Site',
                    'marital_status' => 'Marital Status',
                    'mothertongue' => 'Mothertongue',
                    'country' => 'Country',
                    'state' => 'State',
                    'city' => 'City',
                    'zip_code' => 'Zip Code',
                    'home_town' => 'Home Town',
                    'house_name' => 'House Name',
                    'height' => 'Height',
                    'weight' => 'Weight',
                    'skin_tone' => 'Skin Tone',
                    'body_type' => 'Body Type',
                    'health_info' => 'Health Info',
                    'blood_group' => 'Blood Group',
                    'disablity' => 'Disablity',
                    'smoke' => 'Smoke',
                    'drink' => 'Drink',
                    'diet' => 'Diet',
                    'education_level' => 'Education Level',
                    'education_field' => 'Education Field',
                    'working_with' => 'Working With',
                    'working_as' => 'Working As',
                    'annual_income' => 'Annual Income',
                    'mobile_number' => 'Mobile Number',
                    'father_status' => 'Father Status',
                    'mother_status' => 'Mother Status',
                    'num_of_married_brother' => 'Num Of Married Brother',
                    'num_of_unmarried_brother' => 'Num Of Unmarried Brother',
                    'num_of_married_sister' => 'Num Of Married Sister',
                    'num_of_unmarried_sister' => 'Num Of Unmarried Sister',
                    'family_type' => 'Family Type',
                    'family_value' => 'Family Value',
                    'affluence_level' => 'Affluence Level',
                    'grow_up_in' => 'Grow Up In',
                    'about_me' => 'About Me',
                    'photo' => 'Photo',
                    'mob_num_verification' => 'Mob Num Verification',
                    'id_proof' => 'Id Proof',
                    'register_step' => 'Register Step',
                    'status' => 'Status',
                    'last_login' => 'Last Login',
                    'created_by' => 'Created By',
                    'profile_approval' => 'Profile Approval',
                    'image_approval' => 'Image Approval',
                    'plan_id' => 'plan_id',
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
                $criteria->compare('user_id', $this->user_id, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('password', $this->password, true);
                $criteria->compare('contact_number', $this->contact_number, true);
                $criteria->compare('profile_for', $this->profile_for);
                $criteria->compare('first_name', $this->first_name, true);
                $criteria->compare('last_name', $this->last_name, true);
                $criteria->compare('gender', $this->gender);
                $criteria->compare('dob_day', $this->dob_day);
                $criteria->compare('dob_month', $this->dob_month);
                $criteria->compare('dob_year', $this->dob_year);
                $criteria->compare('dob', $this->dob);
                $criteria->compare('religion', $this->religion);
                $criteria->compare('caste', $this->caste);
                $criteria->compare('sub_caste', $this->sub_caste);
                $criteria->compare('nakshatra', $this->nakshatra);
                $criteria->compare('suddha_jadhagam', $this->suddha_jadhagam);
                $criteria->compare('regional_site', $this->regional_site);
                $criteria->compare('marital_status', $this->marital_status);
                $criteria->compare('mothertongue', $this->mothertongue);
                $criteria->compare('country', $this->country);
                $criteria->compare('state', $this->state);
                $criteria->compare('city', $this->city);
                $criteria->compare('zip_code', $this->zip_code);
                $criteria->compare('home_town', $this->home_town, true);
                $criteria->compare('house_name', $this->house_name, true);
                $criteria->compare('height', $this->height);
                $criteria->compare('weight', $this->weight);
                $criteria->compare('skin_tone', $this->skin_tone);
                $criteria->compare('body_type', $this->body_type);
                $criteria->compare('health_info', $this->health_info);
                $criteria->compare('blood_group', $this->blood_group);
                $criteria->compare('disablity', $this->disablity);
                $criteria->compare('smoke', $this->smoke);
                $criteria->compare('drink', $this->drink);
                $criteria->compare('diet', $this->diet);
                $criteria->compare('education_level', $this->education_level);
                $criteria->compare('education_field', $this->education_field);
                $criteria->compare('working_with', $this->working_with);
                $criteria->compare('working_as', $this->working_as);
                $criteria->compare('annual_income', $this->annual_income);
                $criteria->compare('mobile_number', $this->mobile_number, true);
                $criteria->compare('father_status', $this->father_status);
                $criteria->compare('mother_status', $this->mother_status);
                $criteria->compare('num_of_married_brother', $this->num_of_married_brother);
                $criteria->compare('num_of_unmarried_brother', $this->num_of_unmarried_brother);
                $criteria->compare('num_of_married_sister', $this->num_of_married_sister);
                $criteria->compare('num_of_unmarried_sister', $this->num_of_unmarried_sister);
                $criteria->compare('family_type', $this->family_type);
                $criteria->compare('family_value', $this->family_value);
                $criteria->compare('affluence_level', $this->affluence_level);
                $criteria->compare('grow_up_in', $this->grow_up_in);
                $criteria->compare('about_me', $this->about_me, true);
                $criteria->compare('photo', $this->photo, true);
                $criteria->compare('mob_num_verification', $this->mob_num_verification);
                $criteria->compare('id_proof', $this->id_proof, true);
                $criteria->compare('register_step', $this->register_step);
                $criteria->compare('status', $this->status);
                $criteria->compare('last_login', $this->last_login, true);
                $criteria->compare('created_by', $this->created_by);
                $criteria->compare('profile_approval', $this->profile_approval);
                $criteria->compare('image_approval', $this->image_approval);
                $criteria->compare('plan_id', $this->plan_id);
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
         * @return UserDetails the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
