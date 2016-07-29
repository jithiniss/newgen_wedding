<?php

class WeddingPlannerController extends Controller {

        public function init() {
                if(isset(Yii::app()->session['user']) && Yii::app()->session['user']['id'] != '') {

                } else {
                        $this->redirect(array('//site/index'));
                }
        }

        public function actionIndex() {
                //$planner = VendorServices::model()->findAll(array('condition' => 'vendor_id  in (select id from vendor_details where status=1 and approval_status=1)'));
                $category = MasterServices::model()->findAll(array('condition' => 'id in (select category_id from vendor_services where status=1 and vendor_id  in (select id from vendor_details where status=1 and approval_status=1))'));
                $featured_list = VendorServices::model()->findAll(array('condition' => 'status=1  and featured=1 and (vendor_id  in (select id from vendor_details where status=1 and approval_status=1))'));

                $this->render('index', array('category' => $category, 'featured_list' => $featured_list));
        }

        public function actionCategory($id) {
                $criteria = new CDbCriteria;
                $criteria->condition = 'status=1 and category_id=' . $id . ' and (vendor_id  in (select id from vendor_details where status=1 and approval_status=1))';
                $total = VendorServices::model()->count(array('condition' => 'status=1 and category_id=' . $id . ' and (vendor_id  in (select id from vendor_details where status=1 and approval_status=1))'));

                if(!empty($total)) {

                        // $total = Post::model()->count();

                        $pages = new CPagination($total);
                        $pages->pageSize = 4;
                        $pages->applyLimit($criteria);

                        $posts = VendorServices::model()->findAll($criteria);

                        $this->render('plans', array(
                            'posts' => $posts,
                            'pages' => $pages,
                        ));
                } else {
                        $this->redirect(array('index'));
                }
        }

        public function actionDetail($id) {
                $service_detail = VendorServices::model()->find(array('condition' => 'status=1 and id=' . $id . ' and (vendor_id  in (select id from vendor_details where status=1 and approval_status=1))'));
                if(!empty($service_detail)) {
                        $model = new WeddingPlannerEnquiry;


                        $this->performAjaxValidation($model);

                        if(isset($_POST['WeddingPlannerEnquiry'])) {
                                $model->attributes = $_POST['WeddingPlannerEnquiry'];
                                $model->vendor_id = $service_detail->vendor_id;
                                $model->status = 1;
                                $model->user_id = Yii::app()->session['user']['id'];
                                $model->doc = date('Y-m-d');
                                if($model->save()) {
                                        $model->unsetAttributes();
                                        Yii::app()->user->setFlash('enquire_success', 'Enquiry Submitted Successfully. We will contact you soon..');
                                        Yii::app()->user->setFlash('enquire_success1', 'Enquiry Submitted Successfully. We will contact you soon..');
                                }
                        }
                        $similar_services = VendorServices::model()->findAllByAttributes(array('category_id' => $service_detail->category_id), array('condition' => 'id!=' . $service_detail->id . ' and (vendor_id  in (select id from vendor_details where status=1 and approval_status=1))', 'limit' => 6));
                        $this->render('plan_details', array('service_detail' => $service_detail, 'similar_services' => $similar_services, 'model' => $model));
                } else {
                        $this->redirect(array('index'));
                }
        }

        protected function performAjaxValidation($model) {
                if(isset($_POST['ajax']) && $_POST['ajax'] === 'wedding-planner-enquiry-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
