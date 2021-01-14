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
        $_SESSION['user_id'] = $data['user_id']; 

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

// Form security 
function isEmail($var) {
    return filter_var($var, FILTER_VALIDATE_EMAIL); // Check if email is valid, returns a boolean
}

function verifyInput($var) {
    $var = trim($var); // Remove white spaces and line breaks
    $var = stripslashes($var); // Remove backslashes
    $var = htmlspecialchars($var);
    return $var;
}

// Create account
function signUp($userName, $userEmail, $userPassword) {
    global $connection;
    
    $query = "INSERT INTO users (user_name, user_email, user_password) VALUES (:userName, :userEmail, :userPassword)";
    $result = $connection->prepare($query);
    $result->execute(array( // This array protects from SQL injections
        ':userName' => $userName,
        ':userEmail' => $userEmail,
        ':userPassword' => $userPassword
    ));
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



# ADD / MODIFY / DELETE ARTICLE ======================
// Add an article to the database
function setArticle($articleTitle, $articleContent, $categoryId) {
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



# GET ALL ARTICLES ===================
function listArticles() {
    global $connection;

    $query = "SELECT * FROM articles 
            INNER JOIN categories ON articles.category_id = categories.category_id
            ORDER BY articles.category_id";

    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetchAll();
}


# COMMENTS ===================
// Add a comment to the database
function setComment($commentContent, $userId, $articleId) {
    global $connection;
    
    $query = "INSERT INTO comments (comment_content, user_id, article_id) VALUES (:commentContent, :userId, :articleId )";
    $result = $connection->prepare($query);
    $result->execute(array(
        ':commentContent' => $commentContent,
        ':userId' => $userId,
        ':articleId' => $articleId
    ));
}

// Get list of comments by article id (front-office)
function listComments($articleId) {
    global $connection;

    $query = "SELECT * FROM comments WHERE article_id = $articleId AND is_active = 1";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetchAll();
}

// Get list of comments by article id (back-office)
function listCommentsToValidate($articleId) {
    global $connection;

    $query = "SELECT * FROM comments WHERE article_id = $articleId";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetchAll();
}

// Get id of commentators
function commentatorsUserId($id) {
    global $connection;

    $query = "SELECT user_name
            FROM users
            INNER JOIN comments ON users.user_id = comments.user_id
            WHERE users.user_id = $id";
    
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetch();
}

// Delete comment
function deleteComment($commentId) {
    global $connection;

    $query = "DELETE FROM comments WHERE comment_id = $commentId";
    $result = $connection->prepare($query);
    $result->execute();
}