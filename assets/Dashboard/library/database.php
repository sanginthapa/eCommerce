<?php
include 'connect_server.php';
include 'functions_here.php';

// new category 
// new category
if (isset($_POST["category_name"])) {
    $cat_name = $_POST['category_name'];
    $id = get_primary_id("category");
    $cat_type = $_POST['category_type'];
    $cate_id = $_POST['category_id'];
    if ($cat_name == "" || $cat_type == "" || $cate_id == "") {
        return false;
    } else {
        // $cat_qry = "SELECT IF (EXISTS(SELECT * FROM category WHERE category_name='$cat_name'),1,0)as result;";
        $cat_qry = "SELECT IF (EXISTS(SELECT * FROM category WHERE category_name='$cat_name' or category_id = '$cate_id'),1,0)as result;";
        $result = check_if_exist($cat_qry);
        if ($result == 1) {
            $response = give_response(55);
            echo json_encode($response);
        } else if ($result == 0) {

            $cat_query = "INSERT INTO `category`(`id`, `category_name`, `category_type`, `category_id`) VALUES
        ($id,'$cat_name','$cat_type','$cate_id');";
            $conn = dbConnecting();
            $catRes = mysqli_query($conn, $cat_query);
            if ($catRes) {
                // $code = check_ecxeptions($msg);
                $response = give_response(200);
                history_table($cat_query, true);
                echo json_encode($response);
            } else {
                $msg = mysqli_error($conn);
                // echo $msg;
                $code = check_ecxeptions($msg);
                $response = give_response($code);
                history_table($cat_query, false);
                echo json_encode($response);
            }
        }
    }
}
// new category 
// new category 

// update category
// update category
if (isset($_POST["updatecategoryname"])) {
    $u_category_name = $_POST['updatecategoryname'];
    $u_category_id = $_POST['update_category_id'];
    $u_category_type = $_POST['updatecategorytype'];
    $cat_update_qry = "SELECT IF (EXISTS(SELECT * FROM category WHERE category_id='$u_category_id'),1,0)as result;";
    $result = check_if_exist($cat_update_qry);
    if ($result == 0) {
        $response = give_response(404);
        echo json_encode($response);
    } else if ($result == 1) {
        $update_cat_Qry = "UPDATE `category` SET `category_name`='$u_category_name',`category_type`='$u_category_type' where category_id=$u_category_id;";
        $conn = dbConnecting();
        $updateCatreq = mysqli_query($conn, $update_cat_Qry);
        if ($updateCatreq) {
            $response = give_response(200);
            history_table($updateCatreq, true);
            echo json_encode($response);
        } else {
            $msg = mysqli_error($conn);
            // echo $msg;
            $code = check_ecxeptions($msg);
            $response = give_response($code);
            history_table($updateCatreq, false);
            echo json_encode($response);
        }
    }
}

// update category
// update category

