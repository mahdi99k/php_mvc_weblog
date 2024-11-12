<?php

function my_autoload($classes)  //name class
{
    require_once "classes/" . $classes . ".php";  //classes/Test.php
}
spl_autoload_register('my_autoload');  //هر کلاسی که در پوشه classes بنویسیم و میتونیم داخل فایل autoload ن را فراخوانی کنیم
