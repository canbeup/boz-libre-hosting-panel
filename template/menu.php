<?php
# Copyright (C) 2018 Valerio Bozzolan
# Boz Libre Hosting Panel
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program. If not, see <http://www.gnu.org/licenses/>.

/*
 * This is the template for the website dashboard
 */

// unuseful when load directly
defined( 'BOZ_PHP' ) or die;
?>

	<ul>
		<?php foreach( $args[ 'entries' ] as $entry ): ?>
			<li class="collection-item">

				<?php if( $entry->uid === Header::$args[ 'uid' ] ): ?>
					<?php _esc_html( $entry->name ) ?>
				<?php else: ?>
					<?php echo HTML::a(
						$entry->getSitePage(),
						$entry->name,
						$entry->get( 'title' )
					) ?>
				<?php endif ?>

				<?php MenuTree::spawn( array_replace( $args, [
					'uid'   => $entry->uid,
					'level' => $level + 1,
				] ) ) ?>
			</li>
		<?php endforeach ?>
	</ul>