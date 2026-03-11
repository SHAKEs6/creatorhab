<?php
class MarketplaceController extends Controller {
    private $channelModel;

    public function __construct() {
        $this->channelModel = $this->model('Channel');
    }

    public function index() {
        $channels = $this->channelModel->getApprovedChannels();

        $data = [
            'title' => 'Channel Marketplace',
            'description' => 'Skip the grind. Buy verified, fully monetized channels and start earning from day one.',
            'channels' => $channels
        ];
        $this->view('marketplace/index', $data);
    }
}
