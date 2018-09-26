<?php
$to      = 'info@sipcom.cl, dhernandez@sipcom.cl';
$subject = ' ✉ ¡Sipcom tiene un nuevo mensaje! ';
$message = '<html><body>';
$message .= '<table border="0" cellpadding="0" cellspacing="0" height="100%" style="min-width:348px" width="100%"><tbody><tr height="32px"></tr><tr align="center"><td width="32px"></td><td><table border="0" cellpadding="0" cellspacing="0" style="max-width:600px"><tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td align="left"><img height="32" src="https://scontent.faep3-1.fna.fbcdn.net/v/t34.0-12/28313151_549373195461808_1292848429_n.png?oh=f7b79605b6bd595147654a975e38c3ee&oe=5A8F6843" style="display:block;" class=""></td><td align="right"></td></tr></tbody></table></td></tr><tr height="16"></tr><tr><td><table bgcolor="#202835" border="0" cellpadding="0" cellspacing="0" style="min-width:332px;max-width:600px;border:1px solid #f0f0f0;border-bottom:0;border-top-left-radius:3px;border-top-right-radius:3px" width="100%"><tbody><tr><td colspan="3" height="32px"></td></tr><tr><td width="32px"></td><td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:24px;color:#ffffff;line-height:1.25;min-width:300px">'.'Ha recibido un nuevo mensaje para Sipcom Ltda.'.'</td><td width="32px"></td></tr><tr><td colspan="3" height="18px"></td></tr></tbody></table></td></tr><tr><td><table bgcolor="#FAFAFA" border="0" cellpadding="0" cellspacing="0" style="min-width:332px;max-width:600px;border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;border-top:0;border-bottom-left-radius:3px;border-bottom-right-radius:3px" width="100%"><tbody><tr height="16px"><td rowspan="3" width="32px"></td><td></td><td rowspan="3" width="32px"></td></tr><tr><td><table border="0" cellpadding="0" cellspacing="0" style="min-width:300px"><tbody><tr><td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:#202020;line-height:1.5;padding-bottom:4px"><b>De:</b> '.strip_tags($_POST['Nombre']).'<br><b>Email:</b> <a>'.strip_tags($_POST['Email']).'</a></td></tr><tr><td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:#202020;line-height:1.5;padding:4px 0">'.strip_tags($_POST['Mensaje']).'</td></tr><tr height="16px"></tr></tbody></table></td></tr><tr height="32px"></tr></tbody></table></td></tr><tr height="16"></tr><tr><td><table style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:10px;color:#666666;line-height:18px;padding-bottom:10px"><tbody><tr height="6px"></tr><tr><td><div style="direction:ltr;text-align:left">© 2018 Asesorias Computacionales Sipcom Limitada.</div></td></tr></tbody></table></td></tr></tbody></table></td><td width="32px"></td></tr><tr height="32px"></tr></tbody></table>';
$message .= "</body></html>";

$headers = 'From: info@sipcom.cl' .
           'Reply-To: info@sipcom.cl\r\n';
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if(mail($to, $subject, $message, $headers)) {
    echo '';
} else {
    echo 'Lo sentimos, no se pudo enviar el mensaje.';
}
?>