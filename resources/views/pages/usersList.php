<?php
    $orderClass = $orderDir;
    $orderDir = ($orderDir === 'ASC')? 'DESC' : 'ASC';
?>

<table class="table table-striped table-hover table-responsive">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th class="<?=($orderBy === 'username')? $orderClass : ''?>" scope="col"><a href="<?="$page?orderBy=username&orderDir=$orderDir&recordsPerPage=$limit"?>">Username</a></th>
        <th class="<?=($orderBy === 'email')? $orderClass : ''?>" scope="col"><a href="<?="$page?orderBy=email&orderDir=$orderDir&recordsPerPage=$limit"?>">Email</a></th>
        <th class="<?=($orderBy === 'code')? $orderClass : ''?>" scope="col"><a href="<?="$page?orderBy=code&orderDir=$orderDir&recordsPerPage=$limit"?>">Code</a></th>
        <th class="<?=($orderBy === 'age')? $orderClass : ''?>" scope="col"><a href="<?="$page?orderBy=age&orderDir=$orderDir&recordsPerPage=$limit"?>">Age</a></th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $index = 1;
            foreach($users as $user) {
            $row = "<tr>
                                    <td scope='col'>$index</td>
                                    <td scope='col'>{$user['username']}</td>
                                    <td scope='col'>{$user['email']}</td>
                                    <td scope='col'>{$user['code']}</td>
                                    <td scope='col'>{$user['age']}</td>
                                    <td scope='col'></td>
                                </tr>";

            echo $row;
            $index++;
        }
    ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"><?php require 'pagination.php'; ?></td>
        </tr>
    </tfoot>
</table>
