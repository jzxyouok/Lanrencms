<?php
  class ChannelAction extends CommonAction{



	public function edit() {
		$model = M ( "Channeltype" );
		$id = $_REQUEST ["id"];
		$vo = $model->where("id = ".$id)->find();
		$this->assign ( 'vo', $vo );
		$this->display ();	
	}

	public function update(){
			$P = D("Channeltype");
			if(!$P->create()) {
				$this->error($P->getError());
			}else{
			    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
				// 写入帐号数据
				if($result	 =	 $P->save()) {
					$this->success('修改成功！');
				}else{
					$this->error('修改失败！');
				}
		    }
	}


public function insert(){
		$model = M ("Channeltype");
	    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
		if(!$model->create()) {
			$this->error($model->getError());
		}else{
			if($result	 =	 $model->add()) {
$preffix = C("DB_PREFIX");
$sql1 = <<<EOF
			DROP TABLE IF EXISTS `{$preffix}addon{$result}`;
EOF;
$sql2 = <<<EOF
			CREATE TABLE `{$preffix}addon{$result}` (
			  `aid` int(11) NOT NULL DEFAULT '0',
			  `typeid` int(11) NOT NULL DEFAULT '0',
			  `redirecturl` varchar(255) NOT NULL DEFAULT '',
			  `templet` varchar(30) NOT NULL DEFAULT '',
			  `userip` char(15) NOT NULL DEFAULT '',
			  PRIMARY KEY (`aid`),
			  KEY `typeid` (`typeid`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;
EOF;

				$Model = new Model();
				$Model->execute($sql1);				
				$Model->execute($sql2);				

				$this->success('添加成功！');
			}else{
				$this->error('添加失败！');
			}
	    }
}

public function delete() {
	$model = M ("Channeltype");
	$id = $_REQUEST ["id"];	
	if (isset ( $id )) {
		$tmp = explode ( ',', $id );
		$condition = array ("id" => array ('in', $tmp) );
		$list=$model->where ( $condition )->delete();
		if ($list!==false) {
			foreach ($tmp as $value) {

$preffix = C("DB_PREFIX");
$sql = <<<EOF
			DROP TABLE IF EXISTS `{$preffix}addon{$value}`;
EOF;


				$Model = new Model();
				$Model->execute($sql);	

				//del chanelfield
				$condition = array ("chid" => array ('in', $tmp) );
				$list=M("Channelfield")->where ( $condition )->delete();

			}	
			$this->success ('删除成功！' );
		} else {
			$this->error ('删除失败！');
		}
	} 
}    


// 框架首页
	public function index() {


			    //读取数据库模块列表生成菜单项
				$model = M ("Channeltype" );

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
	
	


// 框架首页
	public function fmanage() {

				if(!empty($_GET['id'])){
					$map['chid'] = array('eq',$_GET['id']);
					$vo = M("Channeltype")->where("id=".$this->_param("id"))->field("id,typename")->find();
					$this->assign ( 'vo', $vo );
				}

			    //读取数据库模块列表生成菜单项
				$model = M ("Channelfield" );

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
	


public function fmanage_del() {
	$model = M ("Channelfield");
	$id = $_REQUEST ["id"];	
	if (isset ( $id )) {
		$condition = array ("id" => array ('in', explode ( ',', $id ) ) );
		$list=$model->where ( $condition )->field("chid,fieldname")->select();
		foreach ($list as $value) {
			$preffix = C("DB_PREFIX");
			$t = $value["chid"];
			$Model = new Model();
			$sql = "ALTER TABLE  `{$preffix}addon{$t}` DROP  `{$value['fieldname']}`;";
			$Model->execute($sql);
		}
		$list=$model->where ( $condition )->delete();
		if ($list!==false) {
			$this->success ('删除成功！' );
		} else {
			$this->error ('删除失败！');
		}
	} 
}  



public function fmanage_edit() {
	$model = M ( "Channelfield" );
	$id = $_REQUEST ["id"];
	$vo = $model->where("id = ".$id)->find();
	$this->assign ( 'vo', $vo );
	$this->display ();	
}


public function fmanage_update(){
		$P = D("Channelfield");
		if(!$P->create()) {
			$this->error($P->getError());
		}else{
		    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
			// 写入帐号数据
			if($result	 =	 $P->save()) {
				
				$this->success('修改成功！');
			}else{
				$this->error('修改失败！');
			}
	    }
}


public function fmanage_insert(){
		$model = M ("Channelfield");
	    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );

	    $tmp = $model->where("chid=".$this->_param("chid")." and fieldname='".$this->_param("fieldname")."'")->find();
	    if($tmp){
			$this->error('添加失败！该字段名已存在');
	    }

		if(!$model->create()) {
			$this->error($model->getError());
		}else{
			if($result	 =	 $model->add()) {

$preffix = C("DB_PREFIX");
$t = $this->_param("chid");
if($_POST['typeid'] == "0" || $_POST['typeid'] == "1"){
	$cc = "varchar({$_POST['length']}) NOT NULL DEFAULT '{$_POST['fielddefault']}'";
}elseif ($_POST['typeid'] == "2") {
	$cc = "mediumtext";
}elseif ($_POST['typeid'] == "3") {
	$cc = "int(11) NOT NULL DEFAULT '0'";
}elseif ($_POST['typeid'] == "4") {
	$cc = "decimal(8,2) NOT NULL DEFAULT '0.00'";
}elseif ($_POST['typeid'] == "5") {
	$cc = "varchar(1000) NOT NULL DEFAULT ''";
}elseif ($_POST['typeid'] == "6" || $_POST['typeid'] == "7" || $_POST['typeid'] == "8" || $_POST['typeid'] == "9") {
	$cc = "varchar(200) NOT NULL DEFAULT ''";
}
				//add Table
				$Model = new Model();
				$sql = "ALTER TABLE  `{$preffix}addon{$t}` ADD  `{$_POST['fieldname']}` {$cc}";
				$Model->execute($sql);
				//echo $sql;exit;

				$this->success('添加成功！');
			}else{
				$this->error('添加失败！');
			}
	    }
}



	 
	 
  }
?>