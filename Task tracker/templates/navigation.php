<?php 
function load_nav(){
 
  include "../backend/main.php";
  global $conn;
  
  $currentTime = time();
  $seventyTwoHoursLater = $currentTime + (72 * 60 * 60);
  $seventyTwoHoursLaterFormatted = date('Y-m-d H:i:s', $seventyTwoHoursLater);

  if($_SESSION['user'] === "ADMIN")
    $sql = "SELECT EmployeeName, Description, EndDate FROM Tasks WHERE EndDate BETWEEN NOW() AND '{$seventyTwoHoursLaterFormatted}'";
  else
    $sql = "SELECT EmployeeName, Description, EndDate FROM Tasks WHERE EndDate BETWEEN NOW() AND '{$seventyTwoHoursLaterFormatted}' AND EmployeeName = '{$_SESSION['name']}'";

  $result = $conn->query($sql);

?>

<div class="navigation">
  <input type="checkbox" class="navigation__checkbox" id="navi-toggle" />
  <label for="navi-toggle" class="navigation__button"
    ><span class="navigation__icon">&nbsp;</span></label
  >

  <div class="navigation__background">&nbsp;</div>
  <nav class="navigation__nav">
    <ul class="navigation__list">
      <li class="navigation__item">
        <a href="../templates/createTask.php" class="navigation__link">Create task</a>
      </li>
      <li class="navigation__item">
        <a href="../templates/displayTasks.php" class="navigation__link">Assigned Tasks</a>
      </li>
      <li class="navigation__item ">
        <a href="../templates/notifications.php" class="navigation__link notification-count">
          <span class="count"><?php echo $result->num_rows; ?></span>Notifications
        </a>

      </li>
      <!-- <li class="navigation__item">
        <a href="#" class="navigation__link">Employee Details</a>
      </li> -->
      <li class="navigation__item">
        <a href="../backend/logout.php" class="navigation__link navigation__link--red">Logout</a>
      </li>
    </ul>
  </nav>
</div>
<?php          
 }?>
