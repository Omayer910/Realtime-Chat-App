<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>

<style>
  .dNon{
    display: none;
  }
</style>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <div >
      <header class="wholeHeader">
      <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>     
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>  
      <button id="blockBtn" class="blockBtn" onClick="alert('Are You Sure For Block This Person??'), block() " style="color: white; padding: 5px 10px; background-color: black; border-radius: 15px; margin-left: 150px" class="blockBtn">Block</button>
      </header>       
 
      </div>
      <div class="chat-box">

      </div>
      <form action="#" id="massageSend"  class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button class="send" ><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
<script>
  let from = document.getElementById('massageSend');
  let btn = document.getElementById('blockBtn');
  let chat_box = document.getElementsByClassName('chat-box');

 function block(){
    from.classList.add("dNon");
    console.log('clicked')
  }

  
</script>

</body>
</html>
