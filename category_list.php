<table class="table table-hover mt-3 mb-0">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>User</th>
        <th>Time</th>
        <th>Controls</th>
    </tr>

    <tbody>

        <?php
        foreach (showAllCategory() as $category) {
        ?>
            <tr class="<?php echo $category['ordering'] == 1 ? 'table-info' : '' ?>">
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['title']; ?></td>
                <td><?php echo user($category['user_id'])['name']; ?></td>
                <td><?php echo showTime($category['created_at']); ?></td>
                <td>
                    <a href="category_delete.php?id=<?php echo $category['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this category?')">
                        <i class="feather-trash-2"></i>
                    </a>

                    <a href="category_edit.php?id=<?php echo $category['id']; ?>" class="btn btn-outline-warning btn-sm">
                        <i class="feather-edit-2"></i>
                    </a>

                    <?php if ($category['ordering'] != 1) { ?>
                        <a href="pin_category.php?category_id=<?php echo $category['id']; ?>" class="btn btn-outline-info btn-sm">
                            <i class="feather-arrow-up"></i>
                        </a>
                    <?php } else { ?>
                        <a href="unpin_category.php?" class="btn btn-outline-info btn-sm">
                            <i class="feather-arrow-down"></i>
                        </a>
                    <?php } ?>

                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>


</table>