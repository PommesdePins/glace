
<?php
require(ROOT_PROJECT. "/public/img/data_source.php");
$db = new \App\Database('glace');
$produit = new \App\Table\Produits();
//if(!isset($_SESSION['panier'])){
//    $_SESSION['panier']=[];
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mike & Jane</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </linkrel>
    <link rel="stylesheet" href=<?= ROOT_URL . "/CSS/main.css"?> type="text/css" media="all">
    <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"></head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body>
<!-- HEADER -->
<div class="header">

    <!-- <div class="a header1"><span class="iconify" data-icon="mdi:check"></span> Free shipping over €50</div>
    <div class="a header2"><span class="iconify" data-icon="mdi:check"></span> 100% organic icecream</div>
    <div class="a header3"><span class="iconify" data-icon="mdi:check"></span> Money back guarantee</div> -->


    <?php foreach ($headers as $header){ ?>
        <div class="a header1">
            <span class="iconify" data-icon="<?php echo $header['icons'] ?>"></span> <?php echo $header['title'] ?>
        </div>
    <?php } ?>

</div>



<!-- LOGO -->
<div class="header_image">
    <a href="glace"><img src=" <?= ROOT_URL?>/img/logo.png" ></a>
</div>


<!-- MENU + TEXTE DESCR -->
<div class="menu">

    <!-- <div class="z">Home</div>
        <div class="z">Shop</div>
        <div class="z">Blog</div>
        <div class="z">About</div>
        <div class="z"> <span class="iconify" data-icon="la:shopping-bag"></span></div> -->

    <?php foreach ($menuItems as $val){
        if (isset($val['icons'])){ ?>
            <div class="z">
                <a href="<?php echo $val['lien'] ?>"><span class="<?php echo $val['href'] ?>" data-icon="<?php echo $val['icons'] ?>"></span></a>
            </div>
        <?php }
        else
        { ?>
            <div class="z">
                <a href="<?php echo $val['href'] ?>"><?php echo $val['title'] ?></a>
            </div>
            <?php
        }
    }

    ?>
</div>
<!--<div class="description">-->
<!--    <div class="description_texte"> Mike + Jane is a minimal and easy to use WordPress theme. Drag and drop-->
<!--        beautiful blocks with WordPress built in page builder. No complicated plugins needed. Start building your-->
<!--        own online store today.-->
<!--    </div>-->
<!--</div>-->

<?php include($mainTemplate); ?>

<!-- FOOTER -->
<div class="main_footer">
    <div class="footer">
        <div class="footer_block footer_block1">
            <h5>About</h5>
            <p>Mike + Jane is a minimal and easy to use WordPress theme. It's perfect for creators and small shops.
                Customize to fit your brand in minutes.</p>
            <div class="x footer_underline">Buy Theme</div>
        </div>
        <div class="footer_block footer_block2">
            <h5>Customer Service</h5>
            <div class="x footer_underline">My Account</div>
            <div class="x footer_underline">Contact</div>
<!--            <div class="x footer_underline">Return Policy</div>-->
            <div class="x footer_underline_long">Shipping & Delivery</div>
            <div class="x footer_underline_long">Term & Conditions</div>
        </div>
        <div class="footer_block footer_block3">
            <h5>Our store</h5>
            <p>16 Rue du Bass. d'Austerlitz, 67100 Strasbourg</p>
            <div class="x footer_underline_long"><a href="https://goo.gl/maps/ZmvDahAxLnqTfuuYA " target="_blank">Google Map Directions</a></div>
        </div>
        <div class="footer_block footer_block4">
            <div class="footer_block_txt">
                <h5>Get 10% off</h5>
                <p>Subscribe to our newsletter to get 10% off your first purchase</p>
            </div>
            <div class="footer_block_chiant">
                <div class="footer_nameemail">
                    <div class="footer_name">
                        <input  placeholder="First name" required >
                    </div>
                    <div class="footer_email"><input type="email" placeholder="Email address" required ></div>

                </div>
                <div class="footer_bttn_center">
                    <div class="footer_bttn"><input type="button" value="Subscribe"></div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
