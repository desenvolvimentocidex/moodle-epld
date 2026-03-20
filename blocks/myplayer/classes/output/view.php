<?php
namespace block_myplayer\output;

defined('MOODLE_INTERNAL') || die();

use context_course;
use renderable;
use renderer_base;
use templatable;

class view implements renderable, templatable {
    /** @var stdClass The user. */
    protected $user;
    protected $course;
    protected $userrole;
    protected $menu;

    /**
     * Constructor.
     * @param stdClass $user The user.
     */
    public function __construct($user = null, $course = null) {
        global $USER;
        global $COURSE;

        if (!$user) {
            $user = $USER;
        }

        $this->user = $user;

        if (!$course) {
            $course = $COURSE;
        }

        $this->course = $course;

        $this->userrole = $this->fnGetUserRole();

        if ($this->userrole->shortname == "editingteacher" || $this->userrole->shortname == "teacher") {
            $this->menu = true;
        } else {
            $this->menu = false;
        }
    }

    public function export_for_template(renderer_base $output) {
        $data = array(
            'menu' => $this->menu,
            'formaction' => (new \moodle_url('/blocks/myplayer/process_form.php')),
            'userid' => $this->user->id,
            'userrole' => $this->userrole->shortname,
            'courseid' => $this->course->id,
            'audio' => 'http://localhost/draftfile.php/5/user/draft/60105147/audio.mp3'
        );

        return $data;
    }

    public function fnGetUserRole() {
        $context = context_course::instance($this->course->id);
        $roles = get_user_roles($context, $this->user->id, true);
        $role = key($roles);
        
        return $roles[$role];
    }
}