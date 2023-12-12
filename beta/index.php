<?php include_once __DIR__ . '/app.php'; ?>
<?php
    $recipes = get_recipes();
?>    
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flavor Fusion</title>
    <link rel="stylesheet" href="<?php echo site_url(); ?>/dist/styles/style.css">
</head>
<body>
<div class="content">
    <div class="banner">
        <div class="banner_title">Flavor Fusion</div>
        <div class="banner_left_img"><img src="<?php echo site_url(); ?>/dist/images/img10.png"/></div>
        <div class="banner_right_img" style="background: url('<?php echo site_url(); ?>/dist/images/img11.png') no-repeat;">
            <div class="banner_right_img_mark"></div>
        </div>
        <div class="banner_text">
            Epicurean Adventures: <br>Unleash the Flavorful Feast!
        </div>
    </div>
    <div class="recipes_list">
        <div class="recipes_list_title">Recipes</div>
        <div class="recipes_list_con">
            <?php foreach ($recipes as $recipe) {?>
            <div>
                <div style="background: url('<?php echo site_url(); ?>/dist/images/recipes/<?php echo $recipe['Main IMG']; ?>') no-repeat;background-size: cover;";>
                    <div class="img_mark">
                        <div class="collect"><img src="<?php echo site_url(); ?>/dist/images/icon3.png" class="collect_img"/></div>
                        <div class="share"><img src="<?php echo site_url(); ?>/dist/images/icon2.png"/></div>
                        <div class="more"><a href="<?php echo site_url();?>/detail.php?id=<?php echo $recipe['id']?>">Start Cooking</a> <span class="icon5"><img src="<?php echo site_url(); ?>/dist/images/icon5.png"/></span></div>
                    </div>
                </div>
                <p class="list_name"><?php echo $recipe['Title']; ?></p>
                <p class="list_subtitle"><span><?php echo $recipe['Subtitle']; ?></span></p>
            </div>
            <?php }?>
        </div>
    </div>
    <footer>
        <div class="footer_mark" style="background: url('<?php echo site_url(); ?>/dist/images/footer.jpg') no-repeat;">Copyright © 2023 Zijun</div>
    </footer>
</div>
<script src="<?php echo site_url(); ?>/dist/scripts/js.js"></script>
</body>
</html>
