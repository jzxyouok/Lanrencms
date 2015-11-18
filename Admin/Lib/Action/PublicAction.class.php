<?php

// +----------------------------------------------------------------------

// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]

// +----------------------------------------------------------------------

// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.

// +----------------------------------------------------------------------

// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )

// +----------------------------------------------------------------------

// | Author: liu21st <liu21st@gmail.com>

// +----------------------------------------------------------------------



class PublicAction extends Action {
	

	function _initialize() {

        import('@.ORG.Util.Cookie');

	}



	// 检查用户是否登录

	protected function checkUser() {

		if(!isset($_SESSION[C('USER_AUTH_KEY')])) {

			$this->assign('jumpUrl',C('USER_AUTH_GATEWAY'));

			$this->error('没有登录'); 

		}

	}



	// 顶部页面

	public function top() {

		C('SHOW_RUN_TIME',false);			// 运行时间显示

		C('SHOW_PAGE_TRACE',false);

		$model	=	M("Group");

		$list	=	$model->where('status=1')->getField('id,title');

		$this->assign('nodeGroupList',$list);

		$this->display();

	}

	// 尾部页面

	public function footer() {

		C('SHOW_RUN_TIME',false);			// 运行时间显示

		C('SHOW_PAGE_TRACE',false);

		$this->display();

	}

	// 菜单页面

	public function menu() {

        $this->checkUser();

        if(isset($_SESSION[C('USER_AUTH_KEY')])) {

            //显示菜单项

            $menu  = array();

            if(isset($_SESSION['menu'.$_SESSION[C('USER_AUTH_KEY')]])) {



                //如果已经缓存，直接读取缓存

                $menu   =   $_SESSION['menu'.$_SESSION[C('USER_AUTH_KEY')]];

            }else {

                //读取数据库模块列表生成菜单项

                $node    =   M("Node");

				$id	=	$node->getField("id");

				$where['level']=2;

				$where['status']=1;

				$where['pid']=$id;

                $list	=	$node->where($where)->field('id,name,group_id,title')->order('sort asc')->select();

                $accessList = $_SESSION['_ACCESS_LIST'];

                foreach($list as $key=>$module) {

                     if(isset($accessList[strtoupper(APP_NAME)][strtoupper($module['name'])]) || $_SESSION['administrator']) {

                        //设置模块访问权限

                        $module['access'] =   1;

                        $menu[$key]  = $module;

                    }

                }

                //缓存菜单访问

                $_SESSION['menu'.$_SESSION[C('USER_AUTH_KEY')]]	=	$menu;

            }

            if(!empty($_GET['tag'])){

                $this->assign('menuTag',$_GET['tag']);

            }

			//dump($menu);

            $this->assign('menu',$menu);

		}

		C('SHOW_RUN_TIME',false);			// 运行时间显示

		C('SHOW_PAGE_TRACE',false);

		$this->display();

	}

	

//	public function menu() {

//        $this->checkUser();

//        if(isset($_SESSION[C('USER_AUTH_KEY')])) {

//            //显示菜单项

//            $menu  = array();

//            if(isset($_SESSION['menu'.$_SESSION[C('USER_AUTH_KEY')]])) {

//

//                //如果已经缓存，直接读取缓存

//                $menu   =   $_SESSION['menu'.$_SESSION[C('USER_AUTH_KEY')]];

//            }else {

//                //读取数据库模块列表生成菜单项

//                $node    =   M("Node");

//				$id	=	$node->getField("id");

//				$where['level']=2;

//				$where['status']=1;

//				$where['pid']=$id;

//                $list	=	$node->where($where)->field('id,name,group_id,title')->order('sort asc')->select();

//                $accessList = $_SESSION['_ACCESS_LIST'];

//                foreach($list as $key=>$module) {

//                     if(isset($accessList[strtoupper(APP_NAME)][strtoupper($module['name'])]) || $_SESSION['administrator']) {

//                        //设置模块访问权限

//                        $module['access'] =   1;

//                        $menu[$key]  = $module;

//                    }

//                }

//                //缓存菜单访问

//                $_SESSION['menu'.$_SESSION[C('USER_AUTH_KEY')]]	=	$menu;

//            }

//            if(!empty($_GET['tag'])){

//                $this->assign('menuTag',$_GET['tag']);

//            }

//			//dump($menu);

//            $this->assign('menu',$menu);

//		}

//		C('SHOW_RUN_TIME',false);			// 运行时间显示

//		C('SHOW_PAGE_TRACE',false);

//		$this->display();

//	}



