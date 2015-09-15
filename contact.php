<?php
  require("header.php");
?>
<h1>Contact Us</h1>
<p>
  We would love to hear from you, whether it is a general enquiry, for
  group bookings, suggestions & complaints or even just to say hello.
</p>
<br>
<form method="post" action="http://titan.csit.rmit.edu.au/~e54061/wp/testcontact.php">
  <b>Email:</b><input class='input-field' name='email' type='email' required/>
  <br><br>
  <b>Type:</b>
  <select class='input-field' name='subject' required>
    <option value='generalenquiry'>General enquiry</option>
    <option value='groupbookings'>Group and corporate bookings</option>
    <option value='suggestions'>Suggestions and complains</option>
  </select>
  <br><br>
  <b>Message:</b>
  <br><br>
  <textarea class='input-area' rows='10' cols='50' name='message' required></textarea>
  <br><br>
  <input class='input-submit' type='submit' value='Send' />
</form>
<?php
  require("footer.php");
?>
