<?php
class GuidesController extends Controller {
    protected $guideModel;

    public function __construct() {
        $this->guideModel = $this->model('Guide');
    }

    public function index() {
        $query = isset($_GET['q']) ? trim($_GET['q']) : '';
        
        if (!empty($query)) {
            $guides = $this->guideModel->searchGuides($query);
        } else {
            $guides = $this->guideModel->getGuides();
        }

        // load page-specific videos
        $pageVideos = $this->model('PageVideo')->getVideosByPage('guides');

        $data = [
            'title' => 'YouTube Guides & Strategy',
            'description' => 'Comprehensive guides to start, grow, and monetize your YouTube channel.',
            'guides' => $guides,
            'search_query' => $query,
            'page_videos' => $pageVideos
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

    // Display individual guide by ID
    public function show($id = null) {
        if (!$id) {
            header('location: ' . URLROOT . '/guides');
            return;
        }

        $guide = $this->guideModel->getGuideById($id);
        if (!$guide) {
            die('Guide not found');
        }

        // load any page videos tagged for the guides section
        $pageVideos = $this->model('PageVideo')->getVideosByPage('guides');

        $data = [
            'title' => $guide->title,
            'guide' => $guide,
            'page_videos' => $pageVideos
        ];

        $this->view('guides/view', $data);
    }
}
