<?php

session_start();

include('connection.php');
include('header.php');
include('navigation.php');

//<li style = "float:left; padding:5px;margin-left:25px;border:2px solid;"><a href="pages.php"><div class = "container"><img src = "pages.png" ​ width="80px" height="80px" /><div class="overlay"><div class="text">Pages</div></div></div></a></li>

?>

<div style = "width:100%; float:left;">

<div style = "width:100%; float:left; margin: 100px 0; padding:10px;">

<ul class = "navigation" style = "border: 2px solid; padding: 10px;">
  <li style = "float:left; padding:5px; border:2px solid;"><a href="accounts.php"><div class = "container"><img src = "accounts.png" ​ width="80px" height="80px" /><div class="overlay"><div class="text">Accounts</div></div></div></a></li>
  <li style = "float:left; padding:5px;border:2px solid;margin-left:25px;"><a href="pages.php"><div class = "container"><img src = "pages.png" ​ width="80px" height="80px" /><div class="overlay"><div class="text">Pages</div></div></div></a></li>
  <li style = "float:left; padding:5px;border:2px solid;margin-left:25px;"><a href="events.php"><div class = "container"><img src = "events.png" ​ width="80px" height="80px" /><div class="overlay"><div class="text">Events</div></div></div></a></li>
  <li style = "float:left; padding:5px;border:2px solid;margin-left:25px;"><a href="contacts.php"><div class = "container"><img src = "contact.png" ​ width="80px" height="80px" /><div class="overlay"><div class="text">Contact Us</div></div></div></a></li>
</ul>
</div>


</div>

<?php
include('footer.php')


?>