    // 后台首页 查看系统信息

    public function main() {

        $info = array(

            '操作系统'=>PHP_OS,

            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],

            'PHP运行方式'=>php_sapi_name(),

            'ThinkPHP版本'=>THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',

            '上传附件限制'=>ini_get('upload_max_filesize'),

            '执行时间限制'=>ini_get('max_execution_time').'秒',

            '服务器时间'=>date("Y年n月j日 H:i:s"),

            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),

            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',

            '剩余空间'=>round((@disk_free_space(".")/(1024*1024)),2).'M',

            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",

            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',

            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',

            );

        $this->assign('info',$info);

        $this->display();

    }



	// 用户登录页面

	public function login() {

		Cookie::set ( '_currentUrl_', __SELF__ );

		if(!isset($_SESSION[C('USER_AUTH_KEY')])) {

			$this->display();

		}else{

			$this->redirect('/');

		}

	}



	public function index()

	{

		//如果通过认证跳转到首页

		redirect(__APP__);

	}



	// 用户登出

    public function logout()

    {

        if(isset($_SESSION[C('USER_AUTH_KEY')])) {

			unset($_SESSION[C('USER_AUTH_KEY')]);

			unset($_SESSION);

			session_destroy();

			if (isset($_SERVER['HTTP_COOKIE']))
			{
			    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			    foreach ($cookies as $cookie)
			    {
			        $parts = explode('=', $cookie);
			        $name = trim($parts[0]);
			        setcookie($name, '', time() - 1000);
			        setcookie($name, '', time() - 1000, '/');
			    }
			}

            //$this->assign("jumpUrl",__APP__.'/Index');
            $this->assign("jumpUrl",$_SERVER["HTTP_REFERER"]);

            $this->success('登出成功！');

        }else {

            $this->error('已经登出！');

        }

    }






	// 登录检测

	public function checkLogin() {


		if(empty($_POST['username'])) {

			$this->error('帐号不能为空！');

		}elseif (empty($_POST['password'])){

			$this->error('密码不能为空！');

		}

		 elseif (empty($_POST['verify'])){

		 	$this->error('验证码必须！');

		 }

        //生成认证条件

        $map            =   array();

		// 支持使用绑定帐号登录

		$map['userid']	= array('eq',$_POST['username']);
        $map["status"]	=	array('eq',1);

		 if($_SESSION['verify'] != md5($_POST['verify'])) {

		 	$this->error('验证码错误！');
		 }

		//import ( '@.ORG.Util.RBAC' );

        //$authInfo = RBAC::authenticate($map);

        //使用用户名、密码和状态的方式进行认证

        //if(false === $authInfo) {

            //$this->error('帐号不存在或已禁用！');

        //}else {



			$Admin	=	M('Admin');

			$vo = $Admin -> where($map)->find();

			if(!$vo){

				$this->error('帐号不存在或已禁用！');	

			}



            if($vo['pwd'] != md5($_POST['password'])) {

            	$this->error('密码错误！');

            }

            $_SESSION[C('USER_AUTH_KEY')]	=	$vo['id'];
            //$_SESSION['email']	=	$authInfo['email'];
            $_SESSION["admin"]	=	$vo;

			//$_SESSION['login_count']	=	$authInfo['login_count'];

            //if($vo['a_type']=='manage') {

            $_SESSION['administrator']		=	true; 

            //}

            //保存登录信息

			$ip		=	get_client_ip();
			$time	=	time();
            $data = array();
			$data['id']	=	$vo['id'];
			$data['logintime']	=	$time;
			$data['loginip']	=	$ip;			
			$Admin->save($data);

			// 缓存访问权限
            //RBAC::saveAccessList();
			$this->success('登录成功！',U("Main/index"));				

		//}

	}

    // 更换密码

    public function changePwd()

    {

		$this->checkUser();

        //对表单提交处理进行处理或者增加非表单数据

		if(md5($_POST['verify'])	!= $_SESSION['verify']) {

			$this->error('验证码错误！');

		}

		$map	=	array();

        $map['password']= pwdHash($_POST['oldpassword']);

        if(isset($_POST['account'])) {

            $map['account']	 =	 $_POST['account'];

        }elseif(isset($_SESSION[C('USER_AUTH_KEY')])) {

            $map['id']		=	$_SESSION[C('USER_AUTH_KEY')];

        }

        //检查用户

        $User    =   M("User");

        if(!$User->where($map)->field('id')->find()) {

            $this->error('旧密码不符或者用户名错误！');

        }else {

			$User->password	=	pwdHash($_POST['password']);

			$User->save();

			$this->success('密码修改成功！');

         }

    }

	public function profile() {

		$this->checkUser();

		$User	 =	 M("admin");

		$vo	=	$User->getById($_SESSION[C('USER_AUTH_KEY')]);

		$this->assign('vo',$vo);

		$this->display();

	}

	public function verify()

    {

		$type	 =	 isset($_GET['type'])?$_GET['type']:'gif';

        import("@.ORG.Util.Image");

        Image::buildImageVerify(4,1,$type);

    }

