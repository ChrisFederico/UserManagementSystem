<main class="flex-shrink-0">
    <div class="container">
        <div class="mb-5">&nbsp;</div>
        <h1 class="mt-5">User Management System</h1>
        <div class="mt-5">
            <?php
                switch(getParam('action')) {
                    case 'insert':
                        include 'pages/insertUser.php'; break;

                    default:
                        $orderBy = getParam('orderBy', 'id');
                        $orderDir = getParam('orderDir', 'DESC');
                        $limit = getParam('recordsPerPage', 10);
                        $searchUser = getParam('searchUser', '');

                        $params = array(
                            'orderBy' => $orderBy,
                            'orderDir' => $orderDir,
                            'searchUser' => $searchUser
                        );

                        $users = selectUsers($conn, $params, $limit);

                        include 'pages/usersList.php';
                }
            ?>
        </div>
    </div>
</main>