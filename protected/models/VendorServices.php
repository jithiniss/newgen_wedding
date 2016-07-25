<?php

/**
 * This is the model class for table "vendor_services".
 *
 * The followings are the available columns in table 'vendor_services':
 * @property integer $id
 * @property integer $vendor_id
 * @property integer $category_id
 * @property string $name
 * @property string $address
 * @property string $description
 * @property string $phn_no
 * @property string $email
 * @property string $website
 * @property string $map
 * @property string $video
 * @property string $image
 * @property string $facebook
 * @property string $google_plus
 * @property string $twitter
 * @property string $linkdin
 * @property integer $featured
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 *
 * The followings are the available model relations:
 * @property MasterServices $category
 * @property VendorDetails $vendor
 */
class VendorServices extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'vendor_services';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('vendor_id, category_id, name, address, description, phn_no, email, featured, status', 'required'),
                    array('vendor_id, category_id, featured, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('name, address, video, image', 'length', 'max' => 200),
                    array('phn_no, email', 'length', 'max' => 100),
                    array('website, map, facebook, google_plus, twitter, linkdin', 'length', 'max' => 500),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, vendor_id, category_id, name, address, description, phn_no, email, website, map, video, image, facebook, google_plus, twitter, linkdin, featured, status, cb, ub, doc, dou', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'category' => array(self::BELONGS_TO, 'MasterServices', 'category_id'),
                    'vendor' => array(self::BELONGS_TO, 'VendorDetails', 'vendor_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'vendor_id' => 'Vendor',
                    'category_id' => 'Category',
                    'name' => 'Name',
                    'address' => 'Address',
                    'description' => 'Description',
                    'phn_no' => 'Phone No',
                    'email' => 'Email',
                    'website' => 'Website',
                    'map' => 'Map',
                    'video' => 'Video',
                    'image' => 'Image',
                    'facebook' => 'Facebook',
                    'google_plus' => 'Google Plus',
                    'twitter' => 'Twitter',
                    'linkdin' => 'Linkdin',
                    'featured' => 'Featured',
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
                $criteria->compare('vendor_id', $this->vendor_id);
                $criteria->compare('category_id', $this->category_id);
                $criteria->compare('name', $this->name, true);
                $criteria->compare('address', $this->address, true);
                $criteria->compare('description', $this->description, true);
                $criteria->compare('phn_no', $this->phn_no, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('website', $this->website, true);
                $criteria->compare('map', $this->map, true);
                $criteria->compare('video', $this->video, true);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('facebook', $this->facebook, true);
                $criteria->compare('google_plus', $this->google_plus, true);
                $criteria->compare('twitter', $this->twitter, true);
                $criteria->compare('linkdin', $this->linkdin, true);
                $criteria->compare('featured', $this->featured);
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
         * @return VendorServices the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
