<?php
defined('MOODLE_INTERNAL') || die();

class block_myplayer extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_myplayer');
    }

    public function get_content() {
        if ($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass();

        $view = new \block_myplayer\output\view();

        $renderer = $this->page->get_renderer('block_myplayer');

        $this->content->text = $renderer->render($view);
        $this->content->footer = '';

        return $this->content;
    }

    public function applicable_formats() {
        return [
            'admin' => false,
            'site-index' => true,
            'course-view' => true,
            'mod' => false,
            'my' => true,
        ];
    }
}