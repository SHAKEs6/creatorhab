<?php
class ConsultationController extends Controller {
    private $consultationModel;

    public function __construct() {
        $this->consultationModel = $this->model('Consultation');
    }

    public function index() {
        $consultations = $this->consultationModel->getConsultations();

        $data = [
            'title' => '1-on-1 Consultation',
            'description' => 'Stuck? Need a channel review? Book a private call with our YouTube experts to unlock your true potential.',
            'consultations' => $consultations
        ];
        $this->view('consultation/index', $data);
    }
}
