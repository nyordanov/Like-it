<?php

/*
This program is free software; you can redistribute it and/or modify 
it under the terms of the GNU General Public License as published by 
the Free Software Foundation; version 2 of the License.

This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
GNU General Public License for more details. 

You should have received a copy of the GNU General Public License 
along with this program; if not, write to the Free Software 
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA 
*/

if ( !function_exists( 'add_action' ) ) {
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}

?>

<div class="wrap">

<h2><?php _e('Like-it configuration') ?></h2>

<div class="narrow">
	<form action="" method="post">
		<label for="likeit-text"><?php _e('Like-it button text') ?></label>
		<input type="text" id="likeit-text" name="likeit-text" value="<?php echo get_option('likeit-text')?>" />
		<br />
		<input type="submit" value="<?php _e('Update options &raquo;')?>" />
	</form>
</div>

</div>