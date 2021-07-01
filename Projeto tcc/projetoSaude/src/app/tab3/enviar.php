<?php

	if(isset($_POST['email']) && !empty($_POST['email'])){
    
    	$nome = addslashes($_POST['name']);
    	$email = addslashes($_POST['email']);
    	$assunta = addslashes($_POST['assunta']);
    	$mensagem = addslashes($_POST['message']);
    
    	$to = "Paulo.2012@hotmail.com";
    	$subject = $assunta;
    	$body = "Nome: ".$nome. "\n".
    			"Email: ".$email. "\n".
    			"Mensagem".$mensagem; 
    	$header = "From:https://paulosdfg.000webhostapp.com/"."\r\n"
    			 ."Reply-to:".$email
    			 ."X=Mailer:PHP/".phpversion(); 
    if(mail($to, $subject, $body, $header)){
    	echo("Email enviado com sucesso");
    }else{
    		echo("O Email não pode ser enviado");
    }
	}
	?>