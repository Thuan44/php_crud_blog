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
@$articleTitle = $_POST['article_title']; // @ prevents from error if $_POST does not exist
@$articleContent = $_POST['article_content'];
@$categoryId = $_POST['category_id'];

$listCategories = listCategories();
$getListArtById = getListArtById($categoryId);


// Call add function
if(isset($_POST['add'])) {
    setProduct($articleTitle, $articleContent, $categoryId); // Add a product to the database
}

// // Call modify function
// if(isset($_POST['modify'])) {
//     $idProduct = $_POST['article_id'];
//     $productModif = getArticleById($ArticleId);
//     $btn = true;
// }

// // Call save modification function
// if(isset($_POST['saveModif'])) {
//     $idProduct = $_POST['article_id'];
//     updateProduct($idProduct, $productName, $articleCOntent);
// }

// // Call delete function
// if(isset($_POST['delete'])){
//     $idProduct = $_POST['article_id'];
//     deleteProduct($idProduct);
// }

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
<p>The blog that will make you a more professional developer</p>


<!-- ADD / MODIFY PRODUCT -->
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

    <h3 class="p-2 m-2 text-center">Article management system</h3>
    <div class="divider"></div>

    <select class="custom-select mb-3" name="category_id" id="" required onChange="submit()">
        <option value="">Please select a category</option>
        <?php foreach($listCategories as $row): ?>

                <option 
                value="<?php echo $row['category_id']; ?>" 
                <?php if($row['category_id'] === @$_POST['category_id']){ echo "selected"; } // Display selected if id after post is the same as id ?>>
                    <?php echo $row['category_name']; ?>
                </option>
        
        <?php endforeach ?>
    </select>
    
            <input class="col-md-12 mb-2" type="text" name="article_title" value="<?= @$productModif['article_title'] ?>" placeholder="Title" required style="height: 45px">
            <textarea class="col-md-12 mb-2" name="article_content" id="" cols="30" rows="10" class="d-block" placeholder="Content of the article"></textarea>
            <?php // if(@$btn) { ?>
                <button button type="submit" name="Modify" value="Modify" class="btn btn-info">Modify <i class="far fa-save"></i></button>
            <?php // } else { ?>
                <button type="submit" name="add" class="btn btn-success">Add <i class="fas fa-plus-circle"></i></button>
            <?php // } ?>
            <input type="hidden" name="article_id" value="<?= $productModif['article_id'] ?>">
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
