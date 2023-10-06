<main>
    <section class="relative flex content-center w-full items-center justify-center h-20">
        <div class="absolute w-full h-full">
            <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
            <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
        </div>
    </section>

    <div class="container flex flex-col md:flex-row justify-between items-start space-x-10 mx-auto p-6 my-20">
        <div>
            <video id="player" playsinline controls --plyr-color-main="#ca1566">
                <source src="https://pixeldrain.com/api/file/Ns6zbmXu" type="video/mp4" />
            </video>

            <div class="w-full sm:w-2/3 my-5">
                <h2 class="text-lg font-semibold mb-2">Course Title</h2>
                <p class="text-gray-600">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Ceatae ea, sit eius vitae labore velit a nostrum est.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    <br><br>
                    Ea, sit eius vitae labore velit a nostrum est.
                    St amet consectetur adipisicing elit.
                    Ius vitae labore velit a nostrum est.
                </p>
                <p class="text-gray-600 font-semibold mb-4">Duration: 10 minutes</p>
                <div class="flex justify-start items-center space-x-4">
                    <a href="#" class="text-white bg-pink-600 hover:bg-pink-700 font-medium
								rounded-lg text-sm px-5 py-2.5 text-center">Enroll</a>
                    <a href="#" class="text-center bg-blue-500 text-white py-2 px-4 rounded-lg">Watch Course</a>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <h1 class="text-3xl font-bold mb-4">Lessons</h1>
            <div class="h-[35rem] overflow-auto space-y-4">
                <?php $count = 1; ?>
                <?php while ($count <= 6) : ?>
                    <div class="bg-white flex justify-between items-start space-x-4">
                        <div>
                            <h2 class="text-lg font-semibold mb-2">Lesson <?= $count ?>: Introduction</h2>
                            <p class="text-gray-600">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Totam beatae ea, sit eius vitae labore velit a nostrum est.
                            </p>
                            <p class="text-gray-600 font-semibold mb-4">Duration: 10 minutes</p>
                            <a href="#" class="text-center bg-blue-500 text-white py-2 px-4 rounded-lg">Watch Video</a>
                        </div>
                        <iframe class='sproutvideo-player' src='https://videos.sproutvideo.com/embed/a79fdab4181ce0c42e/e624a7c6fab442d7' width='300' height='160' frameborder='0' title='Video Player'></iframe>
                    </div>
                    <?php $count += 1; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</main>