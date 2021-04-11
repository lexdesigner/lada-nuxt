<?
$_POST = json_decode(file_get_contents("php://input"), true);
$phone = $_POST['phone'];
$name = $_POST['name'];


require ('punycode.php');
$path = explode('?', $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
$IDN = new idna_convert();
$path = $IDN->decode($path[0]);
$maillist = array('lp.dis7@digitaladv.ru');
$subject = 'Заявка с сайта Reno';

$message = '<div style="background:#ededed;font-family:Helvetica,Arial,sans-serif;margin:0;min-height:100%;height:100%;outline:none;padding:0;text-align:center" bgcolor="#ededed"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;margin:0;padding:0" bgcolor="#ededed"><td bgcolor="#ededed" valign="top" style="border-collapse:collapse"><table width="590" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;min-width:590px" align="center"><tbody><tr><td width="44" height="100" style="border-collapse:collapse;" bgcolor="#ededed" valign="top"></td></tr><tr><td width="44" height="60" style="border-collapse:collapse;min-width:44px;color:#222222;font-family:Arial,Helvetica,sans-serif;font-size:32px;font-weight:bold;line-height:22px;text-align:left;" bgcolor="#ededed" valign="top">';
$message .= $subject;
$message .= '</td></tr><tr><td width="44" style="border-collapse:collapse;min-width:44px;border-radius: 10px;" bgcolor="#ffffff" valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;margin:0;padding:0"><tbody><tr><td width="50" height="35" style="border-collapse:collapse;min-width:50px;" valign="top"></td><td width="490" height="35" style="border-collapse:collapse;" valign="top"></td><td width="50" height="35" style="border-collapse:collapse;" valign="top"></td></tr><tr><td width="50" height="45" style="border-collapse:collapse;min-width:50px;" valign="top"></td><td width="44" height="45" style="border-collapse:collapse;min-width:50px;color:#616161;font-family:Arial,Helvetica,sans-serif;font-size:24px;font-weight:bold;line-height:22px;text-align:left;" valign="top">Информация о клиенте</td><td width="50" height="45" style="border-collapse:collapse;" valign="top"></td></tr><tr><td width="50" height="40" style="border-collapse:collapse;min-width:50px;" valign="top"></td><td width="44" height="40" style="border-collapse:collapse;min-width:50px;color:#616161;font-family:Arial,Helvetica,sans-serif;font-size:16px;font-weight:normal;line-height:22px;" valign="top"><table style="border-collapse:collapse;min-width:50px;color:#616161;font-family:Arial,Helvetica,sans-serif;font-size:16px;font-weight:normal;line-height:22px;"><tbody>';
if ($name != '') {
	$message .= '<tr><td width="100" height="40" style="font-weight: bold;text-align:left;">Имя:</td><td style="text-align:left;">';
	$message .= $name;
	$message .= '</td></tr>';
}
$message .= '<tr><td width="100" height="40" style="font-weight: bold;text-align:left;">Телефон:</td><td style="text-align:left;"><span class="wmi-callto">';
$message .= $phone;
$message .= '</span></td></tr></tbody></table></td><td width="50" height="40" style="border-collapse:collapse;" valign="top"></td></tr><tr><td width="50" height="35" style="border-collapse:collapse;min-width:50px;" valign="top"></td><td width="490" height="35" style="border-collapse:collapse;" valign="top"></td><td width="50" height="35" style="border-collapse:collapse;" valign="top"></td></tr></tbody></table></td></tr><tr><td width="44" height="25" style="border-collapse:collapse;" bgcolor="#ededed" valign="top"></td></tr><tr><td width="44" height="60" style="border-collapse:collapse;min-width:44px;color:#222222;font-family:Arial,Helvetica,sans-serif;font-size:16px;font-weight:bold;line-height:22px;" bgcolor="#ededed" valign="bottom"><table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;min-width:590px"><tbody><tr><td width="190" style="border-collapse:collapse;min-width:44px;color:#9e9e9e;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:normal;line-height:22px; text-align:left;">Адрес сайта:</td><td style="border-collapse:collapse;min-width:44px;color:#9e9e9e;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:normal;line-height:22px; text-align:left;">';
$message .= $path;
$message .= '</td></tr><tr><td width="190" style="border-collapse:collapse;min-width:44px;color:#9e9e9e;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:normal;line-height:22px; text-align:left;">Дата отправления:</td><td style="border-collapse:collapse;min-width:44px;color:#9e9e9e;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:normal;line-height:22px; text-align:left;">';
$message .= date("d.m.Y G:i");
$message .= '</td></tr><tr><td width="44" height="100" style="border-collapse:collapse;" bgcolor="#ededed" valign="top"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>';

require ('class.phpmailer.php');
$mail = new PHPMailer(); 
$mail->From = 'no-reply@'.$_SERVER['SERVER_NAME'];      // от кого 
$mail->FromName = '';   // от кого 
$mail->IsHTML(true);        // выставляем формат письма HTML 
$mail->Subject = $subject;  // тема письма 
$mail->Body = $message; 
foreach ($maillist as $mails) $mail->AddAddress($mails); 
if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);  
$mail->ClearAddresses();	
echo $_POST;