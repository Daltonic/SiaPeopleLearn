<main class="relative">
    <section class="relative flex content-center w-full items-center justify-center h-20">
        <div class="absolute w-full h-full">
            <img src="https://i.ibb.co/qg1fkQb/bg-only-3.png" class="relative top-0 w-full h-full bg-center object-cover object-center" alt="">
            <span id="blackOverlay" class="lg:w-fit w-fit h-full absolute opacity-25 bg-black"></span>
        </div>
    </section>

    <section class="py-10">
        <h1 class="text-3xl font-bold text-center">Users</h1>
        <hr class="w-48 h-1 mx-auto my-1 bg-gray-100 border-0 rounded md:my-1 dark:bg-gray-700 md:mb-3">

        <div class="relative max-h-96 overflow-auto shadow-md w-3/4 mx-auto mb-5">
            <div class="flex justify-start items-center">
                <input id="user-search" class="flex-1 border-0 rounded-lg px-4 py-2 outline-none focus:ring-0 focus:ring-blue-400 w-full" name="user" type="text" required placeholder="Search for users by name or emails">
            </div>
        </div>

        <div class="relative max-h-96 overflow-auto shadow-md w-3/4 mx-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-5 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Joined
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="user-table">
                    <?php $counter = 0 ?>
                    <?php while ($row = $users->fetch_assoc()) : ?>
                        <tr class="px-5 bg-white border-b dark:border-gray-300 font-medium text-black whitespace-nowrap">
                            <td scope="row" class="px-5 py-3">
                                <?= $counter + 1 ?>
                            </td>
                            <td>
                                <input type="checkbox" id="__<?= $counter ?>__">
                                <span>
                                    <?= $row['firstname'] ?> <?= $row['lastname'] ?>
                                </span>
                            </td>
                            <td>
                                <?= long_date($row['joined']) ?>
                            </td>
                            <td scope="row">

                                <?php if ($row['type'] == 9) : ?>
                                    Super User
                                <?php elseif ($row['type'] == 8) : ?>
                                    Admin
                                <?php else : ?>
                                    Member
                                <?php endif; ?>
                            </td>
                            <td id="email__<?= $counter ?>__">
                                <?= $row['email'] ?>
                            </td>
                            <td class="px-5 py-3">
                                <button id="user-<?= $row['uid'] ?>-dropdown" data-dropdown-toggle="user-<?= $row['uid'] ?>-dropdown-items" class="text-black active:text-gray-800 text-xs font-bold uppercase px-2 py-2 outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" type="button">
                                    <i class="fa fa-ellipsis-v text-black"></i>
                                </button>


                                <div id="user-<?= $row['uid'] ?>-dropdown-items" class="z-10 hidden bg-white divide-y divide-gray-900 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="user-<?= $row['uid'] ?>-dropdown">
                                        <?php if ($row['type'] == 0) : ?>
                                            <a href="<?= BURL ?>management/add_admin/<?= $row['uid'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Make Admin
                                            </a>
                                        <?php else : ?>
                                            <?php if ($row['type'] != 9) : ?>
                                                <a href="<?= BURL ?>management/remove_admin/<?= $row['uid'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Revoke Admin
                                                </a>
                                            <?php else : ?>
                                                <a href="javascript:void(0)" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Super User
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <a href="<?= BURL ?>management/subscribe_user_by_email/<?= $row['email'] ?>" class="block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Subscribe
                                        </a>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php $counter += 1 ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section id="writeBtns" class="hidden justify-center items-center py-2">
        <button id="write-message" class="inline-flex items-center px-4 py-2 mx-3 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-lg hover:bg-dark-900 hover:text-white">
            <i class="fas fa-book-open text-1xl m-1"></i>
            Write Messages
        </button>
        <button id="selection-all" class="inline-flex items-center px-4 py-2 mx-3 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-lg hover:bg-dark-900 hover:text-white">
            <i class="fas fa-plus text-1xl m-1"></i>
            Select All
        </button>
        <button id="clear-selections" class="inline-flex items-center px-4 py-2 mx-3 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-lg hover:bg-dark-900 hover:text-white">
            <i class="fas fa-minus text-1xl m-1"></i>
            Clear Selections
        </button>
    </section>

    <?php if ($transactions->num_rows > 0) : ?>
        <section class="py-10">
            <h1 class="text-3xl font-bold text-center">Transactions</h1>
            <hr class="w-48 h-1 mx-auto my-1 bg-gray-100 border-0 rounded md:my-1 dark:bg-gray-700 md:mb-3">

            <div class="relative max-h-96 overflow-auto shadow-md w-3/4 mx-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-5 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-5 py-3">
                                TID
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Type
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Expires
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Email
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 0 ?>
                        <?php while ($row = $transactions->fetch_assoc()) : ?>
                            <tr class="px-5 bg-white border-b dark:border-gray-300 font-medium text-black whitespace-nowrap">
                                <td scope="row" class="px-5 py-3">
                                    <?= $counter + 1 ?>
                                </td>
                                <td>
                                    <?= $row['tid'] ?>
                                </td>
                                <td>
                                    <?= $row['type'] == 0 ? 'One-Time' : 'Subscription' ?>
                                </td>
                                <td>
                                    <?= long_date($row['created_at']) ?>
                                </td>
                                <td>
                                    <?= $row['type'] == 1 ? long_date($row['expires_at']) : 'N/A' ?>
                                </td>
                                <td>
                                    <?= $row['email'] ?>
                                </td>
                            </tr>
                            <?php $counter += 1 ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>
</main>