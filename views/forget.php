<main>
  <section class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 20vh;">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style='background-image: url("https://i.ibb.co/qg1fkQb/bg-only-3.png");'>
      <span id="blackOverlay" class="w-full h-full absolute opacity-25 bg-black"></span>
    </div>

    <div class="w-full lg:w-4/12 my-6 px-4">
      <div class="relative min-w-0 break-words w-full shadow-lg rounded-lg bg-gray-100 flex flex-col lg:flex-row items-center justify-center">
        <div class="w-full z-10">
          <div class="rounded-t mb-0 px-6 py-6">
            <div class="text-center mb-3">
              <?= $this->alert->get() ?>
            </div>
          </div>
          <input type="hidden" id="burl" value="<?= BURL ?>">
          <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <form method="post" action="<?= BURL ?>authentication/send_pin">
              <div class="relative w-full mb-3">
                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Email</label><input require type="email" name="email" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Email" style="transition: all 0.15s ease 0s;" />
              </div>
              <div class="text-center mt-6">
                <button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full" type="submit" name="<?= $this->token ?>">Sign In</button>
              </div>
              <div class="flex justify-between items-center flex-wrap">
                <a href="<?= BURL ?>login" class="text-gray-900"><small>Login to your existing account</small></a>
                <a href="<?= BURL ?>register" class="text-gray-900"><small>Create Account</small></a>
              </div>
            </form>
          </div>
        </div>

        <div class="absolute inset-0 bg-cover bg-center pointer-events-none" style="background-image: url('<?= BURL ?>assets/bg.png'); opacity: 0.25;"></div>
      </div>
    </div>
  </section>
</main>