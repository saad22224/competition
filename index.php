
<?php    session_start();
 require("./handelers/db.php");

   ?>
 <?php require("./inc/header.php")?>
<?php
 $sql = "SELECT * from users ORDER BY RAND() limit 1 ";
 $result =  mysqli_query($conn , $sql);
  $users = mysqli_fetch_all($result , MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);// echo "<pre>";
  
  // print_r($users);
?>
    <style>
    .custom-square {
            background-color: #f8f9fa; /* لون الخلفية */
            width: 80%; /* العرض 80% من الصفحة */
            height: 80%; /* الارتفاع 80% من الصفحة */
            padding: 20px; /* المسافات الداخلية */
            border-radius: 10px; /* الحواف المستديرة */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* الظل */
        }
.loader-con {
  position: fixed;
  left: 0;
  top: 0;
  background-color: rgba(0, 0, 0, 90%);
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  display: none;
}

    </style>
    <div class="container w-100 mt-5 ">
      <div class="d-flex justify-content-center w-100 align-items-center ">
          <div class="custom-square text-center ">
            <img src="./‏‏Hey, Good Morning ☕ - نسخة.jpeg" alt=""
             style="max-width: 100%; width:200px; height:200px; border-radius:50%;   box-shadow: 0 3px 3px
              rgba(0, 0, 0, 0.3), 
              0 4px 3px rgba(0, 0, 0, 0.2); user-select:none">
              <h3 class="text-center mb-3 text-danger">اربح مع سعد</h3>
              <p  class="lead fw-normal">باقي علي فتح التسجيل</p>
             <h3 id="demo" class="text-info  p-2"></h3>
              <p class="lead fw-normal">للسحب علي ربح كارت شحن 📌📌📌📌📌</p>
               <div  class="btn btn-outline-secondary">coming soon</div>
          </div>
      </div>
    </div>
<div class="container pb-5 w-50">
  <h3 class=" text-center pt-5">الرجاء ادخال بياناتك</h3>
    <p  class=" text-center pt-5 fw-bold fs-3">خش هتجيبك 😂😂😂</p>
  <form action="./handelers/handeler.php" method="POST">
  <?php if (isset($_SESSION['succ'])): ?>
<script>
    Swal.fire({
        title: 'تم تسجيل المستخدم بنجاح',
        text: '   سيتم السحب بعد قليل',
        icon: 'success',
        confirmButtonText: 'موافق'
    })
</script>
<?php unset($_SESSION['succ']); ?>
<?php endif; ?>

  <div class="mb-3">
    <label for="first" class="form-label">الإسم الاول</label>
    <input type="text" name="first" class="form-control" value="  <?php if(isset($_SESSION["data"])){
        echo $_SESSION["data"]["first"];
    } ?>" style="border: 1px solid #999; border-radius :10px;" 
    id="first" aria-describedby="emailHelp">
    <?php  if (isset($_SESSION["error"])): ?>
    <div class="form-text error text-danger"  style="color: blue; font-weight:meduim ; 
    margin-top:10px; font-size:15px"><?php echo $_SESSION["error"]["firsterror"]?></div>
    <?php endif?>
  </div>
  <div class="mb-3">
    <label for="second" class="form-label">الإسم الاخير</label>
    <input type="text" name="second" class="form-control "  value="  <?php if(isset($_SESSION["data"])){
        echo $_SESSION["data"]["last"];
    } ?>" style="border: 1px solid #999; border-radius :10px;"
     id="second" aria-describedby="emailHelp">
     <?php  if (isset($_SESSION["error"])): ?>
    <div class="form-text error text-danger" style="color: blue; font-weight:meduim ;
     margin-top:10px; font-size:15px"><?php echo $_SESSION["error"]["lasterror"]?></div>
    <?php endif?>

  </div>
  <div class="mb-3">
    <label for="email" class="form-label">البريد الإلكتروني</label>
    <input type="email" name="email"  class="form-control" style="border: 1px solid #999;
     border-radius :10px; direction:rtl" id="email"   value="  <?php if(isset($_SESSION["data"])){
        echo $_SESSION["data"]["email"];
      unset($_SESSION["data"]);
    } ?>" aria-describedby="emailHelp">
    <?php  if (isset($_SESSION["error"])): ?>
    <div class="form-text error text-danger" style="color: blue; font-weight:meduim ; 
    margin-top:10px; font-size:15px"><?php echo $_SESSION["error"]["emailerror"]?></div>
    <?php unset($_SESSION["error"])?>
    <?php endif?>

  </div>

  <button type="submit" class="btn btn-info w-100 text-white" style="border-radius: 7px;" name="submit">حفظ</button>
</form>
</div>

   <div>
    <div class="loader-con">
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

<dotlottie-player src="https://lottie.host/ec237750-8ce9-49eb-bb5b-6aaabda02722/p7aZt7WPRr.json" 
background="transparent" speed="0.4" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
    </div>

   </div>
   <div class="modal fade" style="direction: rtl;" id="myModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">الرابح في المسابقة</h1>
        <button type="button" class="btn-close" style="transform:translateX(-850%)" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach ($users as $user): ?>
        <h4 class="card-title display-3 text-center"><?php echo $user['fname'] . ' ' . $user['lname']; ?></h4>
        <?php endforeach; ?>
      </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  
</div>

<button class="btn btn-danger text-center mb-5 d-flex justify-content-center m-auto w-75 d-none"
 id="winner"  data-bs-target="#exampleModalToggle" data-bs-toggle="modal">اختيار الرابح</button>
 <script src="js/bootstrab.js"></script>
<?php require("./inc/footer.php")?>
<script>
// Set the date we're counting down to
var countDownDate = new Date("sep 12, 2024 13:13:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    winbtn.classList.remove("d-none")
    clearInterval(x);
    document.getElementById("demo").innerHTML = "لقد وصلت متأخرا";
  }
}, 1000);


//  select winner
 let winbtn = document.getElementById("winner")
 const myModal = new bootstrap.Modal(document.getElementById('myModal'), {
    keyboard: false,
  })
 winbtn.addEventListener("click" , ()=>{
   document.querySelector(".loader-con").style.display = "flex"
   setTimeout(()=>{
    document.querySelector(".loader-con").style.display= "none"
    myModal.show()
  } , 2800)
 })

//  document.querySelector(".btn-close").addEventListener("click" , ()=>{
//   setTimeout(()=>{
//     location.reload()
//   }, 1000)
//  } )


</script>

  </body>
</html>
