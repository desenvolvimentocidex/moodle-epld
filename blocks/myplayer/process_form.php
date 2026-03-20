<?php
require_once('../../config.php');

global $DB;

$userid = optional_param('userid', 0, PARAM_INT);
$userrole = optional_param('userrole', 0, PARAM_INT);
$courseid = optional_param('courseid', 0, PARAM_INT);
$audio = optional_param('audio', '', PARAM_TEXT);

$data = new stdClass();

$data->userid = $userid;
$data->userrole = $userrole;
$data->courseid = $courseid;
$data->audio = $audio;

$DB->insert_record('myplayer', $data);

redirect(new moodle_url("/course/view.php?id=$courseid"));