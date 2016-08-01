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
                                                <p style="font-size:14px; font-weight:bold;">Dear <?php echo $model->first_name . ' ' . $model->last_name; ?> ,</p>


                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">Welcome to newgen.com It's great to have you on board. I would like to share with you a few things that we have learnt while helping millions of people find their match.</p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">
                                                <ul>
                                                        <li>
                                                                Think of us as partners who will work with you to find the right match.
                                                        </li>
                                                        <li>
                                                                We depend on you to tell us about yourself and what you are looking for.
                                                                So, do take time to fill out your profile accurately.
                                                        </li>
                                                        <li>Login regularly, contact and respond to members to get close to meeting the right one.</li>
                                                        <li>
                                                                We have noticed that Uploading a photo dramatically increases the response you get. You can choose to keep your photo private.
                                                        </li>
                                                </ul>
                                                </p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;font-weight:bold;">Verify your account for accessing above features to find your perfect partner.</p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;"><a href="<?php echo $this->siteURL() . 'index.php/register/verify?m=' . $this->encrypt_decrypt('encrypt', $model->id); ?>" style="    width: 116px;
                                                                                                                          background-color: #603779;
                                                                                                                          line-height: 40px;
                                                                                                                          padding-left: 30px;
                                                                                                                          padding-right: 30px;
                                                                                                                          color: #fff;
                                                                                                                          text-decoration: none;
                                                                                                                          display: block;
                                                                                                                          margin: 0 auto;">VERIFY ACCOUNT</a></p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;font-weight:bold;">Please copy this link to activate your account if you are unable to use verify button <br>
                                                        " <?php echo $this->siteURL() . 'index.php/register/verify?m=' . $this->encrypt_decrypt('encrypt', $model->id); ?>"</p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;font-weight:bold;">If you are already verified your account, Please ignore this mail.</p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">All the best for your Partner Search! </p>
                                                <p style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">
                                                        Best Wishes,</p>
                                        </td>
                                </tr>

                                <tr>
                                        <td style="padding:20px;  border:solid 1px #d7d7d7;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                                <tr>

                                                                        <td align="center">
                                                                                <h4 style=" font-family:'Open Sans',arial, sans-serif; font-size:16px; color:#414042; margin-bottom:10px;"></h4>
                                                                                <p style="font-family:'Open Sans',arial, sans-serif; font-size:13px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do, <br>Tel:  +90 123 45 67, +90 123 45 68 <br>
                                                                                        <a href="mailto:support@newgen.com" style="border:none; color:#414042;">info@loremisum.com</a> <br>
                                                                                        Copyright © 2016. All rights reserved.</p></td>

                                                                </tr>
                                                        </tbody>
                                                </table></td>
                                </tr>
                        </table></div>
                <!-- End Save for Web Slices -->
        </body>
</html>