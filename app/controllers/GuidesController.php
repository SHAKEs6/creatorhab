<?php
class GuidesController extends Controller {
    public function index() {
        $data = [
            'title' => 'YouTube Guides & Strategy',
            'description' => 'Comprehensive guides to start, grow, and monetize your YouTube channel.'
        ];
        $this->view('guides/index', $data);
    }

    public function start() {
        $data = ['title' => 'Start a YouTube Channel'];
        $this->view('guides/start', $data);
    }

    public function monetization() {
        $data = ['title' => 'YouTube Monetization Guide'];
        $this->view('guides/monetization', $data);
    }

    public function growth() {
        $data = ['title' => 'YouTube Growth Strategies'];
        $this->view('guides/growth', $data);
    }

    public function automation() {
        $data = ['title' => 'YouTube Automation Systems'];
        $this->view('guides/automation', $data);
    }
}
