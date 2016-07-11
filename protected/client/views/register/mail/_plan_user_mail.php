<html>
    <head>
        <title>emailer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- Save for Web Slices (emailer.psd) -->
        <div style="margin:auto; width:776px; border:solid 2px #404241; margin-top:40px; margin-bottom:40px;">
            <table id="Table_01" width="776" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td><a href="#"><img src="<?= $this->siteURL(); ?>images/emailer_01.jpg" width="776" height="102" alt=""></a></td>
                </tr>
                <tr>
                    <td style="padding:40px 20px; font-family:'Open Sans',arial, sans-serif; font-size:13px">
                        <p style="font-size:14px; font-weight:bold;">Dear <?php echo $user->first_name . ' ' . $user->last_name; ?> ,</p>


                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">Welcome to newgen.com It's great to have you on board. </p>
                        <?php if($status == 1) { ?>
                                <p style="font-size:13px;line-height:16px;text-align:left;">
                                    You have successfully completed  payment of  Rs.<?php echo $plan->amount; ?> for <b><?php echo $plan->plan_name; ?> Plan</b> at http://www.newgen.com .
                                </p>

                        <?php } elseif($status == 2) { ?>

                                <p style="font-size:13px;line-height:16px;text-align:left;">
                                    We are unable to complete your Payment of  <b><?php echo $plan->plan_name; ?> Plan</b> at http://www.newgen.com due to Transaction Failure.
                                </p>
                                <p style="font-size:13px;line-height:16px;text-align:left;">
                                    We invite you to visit tp://www.newgen.com once more to upgrade your current plan, using credit card or online bank account.
                                </p>
                        <?php } ?>

                        <p style="font-size:13px;line-height:16px;text-align:left;">
                            Thank you for your patronage.
                        </p>
                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">All the best for your Partner Search! </p>
                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">
                            Best Wishes,</p>
                        <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;font-weight:bold;">
                            NEWGEN Team</p>
                    </td>
                </tr>

                <tr>
                    <td style="padding:20px;  border:solid 1px #d7d7d7;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>

                                    <td align="center">
                                        <h4 style=" font-family:'Open Sans',arial, sans-serif; font-size:16px; color:#414042; margin-bottom:10px;"></h4>
                                        <p style="font-family:'Open Sans',arial, sans-serif; font-size:13px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do, <br>Tel:  +90 123 45 67, +90 123 45 68 <br>
                                            <a href="mailto:support@laksyah.com" style="border:none; color:#414042;">info@loremisum.com</a> <br>
                                            Copyright © 2016. All rights reserved.</p></td>

                                </tr>
                            </tbody>
                        </table></td>
                </tr>
            </table></div>
        <!-- End Save for Web Slices -->
    </body>
</html>