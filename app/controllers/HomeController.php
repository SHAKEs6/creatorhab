<?php
class HomeController extends Controller {
    protected $videoModel;
    protected $postModel;

    public function __construct() {
        $this->videoModel = $this->model('Video');
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $trending = $this->videoModel->getTrendingVideos();
        $posts = $this->postModel->getPostsByLocation('home');
        
        $data = [
            'title' => 'Start, Grow & Monetize Your YouTube Channel',
            'trending_videos' => $trending,
            'latest_posts' => $posts
        ];

        $this->view('home/index', $data);
    }
}
