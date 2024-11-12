<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لیست اسلایدر</title>
    <!-- Link css -->
    <link rel="stylesheet" href="<?php assets('/plugins/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php assets('/plugins/swiper/swiper-bundle.min.css'); ?>">
    <link rel="stylesheet" href="<?php assets('/plugins/toastr/toastr.min.css'); ?>">
    <link rel="stylesheet" href="<?php assets('/css/main.css'); ?>">
</head>
<body>

    <h2 class="text-secondary text-center my-5">صفحه نمایش اسلادر ها</h2>

    <div class="container">
        <div class="mb-3">
            <a href="<?php url('/slider/create'); ?>" class="btn btn-primary">ایجاد اسلایدر</a>
        </div>

       <div class="container">
           <div class="col-12 bg-secondary-subtle shadow">
               <table class="table table-striped table-hover table-light">
                   <thead>
                   <tr class="text-center">
                       <th scope="col">#</th>
                       <th scope="col">تصویر</th>
                       <th scope="col">نام تصویر</th>
                       <th scope="col">لینک</th>
                       <th scope="col">وضعیت</th>
                       <th scope="col">ایجاد</th>
                       <th scope="col">عملیات</th>
                   </tr>
                   </thead>
                   <tbody class="text-center">
                   <?php $index=1; ?>
                   <?php foreach ($data['sliders'] as $slider): ?>
                       <tr>
                           <th scope="row"><?php echo $index++ ?></th>
                           <th><img src="<?php assets('/images/sliders/' . $slider->image); ?>" width="85" height="60" alt="<?= $slider->alt ?>"></th>
                           <th><?php echo $slider->alt ?></th>
                           <th><?php echo $slider->link ?></th>
                           <th>
                               <?php if($slider->status == 'active'): ?>
                                   <span class="badge bg-primary p-2">فعال</span>
                               <?php elseif($slider->status == 'deactive'): ?>
                                   <span class="badge bg-warning text-dark p-2">غیر فعال</span>
                               <?php endif; ?>
                           </th>
                           <th><?php echo $slider->created_at ?></th>
                           <th>
                               <a href="" class="text-danger fs-15 ms-3"><i class="fa fa-trash"></i></a>
                               <a href="<?php url('/slider/edit/'.$slider->id); ?>" class="text-info fs-16"><i class="fa fa-pencil"></i></a>
                           </th>
                       </tr>
                   <?php endforeach; ?>
                   </tbody>
               </table>

           </div>
       </div>

    </div>
    <!-- Swiper -->

</body>

<!-- script js -->
<script src="<?php assets('/plugins/jquery-3.6.0.min.js'); ?>"></script>
<script src="<?php assets('/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php assets('/plugins/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php assets('/plugins/swiper/swiper-bundle.min.js'); ?>"></script>
<script src="<?php assets('/plugins/toastr/toastr.min.js'); ?>"></script>
<script src="<?php assets('/plugins/font-awesome/fontawesome.all.min.js'); ?>"></script>
<script src="<?php assets('/js/main.js'); ?>"></script>
<!-- Session -->
<?php if (isset($_SESSION['success'])): ?>
    <script>toastr.info("<?php echo $_SESSION['success'] ?>", 'موفقیت آمیز')</script>
<?php endif; ?>

<?php
$_SESSION['success'] = null;  //session flash سشن یک بار مصرف
?>

</html>








<!--
<div class="swiper mySwiper">
    <div class="swiper-wrapper shadow">
        <?php /*foreach ($data['sliders'] as $slider): */?>
            <div class="swiper-slide">
                <a href="<?/*= $slider->link */?>">
                    <img src="<?php /*assets('/images/sliders/' . $slider->image) */?>" alt="<?/*= $slider->alt ; */?>">
                </a>
            </div>
        <?php /*endforeach; */?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
-->