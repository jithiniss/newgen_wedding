<?php

class WeddingPlannerController extends Controller {

        public function actionIndex() {
                //$planner = VendorServices::model()->findAll(array('condition' => 'vendor_id  in (select id from vendor_details where status=1 and approval_status=1)'));
                $category = MasterServices::model()->findAll(array('condition' => 'id in (select category_id from vendor_services where status=1 and vendor_id  in (select id from vendor_details where status=1 and approval_status=1))'));
                $this->render('index', array('category' => $category));
        }

        public function actionCategory($id) {
                $criteria = new CDbCriteria;
                $total = VendorServices::model()->count(array('condition' => 'category_id=' . $id . ' and (vendor_id  in (select id from vendor_details where status=1 and approval_status=1))'));
                if(!empty($total)) {

                        // $total = Post::model()->count();

                        $pages = new CPagination($total);
                        $pages->pageSize = 2;
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
                $service_detail = VendorServices::model()->findByPk($id);
                if(!empty($service_detail)) {

                } else {
                        $this->redirect(array('index'));
                }
                $this->render('plan_details');
        }

}
