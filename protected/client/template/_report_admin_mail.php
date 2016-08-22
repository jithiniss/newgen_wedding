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
                                                <p style="font-size:14px; font-weight:bold;"><?php echo $user_details->first_name ?> Report a misuse from <?php echo $report_details->first_name ?></p>

                                                <table style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">
                                                        <p>Reported By:</p>
                                                        <tr>
                                                                <td>NEWGEN ID</td><td>:</td><td><?php echo $model->user_id; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td>Name</td><td>:</td><td><?php echo $user_details->first_name . ' ' . $user_details->last_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td>Reason</td> <?php if ($model->report_reason == 1) { ?>
                                                                <td>:</td><td>
                                                                                <?php echo 'Fake or misleading information'; ?>
                                                                        </td>
                                                                <?php } elseif ($model->report_reason == 2) { ?>
                                                                        <td>:</td><td>
                                                                                <?php echo 'Multiple Profiles'; ?>
                                                                        </td>

                                                                <?php } elseif ($model->report_reason == 3) { ?>
                                                                        <td>:</td><td>
                                                                                <?php echo 'Phone number is incorrect'; ?>
                                                                        </td>
                                                                <?php } elseif ($model->report_reason == 4) { ?>
                                                                        <td>:</td><td>
                                                                                <?php echo 'Photos are fake or obscene'; ?>
                                                                        </td>
                                                                <?php } elseif ($model->report_reason == 5) { ?>
                                                                        <td>:</td><td>
                                                                                <?php echo 'Has sent abusive Emails/Chat'; ?>
                                                                        </td>
                                                                <?php } elseif ($model->report_reason == 6) { ?>
                                                                        <td>:</td><td>
                                                                                <?php echo 'Is already married/engaged'; ?>
                                                                        </td>
                                                                <?php } elseif ($model->report_reason == 7) { ?>
                                                                        <td>:</td><td>
                                                                                <?php echo 'Is already married/engaged'; ?>
                                                                        </td>
                                                                <?php } elseif ($model->report_reason == 8) { ?>
                                                                        <td>:</td><td>
                                                                                <?php echo 'Other misuse reason'; ?>
                                                                        </td>
                                                                <?php }
                                                                ?>

                                                        </tr>
                                                        <tr>
                                                                <td>Description</td><td>:</td><td><?php echo $model->description; ?></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Profile created by</td><td>:</td><td><?php echo MasterProfileFor::model()->findByPk($user_details->profile_for)->profile_for; ?></td>
                                                        </tr>
                                                </table>




                                        </td>
                                </tr>
                                <tr>
                                        <td style="padding:40px 20px; font-family:'Open Sans',arial, sans-serif; font-size:13px">

                                                <table style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">
                                                        <p>Misuse from:</p>
                                                        <tr>
                                                                <td>NEWGEN ID</td><td>:</td><td><?php echo $report_details->id; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td>Name</td><td>:</td><td><?php echo $report_details->first_name . ' ' . $report_details->last_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td>Email</td><td>:</td><td><?php echo $report_details->email; ?></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Profile created by</td><td>:</td><td><?php echo MasterProfileFor::model()->findByPk($report_details->profile_for)->profile_for; ?></td>
                                                        </tr>
                                                </table>




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