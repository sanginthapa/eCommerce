  <script>
  function chooseColor(product_id){
  alert ("Clicked :"+product_id);
   $.ajax({
    url:"assets/library/color_control.php",
            method:"POST",
            data:{getColors:product_id},
            dataType:"JSON",
            success:function(data){
              // alert('OK');
              // console.log(data);
              data.length;
              var imgName = data[1].img_path+data[1].img;
              $("#displayimg").attr("src",imgName);
              var productName = data[1].product_name;
              $("#productName").text(productName);
              var productSellPrice = data[1].sell_price;
              $("#productSellPrice").text("Rs."+productSellPrice);
              var productActualPrice = data[1].actual_price;
              $("#productActualPrice").text("Rs."+productActualPrice);
              var colorName = data[1].color_name;
              $("#colorName").text(colorName);
              var pv_id = data[1].pv_id;
              $("#selected_pv_id").attr("value",pv_id);
              // $("#varient_images").empty();
              jQuery.each( data, function( i, val ) {
                if(i != 0){
                  if(i==1){
                  $( "#imgcng1").attr("src",val.img_path+val.img);
                  $( "#imgcng1").attr("name",val.color_name);
                   $( "#imgcng1").append('<input type="hidden" value="'+val.pv_id+'">');
                  }
                  else if(i==2){
                  $( "#imgcng2").attr("src",val.img_path+val.img);
                  $( "#imgcng2").attr("name",val.color_name);
                   $( "#imgcng2").append('<input type="hidden" value="'+val.pv_id+'">');
                  }
                  else if(i==3){
                  $( "#imgcng3").attr("src",val.img_path+val.img);
                  $( "#imgcng3").attr("name",val.color_name);
                   $( "#imgcng3").append('<input type="hidden" value="'+val.pv_id+'">');
                  }
                  else{
                  $( "#varient_images").append('<button class="btn"><img id="imgcng'+i+'" name="'+val.color_name+'" class="w-100 rounded"  src="'+val.img_path+val.img+'" style="background:#e1e1e1"/></button>');
                   $( "#varient_images").append('<input type="hidden" value="'+val.pv_id+'">');
                }}
              });
            }
          });
}
</script>

<!-- choose color before add to cart start-->
<!-- choose color before add to cart start-->
<div class="offcanvas offcanvas-end" id="offcanvasRight_1" aria-labelledby="offcanvasRightLabel_1">
  <div class="offcanvas-header" style="background:black; Color:white">
    <h5 id="offcanvasRightLabel">Choose Option</h5>
    <button type="button" class="btn-close  text-white" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-square-fill "></i></button>
  </div>
  <div class="offcanvas-body">
  <div class=" col-12 d-flex pt-5 pb-3">
    <div class="col-4">
    <img class="w-100" id="displayimg">
  </div>
  <div class="col-8 ">
    <h3 id="productName"></h3>
     <p class="card-text">
        <span class="fw-bolder" id="productSellPrice" style="color: red;"></span> &nbsp;
        <span class="text-decoration-line-through fw-light" id="productActualPrice"></span><br>
      </p>
  </div>
  </div>
    <div class="col-12 fw-bold pb-5">
      <span style="color: gray;">Color : &nbsp; </span><span id="colorName"></span>
    </div>
    <div class="col-12 d-flex mt-3" id="varient_images">
      <button class="btn"><img id="imgcng1" src="assets\images\products\eardopesblack.png" class="w-100 rounded me-1 bgonclick" style="background:#e1e1e1"></button>
      <button class="btn"><img id="imgcng2" src="assets\images\products\eardopesblue.png" class="w-100 rounded  me-1" style="background:#e1e1e1"></button>
      <button class="btn"><img id="imgcng3" src="assets\images\products\eardopesgray.png" class="w-100 rounded" style="background:#e1e1e1"></button>
    </div>
    <input type="hidden" name="selected" id="selected_pv_id">
    <div class="mt-4"><button type="button" id="addToCartBtn" class="btn fw-bold col-12" style="background: red;color:white;">ADD TO CART</button></div>
     <div class="mt-3 text-center fw-bold"> <a style="color: red;">VIEW DETAILS</a> </div>
  </div>
</div>
<!-- choose color before add to cart start-->
<!-- choose color before add to cart start-->


<!-- click event fire to change images start on offcanvas-->
<!-- click event fire to change images start on offcanvas-->
<script>
  $(document).ready(function() {
    
    $("#imgcng1").click(function(){
    var imgname = $(this).attr('src');
    var colorName = $(this).attr('name');
    $("#displayimg").attr("src",imgname);
    $("#colorName").text(colorName);
    var pv_id = $(this).children("input").val();
    $("#selected_pv_id").attr("value",pv_id);
    });

    $("#imgcng2").click(function(){
    var imgname = $(this).attr('src');
    var colorName = $(this).attr('name');
    $("#displayimg").attr("src",imgname);
    $("#colorName").text(colorName);
    var pv_id = $(this).children("input").val();
    $("#selected_pv_id").attr("value",pv_id);
    });

    $("#imgcng3").click(function(){
    var imgname = $(this).attr('src');
    var colorName = $(this).attr('name');
    $("#displayimg").attr("src",imgname);
    $("#colorName").text(colorName);
    var pv_id = $(this).children("input").val();
    $("#selected_pv_id").attr("value",pv_id);
    });

    $("#addToCartBtn").click(function(){
      var selected_pv_id = $("#selected_pv_id").val();
      var quantity=1;
      var cart_id=$("#cart_id").attr("data-cart_id");
      alert ("ID is : "+selected_pv_id+" please proceed.");
      $.ajax({
        url: 'assets/library/library.php',
        type: 'POST',
        data: {addToCart:cart_id,pv_id:selected_pv_id,quantity:quantity},
        datatype: 'JSON',
        success: function (data) { 
          console.log(data);
          var d=JSON.parse(data);
          console.log(d.message);
          if(d.status=="200"){
          alert("DONE");}
          else if(d.status!="500"){
          alert("NOT DONE");}
         },
        error: function (jqXHR, textStatus, errorThrown) { errorFunction(); }
    });
    });
  })
  </script>
<!-- click event fire to change images start on offcanvas-->
<!-- click event fire to change images start on offcanvas-->
