<?php
function jsvalidation(){
?>
<script type="text/javascript">
function validate()
{
   if( document.newform.Replace_text.value == "" )
   {
     alert( "Please provide your replace text!" );
     return false;
   }
   if( document.newform.login_username.value == "" )
   {
     alert( "Please provide your login username!" );
    return false;
   }
    if( document.newform.login_logo.value == "" )
   {
     alert( "Please provide your login logo!" );
     return false;
   }
   return true;
}
function chkTest(){
	if (document.getElementById('select_all').checked) {
   document.getElementById("select1").disabled=true;
   document.getElementById("select2").disabled=true;
   document.getElementById("select3").disabled=true;
   document.getElementById("select4").disabled=true;
   document.getElementById("select5").disabled=true;
   document.getElementById("none").disabled   =true;
   document.getElementById("select1").checked = false;
   document.getElementById("select2").checked = false;
   document.getElementById("select3").checked = false;
   document.getElementById("select4").checked = false;
   document.getElementById("select5").checked = false;
   document.getElementById("none").checked    = false;
        } 
        else {
            document.getElementById("select1").disabled=false;
            document.getElementById("select2").disabled=false;
            document.getElementById("select3").disabled=false;
            document.getElementById("select4").disabled=false;
            document.getElementById("select5").disabled=false;
            document.getElementById("none").disabled=false;
        }
}


function chkTest2(){
	if (document.getElementById('none').checked) {
		   document.getElementById("select1").disabled=true;
   document.getElementById("select2").disabled=true;
   document.getElementById("select3").disabled=true;
   document.getElementById("select4").disabled=true;
   document.getElementById("select5").disabled=true;
   document.getElementById("select_all").disabled=true;
            document.getElementById("select1").checked = false;
            document.getElementById("select2").checked = false;
            document.getElementById("select3").checked = false;
            document.getElementById("select4").checked = false;
            document.getElementById("select5").checked = false;
            document.getElementById("select_all").checked = false;
        } 
        else {
          document.getElementById("select1").disabled=false;
            document.getElementById("select2").disabled=false;
            document.getElementById("select3").disabled=false;
            document.getElementById("select4").disabled=false;
            document.getElementById("select5").disabled=false;
            document.getElementById("select_all").disabled=false;
        }
}
</script>
<?php
}
add_action('admin_head', 'jsvalidation');
?>
<?php
function my_plugin_page()
{?>
<html><div class="wrap">
<h2>change howdy to your text</h2>
<form method="post" action="options.php" onsubmit="return validate()" name="newform">
<?php settings_fields( 'baw-settings-group' ); ?>
<?php do_settings_sections( 'baw-settings-group' ); ?>
<input type="hidden" value="" name="id" />
Enter replace text <input type="text" name="Replace_text" value="<?php echo get_option('Replace_text'); ?>"><br>
Enter login text(for username)<input type="text" name="login_username" value="<?php echo get_option('login_username'); ?>"><br>
Slect Logo Image<input type="text" class="img" name="login_logo" value="<?php echo get_option('login_logo'); ?>">
<input type="button" class="select-img" value="Select_Image" /></br>
Disable admin bar:&nbsp;&nbsp;&nbsp;&nbsp;
<?php $abc = get_option( 'option_name' );
?>


<input name="option_name[]" id="select_all" onchange="chkTest()" type="checkbox" value="159" <?php foreach($abc as $checkk)
{ if($checkk==0): ?> checked="checked" <?php endif; }?> onClick="toggle(this)"/>&nbsp;ALL
           &nbsp;&nbsp;&nbsp;
<input name="option_name[]" id="select1"  type="checkbox" value="administrator" <?php foreach($abc as $checkk)
{ if($checkk==administrator): ?> checked="checked" <?php endif; }?> />&nbsp;Administrator
           &nbsp;&nbsp;&nbsp;
<input name="option_name[]" id="select2"  type="checkbox" value="editor" <?php foreach($abc as $checkk)
{ if($checkk==editor): ?> checked="checked" <?php endif; }?> />&nbsp;Editor 
           &nbsp;&nbsp;&nbsp;
<input name="option_name[]" id="select3"  type="checkbox" value="contributor" <?php foreach($abc as $checkk)
{ if($checkk==contributor): ?> checked="checked" <?php endif; }?>  />&nbsp;Contributor 
           &nbsp;&nbsp;&nbsp;
<input name="option_name[]" id="select4"   type="checkbox" value="author" <?php foreach($abc as $checkk)
{ if($checkk==author): ?> checked="checked" <?php endif; }?>  />&nbsp;Author 
           &nbsp;&nbsp;&nbsp;
<input name="option_name[]" id="select5"  type="checkbox" value="subscriber" <?php foreach($abc as $checkk)
{ if($checkk==subscriber): ?> checked="checked" <?php endif; }?> />&nbsp;Subscriber
&nbsp;&nbsp;&nbsp;
<input name="option_name[]" id="none" onchange="chkTest2()"  type="checkbox" value="123" <?php foreach($abc as $checkk)
{ if($checkk==123): ?> checked="checked" <?php endif; }?>  />&nbsp;None
<?php submit_button();?>
</form> 
<div style="width:100px">
<img src="<?php echo get_option('login_logo'); ?>" />
</div>
</div>
</div>
</html
<?php } ?>
