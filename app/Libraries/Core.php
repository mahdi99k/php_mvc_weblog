<?php

class Core
{
    protected mixed $currentController = "HomeController";
    protected string $currentMethod = "index";
    protected array $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        //----- Controller
        //اگر درون پوشه کنترلر چیزی ساختیم اون اجرا کن وگرنه پیش فرض نبود هوم اجرا کن + (SliderController+UserController حروف اول به صورت بزرگ)ucwords
        if (file_exists("../app/Controllers/" . ucwords($url[0]) . "Controller.php")) {
            $this->currentController = ucwords($url[0]) . "Controller";  //ucwords -> حروف اول بزرگ . "Controller"
            unset($url[0]);  //در آخر مقدار صفر آرایه که کنترلر ما حذف میکینم از آرایه
        } else {
            $this->currentController = "NotFoundController";
        }
        require_once "../app/Controllers/" . $this->currentController . ".php";  //مقدار استرینگ کنترلر درون پراپرتی currentController
        $this->currentController = new $this->currentController;  //Category = new Category(); ایجاد یک آبجکت از کلاس تا دسترسی به تمامی متود ها

        //----- Method
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //----- Parameters
        $this->params = $url ? array_values($url) : [];  //بعد از حذف کنترلر و متود از آرایه url$ هر چیزی با قی ماند پارامترز ما + array_values ایندکس آرایه به جای دو میش صفرم
        call_user_func_array([$this->currentController , $this->currentMethod] , $this->params);  //1)[controller,method] 2)params متود اصلی در ساخت MVC
    }

    protected function getUrl()
    {
        $url = trim($_GET['url'], '/');             //trim -> از سمت راست میاد مقدار کاراکتر که میدیم میاد حذف میکنه
        $url = filter_var($url, FILTER_SANITIZE_URL);  //FILTER_SANITIZE_URL ->localhost/php_mvc/course واویلالیلی این متن فارسی در نظر نمیگیره
        return explode('/', $url);                 //$_GET['url'] -> index.php?url=Controller/Method/Params
    }
}