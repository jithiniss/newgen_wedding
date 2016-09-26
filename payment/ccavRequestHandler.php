<html>
        <head>
                <title> Custom Form Kit </title>
        </head>
        <body>
        <center>

                <?php include('Crypto.php') ?>
                <?php
                error_reporting(0);

                $merchant_data = '';
                $working_key = '4469F0857AF8C7CA6A07E3455E7E2A24'; //Shared by CCAVENUES
                $access_code = 'AVPD66DI80AD30DPDA'; //Shared by CCAVENUES

                foreach ($_POST as $key => $value) {
                        $merchant_data.=$key . '=' . urlencode($value) . '&';
                }

                $encrypted_data = encrypt($merchant_data, $working_key); // Method for encrypting the data.
                ?>
                <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
                        <?php
                        echo "<input type=hidden name=encRequest value=$encrypted_data>";
                        echo "<input type=hidden name=access_code value=$access_code>";
                        ?>
                </form>
        </center>
        <script language='javascript'>document.redirect.submit();</script>
</body>
</html>

