<main>
    <section class="relative flex content-center w-full items-center justify-center h-20">
        <div class="absolute w-full h-full">
            <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
            <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
        </div>
    </section>

    <div class="container mx-auto p-6 flex flex-col items-stretch justify-center gap-2 sm:items-center my-10 space-y-3">
        <h4 class="capitalize text-4xl">Dapp Mentors Presents</h4>
        <h1 class="uppercase text-6xl font-bold">Dapp Mentors Academy</h1>
        <p>Your all-in-one resource and transition center for web3 developers!</p>

        <div class="flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 sm:space-x-8 mt-5">
            <img class="h-96 shadow-xl" src="<?= BURL ?>assets/academy.png" alt="DMA" />
            <div class="flex flex-col">
                <ul>
                    <li>✅ Currently running on promo price.</li>
                    <li>✅ Exclusive access to Dapp Mentors selected courses.</li>
                    <li>✅ Access to over 40hrs worth of web3 content.</li>
                    <li>✅ Extremely economical for all users.</li>
                    <li>✅ Access to our high valued courses.</li>
                    <li>✅ Aceess to course source codes.</li>
                    <li>✅ Uses a monthly subscription model.</li>
                    <li>✅ Provision for special discord channel.</li>
                    <li>✅ Automatic renewal.</li>
                    <li>✅ Cancel anytime.</li>
                </ul>
                <button onclick="subscribe('')" class=" bg-pink-600 text-white text-center active:bg-gray-700 text-sm font-bold uppercase my-6 px-20 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" style="transition: all 0.15s ease 0s;">
                    Available for $8.44 per month
                </button>
            </div>
        </div>

        <p class="mb-10 h-36 text-center">By purchasing this product, you agree to access it on our website using this same email address. <br>
            You can cancel your subscription at any time, but we do not process refunds. <br>
            <a class="text-pink-600 hover:text-pink-800" href="<?= BURL ?>/register">Sign up here</a> if you are new to Dapp Mentors.
        </p>
    </div>
</main>