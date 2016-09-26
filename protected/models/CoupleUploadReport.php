<?php

/**
 * This is the model class for table "couple_upload_report".
 *
 * The followings are the available columns in table 'couple_upload_report':
 * @property integer $id
 * @property integer $couple_id
 * @property integer $couple_upload_id
 * @property string $like_id
 * @property integer $like
 * @property string $dislike_id
 * @property integer $dislike
 * @property string $comment_id
 * @property string $comment
 * @property string $doc
 * @property string $dou
 */
class CoupleUploadReport extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'couple_upload_report';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('couple_id, couple_upload_id', 'required'),
                    array('couple_id, couple_upload_id, like, dislike', 'numerical', 'integerOnly' => true),
                    array('like_id, dislike_id, comment_id', 'length', 'max' => 250),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, couple_id, couple_upload_id, like_id, like, dislike_id, dislike, comment_id, comment, comments, doc, dou', 'safe', 'on' => 'search'),
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
                    'couple_id' => 'Couple',
                    'couple_upload_id' => 'Couple Upload',
                    'like_id' => 'Like',
                    'like' => 'Like',
                    'dislike_id' => 'Dislike',
                    'dislike' => 'Dislike',
                    'comment_id' => 'Comment',
                    'comment' => 'Comment',
                    'comments' => 'Comments',
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
                $criteria->compare('couple_id', $this->couple_id);
                $criteria->compare('couple_upload_id', $this->couple_upload_id);
                $criteria->compare('like_id', $this->like_id, true);
                $criteria->compare('like', $this->like);
                $criteria->compare('dislike_id', $this->dislike_id, true);
                $criteria->compare('dislike', $this->dislike);
                $criteria->compare('comment_id', $this->comment_id, true);
                $criteria->compare('comment', $this->comment);
                $criteria->compare('comments', $this->comments, true);
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
         * @return CoupleUploadReport the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
