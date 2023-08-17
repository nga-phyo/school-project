
<?php 

    include_once './foobar.php';


   if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $id = $_GET['id'];

    $sql = "SELECT * FROM project where `pj_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $ans = mysqli_fetch_assoc($result);

   }

   

?>


<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        
        <div class="col-12 col-md-12 col-sm-12 col-lg-8">


     
            <img src="../admin/upload-photo/<?php echo $ans['project_name'] ?>" width="900" height="600" alt="">
        
           
        </div>
       
    </div>
    <div class="row justify-content-center align-items-center mt-5">
        
        <div class="col-12 col-md-12 col-sm-12 col-lg-8">
        - အခုပြထားတဲ့ project ကို Dealing အမှီထပ်ရပါမည် <br><br>

        - ဃခုအချိန်ထိသင်ကြားပေးထားသော မိမိ(Language) ရဲ့ Function တေ အာလုံး အသုံးပြုပြီးရေးရမှာဖြစ်ပါတဃ် <br><br>
        - ပုံတွင်ပြထားသည့်ပုံစံမျိုး ရေးပေးရပါမဃ် <br><br>
        - သတ်မှတ်ရက်မတိုင်မှီ အပ်ရပါမဃ် <br><br>
        - 7/8/2003 to 15/8/2023အတွင်းအပ်ရန်ဖြစ်ပါတဃ် <br><br>
        - ရေးထားသော ဖိုင်များအား သက်ဆိုင်ရာ group ထည်းတွင် လာထပ်ပေးပါရန် <br><br>
        - နားမလည်တာ ရှိရင် 01-99944533သို့မေးမြန်းနိုင်ပါသည် <br><br>
        </div>
    </div>
</div>


<?php include_once '../footer.php' ?>
