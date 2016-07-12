<?php

/**
 * This is the model class for table "mail_sms_alert".
 *
 * The followings are the available columns in table 'mail_sms_alert':
 * @property integer $id
 * @property integer $photo_mail
 * @property integer $premium_mail
 * @property integer $recent_visitor_mail
 * @property integer $shortlist_mail
 * @property integer $viewed_profile_mail
 * @property integer $similar_profile_mail
 * @property integer $sms_alert
 * @property integer $notification_offers
 * @property integer $newgen_insite_alert
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class MailSmsAlert extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'mail_sms_alert';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
//			array('photo_mail, premium_mail, recent_visitor_mail, shortlist_mail, viewed_profile_mail, similar_profile_mail, sms_alert, notification_offers, newgen_insite_alert, cb, doc, ub', 'required'),
                    array('photo_mail, premium_mail, recent_visitor_mail, shortlist_mail, viewed_profile_mail, similar_profile_mail, sms_alert, notification_offers, newgen_insite_alert, cb, ub', 'numerical', 'integerOnly' => true),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, photo_mail, premium_mail, recent_visitor_mail, shortlist_mail, viewed_profile_mail, similar_profile_mail, sms_alert, notification_offers, newgen_insite_alert, cb, doc, ub, dou', 'safe', 'on' => 'search'),
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
                    'photo_mail' => 'Photo Mail',
                    'premium_mail' => 'Premium Mail',
                    'recent_visitor_mail' => 'Recent Visitor Mail',
                    'shortlist_mail' => 'Shortlist Mail',
                    'viewed_profile_mail' => 'Viewed Profile Mail',
                    'similar_profile_mail' => 'Similar Profile Mail',
                    'sms_alert' => 'Sms Alert',
                    'notification_offers' => 'Notification Offers',
                    'newgen_insite_alert' => 'Newgen Insite Alert',
                    'cb' => 'Cb',
                    'doc' => 'Doc',
                    'ub' => 'Ub',
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
                $criteria->compare('photo_mail', $this->photo_mail);
                $criteria->compare('premium_mail', $this->premium_mail);
                $criteria->compare('recent_visitor_mail', $this->recent_visitor_mail);
                $criteria->compare('shortlist_mail', $this->shortlist_mail);
                $criteria->compare('viewed_profile_mail', $this->viewed_profile_mail);
                $criteria->compare('similar_profile_mail', $this->similar_profile_mail);
                $criteria->compare('sms_alert', $this->sms_alert);
                $criteria->compare('notification_offers', $this->notification_offers);
                $criteria->compare('newgen_insite_alert', $this->newgen_insite_alert);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return MailSmsAlert the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
