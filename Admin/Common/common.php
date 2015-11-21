<?php
function arr2file($filename, $arr=''){

	if(is_array($arr)){

		$con = var_export($arr,true);

	} else{

		$con = $arr;

	}

	$con = "<?php\nreturn $con;\n?>";//\n!defined('IN_MP') && die();\nreturn $con;\n

	write_file($filename, $con);

}

function mkdirss($dirs,$mode=0777) {

	if(!is_dir($dirs)){

		mkdirss(dirname($dirs), $mode);

		return @mkdir($dirs, $mode);

	}

	return true;

}

function write_file($l1, $l2=''){

	$dir = dirname($l1);

	if(!is_dir($dir)){

		mkdirss($dir);

	}

	return @file_put_contents($l1, $l2);

}

function read_file($l1){

	return @file_get_contents($l1);

}

/**
     * 导出数据为excel表格
     *@param $data    一个二维数组,结构如同从数据库查出来的数组
     *@param $title   excel的第一行标题,一个数组,如果为空则没有标题
     *@param $filename 下载的文件名
     *@examlpe 
     $stu = M ('User');
     $arr = $stu -> select();
     exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
 */
 function exportexcel($data=array(),$title=array(),$filename='report'){
     header("Content-type:application/octet-stream");
     header("Accept-Ranges:bytes");
     header("Content-type:application/vnd.ms-excel");  
     header("Content-Disposition:attachment;filename=".$filename.".xls");
     header("Pragma: no-cache");
     header("Expires: 0");
     //导出xls 开始
     if (!empty($title)){
         foreach ($title as $k => $v) {
             $title[$k]=iconv("UTF-8", "GB2312",$v);
         }
         $title= implode("\t", $title);
         echo "$title\n";
     }
     if (!empty($data)){
         foreach($data as $key=>$val){
             foreach ($val as $ck => $cv) {
                 $data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
             }
             $data[$key]=implode("\t", $data[$key]);
             
         }
         echo implode("\n",$data);
     }
 }


function DeleteDir($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            DeleteDir(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
}


function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
}

function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   rtrim($postData, '&');
 
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}




//递归 获取分类
function getJG($id=0,$reid=0,$tt="",$select="",$channel=''){
    $jg = M("Arctype");
    if($reid ==0 && $id == 0){
        if($channel){$channel = ' and channeltype='.$channel;}
        $list = $jg->where("topid=0".$channel)->field("id,reid,typename")->select();
        foreach ($list as $value) {
            $tmp = getJG(0,$value['id'],'&nbsp;&nbsp;─',$select,$where);
            $tmp1 = '';
            if($select == $value['id']){
                $tmp1 = 'selected';
            }

            $arr .= "<option value='{$value['id']}' {$tmp1}>{$value['typename']}</option>".$tmp;
        }
    }elseif ($id > 0 && $reid==0) {
        if($channel){$channel = ' and channeltype='.$channel;}
        $vo = $jg->where("id=$id".$channel)->field("id,reid,typename")->find();
        $tmp = getJG(0,$vo['id'],'&nbsp;&nbsp;─',$select,$channel);
        $tmp1 = '';
        if($select == $vo['id']){
            $tmp1 = 'selected';
        }       
        $arr .= "<option value='{$vo['id']}' {$tmp1}>{$vo['typename']}</option>".$tmp;      
    }
    else{
        if($channel){$channel = ' and channeltype='.$channel;}
        $list = $jg->where("reid=".$reid.$channel)->field("id,reid,typename")->select();
        foreach ($list as $value) {
            $tmp = getJG(0,$value['id'],'&nbsp;&nbsp;'.$tt.'─',$select,$channel);
            $tmp1 = '';
            if($select == $value['id']){
                $tmp1 = 'selected';
            }       
            $arr .= "<option value='{$value['id']}' {$tmp1}>{$tt}{$value['typename']}</option>".$tmp;
        }
    }

    return $arr;
}


//递归 删除分类
function deleteJG2($id=0){
    $jg = M("Arctype");
    $voList = $jg->where("reid=".$id)->field("id")->select();
    foreach ($voList as $value) {
        deleteJG2($value["id"]);
        $jg->where("id=".$value["id"])->delete();
    }
    $jg->where("id=".$id)->delete();
}





//递归 获取分类
function getJG2($id=0,$reid=0,$tt=""){
    $jg = M("Arctype");
    if($reid ==0 && $id == 0){
        $list = $jg->where("topid=0")->field("id,sortrank,reid,topid,typename,channeltype")->order("sortrank")->select();
        foreach ($list as $value) {
            $tmp = getJG2(0,$value['id'],'─');
            $arr .='<tr><td>'.$value['id'].'</td><td>'.$value['sortrank'].'</td><td><a href="'.U("Type/article",array("typeid"=>$value["id"],"channel"=>$value['channeltype'])).'">'.$value['typename'].'</a></td><td><a href="'.U("Type/add",array("reid"=>$value['id'],"topid"=>$value['id'])).'"><i class="fa fa-fw fa-plus"></i>增加子类</a> | <a title="编辑" href="'.U("Type/edit",array("id"=>$value['id'])).'"><i class="fa fa-fw fa-edit"></i></a> | <a onclick="return window.confirm(\'确定删除？\');" title="删除" href="'.U("Type/delete",array("id"=>$value['id'])).'"><i class="fa fa-fw fa-remove"></i></a></td></tr>'.$tmp;   
        }
    }elseif ($id > 0 && $reid==0) {
        $vo = $jg->where("id=$id")->field("id,sortrank,reid,topid,typename,channeltype")->find();
        $tmp = getJG2(0,$vo['id'],'─');
        $arr .='<tr><td>'.$vo['id'].'</td><td>'.$vo['sortrank'].'</td><td><a href="'.U("Type/article",array("typeid"=>$vo["id"],"channel"=>$vo['channeltype'])).'">'.$vo['typename'].'</a></td><td><a href="'.U("Type/add",array("reid"=>$vo['id'],"topid"=>$vo['topid'])).'"><i class="fa fa-fw fa-plus"></i>增加子类</a> | <a title="编辑" href="'.U("Type/edit",array("id"=>$vo['id'])).'"><i class="fa fa-fw fa-edit"></i></a> | <a onclick="return window.confirm(\'确定删除？\');" title="删除" href="'.U("Type/delete",array("id"=>$vo['id'])).'"><i class="fa fa-fw fa-remove"></i></a></td></tr>'.$tmp;   
    }
    else{
        $list = $jg->where("reid=".$reid)->field("id,sortrank,reid,topid,typename,channeltype")->order("sortrank")->select();
        foreach ($list as $value) {
            $tmp = getJG2(0,$value['id'],$tt.'─');
            $arr .='<tr><td>'.$value['id'].'</td><td>'.$value['sortrank'].'</td><td><a href="'.U("Type/article",array("typeid"=>$value["id"],"channel"=>$value['channeltype'])).'">'.$tt.$value['typename'].'</a></td><td><a href="'.U("Type/add",array("reid"=>$value['id'],"topid"=>$value['topid'])).'"><i class="fa fa-fw fa-plus"></i>增加子类</a> | <a title="编辑" href="'.U("Type/edit",array("id"=>$value['id'])).'"><i class="fa fa-fw fa-edit"></i></a> | <a onclick="return window.confirm(\'确定删除？\');" title="删除" href="'.U("Type/delete",array("id"=>$value['id'])).'"><i class="fa fa-fw fa-remove"></i></a></td></tr>'.$tmp;   
        }
    }
    return $arr;
}









?>