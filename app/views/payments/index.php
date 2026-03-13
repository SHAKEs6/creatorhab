<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="payments" class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center">
        <h2><?php echo htmlspecialchars($data['title']); ?></h2>
        <?php if (!empty($data['description'])): ?>
            <p class="text-dim"><?php echo htmlspecialchars($data['description']); ?></p>
        <?php endif; ?>
        <p><i class="fa-solid fa-lock" style="color: #4ade80;"></i> Secure Encryption</p>
    </div>
    
    <div class="grid grid-2 mx-auto" style="max-width: 900px;">
        <!-- Order Summary -->
        <div class="order-summary p-lg">
            <h3 class="mb-4">Order Summary</h3>
            
            <div class="checkout-item flex-row" style="justify-content: space-between; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 1rem; margin-bottom: 1rem;">
                <div class="item-details flex-row">
                    <div class="item-thumb bg-darker" style="width: 60px; height: 40px; border-radius: var(--radius-sm); margin-right: 1rem;"></div>
                    <div>
                        <h5 class="m-0"><?php echo htmlspecialchars($data['title']); ?></h5>
                        <?php if(!empty($data['description'])): ?><small class="text-dim"><?php echo htmlspecialchars($data['description']); ?></small><?php endif; ?>
                    </div>
                </div>
                <div class="item-price font-bold"><?php echo htmlspecialchars($data['currency'] . ' ' . number_format($data['price'],2)); ?></div>
            </div>
            
            <div class="totals mt-4">
                <div class="flex-row" style="justify-content: space-between; margin-bottom: 0.5rem;">
                    <span class="text-dim">Subtotal</span>
                    <span><?php echo htmlspecialchars($data['currency'] . ' ' . number_format($data['price'],2)); ?></span>
                </div>
                <div class="flex-row" style="justify-content: space-between; margin-bottom: 1rem;">
                    <span class="text-dim">Tax</span>
                    <span><?php echo htmlspecialchars($data['currency'] . ' 0.00'); ?></span>
                </div>
                <div class="flex-row text-xl" style="justify-content: space-between; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem;">
                    <strong>Total Due</strong>
                    <strong class="text-accent"><?php echo htmlspecialchars($data['currency'] . ' ' . number_format($data['price'],2)); ?></strong>
                </div>
            </div> 
            <input type="hidden" name="amount" value="<?php echo htmlspecialchars($data['price']); ?>">
            <input type="hidden" name="currency" value="<?php echo htmlspecialchars($data['currency']); ?>">
        </div>
        
        <!-- Payment Details -->
        <div class="payment-form card glass-card">
            <h3 class="mb-4">Payment Details</h3>
            
            <div class="payment-methods mb-4 flex-row" style="gap: 1rem;">
                <button type="button" class="btn btn-outline flex-1 active" id="btn-mpesa" style="border-color: #4ade80; color: #4ade80;"><i class="fa-solid fa-mobile-screen"></i> M-Pesa</button>
                <button type="button" class="btn btn-outline flex-1" id="btn-paypal"><i class="fa-brands fa-paypal"></i> PayPal</button>
            </div>
            
            <!-- M-Pesa Form -->
            <div id="mpesa-form">
                <form action="<?php echo URLROOT; ?>/mpesa/pay" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="amount" value="<?php echo htmlspecialchars($data['price']); ?>">
                    <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($data['title']); ?>">
                    <input type="hidden" name="item_type" value="<?php echo isset($data['item_type']) ? htmlspecialchars($data['item_type']) : 'product'; ?>">
                    <input type="hidden" name="currency" value="<?php echo htmlspecialchars($data['currency']); ?>">
                    <div class="form-group mb-3">
                        <label class="form-label">M-Pesa Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="2547XXXXXXXX" required style="width: 100%; padding: 0.8rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-sm);">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-4" style="background: #4ade80; color: #111; font-weight: bold;"><i class="fa-solid fa-mobile-screen"></i> Pay with M-Pesa</button>
                    <p class="text-center text-dim mt-3" style="font-size: 0.8rem;">Clicking pay will send an STK prompt to your phone (Sandbox Mode).</p>
                </form>
            </div>

            <!-- PayPal Form -->
            <div id="paypal-form" style="display: none; text-align: center;">
                <div style="margin-top: 2rem;">
                    <style>.pp-KDPS8S2RUKX4U{text-align:center;border:none;border-radius:0.25rem;min-width:11.625rem;padding:0 2rem;height:2.625rem;font-weight:bold;background-color:#FFD140;color:#000000;font-family:"Helvetica Neue",Arial,sans-serif;font-size:1rem;line-height:1.25rem;cursor:pointer;}</style>
                    <form action="<?php echo URLROOT; ?>/payments/paypal" method="post" target="_blank" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                      <input type="hidden" name="amount" value="<?php echo htmlspecialchars($data['price']); ?>">
                      <input type="hidden" name="currency" value="<?php echo htmlspecialchars($data['currency']); ?>">
                      <input class="pp-KDPS8S2RUKX4U" type="submit" value="Buy Now" />
                      <img src=https://www.paypalobjects.com/images/Debit_Credit.svg alt="cards" />
                      <section style="font-size: 0.75rem;"> Powered by <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;"/></section>
                    </form>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const btnMpesa = document.getElementById('btn-mpesa');
                    const btnPaypal = document.getElementById('btn-paypal');
                    const formMpesa = document.getElementById('mpesa-form');
                    const formPaypal = document.getElementById('paypal-form');

                    btnMpesa.addEventListener('click', function() {
                        btnMpesa.classList.add('active');
                        btnMpesa.style.borderColor = '#4ade80';
                        btnMpesa.style.color = '#4ade80';
                        
                        btnPaypal.classList.remove('active');
                        btnPaypal.style.borderColor = 'rgba(255,255,255,0.2)';
                        btnPaypal.style.color = 'inherit';
                        
                        formMpesa.style.display = 'block';
                        formPaypal.style.display = 'none';
                    });

                    btnPaypal.addEventListener('click', function() {
                        btnPaypal.classList.add('active');
                        btnPaypal.style.borderColor = '#0070ba';
                        btnPaypal.style.color = '#0070ba';
                        
                        btnMpesa.classList.remove('active');
                        btnMpesa.style.borderColor = 'rgba(255,255,255,0.2)';
                        btnMpesa.style.color = 'inherit';
                        
                        formMpesa.style.display = 'none';
                        formPaypal.style.display = 'block';
                    });
                });
            </script>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
