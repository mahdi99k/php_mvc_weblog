<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ایجاد اسلایدر</title>
    <!-- Link css -->
    <link rel="stylesheet" href="<?php assets('/plugins/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php assets('/plugins/toastr/toastr.min.css'); ?>">
    <link rel="stylesheet" href="<?php assets('/css/main.css'); ?>">
</head>
<body>

<h2 class="text-secondary text-center my-5">صفحه ایجاد اسلایدر</h2>

<div class="container">
    <div class="mb-3">
        <a href="<?php url('/slider'); ?>" class="btn btn-primary">لیست اسلایدر</a> <!-- '/slider' -> میاد کنترلر اسلایدر باز میکنه و پیش فرض ممتود ایندکس -->
    </div>

    <div class="row mt-1">
        <div class="col-12 p-5 bg-light shadow">
            <form action="<?php url('/slider/store'); ?>" method="POST" enctype="multipart/form-data">

                <div class="input-group">
                    <label class="w-100 mb-2" for="link">لینک</label>
                    <input type="text" name="link" id="link" class="form-control mb-3" placeholder="لینک اسلایدر" >
                </div>

                <div class="input-group">
                    <label class="w-100 mb-2" for="image">تصویر</label>
                    <input type="file" name="image" id="image" class="form-control mb-3" >
                </div>

                <div class="input-group">
                    <label class="w-100 mb-2" for="alt">نام تصویر</label>
                    <input type="text" name="alt" id="alt" class="form-control mb-3" placeholder="نام تصویر اسلایدر" >
                </div>

                <div class="input-group">
                    <label class="w-100 mb-2" for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active">فعال</option>
                        <option value="deactive">غیر فعال</option>
                    </select>
                </div>

                <div class="input-group">
                    <input type="submit" class="btn btn-success mt-3" value="ایجاد">
                </div>

            </form>
        </div>
    </div>
</div>

</body>
<!-- script js -->
<script src="<?php assets('/plugins/jquery-3.6.0.min.js'); ?>"></script>
<script src="<?php assets('/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php assets('/plugins/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php assets('/plugins/toastr/toastr.min.js'); ?>"></script>
<script src="<?php assets('/js/main.js'); ?>"></script>

<!-- Session -->
<?php if (isset($_SESSION['image_error'])): ?>
    <script>toastr.error("<?php echo $_SESSION['image_error'] ?>", 'خطا تصویر')</script>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <script>toastr.error("<?php echo $_SESSION['error'] ?>", 'خطا')</script>
<?php endif; ?>

<?php
unset($_SESSION['image_error']);
$_SESSION['error'] = null;
?>

</html>