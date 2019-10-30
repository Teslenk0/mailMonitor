
<?php

require("mail/mailer.php"); 

function mailChecker($user, $pass, $host, $port){

    $buzon = imap_open ('{localhost:143/novalidate-cert}INBOX', $user,$pass)
        or die("no se puede conectar: " . imap_last_error());+
	
	$MC = imap_check($buzon);
	$result = imap_fetch_overview($buzon,"1:{$MC->Nmsgs}",0);
	foreach ($result as $overview) {
		$fechaMail = $overview->date;
		strtotime($fechaMail);
		if((time()-(60*10)) < strtotime($fechaMail)){
			$body = $user . " tiene mensajes nuevos";
			enviarMail($body);
			break;
		}
			
	}
    imap_close($buzon);
}
?>
