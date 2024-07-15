<?php
include "navigation.php";
include "profile.php";
include "popup.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task tracker</title>
    <link rel="stylesheet" href="../styles/style.css" />
  </head>
  <body class="admin-profile">
    <?php 
    load_nav();
    load_card();
    load_popup();
    ?>

  <script>
    const popup = document.querySelector(".popup");
    const content = document.querySelector(".popup__content");
    const updateBtn = document.querySelector(".update-btn");
    const closeBtn = document.querySelector(".btn--close");
    const notify = document.querySelector(".count");

    updateBtn.addEventListener('click',function(){
      popup.classList.add('popup-active');
      content.classList.add('popup__content-active');

    });

    closeBtn.addEventListener('click',function(){
      popup.classList.remove('popup-active');
      content.classList.remove('popup__content-active');
    });

    document.addEventListener('keydown',function(event){

      if(event.key === 'Escape'){
        popup.classList.remove('popup-active');
        content.classList.remove('popup__content-active');
      }
    })

    if(notify.textContent === '0'){
      notify.classList.add('hidden');
    }


  </script>
  <script src="../script/pass.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>
