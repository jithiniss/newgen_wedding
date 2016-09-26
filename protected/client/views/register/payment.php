<script>
        window.onload = function() {
                var d = new Date().getTime();
                document.getElementById("tid").value = d;
        };
</script>
<form method="POST" name="customerData" action="<?php echo Yii::app()->request->baseUrl; ?>/payment/ccavRequestHandler.php">
        <input type="text" name="tid" id="tid" readonly />
        <input type="text" name="merchant_id" value="<?= $pay_details['merchant_id']; ?>"/>
        <input type="text" name="order_id" value="<?= $pay_details['order_id']; ?>"/>
        <input type="text" name="amount" value="<?= $pay_details['amount']; ?>"/>
        <input type="text" name="currency" value="INR"/>
        <input type="text" name="redirect_url" value="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Register/PlanPaymentSuccess/plan_id/<?= $pay_details['order_id']; ?>"/>
        <input type="text" name="cancel_url" value="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Register/PlanPaymentError/plan_id/<?= $pay_details['order_id']; ?>"/>
        <input type="text" name="language" value="EN"/>
</form>
<h3>Payment Procedure  Progress <span id="wait">.</span></h3>
<script>
        var dots = window.setInterval(function() {
                var wait = document.getElementById("wait");
                if (wait.innerHTML.length > 3)
                        wait.innerHTML = "";
                else
                        wait.innerHTML += ".";
        }, 500);
</script>
<script>
        document.customerData.submit();
</script>