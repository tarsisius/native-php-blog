<?php
class errors extends Controller {
  
    function index() {
        $data['judul'] = 404;
        $this->view('home/_layout/header',$data);
        $this->view('home/404');
        $this->view('home/_layout/footer');
    }

}