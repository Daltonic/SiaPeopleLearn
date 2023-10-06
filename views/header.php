<!DOCTYPE html>
<html>

<head>
  <title>Dapp Mentors | <?= $_SESSION['_PAGE_TITLE'] ?></title>
  <meta name="description" content="<?= $_SESSION['_PAGE_DESCRIPTOR'] ?>">
  <meta name="keywords" content="dapp development, decentralized applications, blockchain technology, Web 3.0, tutorials, mentors, community, tools, resources">
  <meta property="og:type" content="<?= $_SESSION['_PAGE_TYPE'] ?>" />
  <meta property="og:title" content="<?= $_SESSION['_PAGE_TITLE'] ?> | Dapp Mentors">
  <meta property="og:description" content="<?= $_SESSION['_PAGE_DESCRIPTOR'] ?>">
  <meta property="og:image" content="<?= $_SESSION['_PAGE_IMAGE'] ?>">
  <meta property="og:site_name" content="Dapp Mentors" />
  <meta property="og:url" content="<?= $_SESSION['_PAGE_URL'] ?>" />
  <meta property="og:locale" content="en_US" />
  <meta name="title" content="<?= $_SESSION['_PAGE_TITLE'] ?> | Dapp Mentors" />
  <meta name="robots" content="index,follow" />
  <meta name="description" content="<?= $_SESSION['_PAGE_DESCRIPTOR'] ?>" />


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="<?= BURL ?>assets/img/favicon.ico" />
  <meta name="google-site-verification" content="He3Wi1QG4KKDgNtt2TW14OTLR-DYjFC0ID1VkcCKtoY" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="<?= BURL ?>assets/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="<?= BURL ?>assets/css/owl.theme.default.css">
  <script src="https://cdn.tiny.cloud/1/2p9nhiqbd3pls2k4h2nnhikfjfn2jnxef7l1ano0nofnjbn2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= BURL ?>assets/css/plyr.css" />

  <script>
    tinymce.init({
      selector: '#editor',
      plugins: "advlist anchor autolink autosave charmap code image insertdatetime link lists media searchreplace table  visualblocks visualchars wordcount",
      toolbar: "undo redo | bold italic underline | align bullist numlist | blocks fontfamily fontsize",
      menubar: 'insert',
      block_formats: 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6',
    });
  </script>

  <style>
    p iframe[src*="youtube"] {
      max-width: 100%;
      height: 410px;
    }

    .swiper-button-next,
    .swiper-button-prev {
      position: absolute;
      top: var(--swiper-navigation-top-offset, 36%);
      height: var(--swiper-navigation-size);
      color: black;
    }

    :root {
      --swiper-navigation-size: 25px;
    }


    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .spinner {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      border: 3px solid gray;
      border-top-color: transparent;
      animation: spin 1s linear infinite;
    }
  </style>

  <script src="<?= BURL ?>assets/tailwindcss/tailwind.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= BURL ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= BURL ?>assets/css/flowbite.min.css">
</head>

<body class="text-gray-800 antialiased">
  <input type="hidden" value="<?= BURL ?>" id="burl">
  <nav class="top-0 absolute z-50 w-full flex flex-col items-center justify-between px-2 py-3 ">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
      <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
        <a class="flex flex-row justify-center items-center text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="<?= BURL ?>">
          <span class="w-8 h-8 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full mr-4">
            <img alt="Dapp Mentors Logo" class="w-full rounded-full align-middle border-none" src="<?= BURL ?>assets/img/logo.png">
          </span>

          Dapp mentors</a><button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="toggleNavbar('example-collapse-navbar')">
          <i class="text-white fas fa-bars"></i>
        </button>
      </div>
      <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden" id="example-collapse-navbar">
        <ul class="flex flex-col lg:flex-row list-none mr-auto">
          <li class="flex items-center">
            <a target="_blank" href="https://www.youtube.com/@dappmentors?sub_confirmation=1" class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold">
              <i class="fab fa-youtube"></i>
              <span class="ml-2">Tutorials</span>
            </a>
          </li>
          <li class="flex items-center">
            <a href="<?= BURL ?>academy" class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold">
              <i class="fas fa-graduation-cap"></i>
              <span class="ml-2">Academy</span>
            </a>
          </li>
        </ul>
        <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
          <a target="_blank" href="mailto:darlingtongospel@gmail.com?body=Hi Dapp Mentors, I was browsing your website and I'm interested in hiring your services.&subject=Hiring Inquiry" class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" style="transition: all 0.15s ease 0s;">
            <i class="fa fa-briefcase"></i> Hire Us
          </a>
          <?php if (isset($this->auth->uid)) : ?>
            <li>
              <?php if ($this->auth->user->type > 7) : ?>
                <button id="dropdownAdminButton" data-dropdown-toggle="dropdown-admin" class="w-full bg-pink-600 text-white active:bg-pink-400 text-xs font-bold uppercase px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" type="button">Account <i class="fa fa-angle-down"></i></button>
                <!-- Dropdown menu -->
                <div id="dropdown-admin" class="z-10 hidden bg-white divide-y divide-gray-900 rounded-lg shadow w-44 dark:bg-gray-700">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownAdminButton">
                    <a href="<?= BURL ?>management" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                      Products
                    </a>
                    <a href="<?= BURL ?>shortener" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                      Links
                    </a>
                    <a href="<?= BURL ?>management/users" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                      Users
                    </a>
                    <a href="<?= BURL ?>academy" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                      Academy
                    </a>
                    <a href="<?= BURL ?>logout" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                      Log out
                    </a>
                  </ul>
                </div>
              <?php else : ?>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="bg-pink-600 text-white active:bg-pink-400 text-xs font-bold uppercase px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" type="button">Account <i class="fa fa-angle-down"></i></button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-900 rounded-lg shadow w-44 dark:bg-gray-700">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <a href="<?= BURL ?>academy" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                      Academy
                    </a>
                    <a href="<?= BURL ?>logout" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                      Log out
                    </a>
                  </ul>
                </div>
            </li>
          <?php endif; ?>
        <?php else : ?>
          <a href="<?= BURL ?>login" class="bg-pink-600 text-white active:bg-pink-400 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" style="transition: all 0.15s ease 0s;">
            <i class="fa fa-user"></i> Login
          </a>
          </li>
        <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>