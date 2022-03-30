<?php

use App\Table\Produits;

?>
<!-- 1ST BLOCK -->
<div class="main_first_block">
    <div class="frst_block">
        <div class="frst_block_img">
            <img src="<?= ROOT_URL ?>/img/1.jpg">
        </div>
        <div class="frst_block_texte">
            <H4>Cravings for Watermelon</H4>
            <p>Do you love watermelon and ice cream? Then we've got some good news for you. Now you can have both at
                the
                same time. Fill up your freezer with these new bad boys. Their organic, fairtrade and low on sugar.
            </p>
            <div class="frst_block_bttn">Buy now</div>
        </div>
    </div>
</div>


<!-- 2ND BLOCK -->
<div class="main_snd_block">
    <div class="snd_block">
        <div class="">
            <h7>Free shipping</h7>
            <p>Express delivery. Free shipping on orders over €50</p>
        </div>
        <div class="">
            <h7>Organic products</h7>
            <p>Our products are made from organic materials</p>
        </div>
        <div class="">
            <h7>Money back guarantee</h7>
            <p>Not happy? Get your money back. No question asked.</p>
        </div>

    </div>
</div>


<!-- PRODUIT POPULAIRE -->
<div class="main_prdt_pop">
    <div class="prdt_pop">

        <div class="test">
            <div class="prdt_pop_txt">
                <h4>Popular Products</h4>
                <p>These popular products are flying off the shelf. Prep your Netflix and chill night. Grab a jar or
                    two
                    before they sell out. Browse all products.</p>
            </div>
        </div>
        <div class="    ">
            <div class="prdt_pop_artcl">


                <?php
                for ($i = 1; $i <= 3; $i++) {
                    $produit = $produit->getProduitById($i);
?>
                    <a href="produit?produit=<?= $produit->nom?>"><div class="prdt_pop_artc">
                        <img src="<?php echo ROOT_URL.$produit->image ?>">
                        <p><?php echo $produit->nom ?> <br> <?php  echo "€".$produit->prix ?></p>
                    </div></a>
                    <?php

                } ?>
            </div>
        </div>
    </div>
</div>


<!-- ABOUT -->
<div class="main_about">
    <div class="about">
        <div class="about_img">
            <img src="<?= ROOT_URL ?>/img/5.jpg">
        </div>
        <div class="about_void"></div>
        <div class="about_txt">
            <h4>About</h4>
            <p>We're Mike and Jane. We like ice cream. Okay, that's an understatement. We love it🤗. So much that we
                started this compagny. We couldn't find an ice cream company that made high quality, organic, ice
                cream with no added sugar. So we decided to try make it ourselves.</p>
            <div class="about_bttn">Read our story</div>
        </div>
    </div>
</div>