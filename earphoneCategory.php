<?php
include 'header.php';
?>
<div class="col-12">
  <div class="col-12">
    <img class="w-100" style="height:400px" src="assets\images\page_banners\banner earephone.jpg" alt="offer zone">
  </div>
  <div>
    <?php
  ?>
    <div class="container text-left mt-5 mb-5">
      <div class="h1 fw-bolder text-white"> <span class="border-bottom border-3 px-3">Ear Phone</span></div>
    </div>
    <div style="background-color:black;" class=" col-12 d-flex flex-wrap ">
      <?php
// extracting data from product table
// extracting data from product table
$sql = "SELECT id,product_name,LEFT(product_name,15)as trunkName,category_id,actual_Price,sell_Price,img_path,primary_image,secondary_image,url_link,remarks FROM products";
$conn = connectdb();
$req = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if (mysqli_num_rows($req) > 0) {
  while ($data = mysqli_fetch_assoc($req)) {
    if ($data['id'] == 14) {
      //product card layout 
//product card layout 
      if ($data['id'] == 3) { //if part start
?>
      <!-- notify me card section  -->
      <!-- notify me card section  -->
      <div class="card font-normal m-1 mt-3 mb-3 product-wrapper product-card-size text-start"
        style="background-color:#e3e3e3;">
        <div class="col-3">
          <span style="background: #929292; color:white">SoldOut</span>

        </div>
        <!-- this only for displays -->
        <!-- this only for displays -->
        <div data-aos="zoom-in" data-aos-duration="2000">
          <a href="<?php echo $data['url_link']; ?>">
            <img class="change-on-hover<?php echo $data['id']; ?>" style="width:100%;z-index:1; opacity: 0.5;"
              src="<?php $img1 = $data['img_path'] . $data['primary_image'];
        echo $img1; ?>" class="card-img-top"
              alt="airdopes"></a>
        </div>
        <!-- this only for displays -->
        <!-- this only for displays -->
        <img id="primaryImg<?php echo $data['id']; ?>" style="width:100%;display:none;"
          src="<?php $img1 = $data['img_path'] . $data['primary_image'];
        echo $img1; ?>" class="card-img-top"
          alt="airdops">
        <img id="secondaryImg<?php echo $data['id']; ?>" style="width:100%;display:none;"
          src="<?php $img2 = $data['img_path'] . $data['secondary_image'];
        echo $img2; ?>" class="card-img-top"
          alt="airdops">
        <div class="card-body border border-2 rounded mx-2 mb-2 bg-white">
          <div class="card-title">
            <span><strong class="fw-bolder">
                <?php echo $data['product_name'] ?><?php echo $data['trunkName'] ?>...
              </strong></span><br>
            <span><small><i class="bi bi-star-fill text-warning"></i> 4.5 | 999 reviews</small></span>
            <hr>
            <p class="card-text">
              <span class="fw-bolder"><!--Product price-->
                <!-- Rs.999 -->
              </span>
              <span class=" fw-bolder">Rs.
                <?php echo $data['sell_Price']; ?> 
              </span>
              <span class="text-decoration-line-through fw-light"><br>Rs.
                <?php echo $data['actual_Price']; ?>
              </span><br>
              <small>You saved: Rs.
                <?php $saved = $data['actual_Price'] - $data['sell_Price'];
        echo $saved; ?>
              </small>
            </p>
            <a style="width:100%; background:white; color:red; border:1px solid red" class="btn text-center"
              data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo">Notify Me</a>
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

      <!-- notify me card section  -->
      <!-- notify me card section  -->
      <?php
      } //if part end
      else { //else part start
    ?>
      <!-- normal product card layout  -->
      <!-- normal product card layout  -->
      <div class="card font-normal m-1 mt-3 mb-3 product-wrapper product-card-size text-start"
        style="background-color:#e3e3e3;">
        <!-- this only for displays -->
        <!-- this only for displays -->
        <div data-aos="zoom-in" data-aos-duration="2000">
          <a href="<?php echo $data['url_link']; ?>">
            <img class="change-on-hover<?php echo $data['id']; ?>" style="width:100%;z-index:1;"
              src="<?php $img1 = $data['img_path'] . $data['primary_image'];
        echo $img1; ?>" class="card-img-top"
              alt="airdopes"></a>
        </div>
        <!-- this only for displays -->
        <!-- this only for displays -->
        <img id="primaryImg<?php echo $data['id']; ?>" style="width:100%;display:none;"
          src="<?php $img1 = $data['img_path'] . $data['primary_image'];
        echo $img1; ?>" class="card-img-top"
          alt="airdops">
        <img id="secondaryImg<?php echo $data['id']; ?>" style="width:100%;display:none;"
          src="<?php $img2 = $data['img_path'] . $data['secondary_image'];
        echo $img2; ?>" class="card-img-top"
          alt="airdops">
        <div class="card-body border border-2 rounded mx-2 mb-2 bg-white">
          <div class="card-title">
            <span><strong class="fw-bolder">
                <?php echo $data['trunkName'] ?>...
              </strong></span><br>
            <span><small><i class="bi bi-star-fill text-warning"></i> 4.5 | 999 reviews</small></span>
            <hr>
            <p class="card-text">
              <span class="fw-bolder"><!--Product price-->
                <!-- Rs.999 -->
              </span>
              <span class=" fw-bolder">Rs.
                <?php echo $data['sell_Price']; ?>
              </span>
              <span class="text-decoration-line-through fw-light">Rs.
                <?php echo $data['actual_Price']; ?>
              </span><br>
              <small>You saved: Rs.
                <?php $saved = $data['actual_Price'] - $data['sell_Price'];
        echo $saved; ?>
              </small>
            </p>
            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight_1" aria-controls="offcanvasRight_1"
              style="width:100%;" class="btn btn-danger text-center"
              onclick="chooseColor(<?php echo $data['id']; ?>);">ADD TO CART</a>
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


      <!-- normal product card layout  -->
      <!-- normal product card layout  -->
      <?php
      } //else part end
   ?>
      <?php
      //product card layout 
//product card layout 
    }
  }
} else {
  echo "<h1> Nothing to show </h1>";
}
// extracting data from product table
// extracting data from product table
  ?>
    </div>

    <!-- notify me -->
    <!-- notify me -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EMAIL ME WHEN AVAILABLE</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div style="border-bottom: 1px solid #dee2e6;" class="ms-3">
            <p>Register your email address and we will notify you as soon as this product is back in stock.</p>
          </div>
          <h4 class=" ms-3 mt-3 mb-3 fs-3 fw-bold" style="">Ultima Airdopes 175</h4>
          <div class="ms-3 me-3 mb-3">
            <select class="form-select " aria-label="Default select example">
              <option selected>Black</option>
              <option value="1">red</option>
              <option value="2">Blue</option>
              <option value="3">Gray</option>
            </select>
          </div>
          <div class="container text-center mb-3">
            <button type="button" class="btn btn-success col-4" style="border: 1px solid;">E-Mail</button>
            <button type="button" class="btn btn-white col-4" style="border: 1px solid;">Web Push</button>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control ms-3 me-3" style="border: 1px solid #ced4da;"
              placeholder="Email Address" aria-label="Email Address">
          </div>
          <div class="col-10 container mb-3">
            <button type="button" class="btn col-12" style="background:red; color:white;">Notify me when
              available</button>
          </div>
          <div class="col-10 container mb-3">
            <p>We don't share your information with others.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- notify me -->
    <!-- notify me -->

    <?php
include 'footer.php';
?>