<?php
class BlogController extends Controller {
    public function index() {
        $data = [
            'title' => 'Latest Articles',
            'description' => 'Read our latest blog posts on YouTube growth strategies, monetization, and case studies.'
        ];
        $this->view('blog/index', $data);
    }
}
