<?php
class PaymentsController extends Controller {
    public function index() {
        // Allow dynamic item details via query parameters (title, description, price, currency)
        $title = isset($_GET['title']) ? urldecode($_GET['title']) : 'Checkout';
        $description = isset($_GET['description']) ? urldecode($_GET['description']) : 'Complete your purchase securely.';
        $price = isset($_GET['price']) ? $_GET['price'] : '0.00';
        $currency = isset($_GET['currency']) ? strtoupper($_GET['currency']) : 'KSH';

        $data = [
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'currency' => $currency
        ];

        $this->view('payments/index', $data);
    }

    public function paypal() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = $_POST['amount'];
            $currency = $_POST['currency'];

            // PayPal API credentials
            $clientId = 'YOUR_PAYPAL_CLIENT_ID';
            $clientSecret = 'YOUR_PAYPAL_CLIENT_SECRET';

            // Generate Access Token
            $url = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';
            $headers = [
                'Accept: application/json',
                'Accept-Language: en_US'
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_USERPWD, $clientId . ':' . $clientSecret);
            curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
            $response = curl_exec($curl);
            $result = json_decode($response);
            $accessToken = $result->access_token ?? null;
            curl_close($curl);

            if (!$accessToken) {
                echo "Failed to authenticate with PayPal API. Please check Client ID/Secret.";
                return;
            }

            // Create Payment
            $paymentUrl = 'https://api-m.sandbox.paypal.com/v1/payments/payment';
            $paymentData = [
                'intent' => 'sale',
                'redirect_urls' => [
                    'return_url' => URLROOT . '/payments/success',
                    'cancel_url' => URLROOT . '/payments/cancel'
                ],
                'payer' => [
                    'payment_method' => 'paypal'
                ],
                'transactions' => [
                    [
                        'amount' => [
                            'total' => $amount,
                            'currency' => $currency
                        ],
                        'description' => 'Payment for services'
                    ]
                ]
            ];

            $curl = curl_init($paymentUrl);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $accessToken
            ]);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($paymentData));
            $paymentResponse = curl_exec($curl);
            curl_close($curl);

            echo "PayPal Payment Created. Response: ";
            print_r($paymentResponse);
        }
    }
}
