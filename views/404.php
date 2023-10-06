<main class="main">
    <section class="relative flex content-center w-full items-center justify-center h-20">
        <div class="absolute w-full h-full">
            <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
            <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
        </div>
    </section>

    <div class="error-content flex items-center justify-center h-96 bg-cover bg-center my-28" style="background-image: url(<?= BURL ?>assets/images/backgrounds/error-bg.jpg)">
        <div class="container text-center">
            <h1 class="text-5xl font-bold mb-4">Error 404</h1>
            <p class="text-xl mb-6">We are sorry, the page you've requested is not available.</p>
            <a href="<?= BURL ?>" class="bg-pink-600 text-white active:bg-gray-700 text-sm font-bold uppercase my-6 px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" style="transition: all 0.15s ease 0s;">
                <span>BACK TO HOMEPAGE</span>
                <i class="icon-long-arrow-right"></i>
            </a>
        </div>
    </div>

</main>