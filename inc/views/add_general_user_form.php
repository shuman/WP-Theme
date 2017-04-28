<div class="tb_admin_panel">
	<form name="register_member" id="register_member" method="post" action="<?php echo admin_url("admin-ajax.php");?>">
		<div class="tb_admin_table">
			
			<input type="hidden" name="action" value="add_general_member" />
			<input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce('gm_nonce'); ?>" />

			<table class="table" width="100%" cellpadding="10">
				<tbody>
					<tr>
						<td colspan="2">
							<h2>Add New General Member</h2>
						</td>
					</tr>
					<tr>
						<td width="200"><label for="first_name">First Name</label></td>
						<td><input type="text" name="first_name" id="first_name" required></td>
					</tr>
					<tr>
						<td><label for="last_name">Last Name</label></td>
						<td><input type="text" name="last_name" id="last_name" required></td>
					</tr>
					<tr>
						<td><label for="username">Username</label></td>
						<td><input type="text" name="username" id="username" required></td>
					</tr>
					<tr>
						<td><label for="email">Email Address</label></td>
						<td><input type="text" name="email" id="email" required></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" class="save_btn button" value="Add Member" ></td>
					</tr>

				</tbody>
			</table>
		</div>
	</form>
</div><!-- /tb_admin_panel -->
