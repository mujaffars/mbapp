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
            var siteUrl=<?php echo "'".site_url()."';"; ?>
        </script>    

        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/hero_files/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/general.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/simple-sidebar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/grocery_crud/css/jquery_plugins/chosen/chosen.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/grocery_crud/themes/flexigrid/css/flexigrid.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <!--<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/themes/default/images/favicon.png" type="image/x-icon"/>-->
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

            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Mobile Shop </div>
                <div class="list-group list-group-flush">
                    <?php foreach ($css_files as $file): ?>
                        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                    <?php endforeach; ?>
                </div>

                <div class="navcontainer">        
                    <ul class="">
                        <li><a class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('examples/offices_management'); ?>">Dashboard</a></li>
                        <li class="">
                            <a tabindex="-1" class="list-group-item list-group-item-action bg-light" href="#">Customers</a>
                            <ul class="clsUlCustomers">
                                <li><a tabindex="-1" class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('examples/customers_management/add'); ?>">Add</a></li>
                                <li><a class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('examples/customers_management'); ?>">List</a></li>
                                <!--<li class=""><a href="#">Research</a></li>
                                <li class="">
                                    <a href="#">APL & Products</a>
                                    <ul class="parent">
                                        <li >
                                            <a href="#">
                                                Approved Product List                                        
                                            </a>
                                            <ul class="child">
                                                <li >Platforms</li>
                                            </ul>

                                        </li>
                                        <li ><a href="#">Model Portfolios</a></li>
                                        <li ><a href="#">Non-approved Products</a></li>
                                    </ul>
                                </li>-->
                            </ul>
                        </li>

                        <li>
                            <a class="list-group-item list-group-item-action bg-light" href="#">Orders</a>
                            <ul class="clsUlOrders">
                                <li><a tabindex="-1" class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('examples/orders_management/add'); ?>">Add Order</a></li>
                                <li><a class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('examples/orders_management'); ?>">Orders List</a></li>                                
                            </ul>
                        </li>
                        <li>
                            <a class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('mobile/mobilecompany'); ?>">Category</a>
                            <ul class="clsUlCategory">
                                <li><a tabindex="-1" class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('category/catlist'); ?>">Category List</a></li>
                                <li><a class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('category/brandslist'); ?>">Brand List</a></li>
                                <li><a class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('category/itemslist'); ?>">Items List</a></li>                                
                            </ul>
                        </li>
                        <li>
                            <a class="list-group-item list-group-item-action bg-light" href="#">Employee</a>
                            <ul class="clsUlEmployee">
                                <li><a tabindex="-1" class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('examples/employees_management/add'); ?>">Add Employee</a></li>
                                <li><a class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('examples/orders_management'); ?>">Employee List</a></li>                                
                            </ul>
                        </li>
                        <li>
                            <a class="list-group-item list-group-item-action bg-light" href="#">Multigrid</a>
                            <ul class="clsUlMultigrid">
                                <li><a tabindex="-1" class="list-group-item list-group-item-action bg-light" href="<?php echo site_url('examples/multigrids'); ?>">List</a></li>                             
                            </ul>
                        </li>
                    </ul>

                </div>

            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div class="container-fluid">

                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <!--<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>-->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>

                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">Home</button>
                                <div id="myDropdown" class="dropdown-content">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                            </div>

                        </ul>
                    </div>
                </nav>

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

            <!--            <footer>
                            <div class="row">
                                <div class="span6 b10">
            
                                </div>
                            </div>
                        </footer>-->

        </div> <!-- /container -->

    </body>
</html>