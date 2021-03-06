<?php
  class TypeAction extends CommonAction{

	function _filter(&$map){
	   $map['mid'] = array('eq',$_SESSION["member"]['mid']); 
	}	


     public function index(){
				Cookie::set ( '_currentUrl_', __SELF__ );
				$this->display ();	
	 }



// 框架首页
	public function article() {

				$map = $this->_search ();
				if (method_exists ( $this, '_filter' )) {
					$this->_filter ( $map );
				}

		        //列表过滤器，生成查询Map对象
				if(!empty($_GET['q'])){
					 $map['title'] = array('like',"%".$_GET['q']."%");
				}
				if(!empty($_GET['typeid'])){
					 $map['typeid'] = array('eq',$_GET['typeid']);
				}
				if(!empty($_GET['channel'])){
					 $map['channel'] = array('eq',$_GET['channel']);
				}				
			    //读取数据库模块列表生成菜单项
				$model = M ("Archives" );

				//排序字段 默认为主键名
				if (!empty ( $_REQUEST ['_order'] )) {
					$order = $_REQUEST ['_order'];
				} else {
					$order = ! empty ( $sortBy ) ? $sortBy : $model->getPk ();
				}
				//排序方式默认按照倒序排列
				//接受 sost参数 0 表示倒序 非0都 表示正序
				if (isset ( $_REQUEST ['_sort'] )) {
		//			$sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
					$sort = $_REQUEST ['_sort'] == 'asc' ? 'asc' : 'desc'; //zhanghuihua@msn.com
				} else {
					$sort = $asc ? 'asc' : 'desc';
				}
				//取得满足条件的记录数
				$_REQUEST ['listRows'] = 20;
				$count = $model->where ( $map )->count ();
				if ($count > 0) {
					import ( "@.ORG.Util.Page" );
					//创建分页对象
					if (! empty ( $_REQUEST ['listRows'] )) {
						$listRows = $_REQUEST ['listRows'];
					} else {
						$listRows = '';
					}
					$p = new Page ( $count, $listRows );
					//分页查询数据
					$voList = $model->where($map)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select ( );
					//echo $model->getlastsql();
					//分页跳转的时候保证查询条件
					foreach ( $map as $key => $val ) {
						if (! is_array ( $val )) {
							$p->parameter .= "$key=" . urlencode ( $val ) . "&";
						}
					}
					//分页显示
					$page = $p->show ();
					//列表排序显示
					$sortImg = $sort; //排序图标
					$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
					$sort = $sort == 'desc' ? 1 : 0; //排序方式

					//模板赋值显示
					$this->assign ( 'list', $voList );
					$this->assign ( 'sort', $sort );
					$this->assign ( 'order', $order );
					$this->assign ( 'sortImg', $sortImg );
					$this->assign ( 'sortType', $sortAlt );
					$this->assign ( "page", $page );
				}


				//zhanghuihua@msn.com
				$this->assign ( 't',  $this->_param('t') );
				$this->assign ( 'totalCount', $count );
				$this->assign ( 'numPerPage', $p->listRows );
				$this->assign ( 'currentPage', !empty($_REQUEST[C('VAR_PAGE')])?$_REQUEST[C('VAR_PAGE')]:1);

				Cookie::set ( '_currentUrl_', __SELF__ );
				$this->display ();	

	}
	
	
public function article_delete() {
	$model = M ("Archives");
	$id = $_REQUEST ["id"];	
	if (isset ( $id )) {
		$condition = array ("id" => array ('in', explode ( ',', $id ) ),"mid"=>array("eq",$_SESSION["member"]['mid']) );
		$list=$model->where ( $condition )->delete();
		if ($list!==false) {
			$model = M ("Addon".$this->_param("channel"));
			$condition = array ("aid" => array ('in', explode ( ',', $id ) ) );
			$list=$model->where ( $condition )->delete();
			$this->success ('删除成功！' );
		} else {
			$this->error ('删除失败！');
		}
	} 

}  


public function article_edit() {
	$map = $this->_search ();
	if (method_exists ( $this, '_filter' )) {
		$this->_filter ( $map );
	}
	$model = M ( "Archives" );
	$id = $_REQUEST ["id"];
    $map['id'] = array('eq',$id); 
	$vo = $model->where($map)->find();
	$this->assign ( 'vo', $vo );

	$model = M ( "Addon".$vo['channel'] );
	$addon = $model->where("aid = ".$id)->find();
	$this->assign ( 'addon', $addon );

	$this->display ();	
}


public function article_update(){
		C('TOKEN_ON',false);
		foreach ($_POST as $key => $value) {
			if(is_array($_POST[$key])){
				$_POST[$key] = implode(",", $value);
			}
		}		
		$P = D("Archives");
		if(!$P->create()) {
			$this->error($P->getError());
		}else{
		    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
			// 写入帐号数据
			$P->pubdate = strtotime($this->_param("pubdate"));
			$P->writer = $_SESSION["member"]['userid'];
			
			$channel = M("Channeltype")->where("id=".$_POST['channel'])->find();
			if($channel){
				$P->arcrank = $channel['arcsta'];
			}

			//if($result	 =	 $P->save()) 
				$P->save();
				$addon = D("Addon".$this->_param("channel"));
				if(!$addon->create()) {
					$this->error($addon->getError());
				}else{
					$addon->userip = get_client_ip();
					$addon->aid = $this->_param("id");
					$addon->save();
				}
				$this->success('修改成功！');
			//}else{
			//	$this->error('修改失败！');
			//}
	    }
}

public function article_insert(){
		C('TOKEN_ON',false);
		foreach ($_POST as $key => $value) {
			if(is_array($_POST[$key])){
				$_POST[$key] = implode(",", $value);
			}
		}

        //唯一性判断
		$addon = D("Addon".$_POST['channel']);
        $channelField = M("Channelfield")->where("chid=".$_POST['channel']." and check_unique=1")->select();
        foreach ($channelField as $v) {
                $tmp = $addon->where($v['fieldname']."='".$_POST[$v['fieldname']]."'")->find();
                if($tmp){
                        $this->error('添加失败！'.$v['title'].'已存在');
                }
        }


		$model = D ("Archives");
	    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
		if(!$model->create()) {
			$this->error($model->getError());
		}else{
			$model->pubdate = strtotime($this->_param("pubdate"));
			$model->writer = $_SESSION["member"]['userid'];
			$model->mid = $_SESSION["member"]['mid'];

			$channel = M("Channeltype")->where("id=".$_POST['channel'])->find();
			if($channel){
				$model->arcrank = $channel['arcsta'];
			}

			if($result	 =	 $model->add()) {
				$addon = D("Addon".$_POST['channel']);
				if(!$addon->create()) {
					$this->error($addon->getError());
				}else{
					$addon->userip = get_client_ip();
					$addon->aid = $result;
					$addon->add();
				}
				$this->success('添加成功！');
			}else{
				$this->error('添加失败！');
			}
	    }
}



	 
	 
  }
?>