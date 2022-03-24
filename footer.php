<div class="container">
<div class="row">
<div class="col-md-12" style="text-align:center;padding-top:100px;padding-bottom:100px;">

<h1>Subscribe to Our Newsletter</h1>

<br /><br />
<form method="post" action="http://emarketingpass.com/form.php?form=6" id="frmSS6" onsubmit="return CheckForm6(this);">
<select name="format" style="display:none;"><option value="h">HTML</option><option value="t">Text</option></select>
	<input type="text" class="subscribe" name="email" value="" style="border-width:3px;border-style:solid;border-color:#d6d6d6;height:40px;width:300px;display:inline-block;text-align:center;"/>&nbsp;&nbsp;<input type="submit" value="Subscribe" style="background-color:#d6d6d6;border-width:0px;color:white;height:40px;width:120px;font-weight:800;display:inline-block;"/><br /><br />

Be updated with the trending news about business and technology.  
<br />
We will let you know about our latest promo.

</form>

<script type="text/javascript">
// <![CDATA[

			function CheckMultiple6(frm, name) {
				for (var i=0; i < frm.length; i++)
				{
					fldObj = frm.elements[i];
					fldId = fldObj.id;
					if (fldId) {
						var fieldnamecheck=fldObj.id.indexOf(name);
						if (fieldnamecheck != -1) {
							if (fldObj.checked) {
								return true;
							}
						}
					}
				}
				return false;
			}
		function CheckForm6(f) {
			var email_re = /[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;
			if (!email_re.test(f.email.value)) {
				alert("Please enter your email address.");
				f.email.focus();
				return false;
			}
		
						if (f.format.selectedIndex == -1) {
							alert("Please choose a format to receive your email campaigns in");
							f.format.focus();
							return false;
						}
					
				return true;
			}
		
// ]]>
</script>



</div>
</div>
</div>

	<footer style="width:100%;">
	<div class="container-fluid" id="footer_bkg" style="background-color:<?php echo get_theme_mod( 'footer_color', 'black' );?>;padding-top:20px;padding-bottom:20px;">
	<div class="row">
	<div class="col-md-4" style="text-align:center;">
		<img src="/wp-content/uploads/2017/12/cropped-converging-solutions-logo-min.png" style="width:150px;">
	</div>
	<div class="col-md-4" style="text-align:center;color:white;font-size:15px;padding-top:15px;">

		&copy; Converging Solutions.  All Rights Reserved.


	</div>
	<div class="col-md-4" style="text-align:center;">

		<?php settings_fields( 'my_theme_options_field' ); ?>
    	<?php do_settings_sections( 'my_theme_options_field' ); ?>


    	<a href="<?php echo esc_attr( get_option('facebook') ); ?>" target="_blank">
		<img src="/wp-content/uploads/2018/01/facebook_icon.png" style="width:30px;padding-top:15px;">
		</a>
		&nbsp;
		<a href="<?php echo esc_attr( get_option('twitter') ); ?>" target="_blank">
		<img src="/wp-content/uploads/2018/01/twitter_icon.png" style="width:30px;padding-top:15px;">
		</a>
		&nbsp;
		<a href="<?php echo esc_attr( get_option('gplus') ); ?>" target="_blank">
		<img src="/wp-content/uploads/2018/01/g_plus_icon.png" style="width:30px;padding-top:15px;">
		</a>
		&nbsp;
		<a href="<?php echo esc_attr( get_option('instagram') ); ?>" target="_blank">
		<img src="/wp-content/uploads/2018/01/instagram_icon.png" style="width:30px;padding-top:15px;">
		</a>
		&nbsp;
		<a href="<?php echo esc_attr( get_option('linkedin') ); ?>" target="_blank">
		<img src="/wp-content/uploads/2018/01/linkedin_icon.png" style="width:30px;padding-top:15px;">
		</a>

	</div>
	</div>
	</div>  
      <?php wp_footer(); ?>

    </footer>

  </body>
</html>