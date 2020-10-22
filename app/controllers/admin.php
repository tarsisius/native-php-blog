<?php
class admin extends Controller
{
    function __construct()
    {
        if (!isset($_SESSION['logged_in'])) {
            header("location: " . APP_URL . "user/login");
        }
    }
    public function index()
    {
        $data['judul'] = 'Admoon';
        $data['cat'] = $this->model('_cat')->numberCategory();
        $data['post'] = $this->model('_post')->numberPost();
        $this->view('admin/_layout/header', $data);
        $this->view('admin/index', $data);
        $this->view('admin/_layout/footer');
    }
    public function setting()
    {
        $data['judul'] = 'Admoon';
        $data['sett'] = $this->model('_sett')->getSetting();
        $this->view('admin/_layout/header', $data);
        $this->view('admin/setting', $data);
        $this->view('admin/_layout/footer');
        if (count($_POST)) {
            $sett = array(
                'title' => $_POST['title'],
                'jumbotron' => $_POST['jumbotron'],
                'page' => $_POST['page']
            );
            $result = $this->model('_sett')->updateSetting($sett);
            if ($result) {
                Flasher::setMessage('Berhasil', 'update', 'blue');
                header('location: ' . APP_URL . 'admin/setting');
                exit;
            } else {
                Flasher::setMessage('Gagal', 'update', 'red');
                header('location: ' . APP_URL . 'admin/setting');
                exit;
            }
        }
    }

    public function post()
    {
        $data['judul'] = 'Berita ';
        $data['post'] = $this->model('_post')->getAllPost();
        $this->view('admin/_layout/header', $data);
        $this->view('admin/post/index', $data);
        $this->view('admin/_layout/footer');
    }
    public function createpost()
    {
        $data['judul'] = 'Buat Berita';
        $data['category'] = $this->model('_cat')->getAllCat();
        $this->view('admin/_layout/header', $data);
        $this->view('admin/post/create', $data);
        $this->view('admin/_layout/footer');
        if (count($_POST)) {
            $thumb = strtoupper(substr($_FILES['thumbnail']['name'], 0, 2)) . strtotime("now") . '.' . pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
            $post = array(
                'post_name' => $_POST['post_name'],
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['post_name']))),
                'thumbnail' =>  $thumb,
                'text' => $_POST['text'],
                'active' => $_POST['active'],
                'category_name' => $_POST['category_name'],
                'penulis' => $_SESSION['user_name']
            );
            $result = $this->model('_post')->createPost($post);
            $upload = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/" . APP_URL . "/public/image/" . $thumb);
            if ($result && $upload) {
                Flasher::setMessage('Berhasil', 'tambah', 'blue');
                header('location: ' . APP_URL . 'admin/post');
                exit;
            } else {
                Flasher::setMessage('Gagal', 'tambah', 'red');
                header('location: ' . APP_URL . 'admin/post');
                exit;
            }
        }
    }
    public function editpost($id = "")
    {
        $data['judul'] = 'Edit Berita';
        $data['post'] = $this->model('_post')->getPostbyId($id);
        $data['category'] = $this->model('_cat')->getAllCat();
        $this->view('admin/_layout/header', $data);
        $this->view('admin/post/edit', $data);
        $this->view('admin/_layout/footer');
        if (empty($data['post'])) {
            header("location: " . APP_URL . "errors");
        }

        if (count($_POST)) {
            if ($_FILES["thumbnail_new"]["name"]) {
                $data = $this->model('_post')->getPostbyId($id);
                $thumb = strtoupper(substr($_FILES['thumbnail_new']['name'], 0, 2)) . strtotime("now") . '.' . pathinfo($_FILES['thumbnail_new']['name'], PATHINFO_EXTENSION);
                $upload = move_uploaded_file($_FILES['thumbnail_new']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/" . APP_URL . "/public/image/" . $thumb);
                $unlink = unlink($_SERVER["DOCUMENT_ROOT"] . "/" . APP_URL . '/public/image/' . $data['thumbnail']);
                if ($upload && $unlink) {
                    $post = array(
                        'post_name' => $_POST['post_name'],
                        'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['post_name']))),
                        'thumbnail' => $thumb,
                        'text' => $_POST['text'],
                        'active' => $_POST['active'],
                        'category_name' => $_POST['category_name'],
                        'penulis' => $_SESSION['user_name']
                    );
                }
            } else {
                $post = array(
                    'post_name' => $_POST['post_name'],
                    'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['post_name']))),
                    'text' => $_POST['text'],
                    'active' => $_POST['active'],
                    'category_name' => $_POST['category_name'],
                    'penulis' => $_SESSION['user_name']
                );
            }
            $update = $this->model('_post')->updateDataPost($post, $id);
            if ($update) {
                Flasher::setMessage('Berhasil', 'update', 'blue');
                header('location: ' . APP_URL . 'admin/post');
                exit;
            } else {
                Flasher::setMessage('Gagal', 'update', 'red');
                header('location: ' . APP_URL . 'admin/post');
                exit;
            }
        }
    }

    public function deletepost($id)
    {
        $data = $this->model('_post')->getPostbyId($id);
        $unlink = unlink($_SERVER["DOCUMENT_ROOT"] . "/" . APP_URL . '/public/image/' . $data['thumbnail']);
        $success = $this->model('_post')->deleteDataPost($id);
        if ($success && $unlink) {
            Flasher::setMessage('Berhasil', 'dihapus', 'blue');
            header('location: ' . APP_URL . 'admin/post');
            exit;
        } else {
            Flasher::setMessage('gambar', 'hapus', 'red');
            header('location: ' . APP_URL . 'admin/post');
            exit;
        }
    }

    public function category()
    {
        $data['judul'] = 'Category';
        $data['cat'] = $this->model('_cat')->getAllCat();
        $this->view('admin/_layout/header', $data);
        $this->view('admin/category/index', $data);
        $this->view('admin/_layout/footer');
    }
    public function createcategory()
    {
        $data['judul'] = 'Buat Category';
        $this->view('admin/_layout/header', $data);
        $this->view('admin/category/create', $data);
        $this->view('admin/_layout/footer');
        if (count($_POST)) {
            $category = array(
                'category_name' => $_POST['category_name'],
                'slug' =>  strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['category_name']))),
            );
            if ($this->model('_cat')->addDataCat($category)) {
                Flasher::setMessage('Berhasil', 'tambah', 'blue');
                header('location: ' . APP_URL . 'admin/category');
                exit;
            } else {
                Flasher::setMessage('Gagal', 'tambah', 'red');
                header('location: ' . APP_URL . 'admin/category');
                exit;
            }
        }
    }
    public function deletecategory($id)
    {
        if (!empty($id)) {
            $result = $this->model('_cat')->deleteDataCat($id);
            if ($result) {
                Flasher::setMessage('Berhasil', 'Hapus', 'blue');
                header('location: ' . APP_URL . 'admin/category');
                exit;
            } else {
                Flasher::setMessage('Gagal', 'hapus', 'red');
                header('location: ' . APP_URL . 'admin/category');
                exit;
            }
        }
    }
}
