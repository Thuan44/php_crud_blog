<?php include_once 'headerAdmin.php' ?>

<?php 
if($_SESSION['user_role'] != 5) {
    header ('Location: ../login.php'); // Go back to login page if no session
    die();
}

@$articleTitle = htmlspecialchars($_POST['article_title']); // Protect from XSS attacks
@$articleContent = htmlspecialchars($_POST['article_content']);
@$categoryId = $_POST['category_id'];
@$articleId = $_POST['article_id'];

$listCategories = listCategories();


// Call add function
if(isset($_POST['add'])) {
    setProduct($articleTitle, $articleContent, $categoryId);
}

// Call modify function
if(isset($_POST['modify'])) {
    modifyArticle($articleId, $articleTitle, $articleContent);
    $btn = true;
}

// Call delete function
if(isset($_POST['delete'])){
    $articleId = $_POST['article_id'];
    deleteArticle($articleId);
}

// Display article title and content in inputs
if(isset($_POST['article_id'])) {
    $getArticleById = getArticleById($articleId);
}


$listTitles = listTitles($categoryId);
?>


<div class="container">

<!-- ADD / MODIFY PRODUCT -->
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

    <h3 class="p-2 m-2 text-center">Article Management System</h3>

        <!-- Category list -->
        <select class="custom-select mb-3" name="category_id" id="" required onChange="submit()">
            <option value="">Please select a category</option>
            <?php foreach($listCategories as $row): ?>

                <option 
                value="<?php echo $row['category_id']; ?>" 
                <?php if($row['category_id'] === @$_POST['category_id']){ echo "selected"; }?>>
                    <?php echo $row['category_name']; ?>
                </option>
            
            <?php endforeach ?>
        </select>

        <!-- Title list -->
        <small>Select an article only if you need to modify it</small>
        <select class="custom-select" name="article_id" id="" onChange="submit()">
            <option value="">Please select an article</option>
            <?php foreach($listTitles as $row): ?>

                <option 
                value="<?php echo $row['article_id'] ?>" 
                <?php if($row['article_id'] === @$_POST['article_id']){ echo "selected"; }?>>
                    <?php echo $row['article_title']; ?>
                </option>
            
            <?php endforeach ?>
        </select>
        
        <!-- Title input and Content input -->
        <input class="col-md-12 mb-3 mt-3" type="text" name="article_title" value="<?= @$getArticleById['article_title'] ?>" placeholder="Title" required style="height: 45px">
        <textarea class="col-md-12 mb-3" name="article_content" id="" cols="30" rows="10" class="d-block" placeholder="Content of the article"><?= @$getArticleById['article_content'] ?></textarea>

        <div class="actions text-center">
            <?php if(@$_POST['article_id']) { ?>
                <button button type="submit" name="modify" value="Modify" class="btn btn-info"><i class="far fa-save"></i> Save</button>
                <button type="submit" name="delete" class="btn btn-danger"><i class="fas fa-minus-circle"></i> Delete</button>
            <?php } else { ?>
                <button type="submit" name="add" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add</button>
            <?php } ?>
        </div>

    </div>

</form>


</div>

<?php include_once 'footerAdmin.php' ?>