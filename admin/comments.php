<?php include_once 'headerAdmin.php' ?>

<?php
@$categoryId = $_POST['category_id'];
@$articleId = $_POST['article_id'];


// Call delete function
if(isset($_POST['delete'])){
    $commentId = @$_POST['comment_id'];
    deleteComment($commentId);
}

// Call validate function
if(isset($_POST['validate'])){
    $commentId = @$_POST['comment_id'];
    validateComment($commentId);
}

// Call invalidate function
if(isset($_POST['invalidate'])){
    $commentId = @$_POST['comment_id'];
    invalidateComment($commentId);
}

$listCategories = listCategories();
$listTitles = listTitles($categoryId);
$listCommentsToValidate = listCommentsToValidate($articleId);

?>


<div class="container">


    <!-- CHOOSE CATEGORY / SEARCH USER -->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        <h3 class="p-2 m-2 text-center">Comments Management System</h3>

        <!-- Category list -->
        <select class="custom-select mb-3" name="category_id" id="" required onChange="submit()">
            <option value="">Please select a category</option>
            <?php foreach ($listCategories as $row) : ?>

                <option value="<?php echo $row['category_id']; ?>" <?php if ($row['category_id'] === @$_POST['category_id']) { echo "selected"; } ?>>
                    <?php echo $row['category_name']; ?>
                </option>

            <?php endforeach ?>
        </select>

        <!-- Title list -->
        <select class="custom-select" name="article_id" id="" onChange="submit()">
            <option value="">Please select an article</option>
            <?php foreach ($listTitles as $row) : ?>

                <option value="<?php echo $row['article_id'] ?>" 
                <?php if ($row['article_id'] === @$_POST['article_id']) { echo "selected"; } ?>>
                        <?php echo $row['article_title']; ?>
                </option>

            <?php endforeach ?>
        </select>
        
        <div class="or d-flex align-items-center justify-content-center">
            <div class="double-divider"></div>
            <span class="m-2">or</span>
            <div class="double-divider"></div>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="add-product-line d-flex align-items-center justify-content-center">
                    <input class="mr-2" type="text" name="search-user" id="search-user" placeholder="Search by user...">
                    <button type="submit" name="search" value="search" class="btn btn-warning btn-sm">Search <i class="fas fa-search"></i></button>
            </div>
        </form>

    </form>


    <hr>


    <!-- COMMENTS TABLE -->
    <table class="table text-center border">

        <tr class="table-warning text-uppercase">
            <th>Date</th>
            <th>User</th>
            <th>Comment</th>
            <th>Is Valid</th>
            <th colspan="4">Actions</th> <!-- set 2 colums -->
        </tr>
        <?php foreach ($listCommentsToValidate as $comment) : ?>
            <tr>
                <td class="align-middle text-center font-italic"> 01/01/2021</td>
                <td class="align-middle text-center">
                    <?php $data = commentatorsUserId($comment['user_id']); echo "<strong>" . $data['user_name'] . "</strong>"; ?>
                </td>
                <td class="align-middle text-left"><?= $comment['comment_content']; ?></td>
                <td class="align-middle text-center">
                    <?php if($comment['is_active']){
                        echo '<span class="text-success"><i class="fas fa-check"></i></span>' . " YES";
                    } else {
                        echo '<span class="text-danger"><i class="fas fa-times"></i></span>' . " NO";
                    }?>
                </td>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <td class="align-middle">
                        <button type="submit" name="validate" value="validate" class="btn btn-primary btn-sm">Validate <i class="far fa-thumbs-up"></i></button>
                    </td>
                    <td class="align-middle">
                        <button type="submit" name="invalidate" value="invalidate" class="btn btn-secondary btn-sm">Invalidate <i class="far fa-thumbs-down"></i></button>
                    </td>
                    <td class="align-middle">
                        <button type="submit" name="respond" value="respond" class="btn btn-info btn-sm">Respond <i class="fas fa-reply"></i></button>
                    </td>
                    <td class="align-middle">
                        <button type="submit" name="delete" value="delete" class="btn btn-danger btn-sm">Delete <i class="far fa-trash-alt"></i></button>
                    </td>
                    <input type="hidden" name="comment_id" value="<?= @$comment['comment_id'] ?>">
                    <input type="hidden" name="article_id" value="<?= @$_POST['article_id'] ?>">
                    <input type="hidden" name="category_id" value="<?= @$_POST['category_id'] ?>">
                </form>
            </tr>
        <?php endforeach ?>

    </table>

</div>

<?php include_once 'footerAdmin.php' ?>