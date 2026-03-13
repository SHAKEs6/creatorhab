<?php
class CoursesController extends Controller {
    private $courseModel;

    public function __construct() {
        $this->courseModel = $this->model('Course');
    }

    public function index() {
        $courses = $this->courseModel->getCourses();

        $data = [
            'title' => 'Premium Courses',
            'description' => 'Level up your skills with our expert-led programs.',
            'courses' => $courses
        ];
        $this->view('courses/index', $data);
    }
}
