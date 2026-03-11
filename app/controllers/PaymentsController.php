<?php
class PaymentsController extends Controller {
    public function index() {
        $data = [
            'title' => 'Checkout',
            'description' => 'Complete your purchase securely.'
        ];
        $this->view('payments/index', $data);
    }
}
