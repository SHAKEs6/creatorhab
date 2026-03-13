<?php
class MarketplaceController extends Controller {
    private $channelModel;
    private $productModel;

    public function __construct() {
        $this->channelModel = $this->model('Channel');
        $this->productModel = $this->model('Product');
    }

    public function index() {
        $query = isset($_GET['q']) ? trim($_GET['q']) : '';
        
        if (!empty($query)) {
            $channels = $this->channelModel->searchChannels($query); // Assuming searchChannels exists or I will add it
            $products = $this->productModel->searchProducts($query);
        } else {
            $channels = $this->channelModel->getApprovedChannels();
            $products = $this->productModel->getProducts();
        }

        $data = [
            'title' => 'Channel Marketplace',
            'description' => 'Skip the grind. Buy verified, fully monetized channels and start earning from day one.',
            'channels' => $channels,
            'products' => $products,
            'search_query' => $query
        ];
        $this->view('marketplace/index', $data);
    }
}
