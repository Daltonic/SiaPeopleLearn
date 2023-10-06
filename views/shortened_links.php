<main>
    <section class="relative flex content-center w-full items-center justify-center h-20">
        <div class="absolute w-full h-full">
            <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
            <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
        </div>
    </section>

    <section class="py-10">
        <h1 class="text-3xl font-bold text-center">Shortened Links</h1>
        <hr class="w-48 h-1 mx-auto my-1 bg-gray-100 border-0 rounded md:my-1 dark:bg-gray-700 md:mb-3">

        <div class="relative max-h-96 overflow-auto shadow-md w-3/4 mx-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-5 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Short Link
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Created
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Views
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $links->fetch_assoc()) : ?>
                        <tr class="px-5 bg-white border-b dark:border-gray-300 font-medium text-black whitespace-nowrap">
                            <td scope="row" class="px-5 py-3">
                                <a class="hover:text-blue-500" target="_blank" href="<?= BURL . 'links/' . $row['short_code'] ?>">
                                    <?= $row['name'] ?>
                                </a>
                            </td>
                            <td class="px-5 py-3">
                                <a class="hover:text-blue-500" target="_blank" href="<?= $row['url'] ?>">
                                    <?= truncate_url(BURL . 'links/' . $row['short_code']) ?>
                                </a>
                            </td>
                            <td>
                                <?= convert_date_format($row['created_at']) ?>
                            </td>
                            <td>
                                <?= $row['viewers'] ?>
                            </td>
                            <td class="px-5 py-3">
                                <?php if ($row['deleted'] == 1) : ?>
                                    <a href="javascript: void(0)" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-bold rounded-full">
                                        Undelete
                                    </a>
                                <?php else : ?>
                                    <div class="flex justify-start items-center space-x-2">
                                        <a href="<?= BURL ?>shortener/edit_link/<?= $row['id'] ?>" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-bold rounded-full">
                                            Edit
                                        </a>
                                        <a href="<?= BURL ?>shortener/delete_link/<?= $row['id'] ?>" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-bold rounded-full">
                                            Delete
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="flex justify-center items-center py-5">
        <a type="button" class="inline-flex items-center px-4 py-2 mx-3 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-lg hover:bg-dark-900 hover:text-white" href="<?= BURL ?>shortener/link">
            <i class="fas fa-book-open text-1xl m-1"></i>
            Add New Link
        </a>
    </section>
</main>