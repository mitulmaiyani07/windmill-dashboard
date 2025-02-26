<?php
$title = "View All";
require('../header.php');

?>
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            View All Categories
        </h2>

        <!-- With actions -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3">Category_Name</th>
                            <th class="px-4 py-3">Created_at</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                       
                        <?php
                           $query = "SELECT id,cat_name,cat_image,created_at from movie_category ORDER BY id DESC";

                           if ($result = $conn->query($query)) {
                              $i = 0;
                              // fetch associative array //
                              while ($row = $result->fetch_assoc()) {
                                 $i++;
                           ?>

                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                       <?php
                                       if ($row['cat_image'] == "")
                                          echo "-";
                                       else { ?>
                                          <img height="150" width="120" src=" <?php echo $row['cat_image']; ?>">
                                       <?php
                                       }
                                       ?>
                                    </td>
                                    <td><?php echo $row['cat_name']; ?></td>
                                    <td><?php echo date('d-M-Y h:i
                                    A', strtotime($row['created_at'])); ?></td>
                                    <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="edit.php?id=<?php echo $row['id']  ?>"><button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id']  ?>"><button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                                 </tr>
                           <?php
                              }
                              $result->free();
                           }
                           ?>
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</main>
<?php require('../footer.php'); ?>