// 修改资料

	public function change() {

		$this->checkUser();

		$User	 =	 D("User");

		if(!$User->create()) {

			$this->error($User->getError());

		}

		$result	=	$User->save();

		if(false !== $result) {

			$this->success('资料修改成功！');

		}else{

			$this->error('资料修改失败!');

		}

	}


	public function htmlLogin() {
		if ($_SESSION [C ( 'USER_AUTH_KEY' )]){
			$tmp = 'document.write("<a href=\"'.U('Main/index').'\" style=\"font-weight:bold;\">'.$_SESSION['userid'].'</a> | <a style=\"font-weight:bold;\" href=\"'.U('Public/logout').'\">退出</a>");';
		}else{
			$tmp =  'document.write("<a href=\"'.U('Index/index').'\">登陆</a> | <a href=\"'.U('Public/reg').'\">注册</a>");';

		}
		echo iconv('UTF-8', 'GBK//ignore',$tmp);
		exit;		 
	}

	public function reg() {
			if ($_SESSION [C ( 'USER_AUTH_KEY' )]){
				header("Location: ".U("Main/index"));
				exit;
			}		 

			if($_POST){
				$userid = I("post.userid");
				$userpwd = I("post.userpwd");
				$userpwd2 = I("post.userpwd2");
				$email = I("post.email");
				if($userpwd != $userpwd){
					$this->error('两次输入密码不正确！');
				}

				$tmp = M("Member")->where("userid='".$userid."'")->field("userid")->find();
				if($tmp){
					$this->error('该用户名已被注册，请重新注册！');
				}

				$tmp = M("Member")->where("userid='".$email."'")->field("userid")->find();
				if($tmp){
					$this->error('该Email已被注册，请重新注册！');
				}



				$mid = M("Member")->data(array('userid' => $userid,'pwd'=>md5($userpwd),'email'=>$email,'logintime'=>time(),'joinip'=>get_client_ip()))->add();
				if($mid){
					M("Member_person")->data(array('mid' => $mid,'uname'=>$userid))->add();
					M("Member_tj")->data(array('mid' => $mid))->add();

					//user rank  register score
					$rank = M("Arcrank")->where("rank=".C("cfg_mb_rank"))->field("scores")->find();
					if($rank){
						M("Member")->where(array('userid' => $userid))->save(array('rank'=>C("cfg_mb_rank"),'scores'=>$rank['scores']));
					} 
					//insert log
					$model = M ("Score_log" );
			    	$model->add(array('mid'=>$mid,'typeid'=>2,'addtime'=>time(),'score'=>$rank["scores"],'summary'=>'注册获取积分'));


					$this->success('注册成功,请登陆！',U("Public/index"));
				}
		   }else{
	   			$this->display();
		   }	

	}


	//direct login
	public function directLogin(){
		$userid = $this->_param("userid");
		$pwd = $this->_param("pwd");
		$vo = M("Member")->where(array('userid'=>$userid,'pwd'=>$pwd))->field('mid,userid,logintime')->find();
		if($vo){
            $_SESSION[C('USER_AUTH_KEY')]	=	$vo['mid'];
            $_SESSION['userid']		=	$vo['userid'];
            $_SESSION['logintime']		=	$vo['logintime'];
            $_SESSION['administrator']		=	true; 
			$this->success('登录成功！',U("Main/index"));				
		}else{
			$this->error('登录失败！');				
		}
	}	
}

?>
