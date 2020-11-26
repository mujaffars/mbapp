<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta name="resource-type" content="document" />
        <meta name="robots" content="all, index, follow"/>
        <meta name="googlebot" content="all, index, follow" />
        <?php
        /** -- Copy from here -- */
        if (!empty($meta))
            foreach ($meta as $name => $content) {
                echo "\n\t\t";
                ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
            }
        echo "\n";

        if (!empty($canonical)) {
            echo "\n\t\t";
            ?><link rel="canonical" href="<?php echo $canonical ?>" /><?php
        }
        echo "\n\t";

        foreach ($css as $file) {
            echo "\n\t\t";
            ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
        } echo "\n\t";

        foreach ($js as $file) {
            echo "\n\t\t";
            ?><script src="<?php echo $file; ?>"></script><?php
        } echo "\n\t";

        /** -- to here -- */
        ?>

        <script type="text/javascript">
            var siteUrl=<?php echo "'" . site_url() . "';"; ?>
        </script>    

        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>assets/themes/default/css/custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/simple-sidebar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/grocery_crud/css/jquery_plugins/chosen/chosen.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/grocery_crud/themes/flexigrid/css/flexigrid.css" rel="stylesheet">

        <meta property="og:image" content="<?php echo base_url(); ?>assets/themes/default/images/facebook-thumb.png"/>
        <link rel="image_src" href="<?php echo base_url(); ?>assets/themes/default/images/facebook-thumb.png" />
        <style type="text/css">

            ::selection{ background-color: #E13300; color: white; }
            ::moz-selection{ background-color: #E13300; color: white; }
            ::webkit-selection{ background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 0 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body{
                margin: 0 15px 0 15px;
            }

            p.footer{
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container{
                margin: 10px;
                border: 1px solid #D0D0D0;
                -webkit-box-shadow: 0 0 8px #D0D0D0;
            }
        </style>

    </head>

    <body>


        <div class="d-flex" id="wrapper">

            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div class="container-fluid">

                <div class="dropdown">
                    <a href="<?php echo site_url('examples/orders_management/'); ?>" class="">Back</a>
                </div>

                <div class="pageCotent">
                    <?php if ($this->load->get_section('text_header') != '') { ?>
                        <h1><?php echo $this->load->get_section('text_header'); ?></h1>
                    <?php } ?>

                    <?php echo $output; ?>
                    <?php echo $this->load->get_section('sidebar'); ?>
                </div>

                <!-- /#page-content-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/themes/default/js/custom.js"></script>
            <?php foreach ($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>
            <!-- Menu Toggle Script -->
            <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            </script>
            <hr/>

        </div> <!-- /container -->

    </body>
</html>