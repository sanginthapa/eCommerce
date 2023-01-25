<?php 
include 'header.php';
?>

<!-- dynamic product start -->
<!-- dynamic product start -->
<?php 
include 'orderPart.php';
?>
<!-- dynamic product end -->
<!-- dynamic product end -->

<?php include 'warrentyBanner.php'; ?>
<!-- additional images  -->
<!-- additional images  -->
<div class="col-12 bg-white bg-gradient pb-5">
  <img src="assets\images\products\10K Powerbank\banner.png" alt="" class="w-100" >
</div>
<div class="col-12 bg-white bg-gradient">
  <img src="assets\images\products\10K Powerbank\banner 3.png" alt="" class="w-100" >
</div>
<!-- additional images  -->
<!-- additional images  -->

<!-- about 10k powerbank section 1  -->
<!-- about 10k powerbank section 1  -->
<div class="row d-flex flex-wrap pb-5" style="background:black;">
  <div class="col text-center" data-aos="zoom-in" data-aos-duration="1500">
  <img src="assets\images\products\10K Powerbank\10kpowerbank.png" class="w-75" style="transform: rotate(0deg);">
  </div>
  <div class="col" style="color:white;">
   <div > <h1 class="mt-3  fw-bold typewriter headingCls">Solid 10000mAh Power Bank</h1></div>
  <span class="h5 fsSize"> The large-capacity Li-Polymer battery charger allows you to charge your smart electronic devices multiple times.</span>
  </div>
</div>
<!-- about 10k powerbank section 1  -->
<!-- about 10k powerbank section 1  -->

<!-- about 10k Power Bank section 2  -->
<!-- about 10k Power Bank section 2  -->
<div class="row d-flex flex-merge ps-3 pb-1" style="background:black;">
  <div class="col">
    <table class="table table-dark table-hover w-100 mytable">
      <thead>
      </thead>
      <tbody>
        <tr>
          <td style="color: #b9b3b3;width:15rem;">Brand</td>
          <td>Ultima</td>
        </tr>
        <tr>
          <td style="color: #b9b3b3;">Output Power</td>
          <td>12V</td>
        </tr>
        <tr>
          <td style="color: #b9b3b3;">Charging Cable Included</td>
          <td>Yes</td>
        </tr>
        <tr>
          <td style="color: #b9b3b3;">Battery Capacity</td>
          <td>10000mah</td>
        </tr>
        <tr>
          <td style="color: #b9b3b3;">Multiple Device Charging</td>
          <td>Yes</td>
        </tr>
        <tr>
          <td style="color: #b9b3b3;">Input Type</td>
          <td>Micro USB,TYPE-C</td>
        </tr>
        <tr>
          <td style="color: #b9b3b3;">Model</td>
          <td>ATOM</td>
        </tr>
        <tr>
          <td style="color: #b9b3b3;">Warranty</td>
          <td>6 Months</td>
        </tr>
         <tr>
          <td style="color: #b9b3b3;">Device compatibility</td>
          <td>Apple,Acer,ASUS,BlackBerry,<br>HTC,Nokia,Samsung,Sony,<br>Other,Universal,AIS,Alcatel,<br>Motorola,TP-Link,Teclast,Not Specified,NVIDIA,Google,<br>Vivo,Google ,Nextbit,NVIDIA SHIELD,MyPhone.</td>
        </tr>
        <tr>
          <td style="color: #b9b3b3;">Box Contain</td>
          <td><ul>
            <li>A 10000Mah Ultima Powerbank</li>
            <li>A mini charging cable</li>
          </ul></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="container text-center col" data-aos="zoom-in" data-aos-duration="1500">
    <img src="assets\images\products\10K Powerbank\10kpowerbankwhite.png" class="w-100" style="border-radius: 20px;">
  </div>
</div>
<!-- about 10k Power Bank section 2  -->
<!-- about 10k Power Bank section 2  -->



<!-- warrenty section  -->
<!-- warrenty section  -->
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-12 row-cols-lg-12 row-cols-xxl-12 d-flex pt-5 pb-5 rounded">
  <div class="col d-flex">
  <div class="col-6" data-aos="zoom-in" data-aos-duration="1500"><img src="assets\images\products\10K Powerbank\powerbank10ksmall.png" alt="" class="w-100 rounded"></div>
  <div class="col-6 ms-4">
    <div style="color: white;"><h2 class="fw-bold headingCls  typewriter" >Safe & Reliable</h2></div>
    <span class=" text-white fsSize">Portable ergonomic design with hard ABS exterior, upper body Glass - look and high-quality chipset with multiple layers of advanced protection in power bank</span>
    <div style="color: white;" class="mt-5"><h2 class="fw-bold headingCls typewriter">LED Display in percentage</h2></div>
     <span class=" text-white fsSize">Powerbank battery percentage(%) display in LED.</span>
  </div>
 </div>
  <div class="col text-center" data-aos="zoom-in" data-aos-duration="1500">
  <img src="assets\images\products\6monthwarranty.png" alt="" class="w-50">
</div>
</div>

<!-- warrenty section  -->
<!-- warrenty section  -->

<!-- faq  -->
<!-- faq  -->
<?php include "faqDisplay.php"; ?>
<!-- faq  -->
<!-- faq  -->
  
<!-- Rating system -->
<!-- Rating system -->
<?php include 'rating_system.php' ?>
<!-- Rating system -->
<!-- Rating system -->

<?php
include "productMayLike.php" 
?>
</div>

<!-- hover and change image -->
<!-- hover and change image -->
<script>
   $(function(){
    $('#img1').hover(function(){
      //for dynamic track primary image name and secondary imagename along with paths
      var imgName2 = $(this).attr('src');
      $("#display").attr("src",imgName2);
    },
      function(){
      var imgName1 = $("#display").attr('src');
        $("#display").attr("src",imgName1);
  });
  $('#img2').hover(function(){
      //for dynamic track primary image name and secondary imagename along with paths
      var imgName2 = $(this).attr('src');
      $("#display").attr("src",imgName2);
    },
      function(){
      var imgName1 = $("#display").attr('src');
        $("#display").attr("src",imgName1);
  });
  $('#img3').hover(function(){
      //for dynamic track primary image name and secondary imagename along with paths
      var imgName2 = $(this).attr('src');
      $("#display").attr("src",imgName2);
    },
      function(){
      var imgName1 = $("#display").attr('src');
        $("#display").attr("src",imgName1);
  });
   });
</script>
<!-- hover and change image -->
<!-- hover and change image -->

<?php 
include 'footer.php';
?>
