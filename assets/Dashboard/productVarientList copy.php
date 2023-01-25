<?php  include "header.php" ?>
<div class="col-12">
    <div class="col-12">
        <div class="col-12 d-flex">
            <?php
                $p_ID = $_GET['id'];
                $query="SELECT  pv.`id` as pvIDH,p.`id` AS pid, `product_name`FROM `productvariant` pv
                INNER JOIN products p on p.id= pv.product_id WHERE p.id=$p_ID limit 1";
                $conn = dbConnecting();
                $req = mysqli_query($conn,$query) or die(mysqli_error($conn));
                if(mysqli_num_rows($req)>0){
                while($data = mysqli_fetch_assoc($req)){ ?>
            <div class="p-4 mb-2 col-7 me-3 bg-dark text-white text-center">PRODUCT VARIENT :&nbsp;
                <?php echo $data['product_name']; ?>
            </div>
            <!-- add verient button -->
            <!-- add verient button -->
            <button type="button" class="btn ms-3 btn-outline-secondary col-2 mb-2 productCls" data-bs-target="#exampleModalToggle"
            href="#exampleModalToggle" data-products-id="<?php echo $data['pid']; ?>" data-products-name="<?php echo $data['product_name']; ?>"
             data-bs-toggle="modal"><i class="bi bi-person-plus-fill"></i> Add Verient</button>
            <!-- add verient button -->
            <!-- add verient button -->

                <?php 
                }
            }
        ?>
        </div>
    </div>
    <!-- datatable start -->
    <!-- datatable start -->
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Product Name</th>
                <th class="text-center" style="width:30%;">Product Image</th>
                <th>Color</th>
                <th>Quantity</th>
                <th>Add Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $pid = $_GET['id'];
        $showQRY ="select pv.`id`as pvIDS,p.`id` as productID,pi.id AS pvImageID,`stock_in`,`stock_out`,`defective`, `returned`, `available`, `total`,pi.`img_path`,`img`,`product_name`,clr.`id` as clriD,`color_name` from products p inner join productvariant pv on pv.product_id=p.id 
                   left outer join productvariant_image pi on pv.id=pi.product_varient_id
                   LEFT OUTER JOIN colors clr ON clr.id = pv.color_id
                   where p.id=$pid order by pv.id";
        $conn = dbConnecting();
        $req = mysqli_query($conn,$showQRY) or die(mysqli_error($conn));
        if(mysqli_num_rows($req)>0){
        $i=1;
        while($data=mysqli_fetch_assoc($req)){?>
            <tr>
                <td>
                    <?php echo $i; ?>
                </td>
                <td>
                    <?php echo $data['product_name']; ?>
                </td>
                <td class="text-center"><img src="<?php echo " ../../".$data['img_path'].$data['img']; ?>" class="w-25">
                </td>
                <td>
                    <?php echo $data['color_name']; ?>
                </td>
                <td>
                    <?php echo $data['available']; ?>
                </td>
                <td><a class="btn btn-primary addFeatureImage" data-bs-target="#exampleModalToggle4"
                    href="#exampleModalToggle4" data-bs-toggle="modal" 
                    data-pv-id="<?php echo $data['pvIDS'] ?>"
                    data-Vcolor-name="<?php echo $data['color_name'] ?>"
                    data-vproduct-Name="<?php echo $data['product_name'] ?>">
                    <i class="bi bi-plus-circle-fill text-white"></i></a>
                </td>
                <td><a class="btn btn-success updateClassP" 
                data-updateproducts-id="<?php echo $data['productID']; ?>" 
                data-updateproducts-name="<?php echo $data['product_name']; ?>" 
                data-color-id="<?php echo $data['clriD']; ?>" 
                data-products-color_name="<?php echo $data['color_name']; ?>" 
                data-products-stock_in="<?php echo $data['stock_in']; ?>" 
                data-products-stock_out="<?php echo $data['stock_out']; ?>" 
                data-products-defective="<?php echo $data['defective']; ?>" 
                data-products-returned="<?php echo $data['returned']; ?>" 
                data-products-VID="<?php echo $data['pvIDS']; ?>" 
                data-products-VImageID="<?php echo $data['pvImageID']; ?>" 
                data-products-imagePath="<?php echo $data['img_path']; ?>" 
                data-products-img="<?php echo $data['img']; ?>" 
                data-bs-target="#exampleModalToggle1" href="#exampleModalToggle1" data-bs-toggle="modal">
                <i class="bi bi-check2-circle"></i></a></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data"><button type="submit"
                            name="deleteSubHeading" class="btn btn-danger text-center"><i
                                class="bi bi-trash-fill"></i></button></form>
                </td>
            </tr>
            <?php
        $i++;
        }
        }
        ?>
        </tbody>
    </table>
    <!-- datatable end -->
    <!-- datatable end -->
