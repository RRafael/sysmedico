<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

function pd($valor)
{
    echo "<pre>";
    print_r($valor);
    echo "</pre>";
    die();
}

function inverteData($data)
{
    $parteData = explode("/", $data);
    $dataInvertida = $parteData[2] . "-" . $parteData[1] . "-" . $parteData[0];
    return $dataInvertida;
}

function verificaNavegador()
{
    $MSIE = strpos($_SERVER['HTTP_USER_AGENT'], "MSIE");
    $Firefox = strpos($_SERVER['HTTP_USER_AGENT'], "Firefox");
    $Mozilla = strpos($_SERVER['HTTP_USER_AGENT'], "Mozilla");
    $Chrome = strpos($_SERVER['HTTP_USER_AGENT'], "Chrome");
    $Chromium = strpos($_SERVER['HTTP_USER_AGENT'], "Chromium");
    $Safari = strpos($_SERVER['HTTP_USER_AGENT'], "Safari");
    $Opera = strpos($_SERVER['HTTP_USER_AGENT'], "Opera");
    $navegador = "";
    
    if ($MSIE == true) {
        $navegador = "IE";
    } else if ($Firefox == true) {
        $navegador = "Firefox";
    } else if ($Mozilla == true) {
        $navegador = "Firefox";
    } else if ($Chrome == true) {
        $navegador = "Chrome";
    } else if ($Chromium == true) {
        $navegador = "Chromium";
    } else if ($Safari == true) {
        $navegador = "Safari";
    } else if ($Opera == true) {
        $navegador = "Opera";
    } else {
        $navegador = $_SERVER['HTTP_USER_AGENT'];
    }
    
    if ($navegador == "IE") {
        echo '<h2>' . "Atenção! O navegador INTERNET EXPLORER não é suportado.
	  recomendamos o uso dos navegadores GOOGLE CHROME ou MOZILLA FIREFOX" . '</h2>';
        exit();
    }
}

function em_manutencao($ipvalido)
{
    // Mostra mensagem "Sistema em Manutenção" para ips diferentes do $ipvalido.
    if (strpos($ipvalido, "!"))
        $ipvalido = substr(strstr($ipvalido, '!'), 1);
    if ($_SERVER['REMOTE_ADDR'] != $ipvalido) {
        echo "<b>SISTEMA EM MANUTEN&Ccedil;&Atilde;O! Por favor aguarde...</b>";
        die();
    }
}

