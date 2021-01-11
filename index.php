<?php include_once 'header.php' ?>



<?php 
$listArticles = listArticles();
echo '<pre>';
print_r($listArticles);
echo '</pre>';
?>



<?php include_once 'footer.php' ?>