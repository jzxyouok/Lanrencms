<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {


    public function index(){
	    $this->display();
	}

	public function type(){

				if(!empty($_GET['typeid'])){
					 $tmp_id = getType2($this->_param("typeid")); //,1,2,3
					 if($tmp_id){
					 	$tmp_id = $this->_param("typeid").$tmp_id;
					 }else{
					 	$tmp_id = $this->_param("typeid");
					 }
					 $map['typeid'] = array('in', explode ( ',', $tmp_id ) );
				}
				if(!empty($_GET['channel'])){
					$map['channel'] = $_GET['channel'];
					$type['channeltype'] = $_GET['channel'];
					$this->assign ( 'type', $type );
				}

			    $map1['arcrank'] = array('eq',0);
			    $map2 = array_merge($map1, $map);


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
				$count = $model->where ( $map2 )->count ();
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
					$voList = $model->where($map2)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select ( );
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


				$template = '';
				if(!empty($_GET['typeid'])){
					 $type = M("Arctype")->where("id=".$_GET['typeid'])->find();
 					 $this->assign ( 'type', $type );
 					 $template = str_replace(".html","",$type['templist']);

				}
				$this->display ($template);				

	}


public function search(){

				if(!empty($_GET['keyword'])){
					 $map['title'] = array('like',"%".$this->_param('keyword')."%"); 
	 				$this->assign ( 'keyword',  $this->_param('keyword') );
				}else{
					$this->error('关键字不能为空！');					
				}

			    $map1['arcrank'] = array('eq',0);
			    $map2 = array_merge($map1, $map);

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
				$count = $model->where ( $map2 )->count ();
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
					$voList = $model->where($map2)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select ( );
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


				$template = '';
				if(!empty($_GET['typeid'])){
					 $type = M("Arctype")->where("id=".$_GET['typeid'])->find();
 					 $this->assign ( 'type', $type );
 					 $template = str_replace(".html","",$type['templist']);

				}
				$this->display ($template);				

	}




    public function article(){
		$model = D ( "Archives" );
        $id = $_REQUEST ["id"];
		$vo = $model->where("id = ".$id)->find();
		if($vo['arcrank'] == "-1"){
			$this->error('文档未审核！');
		}

		//click+1
		$Model = new Model();
		$Model->execute("UPDATE ".C("DB_PREFIX")."archives SET click=click+1 WHERE id=".$id);

		$model = M ( "Addon".$vo['channel'] );
		$vo1 = $model->where("aid = ".$id)->find();
		if(empty($vo1)){$vo1 = array();}
		$result = array_merge($vo, $vo1);
		$this->assign ( 'vo', $result );

		$type = M ( "Arctype" )->where("id=".$vo['typeid'])->find();
	    $this->assign ( 'type', $type );
	    $this->display(str_replace(".html","",$type['temparticle']));
	}

}



