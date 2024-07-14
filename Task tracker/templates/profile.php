<?php
include_once "../backend/main.php";

function load_card(){
  $user =getUserData();
  $name =$user["NAME"];
  $profile =$user["PROFILE"];
  $email = $user['EMAIL'];
  $path = "../img/".$profile;
?>
<div class="card">
  <div class="card__side card__side--front">
    <div class="card__picture">
      <img class="user-logo" src="<?php echo $path ?>" alt="User logo"/>
    </div>
    
    <div class="card__details">
      <ul>
        <li><strong>Name:</strong><?php echo $name ?></li>
        <li><strong>Age:</strong>19</li>
        <li><strong>Gender:</strong>Male</li>
        <li><strong>Email:</strong><?php echo $email ?></li>
        <li><strong>PhoneNO:</strong>8248929308</li>
      </ul>
    </div>
  </div>
  <div class="card__side card__side--back">
    <div class="card__cta">
      <a href="#popup" class="update-btn btn-dash">Update Profile</a>
    </div>
  </div>
</div>

<?php
}
?>
