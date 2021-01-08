<?php

//  Get the list of categories
function listCategories() {
    global $connection;

    $query = "SELECT * FROM categories ORDER BY category_name"; // Stock SQL Statement
    $result = $connection->prepare($query); // Search for PDO and prepare the Statement
    $result->execute(); // Execute
    return $result->fetchAll();
}
 
// Add an article to the database
function setProduct($articleTitle, $articleContent, $categoryId) {
    global $connection;

    $query = "INSERT INTO articles (article_title, article_content, category_id) VALUES ('$articleTitle', '$articleContent', $categoryId)";
    $result = $connection->prepare($query);
    $result->execute();
}

// Get list of category by id
function getListArtById($categoryId) {
    global $connection;

    $query = "SELECT * FROM articles WHERE category_id = $categoryId ORDER BY article_title";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetchAll();
}

// Get article by id
function getArticleById($articleId) {
    global $connection;

    $query = "SELECT * FROM articles WHERE article_id = $articleId";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetch();
}

// // Delete product
// function deleteProduct($idProduct) {
//     global $connection;

//     $query = "DELETE FROM products WHERE id_product = $idProduct";
//     $result = $connection->prepare($query);
//     $result->execute();
// }


// // Update Product
// function updateProduct($idProduct, $productName, $productPrice) {
//     global $connection;

//     $query = 
//         "UPDATE products 
//         SET product_name = '$productName', product_price = $productPrice 
//         WHERE id_product = $idProduct";
//     $result = $connection->prepare($query);
//     $result->execute();

// }