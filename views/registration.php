<main>
  <section class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 20vh;">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style='background-image: url("https://i.ibb.co/qg1fkQb/bg-only-3.png");'>
      <span id="blackOverlay" class="w-full h-full absolute opacity-25 bg-black"></span>
    </div>
    <div class="w-full lg:w-4/12 my-6 px-4">
      <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
        <div class="rounded-t mb-0 px-6 py-6">
          <div class="text-center mb-3">
            <h6 class="text-gray-600 text-sm font-bold">
              Sign Up
            </h6>
          </div>
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
          <form method="post" action="<?=BURL ?>authentication/action" enctype="multipart/form-data">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Firstname</label><input type="text" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Firstname" name="firstname" style="transition: all 0.15s ease 0s;" />
            </div>
            <div class="relative w-full mb-3">
              <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Lastname</label><input type="text" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Lastname" name="lastname" style="transition: all 0.15s ease 0s;" />
            </div>
            <div>
            <div class="relative w-full mb-3">
              <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Email</label><input type="email" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Email" name="email" style="transition: all 0.15s ease 0s;" />
            </div>
            <div class="relative w-full mb-3">
              <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Password</label><input type="password" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Password" name="password" style="transition: all 0.15s ease 0s;" />
            </div>
            <div class="relative w-full mb-3">
              <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Comfirm Password</label><input type="password" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Comfirm Password" name="cpassword" style="transition: all 0.15s ease 0s;" />
            </div>
            <div>
              <label class="inline-flex items-center cursor-pointer"><input id="customCheckLogin" type="checkbox" class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5" style="transition: all 0.15s ease 0s;" /><span class="ml-2 text-sm font-semibold text-gray-700">Remember me</span></label>
            </div>
            <div class="text-center mt-6">
              <button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full" type="submit" name="<?= $this->token?>">Sign Up</button>
            </div>
            <a href="<?=BURL?>login" class="text-gray-900">Already have an Account? <b>Login</b></a>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>