</div>
</div>

<!-- add product varient -->
<!-- add product varient -->
<script>
    $(".productCls").click(function () {
        var pID = $(this).attr("data-products-id");
        var PName = $(this).attr("data-products-name");
        $("#productID").attr("value", pID.trim());
        $("#PName").attr("value", PName.trim());
    });
</script>
<div class="modal ms-5 ps-5" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggle"
    tabindex="-1">
    <div class="modal-dialog modal-lg ps-5" style="max-width:1060px;margin-left:75px;">
        <div class="modal-content ms-5">
            <div class="p-3 mb-2 bg-dark text-white text-center">Add Product Varient</div>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="container col-11">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xxl-2 p-3 mb-2"
                        style="border:1px solid gray">
                        <div class="col p-3">
                            <span class="input-group-text">Product Color : &nbsp;
                                <select class="form-select" id="color_name" name="color_name">
                                    <?php 
                                $ChoseColorQRY = "SELECT `id`,`color_name` FROM `colors`";
                                $conn = dbConnecting();
                                $req = mysqli_query($conn,$ChoseColorQRY) or die(mysqli_error($conn));
                                if(mysqli_num_rows($req)>0){
                                while($data=mysqli_fetch_assoc($req)){?>
                                    <option  value="<?php echo $data['id'] ?>">
                                        <?php echo $data['color_name'] ?>
                                    </option>
                                    <?php
                                }
                                }
                                ?>
                                </select>
                            </span>
                        </div>

                    <input type="hidden" class="form-control" id="productID" name="productID">
                    <div class="col p-3">
                        <span class="input-group-text">Stock IN : &nbsp;
                        <input type="text" class="form-control" name="stock_in" id="stock_in"></span>
                    </div>
                    <div class="col p-3">
                        <span class="input-group-text">Defective : &nbsp;
                        <input type="text" class="form-control" name="defective" id="defective"></span>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-danger" name="pVarientSubmit" id="pVarientSubmit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
    $("#pVarientSubmit").click(function () {
        alert("I am clicked");
        var productID = $("#productID").val();
        var color_name = $("#color_name").val();
        var stock_in = $("#stock_in").val();
        var defective = $("#defective").val();
        if (productID=="" || color_name == "" || stock_in == "" ){
            alert("Input field are empty. Please fill the form properly");
            return false;
        }
        else {
            $.ajax({
                url: "library/database.php",
                method: "POST",
                data: { color_name: color_name, productID: productID,stock_in: stock_in, defective: defective},
                success: function () {
                    alert("Done");
                    location.reload();
                }
            });
        }
    });
    </script>
<!-- add product  varient -->
<!-- add product  varient --> 

<!-- add product image varient -->
<!-- add product image varient -->
<script>
$(".addFeatureImage").click(function(){
    var pvIDaayo = $(this).attr("data-pv-id");
    var pvcoloraayo = $(this).attr("data-Vcolor-name");
    var pvProductNameaayo = $(this).attr("data-vproduct-Name");
    $("#pverientID").attr("value", pvIDaayo.trim());
    $("#pverientclrName").attr("value", pvcoloraayo.trim());
    $("#pverientProductName").attr("value", pvProductNameaayo.trim());
})
</script>
<div class="modal ms-5 ps-5" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggle4" tabindex="-1">
    <div class="modal-dialog modal-lg ps-5" style="max-width:1060px;margin-left:75px;">
        <div class="modal-content ms-5">
            <div class="p-3 mb-2 bg-dark text-white text-center">Add Product Varient</div>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="container col-11">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xxl-2 p-3 mb-2"
                        style="border:1px solid gray">
                    <div class="col p-3">
                        <input type="hidden" id="pverientID" name="pverientID">
                        <input type="hidden" id="pverientclrName" name="pverientclrName">
                        <input type="hidden" id="pverientProductName" name="pverientProductName">
                        <input type="hidden" id="PName" name="PName">
                        <h1 class="fs-5 fw-bold">Feature Images :</h1>
                        <span class="input-group-text"> &nbsp;
                        <input type="file" class="form-control" onchange="feature_image()" name="fimg" id="fimg"></span>
                        <p class="m-3 text-danger fs-5">Note : Photo must be transperent and 400*400 pixel image</p>
                    </div>
                    <div class="col p-3">
                        <h1 class="fs-5 fw-bold">Display Images :</h1>
                        <span class="input-group-text"> &nbsp;
                        <input type="file" class="form-control" onchange="display_image()" name="dimg" id="dimg" multiple></span>
                        <p class="m-3 text-danger fs-5">Note : Select atmost 8 photos</p>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-danger" name="pVarientImageSubmit" id="pVarientImageSubmit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
    $("#pVarientImageSubmit").click(function(){
    alert("i am click");
    var pverientID = $("#pverientID").val();
    var pverientPname = $("#pverientProductName").val();
    // alert(pverientID);
    // alert(pverientPname);
    var fimg = $("#fimg").val().replace(/C:\\fakepath\\/i, '');
    var dimg = $("#dimg").val().replace(/C:\\fakepath\\/i, '');
    if(fimg==""|| dimg==""|| pverientID==""|| pverientPname==""){
    alert("Form field are empty. Please fill the form properly");
    return false;
    }
    else{
        alert(pverientID);
        alert(fimg);

        $.ajax({
            url: "library/database.php",
            method: "POST",
            data: {fimg: fimg,pverientID:pverientID,dimg:dimg,pverientPname:pverientPname},
            success: function () {
                alert("Done");
                location.reload();
            }
        });
    }
    })
