<?php
 class MainAction extends CommonAction{
     public function index(){

     	$model = M ("Member" );
    	$member = $model->where('mid='.$_SESSION [C ( 'USER_AUTH_KEY' )])->find();
		$this->assign ( 'member', $member );

	    $this->display();
	 }


	 public function getAPI(){
	 	switch ($_GET['type']) {
	 		case 'getMemberCount':
			 	$Model = new Model();
				$vo = $Model->query("SELECT count(*) as item1,FROM_UNIXTIME(jointime,'%Y-%m-%d') as y  FROM `".C("DB_PREFIX")."member` group by y  order by y desc  limit 0,30");
				echo "var memberCount = ".json_encode($vo).";";
	 			break;

	 		case 'getArchivesCount':
			 	$Model = new Model();
				$vo = $Model->query("SELECT count(*) as item1,FROM_UNIXTIME(pubdate,'%Y-%m-%d') as y  FROM `".C("DB_PREFIX")."archives` group by y  order by y desc  limit 0,30");
				echo "var archiveCount = ".json_encode($vo).";";
	 			break;

	 		default:
	 			break;
	 	}
	 }


 }
?>
