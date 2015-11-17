<?php
/* *
 * 功能：支付宝纯网关接口接口调试入口页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
    <title>网银与支付宝接口</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
*{
	margin:0;
	padding:0;
}
ul,ol{
	list-style:none;
}
.title{
    color: #ADADAD;
    font-size: 14px;
    font-weight: bold;
    padding: 8px 16px 5px 10px;
}
.hidden{
	display:none;
}

.new-btn-login-sp{
	border:1px solid #D74C00;
	padding:1px;
	display:inline-block;
}

.new-btn-login{
    background-color: transparent;
    background-image: url("images/new-btn-fixed.png");
    border: medium none;
}
.new-btn-login{
    background-position: 0 -198px;
    width: 82px;
	color: #FFFFFF;
    font-weight: bold;
    height: 28px;
    line-height: 28px;
    padding: 0 10px 3px;
}
.new-btn-login:hover{
	background-position: 0 -167px;
	width: 82px;
	color: #FFFFFF;
    font-weight: bold;
    height: 28px;
    line-height: 28px;
    padding: 0 10px 3px;
}
.bank-list{
	overflow:hidden;
	margin-top:5px;
}
.bank-list li{
	float:left;
	width:153px;
	margin-bottom:5px;
}

#main{
	width:750px;
	margin:0 auto;
	font-size:14px;
	font-family:'宋体';
}
#logo{
	background-color: transparent;
    background-image: url("images/new-btn-fixed.png");
    border: medium none;
	background-position:0 0;
	width:166px;
	height:35px;
    float:left;
}
.red-star{
	color:#f00;
	width:10px;
	display:inline-block;
}
.null-star{
	color:#fff;
}
.content{
	margin-top:5px;
}

.content dt{
	width:160px;
	display:inline-block;
	text-align:right;
	float:left;
	
}
.content dd{
	margin-left:100px;
	margin-bottom:5px;
}
#foot{
	margin-top:10px;
}
.foot-ul li {
	text-align:center;
}
.note-help {
    color: #999999;
    font-size: 12px;
    line-height: 130%;
    padding-left: 3px;
}

.cashier-nav {
    font-size: 14px;
    margin: 15px 0 10px;
    text-align: left;
    height:30px;
    border-bottom:solid 2px #CFD2D7;
}
.cashier-nav ol li {
    float: left;
}
.cashier-nav li.current {
    color: #AB4400;
    font-weight: bold;
}
.cashier-nav li.last {
    clear:right;
}
.alipay_link {
    text-align:right;
}
.alipay_link a:link{
    text-decoration:none;
    color:#8D8D8D;
}
.alipay_link a:visited{
    text-decoration:none;
    color:#8D8D8D;
}


.payment-code{padding:20px 0 0 20px;border:1px solid #f6e0af;background-color:#fffbf2}.payment-code--use-password{padding:0;border:0;background-color:#FFF}.payment-code .f-text{background:#FFF}.payment-code .form-field .f-text{height:24px}.payment-code--use-password .input-password{float:left;margin-bottom:5px;padding-right:0}.payment-code__tip{position:relative;margin-bottom:25px;padding:0 110px;font-weight:normal;zoom:1}.payment-code__tip .icon{position:absolute;top:-5px;left:50px;width:50px;height:50px}.payment-code__tip .tip__title{display:block;font-size:16px;color:#333}.payment-code__tip .tip__subtitle{display:block;font-size:12px;color:#999}.payment-code__form .tip--wrong{color:#f76120}.verify-mobile-group label{line-height:19px}.verify-mobile-group .mobile{margin-right:30px;color:#f76120}.verify-mobile-group .btn-normal{margin-top:5px}.verify-mobile-group .message-tip,.verify-mobile-group .no-message-tip{font-size:12px}.verify-mobile-group .sended-tip{margin-left:15px;font-size:12px;color:#999}.payment-code .skip-payment-code{margin-left:1em;font-size:12px}.payment-code .payment-code__form .verify-code{width:90px}.payment-code .verify-result-tip{margin-bottom:0}.payment-code .verify-result-tip .tip{color:#f76120}.verify-mobile-group .rebind-link{font-size:12px}
.paytype-list .bank{float:left;width:145px;height:32px;margin-left:5px;border:1px solid #DDD;background-image:url(images/sp-banklist.vf9516058.png);background-repeat:no-repeat;cursor:pointer;text-indent:-9999px}.paytype-list .bank--alipay{background-position:0 -1023px;*background-position:0 -1017px}.paytype-list .bank--maintain{padding-left:133px;*padding-left:139px;background-position:13px -1020px;*background-position:19px -1017px;color:red}.paytype-list .bank--tenpay{background-position:0 -1062px;*background-position:0 -1059px}.paytype-list .bank--chinabank{background-position:0 -1100px;*background-position:0 -1097px}.paytype-list .bank--icbc{background-position:0 -379px;*background-position:0 -377px}.paytype-list .bank--icbcb2b{background-position:0 -759px;*background-position:0 -756px}.paytype-list .bank--cmb{background-position:0 -418px;*background-position:0 -417px}.paytype-list .bank--cmbb2b{background-position:0 -840px;*background-position:0 -837px}.paytype-list .bank--ccb{background-position:0 -58px;*background-position:0 -57px}.paytype-list .bank--abc{background-position:0 -20px;*background-position:0 -17px}.paytype-list .bank--spdb{background-position:0 -338px;*background-position:0 -337px}.paytype-list .bank--sdb{background-position:0 -298px;*background-position:0 -297px}.paytype-list .bank--cib{background-position:0 -458px;*background-position:0 -457px}.paytype-list .bank--cebb{background-position:0 -98px;*background-position:0 -97px}.paytype-list .bank--boc{background-position:0 -178px;*background-position:0 -179px}.paytype-list .bank--cmbc{background-position:0 -139px;*background-position:0 -137px}.paytype-list .bank--bob{background-position:0 -588px;*background-position:0 -585px}.paytype-list .bank--udpay{background-position:0 -723px;*background-position:0 -720px}.paytype-list .bank--gzupay{background-position:0 -680px;*background-position:0 -677px}.paytype-list .bank--zxyh{background-position:0 -259px;*background-position:0 -257px}.paytype-list .bank--gfyh{background-position:0 -220px;*background-position:0 -217px}.paytype-list .bank--gdb{background-position:0 -220px;*background-position:0 -217px}.paytype-list .bank--pingan{background-position:0 -874px;*background-position:0 -872px}.paytype-list .bank--bofc{background-position:0 -911px;*background-position:0 -910px}.paytype-list .bank--postupay{background-position:0 -500px;*background-position:0 -497px}.paytype-list .bank--cib_1009{background-position:0 -955px;*background-position:0 -952px}.paytype-list .bank--cib_1059{background-position:0 -990px;*background-position:0 -987px}.paytype-list .bank--cmpay{background-position:0 -1140px;*background-position:0 -1137px}.paytype-list .bank--lakala{background-position:5px -1177px;*background-position:5px -1174px}.paytype-list .bank--pspc{background-position:0 -500px}.paytype-list .bank--bjrcb{background-position:0 -1220px}.paytype-list .bank--hzcb{background-position:0 -1259px}.paytype-list .bank--shrcb{background-position:0 -1299px}.paytype-list .bank--upopdebit{background-position:-4px -1377px}.paytype-list .bank--upopcredit{background-position:-4px -1427px}.paytype-list .bank-list{display:none;margin-top:10px;margin-left:0;overflow:hidden;clear:both;zoom:1}.paytype-list .bank-list .tip{display:none;padding:5px 0 0 32px;font-size:12px;color:#c33}.paytype-list .bank-list .item{width:166px;float:left;font-size:14px;margin:0 30px 10px 0}.paytype-list .bank-list .radio{float:left;width:13px;margin-top:10px;*margin-top:5px;margin-left:1px}.paytype-list .bank-list .item--disabled .bank{opacity:.5;filter:Alpha(opacity=50);cursor:not-allowed}.paytype-list .bank-tip--disabled{color:#ea4f01}.paytype-list .bank-list--xpay{margin:5px 0 -10px;position:relative;top:-20px;overflow:hidden;clear:both;zoom:1}.paytype-list .bank-list--xpay .item{margin-bottom:0;padding:21px 0 0 0}.paytype-list .bank-list--xpay .bank{height:40px}.paytype-list .bank-list--xpay .radio{margin-top:15px;*margin-top:10px}.paytype-list .bank-list--xpay .item--hastip{position:relative}.paytype-list .bank-list--xpay .item__tip{position:absolute;top:0;left:19px;padding:0 5px;border:1px solid #d4d4d4;color:#999;font-size:12px}.paytype-list .bank-list--upop .bank{height:38px}.paytype-list .bank-type{position:relative;margin:10px 0;padding:0 0 0 18px;border:0;font-size:14px;font-weight:normal;cursor:pointer}.paytype-list .bank-type__hint{font-size:12px;color:#999}.paytype-list .bank-type__icon{position:absolute;top:8px;*top:5px;left:2px;_left:-16px;width:9px;height:5px;overflow:hidden;background:url(http://s0.meituan.net/www/css/i/sp-fold-icon.vdd0d955e.png) -9999px -9999px no-repeat}.paytype-list .bank-area .bank-type__icon{background-position:0 0}.paytype-list .bank-area--open .bank-type__icon{background-position:0 -10px}.paytype-list .bank-area--open .bank-list{display:block}.paytype-list .choose-other-bank{float:left;margin-top:8px;padding-left:20px;height:18px;font-size:12px}.paytype-list .choose-other-bank .tri{position:absolute;margin-top:7px;*margin-top:5px;margin-left:3px;height:0;width:0;border:5px dashed transparent;border-top:5px solid #0BB;font-size:0;line-height:0}.paytype-list .order-check-tip{float:left;*width:640px;margin-top:-5px;margin-bottom:5px;padding-left:30px;color:#c33;font-size:12px;clear:both}
#order-show .print-action{text-align:center;margin:15px}#order-show img{display:block;margin:0 auto}#order-show .print-nav{width:600px;text-align:right;margin:5px auto}#orders .mainbox{padding-bottom:50px}#orders .head{position:relative}#orders .bottom-tips{margin-top:10px}#orders .sect{padding:20px 20px 50px;width:auto}#orders .delivery-text{color:#999}#orders .invalid{color:#ddd}#orders .points-intro{background:#fffbcc;border:1px solid #ffec19;margin:0 0 10px;padding:10px}#orders .use-coupon-tips h3{font-size:18px}#orders .use-coupon-tips ul{margin:10px 0 0 20px;font-size:14px}#orders .use-coupon-tips li{margin-bottom:5px;list-style:outside disc}#orders .info-section .amount{color:#c33}.pg-refund .refund-box h3{background:url(http://s0.meituan.net/www/css/i/sys-icons-48.v6b0ece98.png) no-repeat 0 -98px;height:52px;line-height:52px;font-size:20px;padding:0 0 0 60px;margin:10px}.pg-refund .refund-box ul{background:#f3f3f3;border:1px #CCC solid;padding:10px 18px;margin:0 50px 0 70px}.pg-refund .refund-box li{list-style:inside disc;line-height:2}.pg-refund .refund-box span{color:#999;margin:0 6px 0 9px}.pg-refund .refund-box p{margin:30px 50px 0 70px}.pg-refund .tips-section{padding-left:28px}.pg-refund .tips-section li{list-style:disc outside}.pg-refund .field-group{margin-bottom:0;padding:5px 0 20px 80px;font-size:12px}.pg-refund .field-group--small{padding-top:7px;padding-bottom:7px}.pg-refund .field-group label{width:75px;font-size:12px;text-align:right}.pg-refund .field-group .f-controls{padding-top:4px}.pg-refund .field-group h4{position:relative;top:4px;font-weight:normal}.pg-refund .coupon-field{margin-top:20px;min-height:20px;_height:20px;padding:5px 0 1px 10px;border:1px solid #f4f4f4;background-color:#f8f8f8}.pg-refund .reason-list label,.pg-refund .coupon-field label{position:static;width:auto;padding:0;margin:0;font-size:12px;text-align:left;cursor:pointer}.pg-refund .reason-list input,.pg-refund .coupon-field li input{vertical-align:middle}.pg-refund .coupon-field li{margin-bottom:5px}.pg-refund .invalid{color:#999}.pg-refund .reason-list span,.pg-refund .coupon-field li span{margin-left:10px;color:#999}.pg-refund .reason-list li .extra,.pg-refund .coupon-field li .extra{color:#C00}.pg-refund .loading{margin:0}.pg-refund .long{height:185px;overflow-y:scroll}.pg-refund .f-text{width:120px}.pg-refund .remarks{color:#999}.pg-refund .refund-count .money,.pg-refund .transfersale-count{color:#C33;font-size:16px;font-weight:bold;font-family:arial}.pg-refund .refund-count .money-small{color:#C33}.pg-refund .refund-count{color:#000}.pg-refund .refund-reason{padding:5px 0 5px 10px}.pg-refund .reason-list{width:410px;margin-top:5px}.pg-refund .reason-list li{float:left;width:200px;padding:3px 0}.pg-refund .refund-method,.pg-refund .refund-method .coupon-field{margin:0 auto 10px;border:0;background:#fff}.pg-refund .refund-method label{font-size:14px;font-weight:bold}.pg-refund .refund-method em{font-size:12px;color:#000;font-weight:normal}.pg-refund .refund-method p{color:#999;line-height:2em}.pg-refund .refund-growth-tip{padding-left:10px;margin-bottom:12px;font-size:12px;color:#999;line-height:2em}.pg-check .money{color:#ea4f01;margin:0 3px}.pg-check .money-symbol{color:inherit;margin:0 3px;font-family:arial}.pg-check .warn{color:#ea4f01}.pg-check .muted{color:#999}.pg-check .pay-choice{line-height:2em;font-size:14px}.pg-check .pay-choice-tip{font-weight:bold;margin:15px 0}.pg-check .pay-choice-list{margin-bottom:15px}.pg-check .pay-choice-list .other-pay-way{border-top:0}.pg-check .order-list td{padding:3px 0;word-break:break-all}.pg-check .order-list .item-name{width:5em}.pg-check .order-list a{color:#333}.pg-check .pay-total{font-size:14px;font-weight:bold;text-align:right;margin-bottom:15px}.pg-check .paytype{padding:10px 20px 15px 20px;border:0;background:#f7f7f7}.pg-check .verify-mobile{padding:10px 16px 16px;background:#f7f7f7;border:0}.pg-check .verify-mobile .verify-code{width:80px;padding:3px}.pg-check .verify-mobile .verify-tip{line-height:28px;margin-left:10px;vertical-align:top;zoom:1}.pg-check .verify-mobile .verify-control{margin-left:15px}.pg-check .verify-mobile .verify-btn{font-size:12px;padding:2px 4px;*padding:3px 4px 1px}.pg-check .verify-mobile .rebind-link{color:#999}.pg-check .verify-mobile .rebind-link:hover{color:#0BB}.pg-check .verify-mobile .error{color:#c33}.pg-check .form-submit{text-align:right;overflow:hidden;zoom:1}.pg-check .form-submit .btn-pay{margin-bottom:5px}.pg-check .form-submit .inline-link{font-size:14px}#order-check .mainbox{padding-bottom:40px}#order-check .mainbox h2{font-size:14px;border:0;padding:0;margin:0 0 10px;color:#666}.common-tips-innerbox{text-align:left}#order-check .common-tips-innerbox h3{font-size:18px}#order-check .common-tips-innerbox ul{margin:10px 0 0 20px;font-size:14px}#order-check .common-tips-innerbox li{margin-bottom:5px;list-style:outside disc}.pg-order-check .order-list{margin-bottom:15px;font-size:12px}#cart-check .mainbox{padding-bottom:40px}#cart-check .mainbox h2{font-size:14px;border:0;padding:0;margin:0 0 10px;color:#666}#cart-check .common-tips-innerbox h3{font-size:18px}#cart-check .common-tips-innerbox ul{margin:10px 0 0 20px;font-size:14px}#cart-check .common-tips-innerbox li{margin-bottom:5px;list-style:outside disc}.pg-cart-check .cart-info-field{margin-bottom:15px;padding-bottom:15px;border-bottom:1px dotted #e5e5e5;font-size:12px;line-height:21px;color:#222}.pg-cart-check .cart-info-field h4{line-height:30px;color:#666}.pg-cart-check .cart-info-field a{color:#333}.pg-cart-check .cart-info-field .orders-detail{padding-left:20px;color:#c5c5c5}.pg-cart-check .orders-detail .quantity{margin-left:1em}.pg-cart-check .orders-detail li{list-style:outside square}.pg-cart-check .orders-detail p{color:#222}.pg-cart-check .orders-detail .more-detail{color:#999}.pg-cart-check .orders-detail .calendar-desc{font-family:'arial';color:#f76120}.pg-cart-check .cart-info-field .delivery-info{color:#999}.pg-cart-check .cart-info-field .mobile{color:#ea4f01}.pg-cart-check .cart-info-field .money{color:#ea4f01}#order-detail #primary-info .operation{margin-top:5px}#order-detail #primary-info .inline-link{margin-left:10px}#order-detail .flow-list{line-height:1.8}#order-detail .appoint-list-link{margin-left:30px}#order-detail #order-address{line-height:1.8}#order-detail #edit-address-form .field-group{padding-left:90px;font-size:12px}#order-detail #edit-address-form .field-group label{width:80px;font-size:12px}#order-detail #edit-address-form .delivery-type{margin:0 0 8px 20px}#order-detail #edit-address-form .delivery-type li{line-height:2}#order-detail #edit-address-form .delivery-type label{padding-left:10px}#order-detail #edit-address-form .comment{width:400px;margin-bottom:20px}#order-detail #edit-address-form .type-select{margin:10px 0;padding-left:15px}#order-detail #edit-address-form .type-select .info{color:#666}#order-detail .info-table{width:100%}#order-detail .info-table th,#order-detail .info-table td{padding:3px 5px;text-align:center}#order-detail .info-table th{font-weight:bold}#order-detail .info-table .left{text-align:left}#order-detail .info-table .total{color:#c33}#order-detail .info-table .status{color:#c33;font-size:12px}#order-detail .order-delivery-trace{margin-left:5px;cursor:pointer}#order-detail .order-delivery-loading{padding-left:20px;background:url(http://s0.meituan.net/www/css/i/icon-loading16x16.vecf78228.gif) no-repeat center left}#order-detail .order-delivery-info-wrapper{margin-left:60px}#order-detail .order-delivery-info-wrapper .order-delivery-info-content{overflow:hidden;margin-top:5px}#order-detail .order-delivery-info-wrapper .order-delivery-info-content .warn{color:#C00}#order-detail .order-delivery-info-wrapper .order-delivery-info-list{margin-left:-6px}#order-detail .order-delivery-info-wrapper .order-delivery-info-list .last{color:#ca0000}#order-detail .order-delivery-info-wrapper .order-delivery-info-list .order-delivery-info-context{width:440px;vertical-align:top}#order-detail .order-delivery-info-wrapper .order-delivery-hint{margin:20px 0 10px;border:1px solid #fec46f;padding:4px 10px 4px 30px;background:#fff5e5 url(http://s1.meituan.net/www/css/i/sys-icons-16.vd2db5315.png) no-repeat 8px -295px}#order-detail .order-delivery-info-wrapper .common-form{border:1px solid #CCC;padding:20px;min-width:238px;margin:4px 0 10px}#order-detail .order-delivery-info-wrapper .captcha label{display:block;line-height:1.1;margin-bottom:10px}#order-detail .order-delivery-info-wrapper .captcha label span{color:#999}#order-detail .order-delivery-info-wrapper .captcha .f-text{height:22px;line-height:22px;margin-right:4px}#order-detail .order-delivery-info-wrapper .captcha img{height:28px;vertical-align:bottom}#order-detail .order-delivery-info-wrapper .order-delivery-captcha-refresh{vertical-align:bottom}#order-detail .order-delivery-info-wrapper .btn-area{margin-top:10px}#order-detail .coupon-field{min-height:20px;_height:20px;padding:5px 0 1px 10px;border:1px solid #f4f4f4;background-color:#f8f8f8}#order-detail .coupon-field__tip{color:#999;padding-bottom:5px}#order-detail .coupon-field li{margin-bottom:5px}#order-detail .coupon-field li.invalid{color:#999}#order-detail .coupon-field li span{margin-left:10px;color:#999}#order-detail .coupon-field li .extra{color:#C00}#order-detail .warn{color:#C00}#order-detail .delivery-delay-warning{margin-bottom:10px;color:#C00}#order-detail .coupon-send,#order-detail .apply-refund-link{float:right;font-size:12px}#order-detail .calendar-desc{font-family:'arial';color:#f76120}#refund-detail .mainbox{padding:20px 30px}#refund-detail .mainbox h2{margin-bottom:20px}.pg-refund-detail #content{float:none;width:auto}.pg-refund-detail #content .mainbox .op-area{right:30px}.pg-refund-detail .field-group .inline-tip{padding:0}.pg-refund-detail .order-detail{margin-top:5px}.pg-refund-detail .order-detail .field-group{margin:0;padding-left:72px}.pg-refund-detail .order-detail .field-group label{width:72px;padding-top:0;font-size:12px}.pg-refund-detail .summary strong{margin-right:6px}.pg-refund-detail .summary .amount{color:#D00}.pg-refund-detail .withdraw-detail{float:right;_width:268px;margin-top:6px;text-align:left}.pg-refund-detail .withdraw-detail .field-group{margin:0;padding-left:72px}.pg-refund-detail .withdraw-detail .field-group label{width:72px;padding-top:0;font-size:12px}.pg-refund-detail .minus{display:inline-block;*display:inline;width:6px;zoom:1}.pg-refund-detail .insufficient{margin-bottom:10px;font-size:12px;text-align:center}.pg-refund-detail .insufficient em{margin:0 3px;color:#D00}.pg-refund-detail .withdraw-detail .insufficient{margin-bottom:0;text-align:right}.pg-refund-detail .withdraw-notice{margin-top:10px;padding-top:5px;border-top:1px dotted #f6e0af}.pg-refund-detail .info-section--grey{border:solid 1px #e4e4e4;background:#f7f7f7}.pg-refund-detail .info-section--tips{margin-top:20px}.pg-refund-detail .info-section--tips h4{margin-top:10px;font-size:1.1em}.pg-refund-detail .info-section--tips p{margin:1em}.pg-refund-detail table{margin-bottom:10px}#apply-withdraw .order-detail{margin-top:5px}#apply-withdraw .order-detail .field-group{margin:0;padding-left:72px}#apply-withdraw .order-detail .field-group label{width:72px;padding-top:0;font-size:12px}#apply-withdraw .error{margin:0 0 10px;color:#D00}#apply-withdraw .no-branch{display:block;margin-top:6px}#apply-withdraw .apply-withdraw{margin:0 0 30px}#apply-withdraw .apply-withdraw .field-group{padding-left:92px}#apply-withdraw .apply-withdraw .field-group label{width:92px;padding-top:0}#apply-withdraw .apply-withdraw .f-textarea{width:500px}#apply-withdraw .reapply-withdraw{margin:0 0 30px}#apply-withdraw .reapply-withdraw .field-group{padding-left:92px}#apply-withdraw .reapply-withdraw .field-group label{width:92px}#apply-withdraw .withdraw-tip{margin:0;color:#666}#apply-withdraw .withdraw-tip ul li{list-style:outside disc;margin-left:16px}#apply-withdraw .minus{display:inline-block;*display:inline;width:6px;zoom:1}#order-feedback .field-group{padding-left:185px}#order-feedback .field-group label{width:175px}#order-feedback .wantmore label{position:static}#order-feedback .act{margin:0}#order-feedback .act .awards{margin-left:15px}#order-feedback .act .awards strong{color:#C00}#order-send-sms-dialog .color-highlight{font-size:12px}#order-send-sms-dialog .common-form{float:left}#order-send-sms-dialog .coupon-group-w{width:375px;margin-top:5px;border:1px solid #e8e8e8;padding-bottom:20px;font-size:12px;min-height:180px;_height:160px}#order-send-sms-dialog .coupon-th{padding:7px 15px 7px 40px;background:#f8f8f8;border-bottom:1px solid #e8e8e8}#order-send-sms-dialog .coupon-td{padding:10px}#order-send-sms-dialog .coupon-list{max-height:150px;overflow:auto}#order-send-sms-dialog .coupon-list p{position:relative;padding-left:30px;line-height:22px;zoom:1}#order-send-sms-dialog .coupon-list input{position:absolute;top:5px;left:8px}#order-send-sms-dialog .coupon-list li{margin-bottom:5px}#order-send-sms-dialog .coupon-list .invalid{color:#999}#order-send-sms-dialog .coupon-list .multi-coupon-tip{margin-bottom:5px;color:#D00}#order-send-sms-dialog .cell{width:150px;display:inline-block;*display:inline;zoom:1;text-align:center;vertical-align:top}#order-send-sms-dialog .status{width:150px}#order-send-sms-dialog .status--long{text-align:left}#order-send-sms-dialog .send-w{margin-top:10px;padding-left:58px}#order-send-sms-dialog .loading{margin:0}#order-send-sms-dialog .f-text{width:120px;vertical-align:middle;*vertical-align:0}.pg-aftersales .info-section .btn-mini{margin-top:5px}.pg-aftersales .info-section form{margin-top:5px}.pg-aftersales .add-msg{margin-bottom:10px}.pg-aftersales .add-msg .field-group{margin-bottom:0;padding-left:0}.pg-aftersales .add-msg .f-textarea{width:400px;height:3em}.pg-aftersales .msg-list{font-size:12px}.pg-aftersales .msg-list dt{margin:5px 0;font-weight:bold}.pg-aftersales .msg-list .date{margin-left:10px;color:#999;font-weight:normal}.pg-aftersales .msg-list dd{padding:0 0 8px 0;border-bottom:1px dotted #ccc}.pg-aftersales .aftersales-trigger{position:relative;margin-bottom:10px;height:33px;line-height:33px;padding:0 10px 0 20px;background:url(http://s1.meituan.net/www/css/i/bg-help-title.vfaec7e88.png) no-repeat 0 0;color:#666;font-weight:bold;cursor:pointer}.pg-aftersales .aftersales-trigger i{position:absolute;top:13px;left:636px;display:block;width:9px;height:7px;font-size:0;line-height:0;background:url(http://s0.meituan.net/www/css/i/bg-help-title-arrow.vee82181c.png) no-repeat 0 0}.pg-aftersales .fold{background-position:0 0}.pg-aftersales .unfold{background-position:0 -100px}.pg-aftersales .hover{background-position:0 -100px;color:#35999b}.pg-aftersales .hover i{background-position:0 -100px}.pg-aftersales .unfold i{background-position:0 -150px}.pg-aftersales .mainbox .spring-tip{margin-bottom:15px;font-weight:bold;color:#f76120}.pg-aftersales table{margin-bottom:10px}.pg-aftersales .mainbox .field-group p.warning{color:#D00}.pg-appoint-list .coupon-count{color:#C33;font-weight:bold}.pg-appoint-list .appoint-title{margin:20px 0 5px;font-size:16px}.pg-appoint-list .appoint-status{font-weight:bold;color:#ee5238}.pg-appoint-list .appoint-logs{margin-bottom:10px}.pg-appoint-list .appoint-count{font-size:12px;font-weight:normal}.pg-appoint-list .blue-info-section{margin-top:20px}.pg-appoint-list .field-group .inline-tip{padding:0}.pg-appoint-list .order-detail{margin-top:5px}.pg-appoint-list .order-detail .field-group{margin:0;padding-left:72px}.pg-appoint-list .order-detail .field-group label{width:72px;padding-top:0;font-size:12px}.pg-appoint-list .summary strong{margin-right:6px}.pg-appoint-list .summary .amount{color:#D00}.pg-appoint-list #cancel-appoint-dialog .dialog-info{margin-bottom:50px;height:50px;line-height:50px;font-size:20px;color:#333}.pg-appoint-list #cancel-appoint-dialog .tip-status{vertical-align:-17px}.pg-appoint-list #cancel-appoint-dialog .op-group{padding:0 55px}.pg-appoint-list #cancel-appoint-dialog .op-group .btn{margin-right:20px}.pg-appoint-list #cancel-success-dialog .tip{margin-bottom:20px;font-size:16px;color:#333}.pg-appoint-list #cancel-success-dialog .kind-tip{font-size:12px;color:#999}.pg-appoint-list #cancel-success-dialog .btn{margin-left:20px}.pg-appoint-list #sidebar{padding-top:37px}.pg-appoint-list .feedback-link{font-size:12px;float:right}.pg-appoint-list .assure-appoint-flow{width:678px;height:158px;background:url(http://s1.meituan.net/www/css/i/bg-assure-appoint-flow.vb3d77590.png)}.pg-rates .question-mark{position:relative;top:-0.5em;height:12px;display:inline-block;*display:inline;*zoom:1;width:12px;line-height:12px;border-radius:6px;background:#37adb1;color:#FFF;font-size:10px;font-weight:normal;text-align:center;cursor:pointer}.pg-rates .result-dialog-content{text-align:center}.pg-rates .dialog-confirm{margin-top:20px}.pg-zlorders .result-box .icon-loading{height:16px;width:16px;display:block;background:url(http://s0.meituan.net/www/css/i/icon-loading16x16.vecf78228.gif) no-repeat;left:auto;right:25px;top:8px}.pg-refund .more-info{border-radius:6px;padding:0 4px;margin:0 0 0 6px;background:#ddd}.pg-zlorders .cancel-confirm-dialog{text-align:center}.pg-zlorders .cancel-confirm-dialog p{margin-bottom:20px;font-size:16px}.pg-before-applyrefund .info-section{padding:20px}.pg-before-applyrefund .info-section .btn{margin-right:20px;float:right}.pg-before-applyrefund .info-content{float:left;margin-left:20px}.pg-before-applyrefund .info-content h3{color:#333;font-size:16px;font-weight:normal}.pg-before-applyrefund .info-content p{color:#666}.qa-tip{display:inline-block;*display:inline;border-radius:6px;padding:0 4px;color:#666;background:#ddd;cursor:pointer;margin:0 3px;line-height:1;font-size:14px;zoom:1}.pg-check .verify-mobile .rebind-link{margin-left:20px;color:#2bb8aa}

</style>
</head>
<body text=#000000 bgColor=#ffffff leftMargin=0 topMargin=4>
	<div id="main">
		




        <form name="alipayment" action="alipayapi.php" method="post">
        	<input type="hidden" name="WIDout_trade_no" value="<?php echo $_GET['orderid'];?>">
        	<input type="hidden" name="WIDsubject" value="<?php echo $_GET['pname'];?>">
        	<input type="hidden" name="WIDtotal_fee" value="<?php echo $_GET['money'];?>">
            <div id="body" style="clear:left">
                <dl class="content">
    
                    <dd>
                        

<div class="pg-check">

	<div id="J-pay-types" class="blk-item paytype">
		<div id="order-check-typelist" class="paytype-list">

			<div class="bank-area bank-area--open" style="" id="yui_3_12_0_1_1401280263162_358">
				<h3 class="bank-type" id="yui_3_12_0_1_1401280263162_357"> <i class="bank-type__icon"></i>
					支付宝
				</h3>
				<ul class="bank-list bank-list--xpay" id="yui_3_12_0_1_1401280263162_364">
					<li class="item left" id="yui_3_12_0_1_1401280263162_363">
						<input id="check-alipay" class="radio" type="radio" name="paytype" value="alipay">
						<label for="check-alipay" class="bank bank--alipay">支付宝</label>
					</li>
				</ul>
			</div>

			<div class="bank-area bank-area--open" style="" id="yui_3_12_0_1_1401280263162_366">
				<h3 class="bank-type" id="yui_3_12_0_1_1401280263162_365"> <i class="bank-type__icon"></i>
					网上银行支付
					<span class="bank-type__hint">（支持储蓄卡和信用卡）</span>
				</h3>
				<ul class="bank-list" id="yui_3_12_0_1_1401280263162_375">
					<li class="item" id="yui_3_12_0_1_1401280263162_374">
						<input type="radio" class="radio" value="ICBCB2C" id="bank-type-ICBCB2C" name="paytype">
						<label title="中国工商银行" for="bank-type-ICBCB2C" class="bank bank--icbc">中国工商银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="CMB" id="bank-type-CMB" name="paytype">
						<label title="招商银行" for="bank-type-CMB" class="bank bank--cmb">招商银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="CCB" id="bank-type-CCB" name="paytype">
						<label title="中国建设银行" for="bank-type-CCB" class="bank bank--ccb">中国建设银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="ABC" id="bank-type-ABC" name="paytype">
						<label title="中国农业银行" for="bank-type-ABC" class="bank bank--abc">中国农业银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="tenpay-1020" id="bank-type-1020" name="paytype">
						<label title="交通银行" for="bank-type-1020" class="bank bank--boc">交通银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="BOCB2C" id="bank-type-BOCB2C" name="paytype">
						<label title="中国银行" for="bank-type-BOCB2C" class="bank bank--bofc">中国银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="CIB" id="bank-type-CIB" name="paytype">
						<label title="兴业银行" for="bank-type-CIB" class="bank bank--cib">兴业银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="CEBBANK" id="bank-type-CEBBANK" name="paytype">
						<label title="光大银行" for="bank-type-CEBBANK" class="bank bank--cebb">光大银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="SPDB" id="bank-type-SPDB" name="paytype">
						<label title="上海浦东发展银行" for="bank-type-SPDB" class="bank bank--spdb">上海浦东发展银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="GDB" id="bank-type-GDB" name="paytype">
						<label title="广东发展银行" for="bank-type-GDB" class="bank bank--gdb">广东发展银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="CITIC" id="bank-type-CITIC" name="paytype">
						<label title="中信银行" for="bank-type-CITIC" class="bank bank--zxyh">中信银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="CMBC" id="bank-type-CMBC" name="paytype">
						<label title="中国民生银行" for="bank-type-CMBC" class="bank bank--cmbc">中国民生银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="SPABANK" id="bank-type-SPABANK" name="paytype">
						<label title="平安银行" for="bank-type-SPABANK" class="bank bank--pingan">平安银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="BJBANK" id="bank-type-BJBANK" name="paytype">
						<label title="北京银行" for="bank-type-BJBANK" class="bank bank--bob">北京银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="BJRCB" id="bank-type-BJRCB" name="paytype">
						<label title="北京农商银行" for="bank-type-BJRCB" class="bank bank--bjrcb">北京农商银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="PSBC-DEBIT" id="bank-type-PSBC-DEBIT" name="paytype">
						<label title="中国邮政储蓄银行" for="bank-type-PSBC-DEBIT" class="bank bank--pspc">中国邮政储蓄银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="SHRCB" id="bank-type-SHRCB" name="paytype">
						<label title="上海农商银行" for="bank-type-SHRCB" class="bank bank--shrcb">上海农商银行</label>
					</li>
					<li class="item">
						<input type="radio" class="radio" value="HZCBB2C" id="bank-type-HZCBB2C" name="paytype">
						<label title="杭州银行" for="bank-type-HZCBB2C" class="bank bank--hzcb">杭州银行</label>
					</li>
				</ul>
			</div>

		</div>
	</div>

</div>



                   </dd>

                    
                    <dt></dt>
                    <dd>
                        <span class="new-btn-login-sp">
                            <button class="new-btn-login" type="submit" style="text-align:center;">确 认</button>
                        </span>
                    </dd>
                </dl>
            </div>
        </form>

        <div id="foot">
			<ul class="foot-ul">
				<li><font class="note-help">如果您点击“确认”按钮，即表示您同意该次的执行操作。 </font></li>
				<li>
					支付宝版权所有 2011-2015 ALIPAY.COM 
				</li>
			</ul>
		</div>
	</div>
</body>
</html>