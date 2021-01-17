<?php
require_once 'app/core/Core.php';
require_once 'app/controller/HomeController.php';
require_once 'app/controller/ErrorController.php';
require_once 'app/model/Postagem.php';
require_once 'lib/database/Connexion.php';
require_once 'vendor/autoload.php';

$template = file_get_contents('app/template/estrutura.html');

ob_start();
    $core = new Core;
    $core->start($_GET);

    $saida = ob_get_contents();
ob_end_clean();

$tplPronto = str_replace('{{area_dinamica}}',$saida, $template);
echo $tplPronto;
