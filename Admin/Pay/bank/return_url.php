<?php
/* * 
 * ���ܣ�֧����ҳ����תͬ��֪ͨҳ��
 * �汾��3.3
 * ���ڣ�2012-07-23
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

 *************************ҳ�湦��˵��*************************
 * ��ҳ����ڱ������Բ���
 * �ɷ���HTML������ҳ��Ĵ��롢�̻�ҵ���߼��������
 * ��ҳ�����ʹ��PHP�������ߵ��ԣ�Ҳ����ʹ��д�ı�����logResult���ú����ѱ�Ĭ�Ϲرգ���alipay_notify_class.php�еĺ���verifyReturn
 */

require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=gbk">
    <title>֧���������ؽӿ�</title>
	</head>
    <body>


<?php
//����ó�֪ͨ��֤���
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//��֤�ɹ�
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//������������̻���ҵ���߼��������
	
	//�������������ҵ���߼�����д�������´�������ο�������
    //��ȡ֧������֪ͨ���ز������ɲο������ĵ���ҳ����תͬ��֪ͨ�����б�

	//�̻�������
	$out_trade_no = $_GET['out_trade_no'];

	//֧�������׺�
	$trade_no = $_GET['trade_no'];

	//����״̬
	$trade_status = $_GET['trade_status'];


	require_once(dirname(__FILE__)."/../../../include/common.inc.php");


    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		//�жϸñʶ����Ƿ����̻���վ���Ѿ���������
			//���û�������������ݶ����ţ�out_trade_no�����̻���վ�Ķ���ϵͳ�в鵽�ñʶ�������ϸ����ִ���̻���ҵ�����
			//���������������ִ���̻���ҵ�����



		$inquery = "UPDATE `#@__member_operation` SET sta=1 WHERE buyid='".$out_trade_no."'";
		$dsql->ExecuteNoneQuery($inquery);

		$operation = $dsql->GetOne("SELECT mid,`money`,pname  FROM `#@__member_operation`  where  buyid='".$out_trade_no."' ");
		$mid = $operation['mid'];
		$pname = $operation['pname'];

		$score = $operation['money'] * $cfg_recharge;
		$inquery = "UPDATE `#@__member` SET scores=scores+".$score." WHERE mid='".$mid."'";
		$dsql->ExecuteNoneQuery($inquery);

		//insert log
		$inquery = "INSERT INTO  `#@__score_log`(mid,score,typeid,summary,addtime) VALUES('".$mid."','".$score."','4','".$pname."(".$operation['money'].")',".time().")  ";
		$dsql->ExecuteNoneQuery($inquery);

		echo "֧���ɹ�,��ˢ�¸���ҳ.";

    }
    else {
      echo "trade_status=".$_GET['trade_status'];
      echo '֧��ʧ��,����ϵ����Ա��';
    }
		

	//�������������ҵ���߼�����д�������ϴ�������ο�������
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //��֤ʧ��
    //��Ҫ���ԣ��뿴alipay_notify.phpҳ���verifyReturn����
    echo "��֤ʧ��";
}
?>



<script type="text/javascript">
(function(){
var interval = setInterval(function(){
	window.close();
}, 3000);
})();
</script>




    </body>
</html>