// add product
// add product
if (isset($_POST['catID'])) {
    $catID = $_POST['catID'];
    // $addCategory_name = $_POST['addCategory_name'];
    $id = get_primary_id('products');
    $addProduct_name = $_POST['addProduct_name'];
    $addSell_Price = $_POST['addSell_Price'];
    $addActual_Price = $_POST['addActual_Price'];
    $addPrimary_image = $_POST['addPrimary_image'];
    $addSecondary_image = $_POST['addSecondary_image'];
    $Plocation = "assets/images/products/";
    $productQry = "INSERT INTO `products`
    (`id`,`product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, 
    `primary_image`, `secondary_image`) VALUES 
    ('$id','$addProduct_name','$catID','$addActual_Price','$addSell_Price','$Plocation',
    '$addPrimary_image','$addSecondary_image') /* where category_id='$catID' */;";
    $conn = dbConnecting();
    $product_req = mysqli_query($conn, $productQry);
    if ($product_req) {
        $response = give_response(200);
        history_table($productQry, true);
        echo json_encode($response);
        // popMsg("Product added successfully database");
    } else {
        // echo "cannot execute :" . $productQry;
        $msg = mysqli_error($conn);
        // echo $msg;
        $code = check_ecxeptions($msg);
        $response = give_response($code);
        history_table($productQry, false);
        echo json_encode($productQry);
    }
}
// add product
// add product

//update product
//update product
if (isset($_POST['update_product_name'])) {
    $update_product_name = $_POST['update_product_name'];
    $update_p_id = $_POST['update_p_id'];
    $update_sell_Price = $_POST['update_sell_Price'];
    $update_actual_Price = $_POST['update_actual_Price'];
    $update_primary_image = $_POST['update_primary_image'];
    echo $update_primary_image;
    $update_secondary_image = $_POST['update_secondary_image'];
    $location = "assets/images/products/";
    $updateQRY = "UPDATE `products` SET `product_name`='$update_product_name',`actual_Price`='$update_actual_Price',`sell_Price`='$update_sell_Price',`img_path`='$location',`primary_image`='$update_primary_image',`secondary_image`='$update_secondary_image'where id='$update_p_id';";
    if (!run_update_query($updateQRY)) {
        // echo "cannot execute :" . $updateQRY;
        echo json_encode(give_response(201));
    } else {
        // popMsg("Product Update successfully");
        echo json_encode(give_response(200));
    }
}
//update product
//update product


// add product varient
// add product varient
if (isset($_POST['color_name'])) {
    $color_name = $_POST['color_name'];
    $productID = $_POST['productID'];
    $stock_in = $_POST['stock_in'];
    $defective = $_POST['defective'];
    $id = get_primary_id("productVariant");
    $updateVQRY = "INSERT INTO `productVariant`(`id`,`product_id`, `color_id`,`stock_in`,`defective`) VALUES ($id,'$productID','$color_name','$stock_in','$defective');";
    if (run_basic_insert_query($updateVQRY)) {
        echo json_encode(give_response(200));
        // popMsg("Product verient added successfully");
    } else {
        echo json_encode(give_response(201));
        // echo "cannot execute :" . $updateVQRY;
    }
}
// add product varient
// add product varient

// add product varient image
// add product varient image
if (isset($_POST['fimg'])) {
    $fimg = $_POST['fimg'];
    $dimg = $_POST['dimg'];
    $pverientPname = $_POST['pverientPname'];
    $Flocation = "assets/images/products/" . $pverientPname . "/";
    $pverientID = $_POST['pverientID'];
    $id = get_primary_id("productVariant_image");
    $AddVImageQRY = "INSERT INTO `productVariant_image`(`id`,`product_varient_id`,`img_path`,`img`) VALUES ($id,'$pverientID','$Flocation','$fimg')";
    if (run_basic_insert_query($AddVImageQRY)) {
        // popMsg("Product verient image added successfully");
        echo json_encode(give_response(200));
    } else {
        // echo "cannot execute :" . $AddVImageQRY;
        echo json_encode(give_response(201));
    }
}
// add product varient image
// add product varient image


// update product verient
// update product verient
if (isset($_POST["Updatecolor_name"])) {
    $Updatecolor_name = $_POST['Updatecolor_name'];
    $updateProductID = $_POST['updateProductID'];
    $updateProductName = $_POST['updateProductName'];
    $updateStock_in = $_POST['updateStock_in'];
    $updateStock_out = $_POST['updateStock_out'];
    $updateDefective = $_POST['updateDefective'];
    $updateReturned = $_POST['updateReturned'];
    $updatePverientID = $_POST['updatePverientID'];
    $updatePvImageID = $_POST['updatePvImageID'];
    $updatefimg = $_POST['updatefimg'];
    $updatedimg = $_POST['updatedimg']; //echo "update Image : ".$updatedimg; 
    $remarks = $_POST['remarks']; //echo ($remarks);
    $PVImageLocation = "assets/images/products/" . $updateProductName . "/";
    $update_stock = update_product_varient($updatePverientID,$Updatecolor_name,$updateStock_in,$updateStock_out,$updateDefective,$updateReturned,$remarks);
    $update_image = "UPDATE `productVariant_image` pvImage SET `img_path`='$PVImageLocation',`img`='$updatefimg' where pvImage.id=$updatePvImageID";
if ($update_stock) {
    if($updatefimg!=''){
        if(run_update_query($update_image)){
        //return total success
        $response = give_response(200);
        array_push($response,array("image_update_status"=>200));
        echo json_encode($response);
    }else{
        //return only product stock update
        echo json_encode(give_response(200));
    }
    }else{
        //return only product stock update
        echo json_encode(give_response(200));
    }
    
    }else {
        //cannot update
        echo json_encode(give_response(201));
    }
}

function update_product_varient($pv_id,$New_color_name_id,$add_stock,$add_stock_out,$add_defective,$add_returned,$remarks){
    // echo "New Data:";
    // echo "color id :".$Updatecolor_name_id;
    // echo "Add Stock:".$add_stock;
    // echo "Add Stock Out:".$add_stock_out;
    // echo "Add Stock Defective:".$add_defective;
    // echo "Add Stock returned:".$add_returned;
    $remarks = modify_query($remarks); //making sure ' wont damage our sql query;
    $check_exist = "SELECT IF (EXISTS(SELECT `color_id`, `stock_in`, `stock_out`, `defective`, `returned`, `available`, `total` FROM `productVariant` WHERE `id`=$pv_id),1,0) as result;"; //echo $check_exist."<br>";
    $reult = check_if_exist($check_exist);
    if($reult){
    $get_old_data = "SELECT `stock_in`, `stock_out`, `defective`, `returned`, `available`, `total` FROM `productVariant` WHERE `id`=$pv_id;"; // echo $get_old_data;
    $data = get_table_data($get_old_data);
    if($data!=0){
        //bringing old data
        $old_stock='';
        $sold_stock='';
        $defective_stock='';
        $returned_stock='';
        foreach ($data as $da){
        $old_stock=$da['stock_in']; //echo "old stock : ".$old_stock;
        $sold_stock=$da['stock_out']; //echo " sold stock : ".$sold_stock;
        $defective_stock=$da['defective'];// echo " Defective stock : ".$defective_stock;
        $returned_stock=$da['returned'];// echo " Returned stock : ".$returned_stock;
        }
        //bringing old data
        //doing calculations
        $update_stock_in = $old_stock+$add_stock;// echo "Updated stock_in : ".$update_stock_in;
        $update_stock_out = $sold_stock+$add_stock_out;// echo "Updated stock_out : ".$update_stock_out;
        $update_defective_stock = $add_defective+$defective_stock;// echo "Updated defective_stock : ".$update_defective_stock;
        $update_returned_stock = $add_returned+$returned_stock; //echo "Updated returned_stock : ".$update_returned_stock;
        //calculate available
        $updated_available = $update_stock_in-$update_stock_out-$update_defective_stock+$update_returned_stock; //echo "Updated Avalable for sale : ".$updated_available;
        //calculate total in stock
        $updated_total = $update_stock_in-$update_stock_out+$update_defective_stock+$update_returned_stock;// echo "Updated Total in stock: ".$updated_total;
        //doing calculations
        // preparing update Query
        $update_qry = "UPDATE `productVariant` SET `color_id`=$New_color_name_id,`stock_in`=$update_stock_in,`stock_out`=$update_stock_out,`defective`=$update_defective_stock,`returned`=$update_returned_stock,`available`=$updated_available,`total`=$updated_total,`remarks`='$remarks' WHERE `id` =$pv_id ;";
        // echo $update_qry;
        return run_update_query($update_qry);
    }else{
        return 0;
    }
    }
    else{
        // echo "data not found";
        return 0;
    }
}
// update product verient
// update product verient

// color peaker 
// color peaker 
if (isset($_POST['colorName'])) {
    $colorNamee = $_POST['colorName'];
    $colorCodee = $_POST['colorCode'];
    $id = get_primary_id("colors");
    if ($colorNamee == "" || $colorCodee == "") {
        return false;
    } else {
        $qry="SELECT IF (EXISTS(SELECT * FROM colors WHERE color_name='$colorNamee'),1,0)as result;";
        $result = check_if_exist($qry);
        if($result==1){
            $response = give_response(55);
            echo json_encode($response);
        }else if($result==0){
            $clrQry = "INSERT INTO `colors`(`id`,`color_name`, `color_code`) VALUES ($id,'$colorNamee','$colorCodee');";
            $conn = dbConnecting();
            $clrreq = mysqli_query($conn, $clrQry);
            if($clrreq){
                $response = give_response(200);
                history_table($clrQry, true);
                echo json_encode($response);
            }else{
                $msg = mysqli_error($conn);
                // echo $msg;
                $code = check_ecxeptions($msg);
                $response = give_response($code);
                history_table($clrQry, false);
                echo json_encode($response);
            }
        }
    }
}
// color peaker 
// color peaker  

// FAQs insert
// FAQs insert
if (isset($_POST["faq_product_id"])) {
    // popMsg("portal open");
    $product_id = $_POST['faq_product_id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $qryFAQs = "INSERT INTO `faqs`(`product_id`, `question`, `answer`) VALUES ('$product_id','$question','$answer');";
    if (run_basic_insert_query($qryFAQs)) {
        // popMsg("New FAQs Added successfully");
            echo json_encode(give_response(200));
    } else {
        // echo "cannot execute :" . $qryFAQs;
            echo json_encode(give_response(201));
    }
}
// FAQs insert
// FAQs insert

// <!-- update FAQs -->
// <!-- update FAQs -->
if (isset($_POST['questionUpdate'])) {
    $questionUpdate = $_POST['questionUpdate'];
    $answerUpdate = $_POST['answerUpdate'];
    $update_faq_id = $_POST['update_faq_id'];
    if ($questionUpdate == '' || $answerUpdate == '' || $update_faq_id == '') {
        return false;
    } else {
        $updateFAQ = "UPDATE `faqs` SET `question`='$questionUpdate',`answer`='$answerUpdate' where id=$update_faq_id;";
        if (run_update_query($updateFAQ)) {
            // popMsg(" FAQs Update successfully");
            echo json_encode(give_response(200));
        } else {
            // echo "cannot execute :" . $updateFAQ;
            echo json_encode(give_response(201));
        }
    }
}
// update FAQs 
// update FAQs 


if (isset($_POST['categoryID_Details'])) {
    $catID = $_POST['categoryID_Details'];
    $myQuery = "SELECT `id`, `category_name`, `category_type`, `category_id`, `remarks` FROM `category` where category_id=$catID";
    $conn = dbConnecting();
    $req = mysqli_query($conn, $myQuery) or die(mysqli_error($conn));
    if (mysqli_num_rows($req) > 0) {
        $setdata;
        while ($data = mysqli_fetch_assoc($req)) {
            $setdata = $data;
        }
        echo json_encode($setdata);
    }
}
// Add new carousel 
// Add new carousel 

if (isset($_POST["bannerName"])) {
    $bannerName = $_POST["bannerName"];
    $bannerImg = $_POST['bannerImg'];
    $Carlocation = "assets/images/banners/";
    $CarouselQry = "INSERT INTO `carousel`(`bannerName`, `img_path`, `img`) VALUES ('$bannerName','$Carlocation','$bannerImg');";
    echo $CarouselQry;
    $conn = dbConnecting();
    $res = mysqli_query($conn, $CarouselQry) or die(mysqli_error($conn));
    if ($res = false) {
        history_table($CarouselQry, false);
        echo "Cannot execute : " . $CarouselQry;
    } else {
        history_table($CarouselQry, true);
        popMsg("New Banner Added Successfully");
    }
}
// Add new carousel 
// Add new carousel


if (isset($_POST["get_data_from_server"])) {
    $get_data_from_server = $_POST["get_data_from_server"];
    $check_exist = "SELECT IF (EXISTS(SELECT * FROM `products` WHERE id=$get_data_from_server),1,0) as result;";
    // echo $check_exist . "<br>";
    $result = check_if_exist($check_exist);
    if ($result == 1) {
        $sql = "SELECT p.`id`,`category_name`,`product_name`,`sell_Price`,pv_img.`img_path`, pv_img.`img`, new_launch.discriptions FROM `products` p
        INNER JOIN category c ON c.category_id = p.category_id
        INNER JOIN productVariant pv on pv.product_id = p.id
        INNER JOIN productVariant_image pv_img on pv_img.product_varient_id = pv.id 
        LEFT JOIN new_launch on pv.product_id=new_launch.product_id
        where p.id = $get_data_from_server";
        $data = get_Table_Data($sql);
        $response = array();
        $response = array(
            "message" => "success",
            "status_code" => '200',
            "products" => $data
        );
        echo json_encode($response);
    } else {
        $response = give_response(404);
        echo json_encode($response);
    }
}

if (isset($_POST["productDisc"])) {
    $productDisc = $_POST['productDisc'];
    $productDisc = modify_query($productDisc);
    $showId = $_POST['showId'];
    $id = get_primary_id("new_launch");
    $display = 'Deactive';
    $check_exist = "SELECT IF (EXISTS(SELECT * FROM `new_launch` WHERE product_id=$showId),1,0) as result;";
    $result = check_if_exist($check_exist);
    $discription_query = '';
    if ($result == 1) {
        $discription_query = "UPDATE `new_launch` SET `discriptions`='$productDisc',`remarks`=now() WHERE `product_id`=$showId;";
    } else if ($result == 0) {
        $discription_query = "INSERT INTO `new_launch`(`id`, `launchdate`,`display`, `product_id`, `discriptions`) VALUES ('$id',now(),'$display','$showId','$productDisc');";
    }
    // echo $discription_query;
    $conn = dbConnecting();
    $discRes = mysqli_query($conn, $discription_query);
    if ($discRes) {
        // $code = check_ecxeptions($msg);
        $response = give_response(200);
        history_table($discription_query, true);
        echo json_encode($response);
    } else {
        $msg = mysqli_error($conn);
        // echo $msg;
        $code = check_ecxeptions($msg);
        $response = give_response($code);
        history_table($discription_query, false);
        echo json_encode($response);
    }
}

// active and deactive new launch
// active and deactive new launch

if (isset($_POST["activeNewLaunch"])) {
    $activeNewLaunch = $_POST["activeNewLaunch"];
    $displayProuctid = $_POST["displayProuctid"];
    if ($activeNewLaunch == '') {
        return false;
    } else {
        $updateNewLaunch = "UPDATE `new_launch` SET `display`='Deactive' WHERE display='Active';";
        // echo $updateNewLaunch;
        $conn = dbConnecting();
        $res = mysqli_query($conn, $updateNewLaunch);
        if ($res == false) {
            $msg = mysqli_error($conn);
            echo $msg;
            echo "cannot execute :" . $updateNewLaunch;
        } else {
            $sql = "UPDATE `new_launch` SET `display`='Active' WHERE product_id=$displayProuctid;";
            if(mysqli_query($conn, $sql)){
            // popMsg("New Launch Product Active Update successfully");
            echo json_encode(give_response(200));}
            else{
                $msg = mysqli_error($conn);
            echo $msg;
            echo "cannot execute :" .$sql;
            }
        }
    }
}

// active and deactive new launch
// active and deactive new launch


?>

