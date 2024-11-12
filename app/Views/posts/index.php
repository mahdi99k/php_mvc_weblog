<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پست ها</title>
</head>
<body>

<h1 style="color: mediumspringgreen">Page Post</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur distinctio dolorem officiis omnis perferendis, porro quaerat quibusdam sequi? Dignissimos, modi.</p>
<a href="<?php url('/product/index'); ?>">read-more</a>
<br/><br/><br/>
<hr/>

<?php foreach ($data['posts'] as $post): ?>
    <p><?php echo $post->image ?></p>
    <p><?php echo $post->title ?></p>
    <p><?php echo $post->description ?></p>
    <p><?php echo $post->created_at ?></p>
    <hr/>
<?php endforeach; ?>

</body>
</html>