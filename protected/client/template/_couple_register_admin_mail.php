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
                                                <p style="font-size:14px; font-weight:bold;">New Couple Registration Details</p>

                                                <table style=" font-family:'Open Sans',arial, sans-serif; font-size:13px;">

                                                        <tr>

                                                                <td>Couple Name</td><td>:</td><td><?php echo $model->couple_name; ?></td>
                                                        </tr>
                                                        <?php if (!empty($bride)) { ?>
                                                                <tr>
                                                                        <td>Name</td><td>:</td><td><?php echo $bride->first_name . ' ' . $bride->last_name; ?></td>
                                                                </tr>
                                                        <?php } ?>
                                                        <?php if (!empty($groom)) { ?>
                                                                <tr>
                                                                        <td>Name</td><td>:</td><td><?php echo $groom->first_name . ' ' . $groom->last_name; ?></td>
                                                                </tr>

                                                        <?php } ?>
                                                        <tr>
                                                                <td>Email ID</td><td>:</td><td><?php echo $model->email; ?></td>
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