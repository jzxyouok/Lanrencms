<?php
  class SetupAction extends CommonAction{
     public function index(){
	     
	     $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );		
     	 $vo = M("Member_person")->where("mid=".$_SESSION [C ( 'USER_AUTH_KEY' )])->find();	
     	 $member = M("Member")->where("mid=".$_SESSION [C ( 'USER_AUTH_KEY' )])->find();	

		 $this->assign ( 'vo', $vo );
		 $this->assign ( 'member', $member );
	     $this->display();
	 }
	 
	 public function update(){
		$model = M ("Member_person");

		if(!$model->create()) {
			$this->error($model->getError());
		}else{
			$model->uptime = time();
			if($result	 =	 $model->save()) {
				$email = I("post.email");
				 M("Member")->where("mid=".I("post.mid"))->save(array("email"=>$email));	
				$this->success('修改成功！');
			}else{
				$this->error('修改失败！');
			}
	    }

	 }

	 
	 public function editpass(){
	     if($_POST){
		     $password = I("post.password");
		     $newpassword = I("post.newpassword");
			 $repassword = I("post.repassword");
			 if($password == "" or $newpassword == "" or $repassword == ""){
			     $this->error("表单不能为空");
				 die;
			 }
			 $sql = M("Member")->where(array("mid" => $_SESSION [C ( 'USER_AUTH_KEY' )],"pwd" => md5($password)))->find();
			 if(!$sql){
			     $this->error("旧密码不正确");
				 die;
			 }
			 if($newpassword != $repassword){
			    exit($this->error("两次新密码不正确"));
			 }

			 	

			 $data['pwd'] = md5($newpassword);
			 if(M("Member")->where(array("username" => $_SESSION [C ( 'USER_AUTH_KEY' )],"pwd" => md5($password)))->data($data)->save()){
			     $this->success("密码修改成功");
			 }else{
			     $this->error("修改失败");
			 }
			 
			 die;
		 }
	     $this->display();
	 }
  }
?>