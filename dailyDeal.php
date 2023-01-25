<?php
include 'header.php';
?>
<div class="container text-center mt-4 mb-2">
  <div class="h1 fw-bolder text-white">
    <span class="border-bottom border-3 px-3"> Best Sellers</span>
  </div>
</div>
<div style="background-color:black; justify-content:space-evenly;" class="row d-flex dynamic-product-container">
  <?php
  // extracting data from product table
// extracting data from product table
  $sql = "SELECT id,product_name,LEFT(product_name,16)as trunkName,ROUND(actual_price,0) as actual_price,ROUND(sell_price,0)as sell_price,img_path,primary_image,secondary_image,url_link FROM products";
  $conn = connectdb();
  $req = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if (mysqli_num_rows($req) > 0) {
    while ($data = mysqli_fetch_assoc($req)) {
        $productID = $data['id'];
      //product card layout 
//product card layout 
  ?>
  <div id="products" class="font-normal mb-2 col-sm-5 product-wrapper product-card-size text-start"
    style="background-color:#e3e3e3;">
    <div class="col-6">
      <i class="bi bi-lightning-charge-fill" style="background:yellow;" >
        <?php $percent = availableStock($data['id']);
      echo $percent; ?>%
      </i>
    </div>
    <!-- this only for displays -->
    <!-- this only for displays -->
    <a href="<?php echo $data['url_link']; ?>">
      <div data-aos="zoom-in" data-aos-duration="2000" class="text-center"><img
          class="change-on-hover<?php echo $data['id']; ?>" style="width:80%;z-index:1;" src="<?php $img1 = $data['img_path'] . $data['primary_image'];
      echo $img1; ?>" class="card-img-top" alt="image"></div>
    </a>
    <!-- <a href="<?php echo $data['url_link']; ?>"><img class="change-on-hover<?php echo $data['id']; ?>" style="width:100%;z-index:1;" src="<?php $img1 = $data['img_path'] . $data['primary_image'];
      echo $img1; ?>" class="card-img-top" alt="airdopes"></a> -->
    <!-- this only for displays -->
    <!-- this only for displays -->
    <img id="primaryImg<?php echo $data['id']; ?>" style="width:100%;display:none;" src="<?php $img1 = $data['img_path'] . $data['primary_image'];
      echo $img1; ?>" class="card-img-top" alt="airdops">
    <img id="secondaryImg<?php echo $data['id']; ?>" style="width:100%;display:none;" src="<?php $img2 = $data['img_path'] . $data['secondary_image'];
      echo $img2; ?>" class="card-img-top" alt="airdops">
    <div class="border border-2 rounded mb-2 bg-white p-1">
      <div class="">
        <span><small class="fw-bolder" title="<?php echo $data['product_name'] ?>">
            <?php echo $data['trunkName'] ?>...
          </small></span><br>
        <span><small>
            <!--<i class="bi bi-star-fill text-warning"></i> 4.5 | 999 reviews-->
            <?php $rating = giveAvgReview($productID); ?>
            </small></span>
        <hr style="margin:1px">
        <p class="card-text" style="margin-bottom:0px">
          <!--<span class="fw-bolder">Product price -->
          <!-- Rs.999 -->
          </span>
          <span><small class=" fw-bolder">Rs.
              <?php echo $data['sell_price']; ?>
            </small></span><small>
            <span class="text-decoration-line-through fw-light">Rs.
              <?php echo $data['actual_price']; ?>
            </span><br>
            You saved: Rs.
            <?php $saved = $data['actual_price'] - $data['sell_price'];
      echo $saved; ?>
          </small>
        </p>
        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight_1" aria-controls="offcanvasRight_1"
          style="width:100%;" class="btn btn-danger text-center" onclick="chooseColor(<?php echo $data['id']; ?>);">ADD
          TO CART</a>
        <!-- progress bar  -->
        <div class="progress mt-2">
          <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated fw-bold text-dark rounded"
            role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuenow="55" aria-valuemin="0"
            aria-valuemax="100">
            <div class="col-12" style="position:absolute;z-index:1;">
              <?php echo $percent; ?>% Sold
            </div>
          </div>
        </div>
        <!-- progress bar  -->
      </div>
    </div>
  </div>
  <!-- script to control product image toggle  -->
  <!-- script to control product image toggle  -->
  <script>
    $(function () {
      $('.change-on-hover<?php echo $data['id']; ?>').hover(function () {
        //for dynamic track primary image name and secondary imagename along with paths
        var imgName2 = $("#secondaryImg<?php echo $data['id']; ?>").attr('src');
        $(this).attr("src", imgName2);
      },
        function () {
          var imgName1 = $("#primaryImg<?php echo $data['id']; ?>").attr('src');
          $(this).attr("src", imgName1);
        });
    });
  </script>
  <!-- script to control product image toggle  -->
  <!-- script to control product image toggle  -->
  <?php
      //product card layout 
//product card layout 
  

    }
  } else {
    echo "<h1> Nothing to show </h1>";
  }

  // extracting data from product table
// extracting data from product table
  
  ?>
</div>

<?php
include 'footer.php';
?>