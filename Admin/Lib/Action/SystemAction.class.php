<?php

class SystemAction extends CommonAction {



	function _filter(&$map){



	}



	// 框架首页

	public function index() {

		Cookie::set ( '_currentUrl_', __SELF__ );

		$this->display ();



	}






public function update(){
		$this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
	    require dirname(__FILE__).'/../../../infoconfig.php';
		$infoconfig['SITENAME'] = $this->_param('site_name');
		$infoconfig['site_url'] = $this->_param('site_url');
		$infoconfig['up_size'] = $this->_param('up_size');
		$infoconfig['up_exts'] = $this->_param('up_exts');
		$infoconfig['site_qq'] = $this->_param('site_qq');
		$infoconfig['site_tel'] = $this->_param('site_tel');
		$infoconfig['site_logo'] = $this->_param('site_logo');
		$infoconfig['EFFECTS'] = $this->_param('EFFECTS');
		$infoconfig['C_EFFECTS'] = $this->_param('C_EFFECTS');


		$infoconfig['thumb'] = $this->_param('thumb');
		$infoconfig['thumb_width'] = $this->_param('thumb_width');
		$infoconfig['thumb_height'] = $this->_param('thumb_height');
		$infoconfig['m_web_auth'] = $this->_param('m_web_auth');


		$infoconfig['site_name'] = $this->_param('site_name');
		$infoconfig['site_title'] = $this->_param('site_title');
		$infoconfig['site_my'] = $this->_param('site_my');
		$infoconfig['server_topdomain'] = $this->_param('server_topdomain');
		$infoconfig['connectout'] = $this->_param('connectout');
		$infoconfig['site_mp'] = $this->_param('site_tel');
		$infoconfig['site_kfqq'] = $this->_param('site_qq');
		$infoconfig['site_email'] = $this->_param('site_email');
		$infoconfig['keyword'] = $this->_param('keyword');
		$infoconfig['content'] = $this->_param('content');
		$infoconfig['copyright'] = $this->_param('copyright');
		$infoconfig['isConnent'] = $this->_param('isConnent');

		$infoconfig['cfg_recharge'] = $this->_param('cfg_recharge');
		$infoconfig['cfg_reg'] = $this->_param('cfg_reg');
		$infoconfig['cfg_registration_score'] = $this->_param('cfg_registration_score');
		$infoconfig['cfg_archive'] = $this->_param('cfg_archive');


		if (phpversion() > 5.0){

			file_put_contents(dirname(__FILE__).'/../../../infoconfig.php', ""."<?php\n \$infoconfig	= ".var_export($infoconfig,true).";\n?>");

		}



		//RUNTIME_FILE常量是入口文件中配置的runtimefile的路径及文件名；

		 if(file_exists(RUNTIME_FILE)){

			unlink(RUNTIME_FILE); //删除RUNTIME_FILE;

		 }

		$cachedir=RUNTIME_PATH."/Cache/";   //Cache文件的路径；

		 if ($dh = opendir($cachedir)) {     //打开Cache文件夹；

			while (($file = readdir($dh)) !== false) {    //遍历Cache目录，

					  unlink($cachedir.$file);                //删除遍历到的每一个文件；

			}

			closedir($dh);

		 }




		DeleteDir(RUNTIME_PATH);
		DeleteDir('../Home/'.RUNTIME_PATH);
		DeleteDir('../Member/'.RUNTIME_PATH);

		$this->success('修改成功！');

}





public function deleteCache(){
		DeleteDir(RUNTIME_PATH);
		DeleteDir('../Home/'.RUNTIME_PATH);
		DeleteDir('../Member/'.RUNTIME_PATH);
		$this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
		$this->success('删除成功！');
}







}

?>
