<?php include_once __DIR__ . '/app.php'; ?>
<?php
    if (isset($_GET['id'])) {
        $id = sanitize_value($_GET['id']);
        $recipe = get_recipe_by_id($id);
        if ($recipe === false) {
            echo 'Recipe does not exist';die;
        }
    } else {
        echo 'Missing id parameter';die;
    }
?>  
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Recipe Page</title>
    <link rel="stylesheet" href="<?php echo site_url(); ?>/dist/styles/style.css">
    <link rel="icon" type="image/x-icon" href="<?php echo site_url(); ?>/dist/images/favicon.ico">
</head>
<body>
<div class="content">
    <header class="page1_header" id="header">
        <div class="page1_title">Flavor Fusion</div>
    </header>
    <div class="page1_con">
        <div class="goBack">Back to Recipes 《</div>
        <h1><?php echo $recipe['Title']; ?></h1>
        <h2><?php echo $recipe['Subtitle']; ?></h2>
        <div class="page1_con_banner_img"><img src="<?php echo site_url(); ?>/dist/images/recipes/<?php echo $recipe['Main IMG']; ?>"/></div>
        <div class="page1_con_btns">
            <div><?php echo $recipe['Cook Time']; ?></div>
            <div><?php echo $recipe['Servings']; ?> Servings</div>
            <div><?php echo $recipe['Cal/Serving']; ?> Calories</div>
        </div>
        <div class="page1_con_img1">
            <div class="page1_con_text">
                <?php echo $recipe['Description']; ?>
            </div>
            <div><img src="<?php echo site_url(); ?>/dist/images/recipes/<?php echo $recipe['Ingredients IMG']; ?>"/></div>
        </div>
        <div class="text_con">
            <p class="page1_con_text">
                <?php 
                    $ingredients = explode('*', $recipe['All Ingredients']);
                ?>
                <?php foreach ($ingredients as $key => $ingredient) {?>
                <input type="checkbox" name="<?php echo $key;?>"> <?php echo $ingredient;?>
                <br>
                <?php }?>
            </p>
        </div>
        <br>
        <h2>Instructions</h2>
        <?php 
            $stepimgs = explode('*', $recipe['Step IMGs']);
        ?>
        <h3 class="sm_title">Step1: <?php echo $recipe['Step Title #1']; ?></h3>
        <div class="page1_con_img2">
            <div><img src="<?php echo site_url(); ?>/dist/images/recipes/<?php echo $stepimgs[0] ?? ''; ?>"/></div>
            <div class="page1_con_text">
                <?php echo $recipe['Step Desc #1']; ?>
            </div>
        </div>
        <h3 class="sm_title">Step2: <?php echo $recipe['Step Title #2']; ?></h3>
        <div class="page1_con_img2">
            <div><img src="<?php echo site_url(); ?>/dist/images/recipes/<?php echo $stepimgs[1] ?? ''; ?>"/></div>
            <div class="page1_con_text">
            <?php echo $recipe['Step Desc #2']; ?>
            </div>
        </div>
        <h3 class="sm_title">Step3: <?php echo $recipe['Step Title #3']; ?></h3>
        <div class="page1_con_img2">
            <div><img src="<?php echo site_url(); ?>/dist/images/recipes/<?php echo $stepimgs[2] ?? ''; ?>"/></div>
            <div class="page1_con_text">
            <?php echo $recipe['Step Desc #3']; ?>
            </div>
        </div>
        <h3 class="sm_title">Step4: <?php echo $recipe['Step Title #4']; ?></h3>
        <div class="page1_con_img2">
            <div><img src="<?php echo site_url(); ?>/dist/images/recipes/<?php echo $stepimgs[3] ?? ''; ?>"/></div>
            <div class="page1_con_text">
            <?php echo $recipe['Step Desc #4']; ?>
            </div>
        </div>
        <h3 class="sm_title">Step5: <?php echo $recipe['Step Title #5']; ?></h3>
        <div class="page1_con_img2">
            <div><img src="<?php echo site_url(); ?>/dist/images/recipes/<?php echo $stepimgs[4] ?? ''; ?>"/></div>
            <div class="page1_con_text">
            <?php echo $recipe['Step Desc #5']; ?>
            </div>
        </div>
        <?php if (!empty($recipe['Step Title #6'])) {?>
        <h3 class="sm_title">Step6: <?php echo $recipe['Step Title #6']; ?></h3>
        <div class="page1_con_img2">
            <div><img src="<?php echo site_url(); ?>/dist/images/recipes/<?php echo $stepimgs[5] ?? ''; ?>"/></div>
            <div class="page1_con_text">
            <?php echo $recipe['Step Desc #6']; ?>
            </div>
        </div>
        <?php } ?>
        <a href="#header" class="top"><img src="<?php echo site_url(); ?>/dist/images/top.png"/></a>
    </div>

    <footer>
        <div class="footer_mark" style="background: url('<?php echo site_url(); ?>/dist/images/footer.jpg') no-repeat;">Copyright © 2023 Zijun</div>
    </footer>
</div>
<script>
    let goBack = document.querySelector(".goBack")
    goBack.onclick = function () {
        location.href = '<?php echo site_url(); ?>'
    }
</script>
</body>
</html>