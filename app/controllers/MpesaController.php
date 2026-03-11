<?php
class MpesaController extends Controller {
    public function pay() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phone = $_POST['phone'];
            
            // Format phone number
            if (str_starts_with($phone, '0')) {
                $phone = '254' . substr($phone, 1);
            } else if (str_starts_with($phone, '+')) {
                $phone = substr($phone, 1);
            }
            
            // Generate Access Token using provided Credentials
            $consumerKey = MPESA_CONSUMER_KEY;
            $consumerSecret = MPESA_CONSUMER_SECRET;
            
            $headers = ['Content-Type:application/json; charset=utf8'];
            $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
            
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_HEADER, FALSE);
            curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
            $result = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $result = json_decode($result);
            $access_token = $result->access_token ?? null;
            curl_close($curl);
            
            if (!$access_token) {
                // For UI purposes if Daraja sandbox is down / invalid keys
                $this->showMpesaUIError("Failed to authenticate with M-Pesa Daraja API. Please check Consumer Key/Secret.");
                return;
            }
            
            // M-Pesa STK Push Request
            $stk_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
            $BusinessShortCode = '174379'; // Sandbox Paybill default
            $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'; // Sandbox testing passkey
            $Timestamp = date('YmdHis');
            $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
            
            $curl_post_data = array(
              'BusinessShortCode' => $BusinessShortCode,
              'Password' => $Password,
              'Timestamp' => $Timestamp,
              'TransactionType' => 'CustomerPayBillOnline',
              'Amount' => 1, // Sandbox test amount for 1 KES
              'PartyA' => $phone,
              'PartyB' => $BusinessShortCode,
              'PhoneNumber' => $phone,
              'CallBackURL' => URLROOT . '/mpesa/callback', // Fictional callback
              'AccountReference' => 'CreatorHub Course',
              'TransactionDesc' => 'Payment for YT Masterclass'
            );
            
            $data_string = json_encode($curl_post_data);
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $stk_url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            
            $curl_response = curl_exec($curl);
            $response = json_decode($curl_response);
            curl_close($curl);

            // Show a simple success page echoing the API response safely
            $this->showMpesaUISuccess($phone, $response);
        } else {
            // Redirect back to payments if not POST
            header('location: ' . URLROOT . '/payments');
        }
    }

    private function showMpesaUIError($message) {
        require APPROOT . '/views/templates/header.php';
        echo '<section class="section text-center" style="padding-top: 10rem; min-height: 80vh;">';
        echo '<div class="card glass-card mx-auto" style="max-width: 500px; padding: 3rem;">';
        echo '<i class="fa-solid fa-circle-xmark" style="font-size: 4rem; color: var(--accent-red); margin-bottom: 1.5rem;"></i>';
        echo '<h3>Payment Initialization Failed</h3>';
        echo '<p class="text-dim mb-4">' . $message . '</p>';
        echo '<a href="' . URLROOT . '/payments" class="btn btn-outline">Back to Checkout</a>';
        echo '</div></section>';
        require APPROOT . '/views/templates/footer.php';
    }

    private function showMpesaUISuccess($phone, $response) {
        require APPROOT . '/views/templates/header.php';
        echo '<section class="section text-center" style="padding-top: 10rem; min-height: 80vh;">';
        echo '<div class="card glass-card mx-auto" style="max-width: 500px; padding: 3rem;">';
        echo '<i class="fa-solid fa-mobile-screen" style="font-size: 4rem; color: #4ade80; margin-bottom: 1.5rem;"></i>';
        echo '<h3>M-Pesa Prompt Sent!</h3>';
        echo '<p class="text-dim mb-4">Please check your phone <strong>' . htmlspecialchars($phone) . '</strong> to enter your M-Pesa PIN and complete the transaction.</p>';
        
        if (isset($response->ResponseDescription)) {
            echo '<div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 8px; margin-bottom: 2rem; font-family: monospace; font-size: 0.9rem; text-align: left;">';
            echo '<span style="color: #4ade80;">M-Pesa API Response:</span><br>';
            echo htmlspecialchars($response->ResponseDescription);
            echo '</div>';
        }

        echo '<a href="' . URLROOT . '/payments" class="btn btn-outline">Back to Checkout</a>';
        echo '</div></section>';
        require APPROOT . '/views/templates/footer.php';
    }
}
