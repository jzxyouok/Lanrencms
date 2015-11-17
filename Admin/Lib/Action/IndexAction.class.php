<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
	   
		if ($_SESSION [C ( 'USER_AUTH_KEY' )]){
			header("Location: ".U("Main/index"));
			exit;
		} 
			
	    $this->display();
	}
	
}