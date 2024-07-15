<?php
include_once "main.php";

session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task tracker</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="bg-img">
      <div class="container">
        <div class="admin">
          <div class="admin-signin">
            <div class="form">
              <h1
                class="primary-heading primary-heading--grey center-text mb-large"
              >
                Admin Login
              </h1>
              <!-- Action need to changed in DOM -->
              <form action="admin.php" method="post">
                <div class="form-group">
                  <label for="email"
                    ><img
                      class="form-img"
                      src="../img/icons8-email-64.png"
                      alt="email logo"
                  /></label>
                  <input
                    class="form-input"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="key"
                    ><img
                      class="form-img"
                      src="../img/icons8-key-64.png"
                      alt="email logo"
                  /></label>
                  <input
                    class="form-input password"
                    id="key"
                    name="password"
                    type="password"
                    placeholder="Password"
                    required
                  />
                </div>
                <div class="show-container mt-small">
                  <input class="show" id="show" type="checkbox" />
                  <label class="show--text" for="show">Show Password</label>
                </div>
                <div class="center-text">
                  <button class="btn btn--light">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="employee-signin">
            <h1
              class="primary-heading primary-heading--white mb-small center-text"
            >
              Employee Login
            </h1>
            <p class="employee-signin--text italic center-text">
              Please log in to access details about your assigned tasks.
            </p>
            <div class="center-text">
              <button class="btn btn--dark">Sign in</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="../script/logout.js"></script>
  </body>
</html>
