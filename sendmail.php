<?php
header('Content-type: application/json');
require_once "email.class.php";
//******************** 配置信息 ********************************
$smtpusermail = "mail@imba97.cn";//SMTP服务器的用户邮箱
$smtpemailto = $_POST['toemail'];//发送给谁
$mailtitle = $_POST['title'];//邮件主题
$mailcontent = $_POST['content'];//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
//************************ 配置信息 ****************************
$smtp = new smtp();//这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = false;//是否显示发送的调试信息
$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

if($state=="")
{
	$return=array(
		'status'	=>	'0',
		'msg'			=>	'发送失败'
	);
}
else
{
	$return=array(
		'status'	=>	'1',
		'msg'			=>	'发送成功'
	);
}
print_r(json_encode($return));

?>
