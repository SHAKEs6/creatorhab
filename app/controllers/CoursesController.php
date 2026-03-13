<?php
class CoursesController extends Controller {
    private $courseModel;

    public function __construct() {
        $this->courseModel = $this->model('Course');
    }

    public function index() {
        $query = isset($_GET['q']) ? trim($_GET['q']) : '';
        
        if (!empty($query)) {
            $courses = $this->courseModel->searchCourses($query);
        } else {
            $courses = $this->courseModel->getCourses();
        }

        $data = [
            'title' => 'Premium Courses',
            'description' => 'Level up your skills with our expert-led programs.',
            'courses' => $courses,
            'search_query' => $query
        ];
        $this->view('courses/index', $data);
    }
}
