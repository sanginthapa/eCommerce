<?php include "header.php"; ?>
<!--<script>-->
<!--    $("#colpsCustom").click(function(){-->
<!--        alert("clicked");-->
<!--       $("#accordionSidebar").hide();-->
<!--    });-->
<!--</script>-->
<div class="topbar  pt-3 mb-2" style="background: red;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white p-3 fw-bold mt-3">Order
        History</span>
</div>
<div  style="overflow:auto;" class="font_size_in_mobile">
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">Order Date</th>
                <th scope="col">Product</th>
                <th scope="col">Color</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <input type="hidden" id="userEmail" value="<?php echo $_SESSION['email']; ?>">
            <?php
            $userEmail = $_SESSION['email'];
            ?>
            <?php
            $orderHistry = "SELECT ch.`id`,`email`,p.`product_name`, `color_name`, ch.`cart_id`, ch.`product_v_id`, ch.`quantity`, ch.`modify_date`,ch.`rate`, ch.`discount`, ch.`total`, ch.`dpd_id`,ch.`remarks` FROM `checkouts` ch
INNER JOIN cart on ch.cart_id = cart.id
INNER JOIN productVariant pv on ch.product_v_id = pv.id
INNER JOIN products p on pv.product_id = p.id
INNER JOIN colors c on pv.color_id = c.id
INNER JOIN delivery_payment_details dpd on dpd.id=ch.dpd_id
INNER JOIN users u ON u.id = cart.user_id WHERE email ='$userEmail' and (dpd.delivery_status='pending' or dpd.delivery_status='processing');";
            $conn = dbConnecting();
            $req = mysqli_query($conn, $orderHistry) or die(mysqli_error($conn));
            if (mysqli_num_rows($req) > 0) {
                $i = 1;
                while ($data = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                <td>
                    <?php echo $i; ?>
                </td>
                <td>
                    <?php echo $data['modify_date']; ?>
                </td>
                <td>
                    <?php echo $data['product_name']; ?>
                </td>
                <td>
                    <?php echo $data['color_name']; ?>
                </td>
                <td>
                    <?php echo $data['quantity']; ?>
                </td>
                <td>
                    <?php echo $data['total']; ?>
                </td>
            </tr>
            <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "footer.php" ?>