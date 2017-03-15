
 <div>
 <h1>Account Sign Up</h1>
 <form action="#" method="post">

 <fieldset>
 <legend>Account Information</legend>
 <label>E-Mail:</label>
 <input type="text" name="email" value="<?php echo $email; ?>" class="textbox"/>
 <br />

 <label>Phone Number:</label>
 <input type="text" name="phone" value="<?php echo $phone; ?>" class="textbox"/>
 </fieldset>

 <fieldset>
 <legend>Settings</legend>

 <p>How did you hear about us?</p>
 <input type="radio" name="heard_from"
<?php if ($heard==="Search Engine") 
{echo "checked";}?>
 value="Search Engine"/>
 Search engine
 <br />
 <input type="radio" name="heard_from"
<?php if ($heard==="Friend") 
{echo "checked";}?>
 value="Friend"/>
 Word of mouth
 <br /> 
 <input type=radio name="heard_from"
<?php if ($heard==="Other") 
{echo "checked";}?>
 value="Other"/>
 Other
 <br />

 <p>Contact via:</p>
 <select name="contact_via">
 <option value="Email"
 <?php if ($contact==="Email") 
 {echo "selected";}?>        
 >Email</option>
 
 <option value="Text"
 <?php if ($contact==="Text") 
 {echo "selected";}?>
 >Text Message</option>
 
 <option value="Phone"
 <?php if ($contact==="Phone") 
 {echo "selected";}?>
 >Phone</option>
 </select>

 <p>Comments: (optional)</p>
 <textarea name="comments" rows="4" cols="50"><?php echo $comments;?></textarea>
 </fieldset>

 <input type="hidden" value="<?php echo $result['id']; ?>" name="id" /> 
 <input type="submit" value="Submit"/>

 </form>
 <br />
 </div>