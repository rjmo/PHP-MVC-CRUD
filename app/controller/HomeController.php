<?php
class HomeController
{
    public function index()
    {
        try {
            $collecPostagem = Postagem::selecionarTodos();


            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $parametros = array();
            $parametros['Postagens'] = $collecPostagem;
            $conteudo = $template->render($parametros);
            echo $conteudo;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
