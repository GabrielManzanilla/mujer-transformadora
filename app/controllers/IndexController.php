<?php
class IndexController {
    public function index() {
        require_once '../app/views/pages/index.php';
    }
    public function register() {
        require_once '../app/views/pages/register.php';
    }
    public function login() {
        require_once '../app/views/pages/login.php';
    }
    public function news(){
        require_once '../app/views/pages/news.php';
    }
    public function search(){
        require_once '../app/views/pages/search.php';
    }

}
?>
