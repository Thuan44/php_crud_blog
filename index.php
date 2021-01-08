<?php include_once 'header.php' ?>

<?php 
# Blog 

/*

Entrer des articles liés à la catégorie

- Catégorie : liste
- Titre : input text
- Article : textarea
--> CRUD complet

- Upload img
- Droits 
- Sécurité
- Date

*/

?>


<?php 
@$articleTitle = $_POST['article_title'];
@$articleContent = $_POST['article_content'];
@$categoryId = $_POST['category_id'];
@$articleId = $_POST['article_id'];

$listCategories = listCategories();

// if(isset($_POST['article_title'])) {
//     echo $_POST['article_title'];
// }

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


<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Articles</a>
      </li>
    </ul>
  </div>
</nav>


<div class="container">

<h1 class="rounded border p-2 m-4 text-center text-white bg-primary">BECOME A DEV</h1>
<p class="text-center font-italic">The blog that will make you become a more professional developer</p>


<!-- ADD / MODIFY PRODUCT -->
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

    <h3 class="p-2 m-2 text-center">Article Management System</h3>
    <div class="divider"></div>

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


<hr>















<!-- PRODUCT LIST -->

<!-- <table class="table text-center border">

    <tr class="table-primary text-uppercase">
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Category ID</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php foreach($getListCatById as $row): ?>
    <tr>
    Artd class="align-middle text-left"> <?= $row['article_title']; ?> </d>
        <td class="align-middle"><?= $row['product_price']; ?>€</td>
        <td class="align-middle"><?= $row['article_id']; ?></td>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <td class="align-middle">
                <button type="submit" name="modify" value="modify" class="btn btn-info">Modify <i class="fas fa-hammer"></i></button>
            </td>
            <td class="align-middle">
                <button type="submit" name="delete" value="delete" class="btn btn-danger">Delete <i class="far fa-trash-alt"></i></button>
                <input type="hidden" name="article_id" value="<?= $row['article_id'] // A hidden input is necessary to get the product id?>">
                <input type="hidden" name="category_id" value="<?= $row['category_id'] ?>">
            </td>
        </form>
    </tr>
    <?php endforeach ?>

</table> -->


</div>

<?php include_once 'footer.php' ?>