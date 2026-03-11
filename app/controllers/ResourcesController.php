<?php
class ResourcesController extends Controller {
    public function index() {
        $data = [
            'title' => 'Free Resources',
            'description' => 'Download our ultimate YouTube checklists, templates, and guides.'
        ];
        $this->view('resources/index', $data);
    }
}
