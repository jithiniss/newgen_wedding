<?php

/* ApiController intersmart newgen_wedding
 * Author: sujan@intersmart.in
 * Company: http://www.intersmartsolution.com/
 */
require_once('vendor/autoload.php');

use Zend\Config\Factory;
use Zend\Http\PhpEnvironment\Request;
use Firebase\JWT\JWT;

class ApiController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Calcutta');
                JWT::$leeway = 20;
        }

        public function actionValidateToken() {  // token validate, return type bool
                $this->layout = null;
                header('Content-type:application/json');
                if ($_REQUEST['token'] != "") {
                        $model = ApiClients::model()->findByAttributes(array('access_token' => $_REQUEST['token']));
                        if (count($model) > 0) {
                                try {
                                        $config = Factory::fromFile('authConfig/config.php', true);
                                        $secretKey = base64_decode($config->get('jwt')->get('key'));
                                        $token = JWT::decode($_REQUEST['token'], $secretKey, array($config->get('jwt')->get('algorithm')));
                                        if ($model->client_id == $token->clientid) {
                                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => "valid"));
                                                yii::app()->end();
                                        } else {
                                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Conflict'));
                                                yii::app()->end();
                                        }
                                } catch (Exception $ex) {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Unauthorized'));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Unauthorized'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionAuthentication() {
                $this->layout = null;
                $plans = array();
                header('Content:type:application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                if (isset($_REQUEST['username']) && isset($_REQUEST['pwd'])) {
                                        $user_login = UserDetails::model()->find(['condition' => '(email = "' . $_REQUEST['username'] . '" or user_id = "' . $_REQUEST['username'] . '") and  password = "' . $_REQUEST['pwd'] . '" and status > 0']);
                                        if (count($user_login) > 0) {
                                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => array('id' => $user_login->id, 'username' => $user_login->email)));
                                                yii::app()->end();
                                        } else {
                                                echo CJSON::encode(array('response' => 'error', 'code' => '404', 'result' => 'Not Found'));
                                                yii::app()->end();
                                        }
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '405', 'result' => 'Method Not Allowed'));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Conflict'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionProfileDetails() {
                $this->layout = null;
                $plans = array();
                header('Content:type:application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                if (isset($_REQUEST['userid'])) {
                                        $user = UserDetails::model()->findByPk($_REQUEST['userid']);
                                        if (count($user) > 0) {
                                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $user));
                                                yii::app()->end();
                                        } else {
                                                echo CJSON::encode(array('response' => 'error', 'code' => '404', 'result' => 'Not Found'));
                                                yii::app()->end();
                                        }
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '405', 'result' => 'Method Not Allowed'));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Conflict'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionPlans() {
                $this->layout = null;
                $plans = array();
                header('Content:type:application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                $plansetails = Plans::model()->findAllByAttributes(array('status' => 1), array('condition' => 'amount!=0', 'order' => 'amount desc'));
                                if (count($plansetails) > 0)
                                        $plans = $plansetails;
                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $plans));
                                yii::app()->end();
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Conflict'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionTellUsStory() {
                $this->layout = null;
                $story = array();
                header('Content:type:application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                $storyDetails = TellUsStory::model()->findAllByAttributes(array('status' => 1, 'admin_approval' => 1), array('limit' => 8));
                                if (count($storyDetails) > 0)
                                        $story = $storyDetails;
                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $story));
                                yii::app()->end();
                        }else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Conflict'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionFeatured() {
                $this->layout = null;
                $featured = array();
                header('Content:type:application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                $featureddetails = UserDetails::model()->findAllBySql("select up.id,ud.* from user_plans as up,user_details as ud where up.featured=1 AND
ud.id = up.user_id LIMIT 7");
                                if (count($featureddetails) > 0)
                                        $featured = $featureddetails;
                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $featured));
                                yii::app()->end();
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Conflict'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionWedingPlanner() {
                $this->layout = null;
                header('Content-type:appalication/json');
                $featured_list = array();
                $category = array();
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                $categoryDetails = MasterServices::model()->findAll(array('condition' => 'id in (select category_id from vendor_services where status=1 and vendor_id  in (select id from vendor_details where status=1 and approval_status=1))'));
                                $featured_listDetails = VendorServices::model()->findAll(array('condition' => 'status=1  and featured=1 and (vendor_id  in (select id from vendor_details where status=1 and approval_status=1))'));

                                if (count($featured_listDetails) > 0)
                                        $featured_list = $featured_listDetails;
                                if (count($categoryDetails) > 0)
                                        $category = $categoryDetails;

                                echo CJSON::encode(array('response' => 'success', 'category' => $category, 'featured_list' => $featured_list));
                                yii::app()->end();
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Conflict'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionRegisterFirstStep() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_POST['id']) && $_POST['id'] > 0) {
                        if ($userDetails = $this->validateToken($_POST['id'])) {
                                $firstStep = UserDetails::model()->findByPk($userDetails->userId);
                        } else {
                                $firstStep = new UserDetails('userFirstStep');
                        }
                } else {
                        $firstStep = new UserDetails('userFirstStep');
                }

                if (isset($_POST['UserDetails'])) {
                        if ($firstStep->save()) {
                                UserDetails::model()->userId($firstStep->id)->save();
                                $this->partnerDetails($firstStep->id)->save(false);
                                $this->userPlan($firstStep->id)->save(false);
                                $this->userInterest($firstStep->id)->save(false);
                                $user = UserDetails::model()->findByPk($firstStep->id);
                                $user->cb = $firstStep->id;
                                $user->ub = $firstStep->id;
                                $user->photo_visibility = 1;
                                $user->save(FALSE);
                                $plan = UserPlans::model()->findByAttributes(array('user_id' => $user->id));
                                $this->RegisterMail($user, 1);
                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => 'go to second step'));
                                yii::app()->end();
                        }
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => $firstStep->getErrors()));
                        yii::app()->end();
                }
                echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                yii::app()->end();
        }

        public function actionSecondStep() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_POST['id']) && $_POST['id'] > 0) {
                        $secondStep = UserDetails::model()->findByPk($_POST['id']);
                        $secondStep->scenario = 'userSecondStep';
                        if (isset($_POST['UserDetails'])) {
                                if ($secondStep->save()) {
                                        echo CJSON::encode(array('response' => 'success', 'code' => '200', 'msg' => $secondStep->getErrors()));
                                        yii::app()->end();
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '504', 'msg' => $secondStep->getErrors()));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '500', 'msg' => 'post variable missing'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'msg' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionThirdStep() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_POST['token']) && $_POST['token'] != "") {
                        if ($userDetails = $this->validateToken($_POST['token'])) {
                                $thirdStep = UserDetails::model()->findByPk($userDetails->userId);
                                $thirdStep->scenario = 'userThirdStep';
                                if (isset($_POST['UserDetails'])) {
                                        if ($thirdStep->save()) {
                                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'msg' => $secondStep->getErrors()));
                                                yii::app()->end();
                                        } else {
                                                echo CJSON::encode(array('response' => 'error', 'code' => '504', 'msg' => $thirdStep->getErrors()));
                                                yii::app()->end();
                                        }
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '500', 'msg' => 'post variable missing'));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'msg' => 'Tocken Expired'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '400', 'msg' => 'Tocken Missing'));
                        yii::app()->end();
                }
        }

        public function actionFourthStep() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_POST['id']) && $_POST['id'] != "") {
                        $fourthStep = UserDetails::model()->findByPk($_POST['id']);
                        if (isset($_POST['UserDetails'])) {
                                $fourthStep = $this->setFourthStep($fourthStep, $_POST['UserDetails']);
                                if ($fourthStep->save()) {
                                        echo CJSON::encode(array('response' => 'success', 'code' => '200', 'msg' => $secondStep->getErrors()));
                                        yii::app()->end();
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '504', 'msg' => $fourthStep->getErrors()));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '500', 'msg' => 'post variable missing'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'msg' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionPartnerdetails() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if (isset($_REQUEST['userid']) && $_REQUEST['userid'] > 0) {
                                if ($this->validateToken($_REQUEST['token'])) {
                                        $partner_details = PartnerDetails::model()->findByAttributes(array('user_id' => $_REQUEST['userid']));
                                        if (count($partner_details) > 0) {
                                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $partner_details));
                                                yii::app()->end();
                                        } else {
                                                echo CJSON::encode(array('response' => 'error', 'code' => '404', 'result' => 'Not Found'));
                                                yii::app()->end();
                                        }
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Conflict'));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '405', 'result' => 'Method Not Allowed'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionUserInterest() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if (isset($_POST['id']) && $_POST['id'] > 0) {
                                $interest = UserInterests::model()->findByAttributes(array('user_id' => $_POST['id']));
                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $interest));
                                yii::app()->end();
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionFavoritelist() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                if (isset($_REQUEST['userid']) && $_REQUEST['userid'] != "") {
                                        $criteria = new CDbCriteria();
                                        $criteria->condition = 'id in (select partner_id from favorites where user_id="' . $_REQUEST['userid'] . '" AND status = 1)';
                                        $faveratelist = UserDetails::model()->find($criteria);
                                        echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $faveratelist));
                                        yii::app()->end();
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '405', 'result' => 'Method Not Allowed'));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionSimilarProfile() {
                $this->layout = null;
                header('Content-Type: application/json');
                $similarprofile = array();
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                if (isset($_REQUEST['userid']) && $_REQUEST['userid'] != "") {
                                        $userid = $_REQUEST['userid'];
                                        $user = UserDetails::model()->findByAttributes(array('user_id' => $userid));
                                        $similar_profile1 = UserDetails::model()->findAllByAttributes(array(
                                            'gender' => $user->gender,
                                            'religion' => $user->religion,
                                            'caste' => $user->caste,
                                            'dob_year' => $user->dob_year,
                                            'country' => $user->country,
                                            'state' => $user->state,
                                            'city' => $user->city,
                                            'education_level' => $user->education_level,
                                            'working_as' => $user->working_as), array('condition' => 'user_id != "' . $userid . '"'));

                                        $similar_profile2 = UserDetails::model()->findAllByAttributes(array(
                                            'gender' => $user->gender,
                                            'religion' => $user->religion,
                                            'caste' => $user->caste,
                                            'dob_year' => $user->dob_year,
                                            'country' => $user->country,
                                            'state' => $user->state,
                                            'city' => $user->city,
                                            'education_level' => $user->education_level), array('condition' => 'user_id != "' . $userid . '"'));
                                        $similar_profile3 = UserDetails::model()->findAllByAttributes(array(
                                            'gender' => $user->gender,
                                            'religion' => $user->religion,
                                            'caste' => $user->caste,
                                            'dob_year' => $user->dob_year,
                                            'country' => $user->country,
                                            'state' => $user->state,
                                            'city' => $user->city,
                                                ), array('condition' => 'user_id != "' . $userid . '"'));
                                        $similar_profile4 = UserDetails::model()->findAllByAttributes(array(
                                            'gender' => $user->gender,
                                            'religion' => $user->religion,
                                            'caste' => $user->caste,
                                            'dob_year' => $user->dob_year,
                                            'country' => $user->country,
                                            'state' => $user->state,
                                                ), array('condition' => 'user_id != "' . $userid . '"'));
                                        $similar_profile5 = UserDetails::model()->findAllByAttributes(array(
                                            'gender' => $user->gender,
                                            'religion' => $user->religion,
                                            'caste' => $user->caste,
                                            'dob_year' => $user->dob_year,
                                            'country' => $user->country,
                                                ), array('condition' => 'user_id != "' . $userid . '"'));
                                        $similar_profile6 = UserDetails::model()->findAllByAttributes(array(
                                            'gender' => $user->gender,
                                            'religion' => $user->religion,
                                            'caste' => $user->caste,
                                            'dob_year' => $user->dob_year,
                                                ), array('condition' => 'user_id != "' . $userid . '"'));
                                        $similar_profile7 = UserDetails::model()->findAllByAttributes(array(
                                            'gender' => $user->gender,
                                            'religion' => $user->religion,
                                            'caste' => $user->caste,
                                                ), array('condition' => 'user_id != "' . $userid . '"'));
                                        $similar_profile8 = UserDetails::model()->findAllByAttributes(array(
                                            'gender' => $user->gender,
                                            'religion' => $user->religion), array('condition' => 'user_id != "' . $userid . '"'));


                                        if (!empty($similar_profile1)) {
                                                $similarprofile = $similar_profile1;
                                        } else if (!empty($similar_profile2)) {
                                                $similarprofile = $similar_profile2;
                                        } else if (!empty($similar_profile3)) {
                                                $similarprofile = $similar_profile3;
                                        } else if (!empty($similar_profile4)) {
                                                $similarprofile = $similar_profile4;
                                        } else if (!empty($similar_profile5)) {
                                                $similarprofile = $similar_profile5;
                                        } else if (!empty($similar_profile6)) {
                                                $similarprofile = $similar_profile6;
                                        } else if (!empty($similar_profile7)) {
                                                $similarprofile = $similar_profile7;
                                        } else if (!empty($similar_profile8)) {
                                                $similarprofile = $similar_profile8;
                                        } else {
                                                $similarprofile = array();
                                        }
                                        echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $similarprofile));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionMyMatches() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                if (isset($_REQUEST['userid']) && $_REQUEST['userid'] > 0) {
                                        $matches = $this->MyMatches($_REQUEST['userid']);
                                        echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $matches));
                                        yii::app()->end();
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionProfileVisited() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_POST['id']) && $_POST['id'] > 0) {
                        $profile_visitors = ProfileVisitors::model()->findAllByAttributes(array('visited_id' => $_POST['id']), array('order' => 'date DESC', 'group' => 'user_id', 'distinct' => TRUE));
                        echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $profile_visitors));
                        yii::app()->end();
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionMyTwoWayMatches() {
                $this->layout = null;
                header('Content-Type: application/json');
                if (isset($_REQUEST['token']) && $_REQUEST['token'] != "") {
                        if ($this->validateToken($_REQUEST['token'])) {
                                if (isset($_REQUEST['userid']) && $_REQUEST['userid'] > 0) {
                                        $twowaymatches = $this->MyTwoWayMatches($_REQUEST['userid']);
                                        echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $twowaymatches));
                                        yii::app()->end();
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
        }

        public function actionBasicSearch() { // pending
                $this->layout = null;
                header('Content-Type: application/json');
                $model = new SavedSearch();
                if (isset($_POST['token']) && $_POST['token'] != "") {
                        if ($userDetails = $this->validateToken($_POST['token'])) {
                                if (isset($_POST['SavedSearch'])) {
                                        $model->attributes = $_POST['SavedSearch'];
                                        $model->user_id = Yii::app()->session['user']['id'];
                                        if ($_POST['SavedSearch']['gender'] == 2) {
                                                $model->gender = 1;
                                        } else {
                                                $model->gender = 2;
                                        }

                                        if ($model->save()) {

                                        } else {
                                                echo CJSON::encode(array('response' => 'error', 'code' => '402', 'msg' => $model->getErrors()));
                                                yii::app()->end();
                                        }
                                } else {
                                        echo CJSON::encode(array('response' => 'error', 'code' => '402', 'msg' => 'Userid missing'));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'msg' => 'Tocken Expired'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '400', 'msg' => 'Tocken Missing'));
                        yii::app()->end();
                }

                $this->render('basic', array('model' => $model));
        }

// Auth token

        public function actionGenerateToken() {
                $this->layout = null;
                header('Content-Type: application/json');
                $request = new Request();
                if ($request->isPost()) {
                        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                        if ($username && $password) {
                                try {
                                        $config = Factory::fromFile('authConfig/config.php', true);
                                        $userDetails = UserDetails::model()->findByAttributes(array('status' => 1, 'email' => $username, 'password' => $password));
                                        if (count($userDetails) > 0) {
                                                $tokenId = base64_encode(mcrypt_create_iv(32));
                                                $issuedAt = time();
                                                $notBefore = $issuedAt + 10;  //Adding 10 seconds
                                                $expire = $notBefore + 3600; // Adding 1 hour
                                                $serverName = $config->get('serverName');
                                                $data = [
                                                    'iat' => $issuedAt, // Issued at: time when the token was generated
                                                    'jti' => $tokenId, // Json Token Id: an unique identifier for the token
                                                    'iss' => $serverName, // Issuer
                                                    'nbf' => $notBefore, // Not before
                                                    'exp' => $expire, // Expire
                                                    'data' => [// Data related to the signer user
                                                        'userId' => $userDetails->id, // userid from the users table
                                                        'userName' => $username, // User name
                                                    ]
                                                ];
                                                $secretKey = base64_decode($config->get('jwt')->get('key'));
                                                $algorithm = $config->get('jwt')->get('algorithm');
                                                $jwt = JWT::encode(
                                                                $data, //Data to be encoded in the JWT
                                                                $secretKey, // The signing key
                                                                $algorithm  // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
                                                );


                                                $unencodedArray = ['intersmart' => $jwt];
                                                echo json_encode(array('response' => 'success', 'code' => '200', 'token' => $unencodedArray));
                                                yii::app()->end();
                                        } else {
//header('HTTP/1.0 401 Unauthorized');
                                                echo(json_encode(array('response' => 'error', 'code' => '401', 'msg' => 'Unauthorized action')));
                                                yii::app()->end();
                                        }
                                } catch (Exception $ex) {
                                        echo(json_encode(array('response' => 'error', 'code' => '401', 'msg' => $ex->getMessage())));
                                        yii::app()->end();
//header('HTTP/1.0 500 Internal Server Error');
                                }
                        } else {
                                echo(json_encode(array('response' => 'error', 'code' => '406', 'msg' => 'Supplied parameter wromg')));
                                yii::app()->end();
// header('HTTP/1.0 400 Bad Request');
                        }
                } else {
                        echo(json_encode(array('response' => 'error', 'code' => '400', 'msg' => 'Method Not Allowed')));
                        yii::app()->end();
// header('HTTP/1.0 405 Method Not Allowed');
                }
        }

// Utility Functions
        protected function performAjaxValidation($model, $model_id) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === $model_id) {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

        public function actionCurlRequest() {
                if (isset($_GET['act'])) {
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, "http://localhost/newgen_wedding/index.php/Api/" . $_GET['act']);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $data = curl_exec($curl);
                        echo $data;
                        yii::app()->end();
                } else {
                        echo "No action set";
                        yii::app()->end();
                }
        }

        public function actionTokenCheck() {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "http://localhost/newgen_wedding/index.php/Api/GenerateToken");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "username=sujannath@gmail.com&password=sujan");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $server_output = curl_exec($ch);
                curl_close($ch);
                echo $server_output;
        }

        public function actionTokenRegister() {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "http://localhost/newgen_wedding/index.php/Api/RegisterFirstStep");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpYXQiOjE0NzM0MTU2OTQsImp0aSI6InFQZkg2Y01KbGFwTnQ2MmdsMHRKNWsyb05XMWxBdlwvXC9GanBkeDdyQTArbz0iLCJpc3MiOiJsb2NhbGhvc3QiLCJuYmYiOjE0NzM0MTU3MDQsImV4cCI6MTQ3MzQxOTMwNCwiZGF0YSI6eyJ1c2VySWQiOiI3OSIsInVzZXJOYW1lIjoic3VqYW5uYXRoQGdtYWlsLmNvbSJ9fQ.fwBpSHDQql3SFsBmpycv5p3Q9unqz8iXGFCEvOnxmmuVDKqL3ARP6Nr-EziNDMCplGyBA9MoWFZQxqNaauAg9w");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $server_output = curl_exec($ch);
                curl_close($ch);
                echo $server_output;
        }

        public function actionValToken() {
                $ch = curl_init();
                $data = array('token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJjbGllbnRpZCI6IjI2QUZCMDEwLUY5RjctOTQ0Qi1BQUFDLTJEOURDMDc4MjU2QiJ9.E3HlNiBVFs52dUL-6JIETd6RSUT_KlvjIKxNMPoGYov_71TM4xoZBIsZKRg3gaFhO_yle0Obi4YTC70ocXorPg',
                    'userid' => 79
                );
                curl_setopt($ch, CURLOPT_URL, "http://localhost/newgen_wedding/index.php/Api/MyTwoWayMatches");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $server_output = curl_exec($ch);
                curl_close($ch);
                echo $server_output;
        }

        public function userPlan($id) {
                $user_details = UserDetails::model()->findByPk($id);
                $plan_details = Plans::model()->findByPk($user_details->plan_id);
                $model = new UserPlans;
                $model->attributes = $plan_details->attributes;
                $model->view_contact_left = $plan_details->view_contact;
                $model->send_message_left = $plan_details->send_message;
                $model->number_of_days_left = $plan_details->number_of_days;
                $model->user_id = $id;
                return $model;
        }

        public function userInterest($id) {
                $user_details = UserDetails::model()->findByPk($id);
                if (!empty($user_details)) {
                        $model = new UserInterests;
                        $model->cb = $id;
                        $model->doc = date('Y-m-d');
                        $model->status = 1;
                        return $model;
                } else {
                        return FALSE;
                }
        }

        /* mail to user and admin */

        public function RegisterMail($model, $s = '') {
//                $to = $model->email;
                $message = new YiiMailMessage;
                $message->view = "_register_user_mail";  // view file name
                $params = array('model' => $model); // parameters
                $message->subject = 'Welcome to NEWGEN.com!';
                $message->setBody($params, 'text/html');
                $message->addTo($model->email);
                $message->from = 'newgenwedding@intersmart.in';

                if (Yii::app()->mail->send($message)) {
                        if ($s == 1) {
                                $admin_mail = AdminUsers::model()->findByPk(1);
                                $message1 = new YiiMailMessage;
                                $message1->view = "_register_admin_mail";  // view file name
                                $params1 = array('model' => $model); // parameters
                                $message1->subject = $model->first_name . ' registered with NEWGEN.com';
                                $message1->setBody($params1, 'text/html');
                                $message1->addTo($admin_mail->email);
                                $message1->from = 'newgenwedding@intersmart.in';
                                Yii::app()->mail->send($message1);
                        }
                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function actionResendMail() {
                if (isset(Yii::app()->session['user']) && Yii::app()->session['user'] != NULL && Yii::app()->session['user'] != '') {
                        $model = UserDetails::model()->findByPk(Yii::app()->session['user']['id ']);
                        $this->RegisterMail($model, 0);
                        $this->redirect(Yii::app()->request->urlReferrer);
                } else {
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function MyMatches($id = 0) {
                $opt = '';
                $user = UserDetails::model()->findByPk(array('id' => $id));
                $blocked_members = BlockedMembers::model()->findAllByAttributes(array('user_id' => $id, 'status' => 1));
                foreach ($blocked_members as $blocked) {
                        $optionsid = $blocked->block_id . ',';
                        $opt.=$optionsid;
                }
                $blocked_ids = rtrim($opt, ',');
                if (!empty($blocked_ids)) {
                        $blocked_ids = rtrim($opt, ',');
                } else {
                        $blocked_ids = 0;
                }

                $partner = PartnerDetails::model()->findByAttributes(array('user_id' => $id));
                if ($user->gender == 1) {
                        $gender = 2;
                } else {
                        $gender = 1;
                }
                $date_from = date('Y') - $partner->age_from;
                $date_to = date('Y') - $partner->age_to;
                $condition1 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET(working_with,"' . $partner->working_with . '")'
                        . ' AND FIND_IN_SET(working_as,"' . $partner->profession_area . '")'
                        . ' AND FIND_IN_SET(education_field,"' . $partner->education . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')   '
                        . ' AND status = 1';
                $condition2 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET(working_with,"' . $partner->working_with . '")'
                        . ' AND FIND_IN_SET(working_as,"' . $partner->profession_area . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')   '
                        . ' AND status = 1';
                $condition3 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET(working_with,"' . $partner->working_with . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition4 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition5 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition6 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition7 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition8 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ') '
                        . ' AND status = 1';
                $condition9 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND id NOT IN (' . $blocked_ids . ') '
                        . ' AND status = 1';

                $condition10 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND id NOT IN (' . $blocked_ids . ') '
                        . ' AND status = 1';


                $condition11 = 'gender = ' . $gender
                        . ' AND id NOT IN (' . $blocked_ids . ') '
                        . ' AND status = 1';

                $matchprofile1 = UserDetails::model()->findAll(array('condition' => $condition1));
                $matchprofile2 = UserDetails::model()->findAll(array('condition' => $condition2));
                $matchprofile3 = UserDetails::model()->findAll(array('condition' => $condition3));
                $matchprofile4 = UserDetails::model()->findAll(array('condition' => $condition4));
                $matchprofile5 = UserDetails::model()->findAll(array('condition' => $condition5));
                $matchprofile6 = UserDetails::model()->findAll(array('condition' => $condition6));
                $matchprofile7 = UserDetails::model()->findAll(array('condition' => $condition7));
                $matchprofile8 = UserDetails::model()->findAll(array('condition' => $condition8));
                $matchprofile9 = UserDetails::model()->findAll(array('condition' => $condition9));
                $matchprofile10 = UserDetails::model()->findAll(array('condition' => $condition10));
                $matchprofile11 = UserDetails::model()->findAll(array('condition' => $condition11));


                if (!empty($matchprofile1)) {
                        return $matchprofile1;
                } else if (!empty($matchprofile2)) {
                        return $matchprofile2;
                } else if (!empty($matchprofile3)) {
                        return $matchprofile3;
                } else if (!empty($matchprofile4)) {
                        return $matchprofile4;
                } else if (!empty($matchprofile5)) {
                        return $matchprofile5;
                } else if (!empty($matchprofile6)) {
                        return $matchprofile6;
                } else if (!empty($matchprofile7)) {
                        return $matchprofile7;
                } else if (!empty($matchprofile8)) {
                        return $matchprofile8;
                } else if (!empty($matchprofile9)) {
                        return $matchprofile9;
                } else if (!empty($matchprofile10)) {
                        return $matchprofile10;
                } else if (!empty($matchprofile11)) {
                        return $matchprofile11;
                } else {
                        return NULL;
                }
        }

        public function MyTwoWayMatches($uid) {
                $user = UserDetails::model()->findByPk(array('id' => $uid));
                $partner = PartnerDetails::model()->findByAttributes(array('user_id' => $uid));
                if ($user->gender == 1) {
                        $gender = 2;
                } else {
                        $gender = 1;
                }
                $date_from = date('Y') - $partner->age_from;
                $date_to = date('Y') - $partner->age_to;
                $condition1 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND status = 1';
                $mymatchestwo = UserDetails::model()->findAll(array('condition' => $condition1));

                if (!empty($mymatchestwo)) {
                        foreach ($mymatchestwo as $mymatche) {
                                if ($mymatche->gender == 1) {
                                        $partnergender = 2;
                                } else {
                                        $partnergender = 1;
                                }
                                $matches_partner_details = PartnerDetails::model()->findByAttributes(array('user_id' => $mymatche->id));
                                $partner_date_from = date('Y') - $matches_partner_details->age_from;
                                $partner_date_to = date('Y') - $matches_partner_details->age_to;
                                $partnercondition = 'gender = ' . $partnergender
                                        . ' AND dob_year <= ' . $partner_date_from
                                        . ' AND dob_year >= ' . $partner_date_to
                                        . ' AND  FIND_IN_SET(religion,"' . $matches_partner_details->religion . '")'
                                        . ' AND FIND_IN_SET(caste , "' . $matches_partner_details->caste . '")'
                                        . ' AND FIND_IN_SET(country , "' . $matches_partner_details->country_living_in . '")'
                                        . ' AND FIND_IN_SET(state , "' . $matches_partner_details->residency_status . '")'
                                        . ' AND FIND_IN_SET(grow_up_in , "' . $matches_partner_details->country_grew_up . '")'
                                        . ' AND city = ' . $mymatche->city
                                        . ' AND FIND_IN_SET(working_with , "' . $matches_partner_details->working_with . '")'
                                        . ' AND FIND_IN_SET(working_as ,"' . $matches_partner_details->profession_area . '")'
                                        . ' AND FIND_IN_SET(education_field ,"' . $matches_partner_details->education . '")'
                                        . ' AND status = 1'
                                        . ' AND id = ' . $user->id;
                                $partner_matches = UserDetails::model()->findAll(array('condition' => $partnercondition));
                                if (!empty($partner_matches)) {
                                        return $partner_matches;
                                } else {
                                        return NULL;
                                }
                        }
                }
        }

        public function validateToken($token) {  // token validate, return type bool
                error_reporting(E_ALL);
                $model = ApiClients::model()->findByAttributes(array('access_token' => $token));
                if (count($model) > 0) {
                        try {
                                $config = Factory::fromFile('authConfig/config.php', true);
                                $secretKey = base64_decode($config->get('jwt')->get('key'));
                                $token = JWT::decode($token, $secretKey, array($config->get('jwt')->get('algorithm')));
                                if ($model->client_id == $token->clientid)
                                        return true;
                                else {
                                        return false;
                                }
                        } catch (Exception $ex) {
                                return false;
                        }
                } else {
                        return false;
                }
        }

}
