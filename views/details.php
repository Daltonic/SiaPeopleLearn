<main>
  <section class="relative flex content-center w-full items-center justify-center h-20">
    <div class="absolute w-full h-full">
      <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
      <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
    </div>
  </section>

  <section class="px-6 py-16 flex justify-center bg-gray-200">

    <div class="w-full md:w-3/4 lg:w-3/5 bg-white ">
      <img class="w-full" src="<?= $details['image'] ?>" alt="<?= $details['name'] ?>">
      <div class="p-6 flex flex-col space-y-2">
        <h2 class="text-2xl font-bold"><?= $details['name'] ?></h2>
        <div class="flex justify-start items-center space-x-2 text-sm text-purple-900 font-medium">
          <?php if ($details['category'] < 3) : ?>
            <button onclick="checkout(`<?= $details['id'] ?>`, `<?= $details['price'] ?>`, `<?= $details['name'] ?>`, `<?= $details['image'] ?>`)" class="text-white bg-pink-600 hover:bg-pink-700 rounded-lg text-sm px-2 py-1" href="<?= $details['link'] ?>">
              $<?= $details['price'] ?> Buy
            </button>
          <?php else : ?>
            <button onclick="checkout(`<?= $details['id'] ?>`, `<?= $details['price'] ?>`, `<?= $details['name'] ?>`, `<?= $details['image'] ?>`)" class="text-white bg-pink-600 hover:bg-pink-700 rounded-lg text-sm px-2 py-1" href="<?= $details['link'] ?>">
              $<?= $details['price'] ?> Book
            </button>
          <?php endif; ?>

          <?php if (isset($this->auth->uid)) : ?>
            <a href="<?= BURL ?>management/edit_product/<?= $details['slug'] ?>">Edit</a>
          <?php endif; ?>
        </div>
        <p><?= revertext($details['description']) ?></p>
      </div>
    </div>
  </section>
</main>