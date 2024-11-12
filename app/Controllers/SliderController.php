<?php

class SliderController extends Controller
{
    private $sliderModel;

    public function __construct()
    {
        parent::__construct();  //انستراکت کنترلر پدر درون این صدا میزنیم + session_start
        $this->sliderModel = $this->model('Slider');
    }

    public function index()
    {
        $sliders = $this->sliderModel->all();
        return $this->view('sliders.index', ['sliders' => $sliders]);
    }

    public function create()
    {
        return $this->view('sliders.create');
    }

    public function store()
    {
        $link = $_POST['link'];
        $image = $_FILES['image'];
        $alt = $_POST['alt'];
        $status = $_POST['status'];
        if (!empty($link)) {
            if (!empty($image['name'])) {

                $imageData = $this->uploadImage('sliders', $image);
                if ($imageData[1] == true) {
                    $this->sliderModel->store($link, $imageData[0], $alt, $status);
                    $_SESSION['success'] = 'اسلایدر با موفقیت ایجاد شد';
                    header('Location:' . BASE_URL . '/slider');
                }else {
                    header('Location:' . BASE_URL . '/slider/create');
                }

            } else {
                $_SESSION['error'] = "تصویر اسلایدر نباید خالی باشد";
                header('Location:' . BASE_URL . '/slider/create');
            }
        } else {
            $_SESSION['error'] = "فیلد لینک اسلایدر نباید خالی باشد";
            header('Location:' . BASE_URL . '/slider/create');
        }
    }

    public function edit($slider_id)
    {
        $slider = $this->sliderModel->findById($slider_id);
        var_dump($slider);;
    }

}