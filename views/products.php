<main>
    <section class="relative flex content-center w-full items-center justify-center h-20">
        <div class="absolute w-full h-full">
            <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
            <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
        </div>
    </section>

    <section class="py-10">
        <h1 class="text-3xl font-bold text-center">Products</h1>
        <hr class="w-48 h-1 mx-auto my-1 bg-gray-100 border-0 rounded md:my-1 dark:bg-gray-700 md:mb-3">

        <div class="relative max-h-96 overflow-auto shadow-md w-3/4 mx-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-5 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="max-h-10 overflow-y-auto">
                    <?php while ($row = $products->fetch_assoc()) : ?>
                        <tr class="px-5 bg-white border-b dark:border-gray-300 font-medium text-black whitespace-nowrap">
                            <td scope="row" class="px-5 py-3">
                                <a class="hover:text-blue-500" href="<?= BURL ?>courses/details/<?= $row['slug'] ?>"><?= $row['name'] ?></a>
                            </td>
                            <td scope="row">

                                <?php if ($row['category'] == 1) : ?>
                                    Course
                                <?php elseif ($row['category'] == 2) : ?>
                                    Book
                                <?php elseif ($row['category'] == 3) : ?>
                                    Membership
                                <?php else : ?>
                                    Service
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-3">
                                <img class="h-16 w-16 object-cover object-top rounded-lg" src="<?= $row['image'] ?> " />
                            </td>
                            <td>
                                <?php if ($row['deleted'] == 1) : ?>
                                    <span class="text-red-600">Deleted</span>
                                <?php elseif ($row['published'] == 0) : ?>
                                    <span class="text-orange-600">Not Published</span>
                                <?php else : ?>
                                    <span class="text-green-600">Available</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                $<?= $row['price'] ?>
                            </td>
                            <td class="px-5 py-3">
                                <button id="product-<?= $row['id'] ?>-dropdown" data-dropdown-toggle="product-<?= $row['id'] ?>-dropdown-items" class="text-black active:text-gray-800 text-xs font-bold uppercase px-2 py-2 outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" type="button">
                                    <i class="fa fa-ellipsis-v text-black"></i>
                                </button>

                                <div id="product-<?= $row['id'] ?>-dropdown-items" class="z-10 hidden bg-white divide-y divide-gray-900 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="product-<?= $row['id'] ?>-dropdown">
                                        <a href="<?= BURL ?>lessons/<?= $row['id'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Lessons
                                        </a>
                                        <a href="<?= BURL ?>management/upload_asset/<?= $row['id'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Upload Assets
                                        </a>
                                        <?php if ($row['dma'] == 1) : ?>
                                            <a href="<?= BURL ?>management/rem_product_from_dma/<?= $row['id'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                DMA Remove
                                            </a>
                                        <?php else : ?>
                                            <a href="<?= BURL ?>management/add_product_to_dma/<?= $row['id'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                DMA Add
                                            </a>

                                            <?php if ($row['subscribers'] == 1) : ?>
                                                <a href="<?= BURL ?>management/rem_product_from_plus/<?= $row['id'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Remove from Plus
                                                </a>
                                            <?php else : ?>
                                                <a href="<?= BURL ?>management/add_product_to_plus/<?= $row['id'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Add to Plus
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <a href="<?= BURL ?>management/edit_product/<?= $row['slug'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Edit
                                        </a>
                                        <a href="<?= BURL ?>management/publish_product/<?= $row['slug'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <?= $row['published'] == 1 ? 'Unpublish' : 'Publish' ?>
                                        </a>
                                        <?php if ($row['deleted'] == 1) : ?>
                                            <a href="javascript: void(0)" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Undelete
                                            </a>
                                        <?php else : ?>
                                            <a href="<?= BURL ?>management/delete_product/<?= $row['slug'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Delete
                                            </a>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="flex justify-center items-center py-5">
        <a type="button" class="inline-flex items-center px-4 py-2 mx-3 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-lg hover:bg-dark-900 hover:text-white" href="<?= BURL ?>courses">
            <i class="fas fa-book-open text-1xl m-1"></i>
            Add New Produts
        </a>
    </section>
</main>