<?php

class Controller
{

    public function __construct()
    {
        session_start();
    }

    public function model($model)
    {
        $model = ucwords($model);
        if (file_exists("../app/Models/" . $model . ".php")) {
            require_once "../app/Models/$model.php";  //اینجا انگار مادل پست کامل آورده برای ما و در خط پایین آبجکت ازش ساخته
            return new $model;  //return new User();
        }
    }

    public function view($view, $data = [])
    {
        $view = str_replace(".", '/', $view);
        if (file_exists("../app/Views/$view.php")) {
            return require_once "../app/Views/$view.php";
        } else {
            return require_once "../app/Views/errors/404.php";
        }
    }

    public function uploadImage($path, $image)
    {
        $path = "../public/images/$path";
        if (!file_exists($path)) {  //app/Bootstrap.php آدرس جایی که کنترلر صدا زدیم
            mkdir($path);
        }
        $upload = true;
        $image_name = time() . '_' . rand(1, 10000) . '_' . $image['name'];
        $directory = $path . "/$image_name";
        $fileType = strtolower(pathinfo($directory, PATHINFO_EXTENSION));

        //عکس ما jpg مخالف اولی فالس دومی ترو سومی و چهارمی ترو در کل وارد نمیش چون شرط ما and باید همه صحیح باشد
        if ($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" && $fileType != 'webp') {
            $upload = false;
            $_SESSION['image_error'] = 'فرمت عکس باید یکی از این موارد باشد. jpg, jpeg, png, webp';
        }

        if ($image['size'] > 2000000) {
            $upload = false;
            $_SESSION['image_error'] = "سایز تصویر نباید بیشتر از 2 مگابایت باشد";
        }

        if ($upload) {
            move_uploaded_file($image['tmp_name'], $directory);  //1)tmp_name  2)dir(image)
        }
        return [$image_name, $upload];
    }

}