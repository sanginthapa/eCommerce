<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>

<?php
function connectdb(){
   $serverName = "DESKTOP-JBJENLU"; //serverName\instanceName
$connectionInfo = array( "Database"=>"testcon", "UID"=>"sa", "PWD"=>"oms@123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
   //   echo "Connection established.<br/>";
     return $conn;
    // header("location:CKEditor.php");
}else{
     echo "Connection could not be established.<br>";
     die( print_r( sqlsrv_errors(), true));
}
}
 function loadprovince(){
   $conn = connectdb();
    $stmt ="SELECT (province),(district) FROM provincelist;";
    $result = sqlsrv_query($conn,$stmt);
   //  $provincelist = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $i=1;
    $list = [];
    while($provincelist = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
       $list[$i]=$provincelist;
       $i=$i+1;
    }
    return $list;
 }
//  $lists = loadprovince();

//  foreach($lists as $list){
//     echo "I GOT : ".$list['province']." , ".$list['district']."<br\>";  
//  }


 function loadAddress($filterColName,$filterValue,$colVisible,$tblName){
    $sql = "SELECT distinct ".$colVisible." FROM ".$tblName." where 1=1";
    if($colVisible==''){
       $sql = "SELECT distinct * FROM ".$tblName." where 1=1";
    }

   //  if($filterColName!="" && $filterValue!=""){
   //  $sql = $sql.' and '.$filterColName."='".$filterValue."'";
   //  }
       popmsg($sql);

    if($filterColName != '' && $filterValue != ''){
       $sql = $sql.' and '.$filterColName." = '".$filterValue."'";
    }
    try{
       $conn = connectdb();
       $i=1;$list=[];
       $getlist = sqlsrv_query($conn,$sql);
       while($data = sqlsrv_fetch_array($getlist, SQLSRV_FETCH_ASSOC)){
          $list[$i]= $data; $i=$i+1;
       }
       return $list;
    }
    catch(Exception $e){
       echo('Error');
    }
 }
echo "<h1>Province List</h1><hr>";
 $provinces = loadAddress('provinceName','','','provinceTable');
//  echo "<table>";
 echo "<select class='clsProvince' id=\"province\">";
 echo "<option selected disabled>Select Province</option>";
 foreach($provinces as $province){
   //  echo "<tr>";
   //  echo "<td>".$province['provinceID']."</td>";
   //  echo "<td>".$province['provinceName']."</td>";
   //  echo "</tr>";
    echo "<option value=\"".$province['provinceID']." \">";
    echo $province['provinceName']."</option>";
 } 
//  echo "</table>";
 echo "</select>";

echo "<h1>District List</h1><hr>";

//  $districts = loadAddress('','','','districtTable');
//  echo "<table>";
 echo "<select class=\"clsDistrict\" id=\"district\">";
 echo "<option selected disabled>Select District</option>";
//  foreach($districts as $district){
//     echo "<tr>";
//     echo "<td>".$district['districtID']."</td>";
//     echo "<td>".$district['districtName']."</td>";
//     echo "</tr>";
//     echo "<option value=\"".$district['districtID']." \">";
//     echo $district['districtName']."</option>";
//  } 
//  echo "</table>";
 echo "</select>";

echo "<h1>Local Level List</h1><hr>";

//  $locallevels = loadAddress('',"",'','localLevelTable');
//  echo "<table>";
 echo "<select class=\"clsLocal\" id=\"localLevel\">";
 echo "<option selected disabled>Select Local Level</option>";
//  foreach($locallevels as $locallevel){
   //  echo "<tr>";
   //  echo "<td>".$locallevel['localLevelID']."</td>";
   //  echo "<td>".$locallevel['localLevelName']."</td>";
   //  echo "</tr>";
//     echo "<option value=\"".$locallevel['localLevelID']." \">";
//     echo $locallevel['localLevelName']."</option>";
//  } 
// echo "</table>";
 echo "</select>";

 function popmsg($msg){
    ?><script>alert ('<?php echo $msg; ?>')</script>
    <?php
 }


?>
</body>
</html>
<script>
   $(document).ready(function(){
      $('.clsProvince').on('change',function(){
         alert('script called');
         var pid = $(this).val();
         $.ajax({
            url:"sqlLibrary.php",
            method: 'post',
            data: 'pid='+pid
         }).done(function(districts){
            // console.log(districts);
            var districts1 = JSON.parse(districts);
            console.log(districts1);
            $('#district').empty();
            $('#district').append('<option selected disabled value="">--select district--</option>')
            jQuery.each( districts1, function( i, val ) {
            $('#district').append('<option value="'+val.districtID+'">'+val.districtName+'</option>')
         });
         })
      })

      // load localleves start from here
      $('.clsDistrict').on('change',function(){
         var did = $(this).val();
         alert('script onn '+did);
         $.ajax({
            url:"sqlLibrary.php",
            method:'post',
            data:'did='+did
         }).done(function(localLevels){
            var locals = JSON.parse(localLevels);
            console.log(locals);
            $('#localLevel').empty();
            $('#localLevel').append('<option selected disabled> --Select Local Level--</option>')
            jQuery.each(locals,function(i,val){
               $('#localLevel').append('<option value="'+val.localLevelID+'">'+val.localLevelName+'</option>')
            });
         })
      })
   })
</script>