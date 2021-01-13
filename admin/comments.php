<?php include_once 'headerAdmin.php' ?>

<?php
@$categoryId = $_POST['category_id'];
@$articleId = $_POST['article_id'];

$listCategories = listCategories();
$listTitles = listTitles($categoryId);
$listComments = listComments($articleId);

// Call delete function
if(isset($_POST['delete'])){
    $commentId = @$_POST['comment_id'];
    deleteComment($commentId);
}

// @$productName = $_POST['product_name']; // @ prevents from error if $_POST does not exist
// @$productPrice = $_POST['product_price'];
// @$idCategory = $_POST['id_category'];

// // Call modify function
// if(isset($_POST['modify'])) {
//     $idProduct = $_POST['id_product'];
//     $productModif = getProductById($idProduct);
//     $btn = true;
// }

// // Call save modification function
// if(isset($_POST['saveModif'])) {
//     $idProduct = $_POST['id_product'];
//     updateProduct($idProduct, $productName, $productPrice);
// }


// $getListCatById = getListCatbyId($idCategory);
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

        <div class="add-product-line d-flex align-items-center justify-content-center">
                <input class="mr-2" type="text" name="product_name" value="<?= @$productModif['product_name'] ?>" placeholder="Search by user" style="height: 40px">
                <button type="submit" name="search" class="btn btn-warning">Search <i class="fas fa-search"></i></button>
        </div>

    </form>


    <hr>


    <!-- COMMENTS TABLE -->
    <table class="table text-center border">

        <tr class="table-warning text-uppercase">
            <th>Date</th>
            <th>User</th>
            <th>Comment</th>
            <th colspan="2">Actions</th> <!-- set 2 colums -->
        </tr>
        <?php foreach ($listComments as $comment) : ?>
            <tr>
                <td class="align-middle text-left"> 01/01/2021</td>
                <td class="align-middle text-left">
                    <?php $data = commentatorsUserId($comment['user_id']); echo $data['user_name']; ?>
                </td>
                <td class="align-middle text-left"><?= $comment['comment_content']; ?></td>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <td class="align-middle">
                        <button type="submit" name="respond" value="respond" class="btn btn-info btn-sm">Respond <i class="fas fa-reply"></i></button>
                    </td>
                    <td class="align-middle">
                        <button type="submit" name="delete" value="delete" class="btn btn-danger btn-sm">Delete <i class="far fa-trash-alt"></i></button>
                        <input type="hidden" name="comment_id" value="<?= @$comment['comment_id'] ?>">
                    </td>
                </form>
            </tr>
        <?php endforeach ?>

    </table>

</div>

<?php include_once 'footerAdmin.php' ?>