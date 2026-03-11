<?php
class ContactController extends Controller {
    public function index() {
        $data = [
            'title' => 'Contact Us',
            'description' => 'Get in touch with our team for support, partnerships, or business inquiries.'
        ];
        $this->view('contact/index', $data);
    }
}
