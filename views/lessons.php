<main>
    <section class="relative flex content-center w-full items-center justify-center h-20">
        <div class="absolute w-full h-full">
            <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
            <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
        </div>
    </section>

    <div class="container flex flex-col md:flex-row justify-between items-start space-y-10 sm:space-y-0
    space-x-0 sm:space-x-10 mx-auto p-6 my-20">
        <div class="w-full sm:w-2/3 my-5">
            <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>" />
            <h2 class="text-xl font-semibold mt-2"><?= $row['name'] ?></h2>
            <p class="text-gray-600 text-sm mb-4">
                Duration: <?= minutesToHumanReadableTime($row['duration']) ?> |
                Lesson(s): <?= $lessons->num_rows ?>
            </p>
            <p class="text-gray-600">
                <?= truncate(revertext($row['description']), 200) ?>
                <a href="<?= BURL ?>courses/details/<?= $row['slug'] ?>">See more</a>
            </p>

            <div class="flex justify-start items-center space-x-4 mt-4">
                <?php if($row['url'] != ''): ?>
                    <a href="<?= BURL ?>downloads/download_asset/<?= $row['id'] ?>/<?= $row['slug'] ?>" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
				    rounded-lg text-sm px-5 py-2.5 text-center">
                        Download Assets
                    </a>
                <?php endif; ?>

                <?php if ($this->auth->user->type > 7) : ?>
                    <?php if ($row['category'] == 1) : ?>
                        <a href="<?= BURL ?>lessons/create/<?= $row['id'] ?>" class="text-center bg-green-500 text-white py-2 px-4 rounded-lg">Add Lesson</a>
                        <form action="<?= BURL ?>lessons/order_lesson/<?= $row['id'] ?>" method="post" id="orderForm" class="hidden">
                            <input type="hidden" name="orderString" id="orderString">
                            <button class="text-center bg-green-500 text-white py-2 px-4 rounded-lg">ReOrder</button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>

                <a href="<?= BURL ?>academy" class="text-white bg-gray-600 hover:bg-gray-700 font-medium
                rounded-lg text-sm px-5 py-2.5 text-center">
                    Back to Academy
                </a>
            </div>
        </div>

        <?php if ($lessons->num_rows > 0) : ?>
            <div class="w-full sm:w-1/3">
                <h1 class="p-3 text-3xl font-bold mb-4">Lessons</h1>
                <div class="p-3 h-[35rem] hover:bg-gray-200 transition duration-300 overflow-auto space-y-4 <?= $this->auth->user->type > 7 ? 'drag-sort-enable' : '' ?>">
                    <?php while ($row = $lessons->fetch_assoc()) : ?>
                        <div class="flex flex-col justify-center items-start transition duration-300
                        <?= $this->auth->user->type > 7 ? 'hover:bg-red-200 active:bg-red-400' : '' ?>" data-item-id="<?= $row['id'] ?>">
                            <a href="<?= BURL ?>viewing/lesson/<?= $row['product_id'] ?>/<?= $row['id'] ?>" class="relative w-full sm:w-64 overflow-hidden">
                                <img class="w-full object-contain" src="<?= $row['product_image'] ?>" alt="<?= $row['name'] ?>">
                                <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-30 flex justify-center items-center">
                                    <i class="fa fa-play text-white text-opacity-30 text-4xl"></i>
                                </div>
                            </a>

                            <h2 class="text-lg font-semibold"><?= $row['name'] ?></h2>

                            <div class="flex justify-between items-center space-x-4">
                                <p class="text-gray-600 text-sm">Duration: <?= minutesToHumanReadableTime($row['duration']) ?></p>
                                <?php if ($this->auth->user->type > 7) : ?>
                                    <div class="flex justify-start items-center space-x-2">
                                        <a href="<?= BURL ?>lessons/edit/<?= $row['product_id'] ?>/<?= $row['id'] ?>">
                                            <i class="fa fa-edit text-black text-md cursor-pointer"></i>
                                        </a>

                                        <form method="post" action="<?= BURL ?>lessons/delete_lesson/<?= $row['product_id'] ?>/<?= $row['id'] ?>" class="flex justify-center items-center">
                                            <input type="hidden" value="<?= $row['duration'] ?>" name="duration">
                                            <button type="submit">
                                                <i class="fa fa-trash text-red-600 text-md cursor-pointer"></i>
                                            </button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>