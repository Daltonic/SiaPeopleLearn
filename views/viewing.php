<main>
    <section class="relative flex content-center w-full items-center justify-center h-20">
        <div class="absolute w-full h-full">
            <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
            <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
        </div>
    </section>

    <div class="container flex flex-col md:flex-row justify-between items-start space-y-10 sm:space-y-0
    space-x-0 sm:space-x-10 mx-auto p-6 my-20">
        <div class="w-full sm:w-2/3">
            <video class='max-w-full' id="player" playsinline controls>
                <source src="<?= $lesson['video'] ?>" type="video/mp4" />
            </video>

            <div class="my-5">
                <h2 class="text-lg font-semibold"><?= $lesson['name'] ?></h2>
                <p class="text-gray-600 text-sm mb-4">Duration: <?= minutesToHumanReadableTime($lesson['duration']) ?></p>
                <p class="text-gray-600"><?= revertext($lesson['description']) ?></p>

                <div class="flex justify-start items-center space-x-4 mt-4">
                    <?php if ($lesson['is_fulfilled'] == 0) : ?>
                        <a href="<?= BURL ?>viewing/complete_lesson/<?= $lesson['product_id'] ?>/<?= $lesson['id'] ?>" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
					    rounded-lg text-sm px-5 py-2.5 text-center">Completed</a>
                    <?php endif; ?>
                    <a href="<?= BURL ?>lessons/<?= $lesson['product_id'] ?>" class="text-center bg-green-500 text-white py-2 px-4 rounded-lg">Back to Lesson</a>
                </div>
            </div>
        </div>

        <div class="w-full sm:w-1/3">
            <h1 class="p-3 text-3xl font-bold mb-4">Lessons</h1>
            <div class="p-3 h-[35rem] hover:bg-gray-200 transition duration-300 overflow-auto space-y-4">
                <?php while ($row = $lessons->fetch_assoc()) : ?>
                    <div class="flex flex-col justify-center items-start">
                        <a href="<?= BURL ?>viewing/lesson/<?= $row['product_id'] ?>/<?= $row['id'] ?>" class="relative w-full sm:w-64 overflow-hidden">
                            <img class="w-full object-contain" src="<?= $row['product_image'] ?>" alt="<?= $row['name'] ?>">
                            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-30 flex justify-center items-center">
                                <i class="fa fa-play text-white text-opacity-30 text-4xl"></i>
                            </div>
                        </a>
                        <h2 class="text-lg font-semibold"><?= $row['name'] ?></h2>
                        <p class="text-gray-600 text-sm">Duration: <?= minutesToHumanReadableTime($row['duration']) ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</main>