</script>
<script>
    async function feature_image() {
        let formData = new FormData();
        formData.append("folderid",$("#pverientProductName").val());
        formData.append("file", fimg.files[0]);
        await fetch('library/feature_image.php', {
            method: "POST",
            body: formData
        });
    }
</script>
<script>
     async function display_image() {
        let formData = new FormData();
        formData.append("folderDisplayid", $("#pverientclrName").val());
         formData.append("folderVerientid", $("#pverientID").val());
        formData.append("folderDisplayName", $("#pverientProductName").val());
       
    for(var i=0;i<dimg.files.length;i++){
      formData.append("file", dimg.files[i]);
    await fetch('library/displayImage.php', {
        method: "POST",
        body: formData
    });
   }
   }
   </script>
<!-- add product image varient -->
<!-- add product image varient --> 

<!-- update product varient -->
<!-- update product varient -->
<script>
    $(".updateClassP").click(function () {
    var clrID = $(this).attr("data-color-id");
    var clrName = $(this).attr("data-products-color_name");
    var stockIn = $(this).attr("data-products-stock_in");
    var stockOut = $(this).attr("data-products-stock_out");
    var defeCtive = $(this).attr("data-products-defective");
    var retUrned = $(this).attr("data-products-returned");
    var ImgPatH = $(this).attr("data-products-imagePath");
    var ImaGe = $(this).attr("data-products-img"); 
    $("#updateProductID").val( $(this).attr("data-updateproducts-id").trim()); 
    $("#updateProductName").val($(this).attr("data-updateproducts-name").trim());
    $("#updateclrName").val($(this).attr("data-products-color_name").trim());
    $("#updatePvImageID").val($(this).attr("data-products-VImageID").trim()); 
    $("#updatePverientID").val($(this).attr("data-products-VID").trim()); 
    $("#Updatecolor_name").val( clrID.trim());
    $("#updateStock_in").val( stockIn.trim());
    $("#updateStock_out").val( stockOut.trim());
    $("#updateDefective").val( defeCtive.trim());
    $("#updateReturned").val(retUrned.trim());
    // show image
    // show image
    $("#viewPVFeatureImg").attr("src", "../../" + ImgPatH.trim() + ImaGe);
    // show image
    // show image
    });
    </script>
