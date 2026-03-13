<?php
class AdminController extends Controller {
    protected $guideModel;
    protected $videoModel;
    protected $resourceModel;
    protected $productModel;
    protected $courseModel;
    protected $notificationModel;

    public function __construct() {
        if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'super_admin')) {
            header('location: ' . URLROOT . '/auth/login');
            exit;
        }
        $this->guideModel = $this->model('Guide');
        $this->videoModel = $this->model('Video');
        $this->resourceModel = $this->model('Resource');
        $this->productModel = $this->model('Product');
        $this->courseModel = $this->model('Course');
        $this->notificationModel = $this->model('Notification');
    }

    public function index() {
        $data = [
            'title' => 'Admin Dashboard',
            'guides_count' => count($this->guideModel->getGuides()),
            'videos_count' => count($this->videoModel->getVideos()),
            'resources_count' => count($this->resourceModel->getResources()),
            'products_count' => count($this->productModel->getProducts())
        ];
        $this->view('admin/index', $data);
    }

    // Send notifications to users
    public function send_notification() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
                die('CSRF token validation failed');
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $title = trim($_POST['title']);
            $message = trim($_POST['message']);
            $user_id = $_POST['user_id'];

            if (!empty($title) && !empty($message)) {
                $this->notificationModel->sendNotification([
                    'user_id' => $user_id,
                    'title' => $title,
                    'message' => $message,
                    'type' => 'announcement'
                ]);
                header('location: ' . URLROOT . '/admin');
            }
        } else {
            $this->view('admin/send_notification');
        }
    }

    // Guides Management
    public function guides() {
        $guides = $this->guideModel->getGuides();
        $data = ['guides' => $guides];
        $this->view('admin/guides/index', $data);
    }

    public function add_guide() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'content' => trim($_POST['content']),
                'category' => trim($_POST['category']),
                'thumbnail' => 'default-guide.jpg',
                'title_err' => '',
                'description_err' => '',
                'content_err' => ''
            ];

            // Validate
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }
            if (empty($data['content'])) {
                $data['content_err'] = 'Please enter content';
            }

            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['content_err'])) {
                if ($this->guideModel->addGuide($data)) {
                    header('location: ' . URLROOT . '/admin/guides');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/guides/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'description' => '',
                'content' => '',
                'category' => '',
                'title_err' => '',
                'description_err' => '',
                'content_err' => ''
            ];
            $this->view('admin/guides/add', $data);
        }
    }

    public function edit_guide($id = null) {
        if (!$id) {
            header('location: ' . URLROOT . '/admin/guides');
            return;
        }

        $guide = $this->guideModel->getGuideById($id);
        if (!$guide) {
            header('location: ' . URLROOT . '/admin/guides');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'content' => trim($_POST['content']),
                'category' => trim($_POST['category']),
                'thumbnail' => 'default-guide.jpg',
                'title_err' => '',
                'description_err' => '',
                'content_err' => ''
            ];

            // Validate
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }
            if (empty($data['content'])) {
                $data['content_err'] = 'Please enter content';
            }

            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['content_err'])) {
                if ($this->guideModel->updateGuide($data)) {
                    header('location: ' . URLROOT . '/admin/guides');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/guides/edit', $data);
            }
        } else {
            $data = [
                'id' => $guide->id,
                'title' => $guide->title,
                'description' => $guide->description,
                'content' => $guide->content,
                'category' => $guide->category,
                'title_err' => '',
                'description_err' => '',
                'content_err' => ''
            ];
            $this->view('admin/guides/edit', $data);
        }
    }

    public function delete_guide($id = null) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->guideModel->deleteGuide($id)) {
                header('location: ' . URLROOT . '/admin/guides');
            } else {
                die('Something went wrong');
            }
        } else {
            header('location: ' . URLROOT . '/admin/guides');
        }
    }

    // Videos Management
    public function videos() {
        $videos = $this->videoModel->getVideos();
        $this->view('admin/videos/index', ['videos' => $videos]);
    }

    public function add_video() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Videos now come from YouTube channel directly
            // No need to add individual videos - they auto-load from channel
            header('location: ' . URLROOT . '/admin/videos');
        } else {
            // Show info page instead of upload form
            $data = ['message' => 'Videos are now displayed directly from the Faustin Shukranke YouTube channel. All uploads are automatically synced.'];
            $this->view('admin/videos/add', $data);
        }
    }

    // Products Management (Marketplace)
    public function products() {
        $products = $this->productModel->getProducts();
        $this->view('admin/products/index', ['products' => $products]);
    }

    public function add_product() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'category' => trim($_POST['category']),
                'image' => 'default-product.jpg',
                'name_err' => '',
                'price_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter product name';
            }
            if (empty($data['price']) || !is_numeric($data['price'])) {
                $data['price_err'] = 'Please enter valid price';
            }

            if (empty($data['name_err']) && empty($data['price_err'])) {
                if ($this->productModel->addProduct($data)) {
                    header('location: ' . URLROOT . '/admin/products');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/products/add', $data);
            }
        } else {
            $data = ['name' => '', 'description' => '', 'price' => '', 'category' => '', 'name_err' => '', 'price_err' => ''];
            $this->view('admin/products/add', $data);
        }
    }

    public function edit_product($id = null) {
        if (!$id) {
            header('location: ' . URLROOT . '/admin/products');
            return;
        }

        $product = $this->productModel->getProductById($id);
        if (!$product) {
            header('location: ' . URLROOT . '/admin/products');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'category' => trim($_POST['category']),
                'image' => 'default-product.jpg',
                'name_err' => '',
                'price_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter product name';
            }
            if (empty($data['price']) || !is_numeric($data['price'])) {
                $data['price_err'] = 'Please enter valid price';
            }

            if (empty($data['name_err']) && empty($data['price_err'])) {
                if ($this->productModel->updateProduct($data)) {
                    header('location: ' . URLROOT . '/admin/products');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/products/edit', $data);
            }
        } else {
            $data = [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'category' => $product->category,
                'name_err' => '',
                'price_err' => ''
            ];
            $this->view('admin/products/edit', $data);
        }
    }

    public function delete_product($id = null) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->productModel->deleteProduct($id)) {
                header('location: ' . URLROOT . '/admin/products');
            } else {
                die('Something went wrong');
            }
        } else {
            header('location: ' . URLROOT . '/admin/products');
        }
    }

    // Resources Management
    public function resources() {
        $resources = $this->resourceModel->getResources();
        $this->view('admin/resources/index', ['resources' => $resources]);
    }

    public function add_resource() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'category' => trim($_POST['category']),
                'file_path' => 'template.pdf',
                'title_err' => ''
            ];

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter resource title';
            }

            if (empty($data['title_err'])) {
                if ($this->resourceModel->addResource($data)) {
                    header('location: ' . URLROOT . '/admin/resources');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/resources/add', $data);
            }
        } else {
            $data = ['title' => '', 'description' => '', 'category' => '', 'title_err' => ''];
            $this->view('admin/resources/add', $data);
        }
    }

    public function edit_resource($id = null) {
        if (!$id) {
            header('location: ' . URLROOT . '/admin/resources');
            return;
        }

        $resource = $this->resourceModel->getResourceById($id);
        if (!$resource) {
            header('location: ' . URLROOT . '/admin/resources');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'category' => trim($_POST['category']),
                'file_path' => 'template.pdf',
                'title_err' => ''
            ];

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter resource title';
            }

            if (empty($data['title_err'])) {
                if ($this->resourceModel->updateResource($data)) {
                    header('location: ' . URLROOT . '/admin/resources');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/resources/edit', $data);
            }
        } else {
            $data = [
                'id' => $resource->id,
                'title' => $resource->title,
                'description' => $resource->description,
                'category' => $resource->category,
                'title_err' => ''
            ];
            $this->view('admin/resources/edit', $data);
        }
    }

    public function delete_resource($id = null) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->resourceModel->deleteResource($id)) {
                header('location: ' . URLROOT . '/admin/resources');
            } else {
                die('Something went wrong');
            }
        } else {
            header('location: ' . URLROOT . '/admin/resources');
        }
    }
}
