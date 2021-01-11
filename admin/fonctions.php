<?php
session_start();

# LOGIN  ======================
function login($userEmail, $userPassword) {
    global $connection;

    $query = "SELECT * FROM users WHERE user_email = '$userEmail' AND user_password = '$userPassword' LIMIT 1";
    $result = $connection->prepare($query);
    $result->execute();
    $data = $result->fetch();

    if($data){
        $_SESSION['user_name'] = $data['user_name']; 
        $_SESSION['user_email'] = $data['user_email']; 
        $_SESSION['user_password'] = $data['user_password']; 
        $_SESSION['user_role'] = $data['user_role']; 

        // Admin
        if( $_SESSION['user_role'] == 5) {
            header ('Location: admin/index.php'); // Redirect to new page
        } 
        // Visitor
        if($_SESSION['user_role'] == 1) {
            header ('Location: index.php');
        }
    } else {
        session_destroy();
        // header ('Location: login.php'); // Reload page
    }
}

# DROP LISTS ======================
//  Get the list of categories
function listCategories() {
    global $connection;

    $query = "SELECT * FROM categories ORDER BY category_name"; // Stock SQL Statement
    $result = $connection->prepare($query); // Search for PDO and prepare the Statement
    $result->execute(); // Execute
    return $result->fetchAll();
}
 
// Get list of titles
function listTitles($categoryId) {
    global $connection;

    $query = "SELECT * FROM articles WHERE category_id = $categoryId ORDER BY article_title";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetchAll();
}



# ADD / MODIFY / DELETE ======================
// Add an article to the database
function setProduct($articleTitle, $articleContent, $categoryId) {
    global $connection;
    
    $query = "INSERT INTO articles (article_title, article_content, category_id) VALUES (:articleTitle, :articleContent, :categoryId)";
    $result = $connection->prepare($query);
    $result->execute(array( // This array protects from SQL injections
        ':articleTitle' => $articleTitle,
        ':articleContent' => $articleContent,
        ':categoryId' => $categoryId
    ));
}

// Get article by id (and display values in inputs)
function getArticleById($articleId) {
    global $connection;
    
    $query = "SELECT * FROM articles WHERE article_id = $articleId";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetch();
}

// Update article
function modifyArticle($articleId, $articleTitle, $articleContent) {
    global $connection;

    $query = 
        "UPDATE articles 
        SET article_title = :articleTitle, article_content = :articleContent 
        WHERE article_id = :articleId";
    $result = $connection->prepare($query);
    $result->execute(array( // This array protects from SQL injections
        ':articleId' => $articleId,
        ':articleTitle' => $articleTitle,
        ':articleContent' => $articleContent
    ));
}

// Delete product
function deleteArticle($articleId) {
    global $connection;

    $query = "DELETE FROM articles WHERE article_id = $articleId";
    $result = $connection->prepare($query);
    $result->execute();
}
