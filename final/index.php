<?php include_once __DIR__ . '/app.php'; ?>
<?php
    $recipes = get_recipes();

    // Check if search exist in query
    if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
        $recipes = search_recipe($_GET['keyword']);
    }
    if (isset($_GET['Proteine']) && $_GET['Proteine'] != '') {
        $recipes = get_recipe_by_proteine($_GET['Proteine']);
    }
?>    
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flavor Fusion</title>
    <link rel="icon" type="image/x-icon" href="<?php echo site_url(); ?>/dist/images/favicon.ico">
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
        <div class="banner_ipt">
            <form action="<?php echo site_url(); ?>#recipes_lists" method="get" id='recipe_form'>
            <input type="text" name="keyword" value="<?php echo $_GET['keyword'] ?? '' ?>" placeholder="Search Recipes Here">
            <div class="ipt_icon" onclick='doSubmitForm()'><img src="<?php echo site_url(); ?>/dist/images/icon1.png"/></div>
            </form>
        </div>
    </div>
    <div class="recipes_list" id="recipes_lists">
        <div class="recipes_list_title">Recipes</div>
        <div class="recipes_list_menu">
            <div onclick="doSearchProteine('All')" class="<?php if (isset($_GET['Proteine']) && $_GET['Proteine'] == 'All') { echo 'btns_active';} else if (!isset($_GET['Proteine'])) {echo 'btns_active';} ?> btn_list" id="All">All</div>
            <div onclick="doSearchProteine('Chicken')" class="<?php if (isset($_GET['Proteine']) && $_GET['Proteine'] == 'Chicken') { echo 'btns_active';} ?> btn_list" id="Chicken">Chicken</div>
            <div onclick="doSearchProteine('Beef')" class="<?php if (isset($_GET['Proteine']) && $_GET['Proteine'] == 'Beef') { echo 'btns_active';} ?> btn_list" id="Beef">Beef</div>
            <div onclick="doSearchProteine('Fish')" class="<?php if (isset($_GET['Proteine']) && $_GET['Proteine'] == 'Fish') { echo 'btns_active';} ?> btn_list" id="Fish">Fish</div>
            <div onclick="doSearchProteine('Pork')" class="<?php if (isset($_GET['Proteine']) && $_GET['Proteine'] == 'Pork') { echo 'btns_active';} ?> btn_list" id="Pork">Pork</div>
            <div onclick="doSearchProteine('Turkey')" class="<?php if (isset($_GET['Proteine']) && $_GET['Proteine'] == 'Turkey') { echo 'btns_active';} ?> btn_list" id="Turkey">Turkey</div>
            <div onclick="doSearchProteine('Steak')" class="<?php if (isset($_GET['Proteine']) && $_GET['Proteine'] == 'Steak') { echo 'btns_active';} ?> btn_list" id="Steak">Steak</div>
            <div onclick="doSearchProteine('Vegetarian')" class="<?php if (isset($_GET['Proteine']) && $_GET['Proteine'] == 'Vegetarian') { echo 'btns_active';} ?> btn_list" id="Vegetarian">Vegetarian</div>
        </div>
        <div class="recipes_list_con">
            <?php if (!empty($recipes)) {?>
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
            <?php }?>
        </div>
    </div>
    <footer>
        <div class="footer_mark" style="background: url('<?php echo site_url(); ?>/dist/images/footer.jpg') no-repeat;">Copyright © 2023 Zijun</div>
    </footer>
    <script>
        function doSubmitForm() {
            console.log('submit');
            var form = document.getElementById('recipe_form');
            form.submit();
        }
        function doSearchProteine(Proteine) {
            window.location.href = '<?php echo site_url();?>' + '/index.php?Proteine='+Proteine+'#recipes_lists'
        }
    </script>
</div>
<script src="<?php echo site_url(); ?>/dist/scripts/js.js"></script>
</body>
</html>
