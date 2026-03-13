<?php
class CommunityController extends Controller {
    public function index() {
        $data = [
            'title' => 'Creator Community',
            'description' => 'Join 5,000+ creators sharing tips, collabs, and motivation.'
        ];
        $this->view('community/index', $data);
    }
}
