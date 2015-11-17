<?php
 class MainAction extends CommonAction{
     public function index(){
     	
     	$model = M ("Member" );
    	$member = $model->where('mid='.$_SESSION [C ( 'USER_AUTH_KEY' )])->find();
		$this->assign ( 'member', $member );

	    $this->display();
	 }
 }
?>