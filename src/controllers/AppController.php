<?php

class AppController {
    private $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool
    {
        return $this->request === 'GET';
    }

    protected function isPost(): bool
    {
        return $this->request === 'POST';
    }

    protected function headTo($url){
        $main_url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$main_url}/{$url}");
    }

    protected function render(string $template = null, array $variables = [])
    {
        $username = AuthenticationGuard::getAuthenticatedUsername();
        if($username) $variables[] = ['username' => $username];

        $templatePath = 'public/views/'. $template.'.php';
        $output = 'File not found';

        if(file_exists($templatePath)){
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }
}