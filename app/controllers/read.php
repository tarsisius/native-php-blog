
<?php
class read extends Controller
{

    public function index($id = '')
    {
        $data['post'] = $this->model('_post')->getPostbySlug($id);
        $data['category'] = $this->model('_cat')->getAllCat();
        $data['sett'] = $this->model('_sett')->getSetting();
        $this->view('home/_layout/header', $data);
        $this->view('home/detail', $data);
        $this->view('home/_layout/footer');
        if (empty($data['post'])) {
            header("location: " . APP_URL . "errors");
        }
    }
}
