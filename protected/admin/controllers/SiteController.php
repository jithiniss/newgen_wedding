<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
                $this->layout='//layouts/empty';
		$model= new AdminUsers();
                if(isset($_REQUEST['AdminUsers'])){
                     $modell=  AdminUsers::model()->findByAttributes(array('user_name'=>$_REQUEST['AdminUsers']['user_name'],'password'=>$_REQUEST['AdminUsers']['password']));
                    if($modell!='' && $modell!==NULL){
                        Yii::app()->session['admin']=$modell;
                        
                        $this->redirect($this->createUrl('/site/home'));
                        
                    }else{
                       $model->addError('password','invalid username or password');
                    }
                }
		$this->render('login',array('model'=>$model));
	}
        
        public function actionHome()
	{
           
		$this->render('home');
	}
        
         public function actionPassword()
	{
                $model = new AdminUsers;
                if(isset($_POST['AdminUsers'])){
                    $old = AdminUsers::model()->findByPk(Yii::app()->session['admin']['id']);
                    if($old->password == $_POST['AdminUsers']['password']){
                        if($_POST['AdminUsers']['CB'] == $_POST['AdminUsers']['UB']){
                            $old->password = $_POST['AdminUsers']['UB'];
                            $old->save();
                        }else{
                            $model->addError('password', "password does't match");
                        }
                    }else{
                        $model->addError('password', 'Invalid paassword');
                    }
                    //var_dump($old);exit();
                    
                }
		$this->render('change',array('model'=>$model));
	}
        
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
        
        
        public function actionSearchDealers() {
            
            if (Yii::app()->request->isAjaxRequest) {
                
                if (isset($_REQUEST['SearchValue'])) {
                    
                        $model = Dealers::model()->findAll(array(
                        'select' => 'company_name',
                        "condition" => "company_name LIKE '%" . $_REQUEST['SearchValue'] . "%' OR website LIKE '%" . $_REQUEST['SearchValue'] . "%' OR contact_person LIKE '%" . $_REQUEST['SearchValue'] . "%' OR activity LIKE '%" . $_REQUEST['SearchValue'] . "%' OR area LIKE '%" . $_REQUEST['SearchValue'] . "%' OR city LIKE '%" . $_REQUEST['SearchValue'] . "%' OR address LIKE '%" . $_REQUEST['SearchValue'] . "%' LIMIT 0,10"));
                            $this->renderPartial('_ajaxSearchDealers', array('model'=>$model));
                      
                }
                }else {
                    
             die("Can't access this url.");
                
             
                }
        }
        
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
        
        
         public function actionOut(){
            unset(Yii::app()->session['b2b']);
            unset($_SESSION);
            Yii::app()->user->logout();
            $this->redirect('index');
        }
        
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}