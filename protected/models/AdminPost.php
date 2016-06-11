<?php

/**
 * This is the model class for table "admin_post".
 *
 * The followings are the available columns in table 'admin_post':
 * @property integer $id
 * @property string $post_name
 * @property integer $static_content
 * @property integer $dynamic_content
 * @property integer $slider
 * @property integer $gallery
 * @property integer $contact_us
 * @property integer $social_media
 * @property integer $other
 * @property integer $site_content
 * @property integer $service
 * @property integer $news
 * @property integer $settings
 * @property integer $status
 * @property string $doc
 * @property string $dou
 * @property integer $cb
 * @property integer $ub
 *
 * The followings are the available model relations:
 * @property AdminUsers[] $adminUsers
 */
class AdminPost extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'admin_post';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('post_name, static_content, dynamic_content, slider, gallery, contact_us, social_media, other, site_content, service, news, settings, status', 'required'),
                    array('static_content, dynamic_content, slider, gallery, contact_us, social_media, other, site_content, service, news, settings, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('post_name', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, post_name, static_content, dynamic_content, slider, gallery, contact_us, social_media, other, site_content, service, news, settings, status, doc, dou, cb, ub', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'adminUsers' => array(self::HAS_MANY, 'AdminUsers', 'post_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'post_name' => 'Post Name',
                    'static_content' => 'Static Content',
                    'dynamic_content' => 'Dynamic Content',
                    'slider' => 'Slider',
                    'gallery' => 'Gallery',
                    'contact_us' => 'Contact Us',
                    'social_media' => 'Social Media',
                    'other' => 'Other',
                    'site_content' => 'Site Content',
                    'service' => 'Service',
                    'news' => 'News',
                    'settings' => 'Settings',
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
                $criteria->compare('post_name', $this->post_name, true);
                $criteria->compare('static_content', $this->static_content);
                $criteria->compare('dynamic_content', $this->dynamic_content);
                $criteria->compare('slider', $this->slider);
                $criteria->compare('gallery', $this->gallery);
                $criteria->compare('contact_us', $this->contact_us);
                $criteria->compare('social_media', $this->social_media);
                $criteria->compare('other', $this->other);
                $criteria->compare('site_content', $this->site_content);
                $criteria->compare('service', $this->service);
                $criteria->compare('news', $this->news);
                $criteria->compare('settings', $this->settings);
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
         * @return AdminPost the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
