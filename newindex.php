same problem occured

<!-- header part  -->
<!-- header part  -->
<!-- header part  -->
<!-- header part  -->

    <html>
        <head>
            <title>Ultima Lifestyle</title>
    <link rel="icon" href="assets\images\Favicon\faviconblack.png">
 
    
    <!-- <img src="" alt=""> -->
    <!-- counter css -->
    <!-- counter css -->

    <!-- bootstrap cdn -->
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"  >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  ></script>
    <!-- bootstrap cdn -->
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="assets/css/product.css">
    <!-- bootstrap icon cdn -->
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- bootstrap icon cdn -->
    <!-- bootstrap icon cdn -->

    <!-- css files  -->
    <!-- css files  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/new_launch.css">
    <link rel="stylesheet" href="assets/css/typewriter.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    <!-- css files  -->
    <!-- css files  -->

    <!-- ajax cdn pull  -->

    <!-- font import  -->
    <!-- font import  -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro"> -->
    <!-- font import  -->
    <!-- font import  -->


    <!-- Vendor Script -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- ajax cdn pull  -->
    <!-- ajax cdn pull  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- ajax cdn pull  -->
    <!-- ajax cdn pull  -->

    <!-- <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,800&display=swap');


        .bg_color{
            background: black;
        }
        li>a{
            text-decoration:none;
        }
        .blog-heading>a{
        text-decoration:none;
        color:black;
        }
        .border_price{
        border: 1px dashed grey;
        }
    </style> -->
    <style>
    .topbanner{
    background-color: red;
    background-image: linear-gradient(#bb0303, #e36767, #ce0000);
    min-height: .2vh;
    max-height: 10vh;
    text-align: center;
    color: white;
    }
    .bottombanner{
    background-color: red;
    min-height: 0.2vh;
    max-height: 10vh;
    text-align: center;
    color: white;
    }
    #beastmode{
    background: url('assets\images\products\Beatz Nackband\pubg.png')!important;
    }

    </style>

    </head>
    <?php include 'assets/library/library.php'; ?>
    <body class="bg_color">



<!-- header part  -->
<!-- header part  -->
<!-- header part  -->
<!-- header part  -->


<!-- product container  -->
<!-- product container  -->
<!-- product container  -->
<!-- product container  -->
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-6 lh-1 p-4">
        <?php
  // extracting data from product table
  // extracting data from product table
  $sql = "SELECT id,name,LEFT(name,20)as trunkName,actualPrice,sellPrice,path,primaryImage,secondaryImage,urlLink FROM products";
  $conn = connectdb();
  $req = mysqli_query($conn,$sql) or die(mysqli_error($conn));
  if(mysqli_num_rows($req)>0){
  while($data = mysqli_fetch_assoc($req)){
  //product card layout 
  //product card layout 
        ?>
    <div class="col p-2" style="background: #fff9f9;border:5px solid black;border-radius:15px;;">
      <div class="rounded broder border-3 border-primary">
        <div>
          <!-- this only for displays -->
          <!-- this only for displays -->
          <div class="mb-2 pb-5 text-center" style="border-radius: 15px;background:#e3e3e3;">
            <a href="<?php echo $data['urlLink']; ?>"><img class="change-on-hover<?php echo $data['id']; ?> rounded w-75" style="width:100%;z-index:1;" src="<?php $img1 = $data['path'].$data['primaryImage']; echo $img1; ?>" class="card-img-top" alt="airdopes"></a>
          </div>
        
          <!-- this only for displays -->
          <!-- this only for displays -->
          <img id="primaryImg<?php echo $data['id']; ?>" style="width:100%;display:none;" src="<?php $img1 = $data['path'].$data['primaryImage']; echo $img1; ?>" class="card-img-top" alt="airdops">
          <img id="secondaryImg<?php echo $data['id']; ?>" style="width:100%;display:none;" src="<?php $img2 = $data['path'].$data['secondaryImage']; echo $img2;?>" class="card-img-top" alt="airdops">
          <div class="rounded pt-3 p-2 bg-white" style="margin-top:-2rem;">
            <div class="lh-sm">
              <div class="ps-3"><strong class="fw-bolder product-font-size" title="<?php echo $data['name'] ?>"><?php echo $data['trunkName'] ?>...</strong><br>
                <span><small><i class="bi bi-star-fill text-warning"></i> 4.5 | 999 reviews</small></span>
              </div>      
              <hr style="margin:3px 0px;">
              <p class="ps-3 mt-3 mb-0">
                <span class="fw-bolder product-font-size">Product price <br>
                  <!-- Rs.999 -->
                </span>
                <span class="fw-bolder product-font-size">Rs.<?php echo $data['sellPrice']; ?></span>  
                <span class="text-decoration-line-through fw-light">Rs.<?php echo $data['actualPrice']; ?></span><br>
                <small>You saved: Rs.<?php $saved = $data['actualPrice']-$data['sellPrice']; echo $saved;?></small>
              </p>
              <div class="p-3 pb-0">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight_1" aria-controls="offcanvasRight_1" style="width:100%;background:red;" class="btn text-center"><div class="fw-bold text-white">ADD TO CART</div></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  <!-- script to control product image toggle  -->
  <!-- script to control product image toggle  -->
  <script>
    $(function(){
      $('.change-on-hover<?php echo $data['id']; ?>').hover(function(){
        //for dynamic track primary image name and secondary imagename along with paths
        var imgName2 = $("#secondaryImg<?php echo $data['id']; ?>").attr('src');
        $(this).attr("src",imgName2);
      },
        function(){
        var imgName1 = $("#primaryImg<?php echo $data['id']; ?>").attr('src');
          $(this).attr("src",imgName1);
    });
    });
  </script>
  <!-- script to control product image toggle  -->
  <!-- script to control product image toggle  -->
    <?php
  //product card layout 
  //product card layout 


  }
  }else{
      echo "<h1> Nothing to show </h1>";
  }

  // extracting data from product table
  // extracting data from product table

  ?>
</div>
<!-- product container  -->
<!-- product container  -->
<!-- product container  -->
<!-- product container  -->
</body>
</html>