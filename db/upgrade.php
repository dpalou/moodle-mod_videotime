<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Upgrade script for the Video Time.
 *
 * @package     mod_videotime
 * @copyright   2018 bdecent gmbh <https://bdecent.de>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * @param string $oldversion the version we are upgrading from.
 */
function xmldb_videotime_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2018080205) {

        // Define field completion_on_view_time to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('completion_on_view_time', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0',
            'timemodified');

        // Conditionally launch add field completion_on_view_time.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field completion_on_view_time_second to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('completion_on_view_time_second', XMLDB_TYPE_INTEGER, '10', null, null, null, null,
            'completion_on_view_time');

        // Conditionally launch add field completion_on_view_time_second.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field completion_on_finish to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('completion_on_finish', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0',
            'completion_on_view_time_second');

        // Conditionally launch add field completion_on_finish.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Videotime savepoint reached.
        upgrade_mod_savepoint(true, 2018080205, 'videotime');
    }

    if ($oldversion < 2018080213) {

        // Define field completion_on_percent to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('completion_on_percent', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0',
            'completion_on_finish');

        // Conditionally launch add field completion_on_percent.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field completion_on_percent_value to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('completion_on_percent_value', XMLDB_TYPE_INTEGER, '3', null, XMLDB_NOTNULL, null, '0',
            'completion_on_percent');

        // Conditionally launch add field completion_on_percent_value.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Videotime savepoint reached.
        upgrade_mod_savepoint(true, 2018080213, 'videotime');
    }

    if ($oldversion < 2018080215) {

        // Define field autoplay to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('autoplay', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0',
            'completion_on_percent_value');

        // Conditionally launch add field autoplay.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field byline to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('byline', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'autoplay');

        // Conditionally launch add field byline.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field color to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('color', XMLDB_TYPE_CHAR, '15', null, XMLDB_NOTNULL, null, '00adef', 'byline');

        // Conditionally launch add field color.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field height to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('height', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'color');

        // Conditionally launch add field height.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field maxheight to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('maxheight', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'height');

        // Conditionally launch add field maxheight.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field maxwidth to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('maxwidth', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'maxheight');

        // Conditionally launch add field maxwidth.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field muted to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('muted', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'maxwidth');

        // Conditionally launch add field muted.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field playsinline to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('playsinline', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'muted');

        // Conditionally launch add field playsinline.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field portrait to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('portrait', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'playsinline');

        // Conditionally launch add field portrait.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field speed to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('speed', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'portrait');

        // Conditionally launch add field speed.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field title to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('title', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'speed');

        // Conditionally launch add field title.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field transparent to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('transparent', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'title');

        // Conditionally launch add field transparent.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field width to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('width', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'transparent');

        // Conditionally launch add field width.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Videotime savepoint reached.
        upgrade_mod_savepoint(true, 2018080215, 'videotime');
    }

    if ($oldversion < 2018080218) {

        // Define field responsive to be added to videotime.
        $table = new xmldb_table('videotime');
        $field = new xmldb_field('responsive', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'width');

        // Conditionally launch add field responsive.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Videotime savepoint reached.
        upgrade_mod_savepoint(true, 2018080218, 'videotime');
    }

    return true;
}