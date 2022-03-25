<?php
    $app = App::getInstance();

    $user = $app->getTable('user')->find($_SESSION['auth']);
    $nbrPost = $app->getTable('post')->getNumber();
    $nbrService = $app->getTable('service')->getNumber();
    $nbrCategory = $app->getTable('category')->getNumber();
    $nbrMessage = $app->getTable('message')->getNumber();
    $lastMessage = $app->getTable('message')->getLast();


?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>TRINCOT Admin Dashboard | Dashboard </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
     <link rel="shortcut icon" href="../public/images/favicon.png" type="image/x-icon">
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->

    <link rel="stylesheet" href="../public/admin/plugins/flot/examples/examples.css">

    <link rel="stylesheet" href="../public/admin/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../public/admin/css/main.css" />
    <link rel="stylesheet" href="../public/admin/css/theme.css" />
    <link rel="stylesheet" href="../public/admin/css/MoneAdmin.css" />
    <link rel="stylesheet" href="../public/admin/plugins/Font-Awesome/css/font-awesome.css" />
    <!-- END GLOBALS STYLES -->

    <!-- DATATABLE STYLE -->
    <link href="../public/admin/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- END DATATABLE STYLES -->

    <link src="../public/admin/plugins/jasny/js/bootstrap-fileupload.js"/>
    <link rel="stylesheet" href="../public/admin/css/bootstrap-fileupload.min.css" />
    
    <script src="../public/admin/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    
    <script>
	    tinymce.init({
	        selector: '#tinymce',
	        height: 300,
	        plugins: [
	            'advlist autolink link image lists charmap print preview hr anchor pagebreak',
	            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
	            'table emoticons template paste help'
	        ],
	        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
	        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
	        'forecolor backcolor emoticons | help',
	        menu: {
	        	favs: {title: 'My favorites', items: 'code visualaid | searchreplace | emoticons'}
	        },
	        menubar: 'favs file edit view insert format tools table help',
            image_title: true,
            images_file_types: 'jpg, svg, png, jpeg, gif, webp',
            automatic_uploads: true,
            file_picker_types: 'image, file, media',

            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), { title: file.name });
                    };

                    reader.readAsDataURL(file);
                };

                input.click();
            },
            
	    });
	</script>

     <style>
        ul.wysihtml5-toolbar > li {
            position: relative;
        }
    </style>
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <div id="wrap">
                <!-- HEADER SECTION -->
                <div id="top">

<nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
    <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
        <i class="icon-align-justify"></i>
    </a>
    <!-- LOGO SECTION -->
    <header class="navbar-header">

        <a href="?p=admin.posts.home" class="navbar-brand">
        <img style="width: 100px; height:auto; padding-bottom: 10px;" src="../public/admin/img/Trincot-trues white.png" alt="" />
            
            </a>
    </header>
    <!-- END LOGO SECTION -->
    <ul class="nav navbar-top-links navbar-right">

        <!-- MESSAGES SECTION -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="label label-success"><?= $nbrMessage->nbre; ?></span>    <i class="icon-envelope-alt"></i>&nbsp; <i class="icon-chevron-down"></i>
            </a>

            <ul class="dropdown-menu dropdown-messages">
                <?php
                    foreach($lastMessage as $last) {
                ?>
                <li>
                    <a href="#">
                        <div>
                           <strong><?= $last->name; ?></strong>
                            <span class="pull-right text-muted">
                                <em>Today</em>
                            </span>
                        </div>
                        <div><?= $last->extrait; ?>
                            <br />
                            <span class="label label-primary">Important</span> 

                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <?php
                    }
                ?>
                <li>
                    <a class="text-center" href="?p=admin.messages.index">
                        <strong>Read All Messages</strong>
                        <i class="icon-angle-right"></i>
                    </a>
                </li>
            </ul>

        </li>
        <!--END MESSAGES SECTION -->

        <!--ADMIN SETTINGS SECTIONS -->

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
            </a>

            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="icon-user"></i> User Profile </a>
                </li>
                <li><a href="#"><i class="icon-gear"></i> Settings </a>
                </li>
                <li class="divider"></li>
                <li><a href="?p=users.logout"><i class="icon-signout"></i> Logout </a>
                </li>
            </ul>

        </li>
        <!--END ADMIN SETTINGS -->
    </ul>

</nav>

</div>
<!-- END HEADER SECTION -->


        <!-- MENU SECTION -->
        <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="../public/admin/img/user.gif" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?= $user->name; ?></h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel active">
                    <a href="?p=admin.posts.home" >
                        <i class="icon-dashboard"></i> Dashboard
	   
                       
                    </a>                   
                </li>



                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> Posts     
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-default"><?= $nbrPost->nbre; ?></span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav">
                       
                        <li class=""><a href="?p=admin.posts.index"><i class="icon-angle-right"></i> All posts </a></li>
                         <li class=""><a href="?p=admin.posts.add"><i class="icon-angle-right"></i> New post </a></li>
                    </ul>
                </li>
                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                        <i class="icon-pencil"></i> Services
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-success"><?= $nbrService->nbre; ?></span>&nbsp;
                    </a>
                    <ul class="collapse" id="form-nav">
                        <li class=""><a href="?p=admin.services.index"><i class="icon-angle-right"></i> All services </a></li>
                        <li class=""><a href="?p=admin.services.add"><i class="icon-angle-right"></i> New service </a></li>
                    </ul>
                </li>

                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="icon-table"></i> Categories
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-info"><?= $nbrCategory->nbre; ?></span>&nbsp;
                    </a>
                    <ul class="collapse" id="pagesr-nav">
                        <li><a href="?p=admin.categories.index"><i class="icon-angle-right"></i> All Categories </a></li>
                        <li><a href="?p=admin.categories.add"><i class="icon-angle-right"></i> New category </a></li>
                    </ul>
                </li>
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                        <i class="icon-envelope-alt"></i> Messages
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-danger"><?= $nbrMessage->nbre; ?></span>&nbsp;
                    </a>
                    <ul class="collapse" id="chart-nav">



                        <li><a href="?p=admin.messages.index"><i class="icon-angle-right"></i> Mails </a></li>
                    </ul>
                </li>

                <li><a href="?p=users.logout"><i class="icon-signin"></i> Logout </a></li>

            </ul>

        </div>
        <!--END MENU SECTION -->


    <?= $content; ?>

    </div>

    
    <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->

    <!-- GLOBAL SCRIPTS -->
    <script src="../public/admin/plugins/jquery-2.0.3.min.js"></script>
     <script src="../public/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/admin/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    
    <script src="../public/admin/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../public/admin/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>

    <!-- PAGE LEVEL SCRIPTS -->
    <script  src="../public/admin/plugins/flot/jquery.flot.js"></script>
     <script src="../public/admin/plugins/flot/jquery.flot.resize.js"></script>
	<script  src="../public/admin/plugins/flot/jquery.flot.pie.js"></script>
    <script src="../public/admin/js/pie_chart.js"></script>
    
     <!--END PAGE LEVEL SCRIPTS -->

     <!-- PAGE LEVEL SCRIPTS -->
    <script src="../public/admin/plugins/jasny/js/bootstrap-fileupload.js"></script>
         <!-- END PAGE LEVEL SCRIPTS -->


</body>

    <!-- END BODY -->
</html>