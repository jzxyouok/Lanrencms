<?php
  class MemberAction extends CommonAction{


	public function edit() {
		$model = M ( "Member" );
		$id = $_REQUEST ["id"];
		$vo = $model->where("mid = ".$id)->find();
		$this->assign ( 'vo', $vo );

		$vo1 = M("Member_person")->where("mid = ".$id)->find();
		$this->assign ( 'vo1', $vo1 );

		$this->display ();	

	}

public function update(){
		$mid = I("post.mid");
		$email = I("post.email");

		$map['email'] = $email;
		$map['uname'] = I("post.uname");
		$map['face'] = I("post.face");
		$map['status'] = I("post.status");
		$map['scores'] = I("post.scores");
		if(!empty($_POST['pwd'])){
			$map['pwd'] = md5(I("post.pwd"));
		}

		$sex = I("post.sex");
		$tel = I("post.tel");
		$address = I("post.address");

		$tmp = M("Member")->where("userid='".$email."' and mid<>".$mid)->field("userid")->find();
		if($tmp){
			$this->error('该Email已被注册，请重新注册！');
		}

		$result = M("Member")->where("mid=".$mid)->save($map);
		$result1 = M("Member_person")->where("mid=".$mid)->save(array('sex'=>$sex,'tel'=>$tel,'address'=>$address));

	    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
		if($result || $result1) {
			$this->success('修改成功！');
		}else{
			$this->error('修改失败！');
		}
}



public function insert(){
		$model = M ("Member");
		$vo = $model->where("userid='".$this->_param("userid")."'")->find();
		if($vo){
			$this->error('添加失败！该用户已存在!');
			exit;
		}

	    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
		if(!$model->create()) {
			$this->error($model->getError());
		}else{
			$model->pwd = md5($this->_param("pwd"));
			$model->jointime = time();
			if($result	 =	 $model->add()) {
				$this->success('添加成功！');
			}else{
				$this->error('添加失败！');
			}
	    }
}

public function delete() {
	$model = M ("Member");
	$id = $_REQUEST ["id"];	
	if (isset ( $id )) {
		$condition = array ("mid" => array ('in', explode ( ',', $id ) ) );
		$list=$model->where ( $condition )->delete();
		if ($list!==false) {
			M("Member_person")->where ( $condition )->delete();
			M("Member_tj")->where ( $condition )->delete();
			$this->success ('删除成功！' );
		} else {
			$this->error ('删除失败！');
		}
	} 
}  


// 框架首页
	public function index() {

		        //列表过滤器，生成查询Map对象
				if(!empty($_GET['q'])){
					 $map['userid'] = array('like',"%".$_GET['q']."%");
				}

				//读取数据库模块列表生成菜单项
				$model = M ("Member" );

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
	

public function noticeInsert(){
		$model = M ("Notice");
		$vo = $model->where("title='".$this->_param("title")."'")->find();
		if($vo){
			$this->error('添加失败！标题已存在!');
			exit;
		}
	    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
		if(!$model->create()) {
			$this->error($model->getError());
		}else{
			$model->addtime = time();
			$model->writer = $_SESSION['admin']['userid'];
			if($result	 =	 $model->add()) {
				$this->success('添加成功！');
			}else{
				$this->error('添加失败！');
			}
	    }
}

	public function noticeEdit() {
		$model = M ( "Notice" );
		$id = $_REQUEST ["id"];
		$vo = $model->where("id = ".$id)->find();
		$this->assign ( 'vo', $vo );
		$this->display ();	
	}

	 public function noticeUpdate(){
	    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );

		$model = M ("Notice");
		if(!$model->create()) {
			$this->error($model->getError());
		}else{
			$model->uptime = time();
			if($result	 =	 $model->save()) {
				$this->success('修改成功！');
			}else{
				$this->error('修改失败！');
			}
	    }

	 }

public function noticeDelete() {
	$model = M ("Notice");
	$id = $_REQUEST ["id"];	
	if (isset ( $id )) {
		$condition = array ("id" => array ('in', explode ( ',', $id ) ) );
		$list=$model->where ( $condition )->delete();
		if ($list!==false) {
			$this->success ('删除成功！' );
		} else {
			$this->error ('删除失败！');
		}
	} 
}  


// 框架首页
	public function notice() {

		        //列表过滤器，生成查询Map对象
				if(!empty($_GET['q'])){
					 $map['title'] = array('like',"%".$_GET['q']."%");
				}

				//读取数据库模块列表生成菜单项
				$model = M ("Notice" );

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


     public function log(){

               if(!empty($_REQUEST['startdate']) && !empty($_REQUEST['enddate'])){
                  $map['addtime'] = array(array('egt',strtotime($_REQUEST['startdate'])),array('elt',strtotime($_REQUEST['enddate'])));
                }

				if(!empty($_GET['userid'])){
	                 $tmp = M("Member")->where("userid='".$_REQUEST['userid']."'")->field("mid")->find();
					 $map['mid'] = array('eq',$tmp['mid']);
				}	

                $model = M ("Score_log" );
                //排序字段 默认为主键名
                if (!empty ( $_REQUEST ['_order'] )) {
                        $order = $_REQUEST ['_order'];
                } else {
                        $order = ! empty ( $sortBy ) ? $sortBy : $model->getPk ();
                }

                $order = 'addtime';
                //排序方式默认按照倒序排列
                //接受 sost参数 0 表示倒序 非0都 表示正序
                if (isset ( $_REQUEST ['_sort'] )) {
//                      $sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
                        $sort = $_REQUEST ['_sort'] == 'asc' ? 'asc' : 'desc'; //zhanghuihua@msn.com
                } else {
                        $sort = $asc ? 'asc' : 'desc';
                }
                //取得满足条件的记录数
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
	 
	 
  }
?>