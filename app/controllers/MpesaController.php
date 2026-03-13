<?php
class MpesaController extends Controller {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function pay() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phone = $_POST['phone'];
            $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 1;
            $itemName = isset($_POST['item_name']) ? $_POST['item_name'] : 'Purchase';
            $itemType = isset($_POST['item_type']) ? $_POST['item_type'] : 'product';
            $currency = isset($_POST['currency']) ? strtoupper($_POST['currency']) : 'KES';
            
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
                $this->showMpesaUIError("Failed to authenticate with M-Pesa Daraja API. Please check Consumer Key/Secret.");
                return;
            }
            
            // M-Pesa STK Push Request
            $stk_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
            $BusinessShortCode = '174379'; // Sandbox Paybill default
            $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'; // Sandbox testing passkey
            $Timestamp = date('YmdHis');
            $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

            $transactionId = uniqid('txn_');
            $curl_post_data = array(
              'BusinessShortCode' => $BusinessShortCode,
              'Password' => $Password,
              'Timestamp' => $Timestamp,
              'TransactionType' => 'CustomerPayBillOnline',
              'Amount' => intval($amount),
              'PartyA' => $phone,
              'PartyB' => $BusinessShortCode,
              'PhoneNumber' => $phone,
              'CallBackURL' => URLROOT . '/mpesa/callback',
              'AccountReference' => $transactionId,
              'TransactionDesc' => $itemName
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

            // Debug: Log the response
            error_log("M-Pesa STK Response: " . $curl_response);

            // Check for errors
            if (isset($response->errorCode)) {
                $this->showMpesaUIError("M-Pesa API Error: " . ($response->errorMessage ?? 'Unknown error'));
                return;
            }

            // Record transaction in database
            $this->recordTransaction($itemName, $itemType, $amount, $currency, 'mpesa', $transactionId, $phone);

            $this->showMpesaUISuccess($phone, $response, $itemName, $amount, $currency);
        } else {
            header('location: ' . URLROOT . '/payments');
        }
    }

    private function recordTransaction($itemName, $itemType, $amount, $currency, $method, $transactionId, $phone) {
        $this->db->query('INSERT INTO transactions (item_name, item_type, amount, currency, payment_method, transaction_id, phone_number, status) 
                         VALUES (:item_name, :item_type, :amount, :currency, :payment_method, :transaction_id, :phone_number, :status)');
        $this->db->bind(':item_name', $itemName);
        $this->db->bind(':item_type', $itemType);
        $this->db->bind(':amount', $amount);
        $this->db->bind(':currency', $currency);
        $this->db->bind(':payment_method', $method);
        $this->db->bind(':transaction_id', $transactionId);
        $this->db->bind(':phone_number', $phone);
        $this->db->bind(':status', 'pending');
        return $this->db->execute();
    }

    private function showMpesaUIError($message) {
        require APPROOT . '/views/templates/header.php';
        echo '<section class="section text-center" style="padding-top: 10rem; min-height: 80vh;">';
        echo '<div class="card glass-card mx-auto" style="max-width: 500px; padding: 2rem; margin: 0 1rem;">';
        echo '<i class="fa-solid fa-circle-xmark" style="font-size: 3rem; color: var(--accent-red); margin-bottom: 1.5rem;"></i>';
        echo '<h3 style="font-size: 1.5rem;">Payment Initialization Failed</h3>';
        echo '<p class="text-dim mb-4" style="font-size: 0.9rem;">' . $message . '</p>';
        echo '<a href="' . URLROOT . '/payments" class="btn btn-outline" style="width: 100%;">Back to Checkout</a>';
        echo '</div></section>';
        require APPROOT . '/views/templates/footer.php';
    }

    private function showMpesaUISuccess($phone, $response, $itemName = '', $amount = 0, $currency = 'KES') {
        require APPROOT . '/views/templates/header.php';
        echo '<section class="section text-center" style="padding-top: 10rem; min-height: 80vh;">';
        echo '<div class="card glass-card mx-auto" style="max-width: 600px; padding: 2rem; margin: 0 1rem;">';
        echo '<i class="fa-solid fa-mobile-screen" style="font-size: 3rem; color: #4ade80; margin-bottom: 1.5rem;"></i>';
        echo '<h3 style="font-size: 1.5rem;">M-Pesa Payment Initiated!</h3>';
        echo '<p class="text-dim mb-4" style="font-size: 0.9rem;">Check your phone <strong>' . htmlspecialchars($phone) . '</strong> for an STK prompt to complete the payment.</p>';
        
        if (!empty($itemName)) {
            echo '<div style="background: rgba(76,222,128,0.1); padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border-left: 4px solid #4ade80;">';
            echo '<div style="text-align: left; font-size: 0.9rem;">';
            echo '<p style="margin: 0.5rem 0;"><strong>Item:</strong> ' . htmlspecialchars($itemName) . '</p>';
            echo '<p style="margin: 0.5rem 0;"><strong>Amount:</strong> ' . htmlspecialchars($currency . ' ' . number_format($amount, 2)) . '</p>';
            echo '<p style="margin: 0.5rem 0; color: #4ade80;"><strong>Status:</strong> Pending Confirmation</p>';
            echo '</div>';
            echo '</div>';
        }
        
        if (isset($response->ResponseDescription)) {
            echo '<div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 8px; margin-bottom: 2rem; font-family: monospace; font-size: 0.8rem; text-align: left;">';
            echo '<span style="color: #4ade80;">API Response:</span><br>';
            echo htmlspecialchars($response->ResponseDescription);
            echo '</div>';
        }

        echo '<div style="display: flex; flex-direction: column; gap: 1rem;">';
        echo '<a href="' . URLROOT . '/dashboard" class="btn btn-primary" style="width: 100%;">Go to Dashboard</a>';
        echo '<a href="' . URLROOT . '/payments" class="btn btn-outline" style="width: 100%;">Make Another Purchase</a>';
        echo '</div>';
        echo '</div></section>';
        require APPROOT . '/views/templates/footer.php';
    }

    public function testMpesa() {
        $phone = '254712345678'; // Test phone number

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
            echo "Failed to authenticate with M-Pesa Daraja API. Please check Consumer Key/Secret.";
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
          'CallBackURL' => URLROOT . '/mpesa/callback',
          'AccountReference' => 'TestPayment',
          'TransactionDesc' => 'Testing M-Pesa Integration'
        );

        $curl = curl_init($stk_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
        $curl_response = curl_exec($curl);
        curl_close($curl);

        echo "M-Pesa STK Push Request Sent. Response: ";
        print_r($curl_response);
    }

    public function callback() {
        // M-Pesa sends callback data as JSON in POST body
        $callbackData = json_decode(file_get_contents('php://input'), true);
        
        if (!$callbackData) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid callback data']);
            return;
        }

        // Log the callback for debugging
        error_log("M-Pesa Callback: " . json_encode($callbackData));

        // Extract transaction details
        $stkCallback = $callbackData['Body']['stkCallback'] ?? null;
        
        if ($stkCallback) {
            $resultCode = $stkCallback['ResultCode'];
            $resultDesc = $stkCallback['ResultDesc'];
            $merchantRequestId = $stkCallback['MerchantRequestID'];
            $checkoutRequestId = $stkCallback['CheckoutRequestID'];
            
            if ($resultCode == 0) {
                // Payment successful
                $callbackMetadata = $stkCallback['CallbackMetadata']['Item'];
                
                $amount = null;
                $mpesaReceiptNumber = null;
                $transactionDate = null;
                $phoneNumber = null;
                
                foreach ($callbackMetadata as $item) {
                    switch ($item['Name']) {
                        case 'Amount':
                            $amount = $item['Value'];
                            break;
                        case 'MpesaReceiptNumber':
                            $mpesaReceiptNumber = $item['Value'];
                            break;
                        case 'TransactionDate':
                            $transactionDate = $item['Value'];
                            break;
                        case 'PhoneNumber':
                            $phoneNumber = $item['Value'];
                            break;
                    }
                }
                
                // Update transaction status in database
                $this->updateTransactionStatus($checkoutRequestId, 'completed', $mpesaReceiptNumber);
                
                // You can add additional logic here (send email, update user balance, etc.)
                
            } else {
                // Payment failed
                $this->updateTransactionStatus($checkoutRequestId, 'failed', null);
            }
        }
        
        // Respond to M-Pesa
        echo json_encode(['ResultCode' => 0, 'ResultDesc' => 'Callback received successfully']);
    }

    private function updateTransactionStatus($transactionId, $status, $mpesaReceipt = null) {
        $this->db->query('UPDATE transactions SET status = :status, mpesa_receipt = :mpesa_receipt, updated_at = NOW() WHERE transaction_id = :transaction_id');
        $this->db->bind(':status', $status);
        $this->db->bind(':mpesa_receipt', $mpesaReceipt);
        $this->db->bind(':transaction_id', $transactionId);
        return $this->db->execute();
    }
}
