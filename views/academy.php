<main>
    <section class="relative flex content-center w-full items-center justify-center h-20">
        <div class="absolute w-full h-full">
            <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
            <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
        </div>
    </section>

    <section class="container mx-auto p-6 flex flex-col items-stretch justify-center gap-2 sm:items-center">
        <div class="flex rounded-xl bg-gray-100 p-1 text-gray-900 dark:bg-gray-900">
            <div class="flex w-full list-none gap-1">
                <!-- DMA Button with Pop-up -->
                <div class="relative group w-1/2">
                    <button type="button" class="w-full cursor-pointer">
                        <div class="flex w-full items-center justify-center gap-1 rounded-lg border py-3
                        outline-none transition-opacity duration-100 sm:w-auto sm:min-w-[148px] md:gap-2
                        md:py-2.5 border-black/10 hover:!opacity-100 px-2.5
                        <?= $subscriptions->num_rows > 0 ? 'text-gray-500 hover:text-white' : 'bg-pink-600 text-white' ?>">
                            <i class="fas fa-user-lock"></i>
                            <span class="truncate text-sm font-medium md:pr-1.5 pr-1.5">DMA</span>
                        </div>
                    </button>
                    <!-- Pop-up -->
                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-black text-white py-2 px-4 rounded-lg text-sm w-max">
                        You are on free membership
                    </div>
                </div>

                <!-- DMA Plus Button with Pop-up -->
                <div class="relative group w-1/2">
                    <button <?= $subscriptions->num_rows > 0 ? 'disabled' : '' ?> onclick="subscribe(`<?= $email ?>`)" type="button" class="w-full cursor-pointer">
                        <div class="flex w-full items-center justify-center gap-1 rounded-lg border py-3
                        outline-none transition-opacity duration-100 sm:w-auto sm:min-w-[148px]
                        md:py-2.5 border-transparent px-2.5
                        <?= $subscriptions->num_rows > 0 ? 'bg-pink-600 text-white' : 'text-gray-500 hover:text-white' ?>">
                            <i class="fas fa-dollar-sign <?= $subscriptions->num_rows > 0 ? '' : 'text-green-700' ?>"></i>
                            <span class="truncate text-sm font-medium md:pr-1.5 pr-1.5">8.44 DMA Plus</span>
                        </div>
                    </button>
                    <!-- Pop-up -->
                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-black text-white py-2 px-4 rounded-lg text-sm w-max">
                        <?php if ($subscriptions->num_rows > 0) : ?>
                            Current subscription ends on <?= long_date($subscriptions->fetch_assoc()['expires_at']) ?>
                        <?php else : ?>
                            Subscribe to access Dapp Mentors Academy Plus Resources
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="container mx-auto p-6 mb-20">
        <h1 class="text-3xl font-bold mb-4"><?= $products->num_rows > 0 ? 'Academy Products' : 'No Items Yet' ?></h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php while ($row = $products->fetch_assoc()) : ?>

                <div class="max-w-sm bg-white rounded-lg overflow-hidden shadow-md shadow-gray-300 mt-2 mb-2
                mx-2 dark:bg-white-800 dark:border-gray-900 text-gray-900 min-h-fit justify-between relative">
                    <?php if ($subscriptions->num_rows < 1 && $row['subscribers'] == 1) : ?>
                        <div class="absolute inset-0 bg-white opacity-50"></div>
                    <?php endif; ?>

                    <a href="<?= BURL . 'lessons/' . $row['id']  ?>">
                        <img class="w-full h-48 object-cover" src="<?= $row['image'] ?>" alt="product image" />
                    </a>
                    <div class="flex flex-col px-5 pb-5">
                        <h5 class="text-lg font-semibold mt-3 <?= $row['category'] != 1 ? 'mb-3' : '' ?>"><?= $row['name'] ?></h5>
                        <?php if ($row['category'] == 1) : ?>
                            <span class="text-gray-600 font-semibold text-sm mb-3"><?= $row['lessons'] ?> Lessons</span>
                        <?php endif; ?>
                        <p class="pb-2">
                            <?= substr(sanitize_text(revertext($row['description'])), 0, 100)
                                .
                                (strlen(sanitize_text(revertext($row['description']))) > 50 ?
                                    "..." : "") ?>
                        </p>
                        <div class="flex justify-start items-center text-sm font-semibold text-gray-600 space-x-4">
                            <span><i class="fa fa-user"></i> <?= $row['instructor'] ?></span>
                            <?php if ($row['category'] == 1) : ?>
                                <span><i class="fa fa-clock"></i> <?= minutesToHumanReadableTime($row['duration']) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center py-2 justify-between">
                            <?php if ($row['subscribers'] == 0) : ?>
                                <span class="text-2xl font-bold text-gray-900">
                                    DMA
                                    <i class="fas fa-user-lock text-xs"></i>
                                </span>
                            <?php else : ?>
                                <span class="text-2xl font-bold text-green-700">
                                    PLUS
                                    <i class="fas fa-dollar-sign text-xs"></i>
                                </span>
                            <?php endif; ?>

                            <?php if ($row['category'] == 1) : ?>
                                <?php if ($row['dma'] == 1) : ?>
                                    <a href="<?= BURL ?>lessons/<?= $row['id'] ?>" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
								    rounded-lg text-sm px-5 py-2.5 text-center">
                                        Watch Free
                                    </a>
                                <?php else : ?>
                                    <a href="<?= BURL ?>lessons/<?= $row['id'] ?>" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
								    rounded-lg text-sm px-5 py-2.5 text-center">
                                        Watch Now
                                    </a>
                                <?php endif; ?>
                            <?php else : ?>
                                <a href="<?= BURL ?>downloads/download_asset/<?= $row['id'] ?>/<?= $row['slug'] ?>" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
								    rounded-lg text-sm px-5 py-2.5 text-center">
                                    Download
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="container mx-auto p-6 mb-20">
        <h1 class="text-3xl font-bold mb-4"><?= $purchases->num_rows > 0 ? 'Your Purchase' : 'No Purchase Yet' ?></h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php while ($row = $purchases->fetch_assoc()) : ?>
                <div class="max-w-sm bg-white rounded-lg overflow-hidden shadow-md shadow-gray-300 mt-2 mb-2 mx-2 dark:bg-white-800 dark:border-gray-900 text-gray-900 min-h-fit justify-between">
                    <a href="<?= BURL . 'lessons/' . $row['id']  ?>">
                        <img class="w-full h-48 object-cover" src="<?= $row['image'] ?>" alt="product image" />
                    </a>
                    <div class="flex flex-col px-5 pb-5">
                        <h5 class="text-lg font-semibold mt-3 <?= $row['category'] != 1 ? 'mb-3' : '' ?>"><?= $row['name'] ?></h5>
                        <?php if ($row['category'] == 1) : ?>
                            <span class="text-gray-600 font-semibold text-sm mb-3"><?= $row['lessons'] ?> Lessons</span>
                        <?php endif; ?>
                        <p class="pb-2">
                            <?= substr(sanitize_text(revertext($row['description'])), 0, 100)
                                .
                                (strlen(sanitize_text(revertext($row['description']))) > 50 ?
                                    "..." : "") ?>
                        </p>
                        <div class="flex justify-start items-center text-sm font-semibold text-gray-600 space-x-4">
                            <span><i class="fa fa-user"></i> <?= $row['instructor'] ?></span>
                            <?php if ($row['category'] == 1) : ?>
                                <span><i class="fa fa-clock"></i> <?= minutesToHumanReadableTime($row['duration']) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center py-2 justify-between">
                            <span class="text-2xl font-bold text-gray-900">
                                DM
                                <i class="fas fa-user-lock text-xs"></i>
                            </span>
                            <?php if ($row['category'] == 1) : ?>
                                <a href="<?= BURL ?>lessons/<?= $row['id'] ?>" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
								rounded-lg text-sm px-5 py-2.5 text-center">
                                    Watch Now
                                </a>
                            <?php else : ?>
                                <a href="<?= BURL ?>downloads/download_asset/<?= $row['id'] ?>/<?= $row['slug'] ?>" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
								rounded-lg text-sm px-5 py-2.5 text-center">
                                    Download
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>