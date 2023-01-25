<?php
// include 'header.php';
?>
<?php
$launchQry = "SELECT nl.`id`,nl.`product_id`,`category_name`,`product_name`,`sell_Price`, `discriptions`,pv_img.`img_path`, pv_img.`img`,clr.color_name,clr.color_code  FROM `new_launch` nl
INNER join products p on p.id= nl.product_id
INNER JOIN category c ON c.category_id = p.category_id
INNER JOIN productVariant pv on pv.product_id = p.id
INNER JOIN colors clr on pv.color_id = clr.id
INNER JOIN productVariant_image pv_img ON pv_img.product_varient_id = pv.id WHERE nl.display='Active';";
$tblData = get_Table_Data($launchQry);
$catName = '';
$pName = '';
$pDescription = '';
$pPrice = '';
$pImages = [];
$clrs_code = [];
$clrs = [];
$_ii = 1;
foreach ($tblData as $data) {
    $catName = ucfirst($data['category_name']);
    $pName = $data['product_name'];
    $pDescription = $data['discriptions'];
    $pPrice = $data['sell_Price'];
    $pImages[$_ii] = $data['img_path'] . $data['img'];
    $clrs[$_ii] = $data['color_name'];
    $clrs_code[$_ii] = $data['color_code'];
    $_ii++;
}
?>
<div class=" text-center">
    <div class="h1 fw-bolder text-white mt-3 mb-3"><span class="border-bottom border-3 px-3"> New Launch </span></div>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    </div>
    <div class="carousel-inner">
        <?php $i = 1;
        // foreach ($tblData as $data) { 
        ?>
        <div class="carousel-item <?php if ($i == 1) {
            echo "active";
            // $i++;
        } ?>">
            <div class="container container-wrapper">
                <div class="imgBx">
                    <div data-aos="zoom-in-up" data-aos-duration="2000">
                        <img src="<?php echo $pImages[1]; ?>"
                            alt="<?php echo $catName; ?>" class="w-100">
                    </div>
                </div>
                <div class="details">
                    <div class="content">
                        <h2 class="fw-bold mb-5">
                            <?php echo $catName;  ?> <br>
                        </h2>
                        <h2 class="mb-3">
                            <?php echo $data['product_name']; ?> <br>
                        </h2>
                        <p>
                            <?php echo $data['discriptions']; ?>
                        </p>
                        <p class="product-colors">Available Colors:
                            <?php
                            // for ($i = 1; $i = 1; $i + 1) {
                            foreach ($pImages as $imge) {
                            ?>
                            <span class="<?php echo $clrs[$i]; ?> <?php if ($i == 1) {
                                    echo "active";
                                    // $i++;
                                } ?>" data-color-primary="<?php echo $clrs[$i];
                                     ?>" style="background:<?php echo $clrs_code[$i];
                                $i++; ?>;" data-pic="<?php echo $imge; ?>"></span>

                            <?php }
                            /* } */?>
                        </p>
                        <h3 style="    width: 100%; text-align: center;">
                            <div data-aos="zoom-in" data-aos-duration="1500">Rs.
                                <?php echo $data['sell_Price']; ?>
                            </div>
                        </h3>
                       
                    </div>
                </div>
            </div>
        </div>
        <?php
        // }
        ?>
    </div>
</div>




<script>
    $(".product-colors span").click(function () {
        $(".product-colors span").removeClass("active");
        $(this).addClass("active");
        $(".active").css("border-color", $(this).attr("data-color-sec"))
        // $("body").css("background", $(this).attr("data-color-primary"));
        $(".content h2").css("color", $(this).attr("data-color-sec"));
        $(".content h3").css("color", $(this).attr("data-color-sec"));
        // $(".container-wrapper .imgBx").css("background", $(this).attr("data-color-sec"));
        // $(".container-wrapper .details button").css("background", $(this).attr("data-color-sec"));
        $(".imgBx img").attr('src', $(this).attr("data-pic"));
    });
</script>
<?php
// include 'footer.php';
?>