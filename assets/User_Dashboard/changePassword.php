<?php include "header.php" ?>
<div class="topbar  pt-3" style="background: red;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white fw-bold mt-3">Change
        Password</span>
</div>
<div class="row m-3 " style="border:1px solid #bbbbbb;background-color: #e5e5e5;">
    <div class="col m-3" style="border:1px solid black; background-color: white;">
        <input type="hidden" id="userEmail" value="<?php echo $_SESSION['email']; ?>">
        <div class="input-group mb-3 mt-3">
            <span class="input-group-text font_size_in_mobile" id="basic-addon1">New Password :</span>
            <input type="password" class="form-control" id="newPass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                minlength="8">
        </div>
        <div class="input-group mb-3 ">
            <span class="input-group-text font_size_in_mobile" id="basic-addon1">Confirm New Password :</span>
            <input type="password" class="form-control" id="confirmPass">
        </div>
        <button type="button" class="btn btn-danger mb-3" id="submitBtn">Submit</button>
    </div>
</div>

<script>
    $("#submitBtn").click(function () {
        var userEmail = $("#userEmail").val();
        var newPass = $("#newPass").val();
        var confirmPass = $("#confirmPass").val();
        if (newPass == "" || confirmPass == "" || userEmail == "") {
            alert("Please fill the form properly.");
        }
        else if (newPass !== confirmPass) {
            alert("Confirm password does't match with new password");
        }
        else {
            $.ajax({
                url: "assets/library/database.php",
                method: "POST",
                data: { newPass: newPass, userEmail: userEmail },
                success: function () {
                    alert("New Password change successfully");
                    location.reload();
                }
            });
        }
    })
</script>
<?php include "footer.php" ?>