<?php
include_once "../backend/main.php";





function load_popup(){
  $user =getUserData();
  $name =$user["NAME"];
  $profile =$user["PROFILE"];
  $email = $user['EMAIL'];
  $path = "../img/".$profile;
?>

<div class="popup" id="popup">
  <div class="popup__content">
    <div class="btn--close">
    <ion-icon class="close" name="close-outline"></ion-icon>
    </div>
    <div class="popup__update">
      <div class="profile__left">
        <div class="profile">
          <img class="profile-img" src="<?php echo $path ?>" alt="User logo">
        </div>
        <div class="password__strength">
          <label  class="update-form__label order-0 center-text" for="">Strength of password </label>
          <div class="power">
            <div class="power-point"></div>
          </div>
        </div>
        <div class="show-password">
          <ion-icon class="eye" name="eye-outline"></ion-icon>
        </div>
        <p class="message"></p>
      </div>
      <form class="update-form" action="../backend/update.php" method="post" enctype="multipart/form-data">

            <div class="update-form__input-group">
              <input class="update-form__input" name="updateName" id="update-name" type="text" value="<?php echo htmlspecialchars($name);?>" />
              <label class="update-form__label" for="update-name">Username:</label>
            </div>
            <div class="update-form__input-group">
              <input class="update-form__input" name="updateEmail" id="update-email" type="email" value="<?php echo $email;?>" />
              <label class="update-form__label" for="update-name">Email:</label>
            </div>
            <div class="update-form__input-group">
              <input class="hidden" id="update-profile" name="userImage"  type="file" />
              <label class="btn-dash update-form-btn" for="update-profile">Upload photo &rarr;</label>
            </div>
            <div class="update-form__input-group">
              <input class="update-form__input" id="update-old-password" name="oldPassword" type="password" />
              <label class="update-form__label" for="update-old-password">Old password:</label>
            </div>
            <div class="update-form__input-group">
              <input class="update-form__input" id="update-new-password" name="newPassword" type="password" />
              <label class="update-form__label" for="update-new-password">New password:</label>
            </div>
            <div class="update-form__input-group">
              <input class="update-form__input" id="update-confirm-password" name="confirmPassword" type="password"/>
              <label class="update-form__label" for="update-confirm-password" >Confirm password:</label>
            </div>
            <button class="btn-dash update-form-btn">Update &rarr;</button>
      </form>
    </div>
  </div>
</div>
<?php
}
?>