<div class="modal ms-5 ps-5" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggle1" tabindex="-1">
  <div  class="modal-dialog modal-lg ps-5" style="max-width:1060px;margin-left:75px;">
    <div class="modal-content ms-5">
      <div class="p-3 mb-2 bg-dark text-white text-center">Update Product Varient</div>
         <form action="#" method="post" enctype="multipart/form-data">
                <div class="container col-11">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xxl-2 p-3 mb-2"
                        style="border:1px solid gray">
                        <div class="col p-3">
                            <input type="hidden" class="form-control" id="updateProductID" name="updateProductID">
                            <input type="hidden" class="form-control" id="updateProductName" name="updateProductName">
                            <input type="hidden" class="form-control" id="updateclrName" name="updateclrName">
                            <span class="input-group-text">Product Color : &nbsp;
                                <select class="form-select" id="Updatecolor_name" name="Updatecolor_name">
                                <?php 
                                $ChoseColorQRY = "SELECT `id`,`color_name` FROM `colors`";
                                $conn = dbConnecting();
                                $req = mysqli_query($conn,$ChoseColorQRY) or die(mysqli_error($conn));
                                if(mysqli_num_rows($req)>0){
                                while($data=mysqli_fetch_assoc($req)){
                                ?>
                                <option  value="<?php echo $data['id'] ?>">
                                    <?php echo $data['color_name'] ?>
                                </option>
                                <?php
                                }
                                }
                                ?>
                                </select>
                            </span>
                        </div>

                    <div class="col p-3">
                        <span class="input-group-text">Stock IN : &nbsp;
                        <input type="text" class="form-control" name="updateStock_in" id="updateStock_in"></span>
                    </div>
                    <div class="col p-3">
                        <span class="input-group-text">Stock OUT : &nbsp;
                            <input type="text" class="form-control" name="updateStock_out" id="updateStock_out"></span>
                    </div>
                    <div class="col p-3">
                        <span class="input-group-text">Defective : &nbsp;
                        <input type="text" class="form-control" name="updateDefective" id="updateDefective"></span>
                    </div>
                    <div class="col p-3">
                        <span class="input-group-text">Returned : &nbsp;
                        <input type="text" class="form-control" name="updateReturned" id="updateReturned"></span>
                    </div>
                    <hr class="w-100 pe-1">
                    <div class="col p-3">
                        <input type="hidden" id="updatePverientID" name="updatePverientID">
                        <input type="hidden" id="updatePvImageID" name="updatePvImageID">
                        <h1 class="fs-5 fw-bold">Feature Images :</h1>
                        <span class="input-group-text"> &nbsp;
                        <input type="file" class="form-control" onchange="Updatef_image()" name="updatefimg" id="updatefimg"></span>
                        <div class="col-12 text-center">
                            <img id="viewPVFeatureImg" name="viewPVFeatureImg" class="w-50">
                        </div>
                        <p class="m-3 text-danger fs-5">Note : Photo must be transperent and 400*400 pixel image</p>

                    </div>
                    <div class="col p-3">
                        <h1 class="fs-5 fw-bold">Display Images :</h1>
                        <span class="input-group-text"> &nbsp;
                        <input type="file" class="form-control" onchange="Updated_image()" name="updatedimg" id="updatedimg" multiple></span>
                        <p class="m-3 text-danger fs-5">Note : Select atmost 8 photos</p>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-danger" name="UpdatepVarientSubmit" id="UpdatepVarientSubmit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
    $("#UpdatepVarientSubmit").click(function(){
    alert("I am clicked");
    var Updatecolor_name = $("#Updatecolor_name").val(); 
    var updateProductID = $("#updateProductID").val();
    var updateProductName = $("#updateProductName").val();
    var updateStock_in = $("#updateStock_in").val();
    var updateStock_out = $("#updateStock_out").val();
    var updateDefective = $("#updateDefective").val();
    var updateReturned = $("#updateReturned").val();
    var updatePverientID = $("#updatePverientID").val();
    var updatePvImageID = $("#updatePvImageID").val();
    var updatefimg = $("#updatefimg").val().replace(/C:\\fakepath\\/i, '');
    var updatedimg = $("#updatedimg").val().replace(/C:\\fakepath\\/i, '');
    if(Updatecolor_name==""|| updateProductID==""|| updateProductName==""|| updateStock_in==""|| updatePverientID==""||updatePvImageID==""){
    alert("Form Field Are Empty. Please Fill The Form Properly");
    return false;
    }
    else{
    $.ajax({
        url:"library/database.php",
        method:"POST",
        data:{ Updatecolor_name: Updatecolor_name, updateProductID:updateProductID,updateProductName:updateProductName,updateStock_in:updateStock_in,updateStock_out:updateStock_out,updateDefective:updateDefective,updateReturned:updateReturned,updatePverientID:updatePverientID,updatePvImageID:updatePvImageID, updatefimg: updatefimg,updatedimg: updatedimg },
        success:function(){
        alert("Done");
        location.reload();
        }
    })
    }
    });
</script>
<script>
    async function Updatef_image() {
        let formData = new FormData();
        formData.append("Updatefolderid",$("#updateProductName").val());
        formData.append("file", updatefimg.files[0]);
        await fetch('library/Updatefeature_image.php', {
            method: "POST",
            body: formData
        });
    }
</script>
<script>
     async function Updated_image() {
        let formData = new FormData();
        formData.append("folderDisplayId", $("#updateclrName").val());
        formData.append("folderVerientId", $("#updateProductName").val());
       
    for(var i=0;i<updatedimg.files.length;i++){
      formData.append("file", updatedimg.files[i]);
    await fetch('library/UPdatedisplayImage.php', {
        method: "POST",
        body: formData
    });
   }
   }
</script>
<!-- update product varient -->
<!-- update product varient -->

 <?php include "footer.php"; ?>          