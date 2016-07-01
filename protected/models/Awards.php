<?php

/**
 * This is the model class for table "awards".
 *
 * The followings are the available columns in table 'awards':
 * @property integer $id
 * @property integer $year
 * @property string $content
 * @property string $image
 * @property integer $sort_order
 * @property integer $field1
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 * @property integer $status
 */
class Awards extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'awards';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('year, content, sort_order', 'required'),
                    array('year, sort_order', 'numerical', 'integerOnly' => true),
                    array('image', 'file', 'allowEmpty' => FALSE, 'types' => 'jpg,jpeg,gif,png', 'on' => 'create'),
                    array('image', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, year, content, image, sort_order, field1, cb, ub, doc, dou, status', 'safe', 'on' => 'search'),
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
                    'year' => 'Year',
                    'content' => 'Content',
                    'image' => 'Image',
                    'sort_order' => 'Sort Order',
                    'field1' => 'Field1',
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
                $criteria->compare('year', $this->year);
                $criteria->compare('content', $this->content, true);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('sort_order', $this->sort_order);
                $criteria->compare('field1', $this->field1);
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
         * @return Awards the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
