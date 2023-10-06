<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> <?php if(isset($this->page_title)&& $this->page_title!=""){echo $this->page_title;}else{ echo $this->setting->site_name; } ?> </title>

    <meta name="description" content="<?php if(isset($this->page_description) && $this->page_description!=''){echo $this->page_description;}else{ echo $this->setting->site_description; } ?>" />

    <meta name="keywords" content="<?php if(isset($this->page_keywords)&& $this->page_keywords!=''){echo $this->page_keywords;}else{ echo $this->setting->site_keywords; } ?>" />

    <meta name="author" content="<?php if(isset($this->page_author)&& $this->page_author!=''){echo $this->page_author;}else{ echo $this->setting->site_author; } ?>" />

    <meta property="og:title" content="<?php if(isset($this->page_title)&& $this->page_title!=''){echo $this->page_title;}else{ echo $this->setting->site_name; } ?>"/>
    <meta property="og:image" content="<?php if(isset($this->page_image)&& $this->page_image!=''){echo BURL.'assets/'.$this->page_image; }else{echo BURL.'assets/'.$this->setting->site_logo;} ?>"/>
    <meta property="og:url" content="<?php if(isset($this->page_url)&& $this->page_url!=''){echo $this->page_url; }else{echo $this->setting->site_url;} ?>"/>
    <meta property="og:site_name" content="<?= $this->setting->site_name ?>"/>
    <meta property="og:description" content="<?php if(isset($this->page_description)&& $this->page_description!=''){echo $this->page_description;}else{ echo $this->setting->site_description; } ?>"/>

    <meta name="twitter:title" content="<?php if(isset($this->page_title)&& $this->page_title!=''){echo $this->page_title;}else{ echo $this->setting->site_name; } ?>" />
    <meta name="twitter:image" content="<?php if(isset($this->page_image)&& $this->page_image!=''){echo BURL.'assets/'.$this->page_image; }else{echo BURL.'assets/'.$this->setting->site_logo;} ?>"/>
    <meta name="twitter:url" content="<?php if(isset($this->page_url)&& $this->page_url!=''){echo $this->page_url; }else{echo $this->setting->site_url;} ?>"/>
    <meta name="twitter:card" content="<?php if(isset($this->page_twitter_card)&& $this->page_twitter_card!=''){echo BURL.'assets/'.$this->page_image; } ?>"/>

    <meta itemprop="name" content="<?php if(isset($this->page_title)&& $this->page_title!=''){echo $this->page_title;}else{ echo $this->setting->site_name; } ?>">
    <meta itemprop="description" content="<?php if(isset($this->page_description)&& $this->page_description!=''){echo $this->page_description;}else{ echo $this->setting->site_description; } ?>">
    <meta itemprop="image" content="<?php if(isset($this->page_image)&& $this->page_image!=''){echo BURL.'assets/'.$this->page_image; }else{echo BURL.'assets/'.$this->setting->site_screenshot;} ?>"> 

    <link rel="apple-touch-icon" href="<?=BURL?>assets/<?= $this->setting->site_favicon;?>">
    <link rel="shortcut icon" href="<?=BURL?>assets/<?= $this->setting->site_favicon;?>">
    
        <!--jsocials-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>   
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
        <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
        <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
        <!--jsocials-->


         <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="<?=BURL?>themes/gurable_admin/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="<?=BURL?>themes/gurable_admin/assets/css/nucleo-svg.css" rel="stylesheet" />
        <link href="<?=BURL?>assets/croppie.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="<?=BURL?>themes/gurable_admin/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="<?=BURL?>themes/gurable_admin/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
        <link id="pagestyle" href="<?=BURL?>themes/gurable_admin/assets/css/style.css" rel="stylesheet" />
        </head>

  <body class="g-sidenav-show  bg-gray-100">
  <?php
  $pending_verification_num = $this->db->query("SELECT * FROM users WHERE is_verified=2 ");
  $pending_verification_num  = $pending_verification_num->num_rows;

  $advisor_request_num = $this->db->query("SELECT * FROM advisory_requests WHERE status=0 ");
  $advisor_request_num  = $advisor_request_num ->num_rows;

  $testimony_request_num = $this->db->query("SELECT * FROM testimonies WHERE is_approved=0 ");
  $testimony_request_num  = $testimony_request_num ->num_rows;

  $unapproved_num = $this->db->query("SELECT uid FROM properties WHERE status=0  AND p_delete=0");
  $unapproved_num  = $unapproved_num ->num_rows;

  if($this->auth->user->type>4){
    $unread_messages=$this->db->query("SELECT * FROM messages WHERE reciever=0 AND zero_type = 'admin' AND is_read = 0");
    $unread_messages=$unread_messages->num_rows;
  }else{
    $uid=$this->auth->uid;
    $unread_messages=$this->db->query("SELECT * FROM messages WHERE reciever='$uid' AND is_read = 0");
    $unread_messages=$unread_messages->num_rows;
  }

  ?>
  <input type="hidden" name="burl" id='burl' value='<?=BURL?>'>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?=BURL?>" target="_blank">
        <img src="<?=BURL?>assets/<?=$this->setting->site_logo?>" class="" alt="main_logo" height="70"/>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="<?=BURL?>dashboard">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <?php if($this->auth->user->type>=5):?>
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Admin Menu</h6>
          </li>
        <?php endif;?>
        <?php if($this->auth->user->type==9):?>
        
          <li class="nav-item">
          <a class="nav-link  " href="<?=BURL?>settings">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>settings</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(304.000000, 151.000000)">
                        <polygon class="color-background opacity-6" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                        <path class="color-background opacity-6" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"></path>
                        <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>properties/management">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-building text-dark"></i>
            </div>
            <span class="nav-link-text ms-1"> Property Mgt. <span class="badge bg-warning badge-pill"><?=$unapproved_num ?></span></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>users">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users text-dark"></i>
            </div>
            <span class="nav-link-text ms-1"> User Mgt. </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>blogs/management">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-newspaper text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Blog Posts</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>investments/admin">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-money text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Investments</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>index/advisor_mgt">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-balance-scale text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Manage Advisors</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>agents/pending">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-certificate text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Pending Verifications <span class="badge bg-warning badge-pill"><?=$pending_verification_num ?></span> </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>index/advisorRequest">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-balance-scale text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Advisor Request <span class="badge bg-warning badge-pill"><?=$advisor_request_num ?></span> </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>index/testimony_mgt">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-comment-o text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Testimony Mgt. <span class="badge bg-warning badge-pill"><?=$testimony_request_num ?></span> </span>
          </a>
        </li>
      <?php endif;?> 
        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>properties/mine">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-image text-dark"></i>
            </div>
            <span class="nav-link-text ms-1"> My Properties</span>
          </a>
        </li>
        <?php if($this->auth->user->account_type=="artisan"): ?>
          <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>jobs">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-briefcase text-dark"></i>
            </div>
            <span class="nav-link-text ms-1"> My Job Samples</span>
          </a>
        </li>
        <?php endif;?>
        <li class="nav-item d-none">
          <a class="nav-link" href="<?=BURL?>jobs">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-envelope text-dark"></i>
            </div>
            <span class="nav-link-text ms-1"> Messages <span class="badge bg-warning badge-pill"><?=$unread_messages ?></span></span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="<?=BURL?>logout">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-button-power text-dark"></i>
            </div>
            <span class="nav-link-text ms-1"> Logout</span>
          </a>
        </li>
      </ul>
    </div>
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?= ucwords($this->auth->user->fullname)?> </span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
           
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>