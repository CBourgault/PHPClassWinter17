<?php
$email = filter_input(INPUT_GET, 'email');
?>

<form method="POST" class="form-inline" action="#">
  <div class="form-group">
    <label>Email Address</label>
    <input type="text" class="form-control" name='email' value= "<?php echo $email; ?>" placeholder="Email">
  </div>
    <br>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name='pass' placeholder="Password">
  </div>
    <br>
  <button type="submit" value="submit" class="btn btn-default">Submit</button>
</form>