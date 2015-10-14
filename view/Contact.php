<h1>Contact Us</h1>
<p>
  <?php echo $message; ?>
</p>
<br>
<form method="post" action="http://titan.csit.rmit.edu.au/~e54061/wp/testcontact.php">
  <b>Email:</b><input class='input-field' name='email' type='email' required/>
  <br><br>
  <b>Type:</b>
  <select class='input-field' name='subject' required>
    <?php
      for ($i = 0; $i < count($types); $i++){
        echo "<option value='" . $types[$i]->value . "'>" . $types[$i]->name . "</option>";
      }
    ?>
  </select>
  <br><br>
  <b>Message:</b>
  <br><br>
  <textarea class='input-area' rows='10' cols='50' name='message' required></textarea>
  <br><br>
  <input class='input-submit' type='submit' value='Send' />
</form>
