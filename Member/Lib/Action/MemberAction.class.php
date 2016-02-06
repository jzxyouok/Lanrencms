<?php
  class MemberAction extends CommonAction{



public function update(){

		$mid = $_SESSION["member"]['mid'];
		$email = I("post.email");
		$uname = I("post.uname");
		$face = I("post.face");

		$sex = I("post.sex");
		$tel = I("post.tel");
		$address = I("post.address");

		$tmp = M("Member")->where("userid='".$email."' and mid<>".$mid)->field("userid")->find();
		if($tmp){
			$this->error('该Email已被注册，请重新注册！');
		}

		$result = M("Member")->where("mid=".$mid)->save(array('email'=>$email,'uname'=>$uname,'face'=>$face));
		$result1 = M("Member_person")->where("mid=".$mid)->save(array('sex'=>$sex,'tel'=>$tel,'address'=>$address));

	    $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
		if($result || $result1) {
			$this->success('修改成功！');
		}else{
			$this->error('修改失败！');
		}
}



// 框架首页
public function index() {
	$model = M ( "Member" );
	$id = $_SESSION["member"]['mid'];
	$vo = $model->where("mid = ".$id)->find();
	$this->assign ( 'vo', $vo );

	$vo1 = M("Member_person")->where("mid = ".$id)->find();
	$this->assign ( 'vo1', $vo1 );

	Cookie::set ( '_currentUrl_', __SELF__ );
	$this->display ();
}

 public function pwd(){
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
		 if(M("Member")->where(array("mid" => $_SESSION [C ( 'USER_AUTH_KEY' )],"pwd" => md5($password)))->data($data)->save()){
		     $this->success("密码修改成功");
		 }else{
		     $this->error("修改失败");
		 }

		 die;
	 }
     $this->display();
 }


    public function registration(){

        $model = M ("Score_log" );
        $tmp = $model->where('typeid=1 and mid='.$_SESSION [C ( 'USER_AUTH_KEY' )].' and addtime>'.strtotime(date("Y-m-d")))->find();

        if($_POST){
            if($tmp){
                $this->error("您今天已经签到过了",U("Member/registration"));
                exit;
            }
            $model->add(array('mid'=>$_SESSION [C ( 'USER_AUTH_KEY' )],'typeid'=>1,'addtime'=>time(),'score'=>C("cfg_registration_score"),'summary'=>'签到获取积分'));

            //update user scores
            $Model = new Model();
            $Model->execute("update ".C("DB_PREFIX")."member set scores=scores+".C("cfg_registration_score")." where  mid=".$_SESSION [C ( 'USER_AUTH_KEY' )]);

            $this->success("签到成功",U("Member/registration"));
            exit;
         }
            //列表过滤器，生成查询Map对象
            $map['mid'] = $_SESSION [C ( 'USER_AUTH_KEY' )];
            $map['typeid'] = 1;
                //$map = $this->_search ();
                if (method_exists ( $this, '_filter' )) {
                        $this->_filter ( $map );
                }
                //读取数据库模块列表生成菜单项

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


                $this->assign ( 'regis', $tmp);

                Cookie::set ( '_currentUrl_', __SELF__ );
                $this->display ();


         }



     public function payUrl(){
        $aid = $this->_param("aid");
        $operation = M ("Member_operation" )->where('mid='.$_SESSION [C ( 'USER_AUTH_KEY' )].' and aid='.$aid)->find();
        if($operation['sta'] == 1){
                        $this->error("该订单已经付款了");
                        exit;
        }
	    header('Location: '.C('site_url').'/Member/Pay/bank/index.php?orderid='.$operation['buyid'].'&pname='.$operation['pname'].'&money='.$operation['money']);
     }



     public function paySubmit(){
        $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
        $money = intval($this->_param("money"));
        if(!is_int(abs($money)) || $money == 0){
                        $this->error("金额为整数");
                        exit;
        }

        //one day disabled Unlimited insert
        $tmp = M ("Member_operation" )->where('mid='.$_SESSION [C ( 'USER_AUTH_KEY' )].' and mtime+86400>'.strtotime(date("Y-m-d")))->count();
        if($tmp > 20){
            $this->error("超过当天充值次数");
            exit;
        }


                //create order from
                $orderid = md5(uniqid(microtime()));
                $orderid = preg_replace('/[^\d]+/i', "", $orderid);
                if(strlen($orderid)>=16)
                {
                  $orderid = substr($orderid, -16);  //订单号
                }else{
                  $len = 9 - strlen($orderid);
                  $orderid = (string)$orderid.(string)rand_string($len,1);
                }

                $pname = '充值';
                $id = M ("Member_operation" )->add(array('buyid'=>$orderid,'pname'=>$pname,'product'=>$pname,'money'=>$money,'mtime'=>time(),'mid'=>$_SESSION [C ( 'USER_AUTH_KEY' )],'oldinfo'=>'积分'));

                $this->success("订单提交成功,等待付款");
     }





     public function pay(){

	                        $model = M ("Member_operation" );
	                        //列表过滤器，生成查询Map对象
                            $map['mid'] = $_SESSION [C ( 'USER_AUTH_KEY' )];
                                //$map = $this->_search ();
                                if (method_exists ( $this, '_filter' )) {
                                        $this->_filter ( $map );
                                }
                                //读取数据库模块列表生成菜单项

                                //排序字段 默认为主键名
                                if (!empty ( $_REQUEST ['_order'] )) {
                                        $order = $_REQUEST ['_order'];
                                } else {
                                        $order = ! empty ( $sortBy ) ? $sortBy : $model->getPk ();
                                }

                                $order = 'mtime';
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


                                $this->assign ( 'regis', $tmp);

                                Cookie::set ( '_currentUrl_', __SELF__ );
                                $this->display ();

         }


     public function log(){

               if(!empty($_REQUEST['startdate']) && !empty($_REQUEST['enddate'])){
                  $map['addtime'] = array(array('egt',strtotime($_REQUEST['startdate'])),array('elt',strtotime($_REQUEST['enddate'])));
                }

                                $model = M ("Score_log" );
                        //列表过滤器，生成查询Map对象
                            $map['mid'] = $_SESSION [C ( 'USER_AUTH_KEY' )];
                                //$map = $this->_search ();
                                if (method_exists ( $this, '_filter' )) {
                                        $this->_filter ( $map );
                                }
                                //读取数据库模块列表生成菜单项

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
