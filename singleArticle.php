<?php include_once 'header.php' ?>


<?php
@$commentContent = htmlspecialchars($_POST['comment_content']);
@$userId = "";
if (isset($_SESSION['user_id'])) {
    @$userId = $_SESSION['user_id'];
}

// Get article id from url
if (isset($_GET['id'])) {
    $articleId = intval($_GET['id']); // Convert string to int
}

// Display article title and content 
if (isset($_GET['id'])) {
    $getArticleById = getArticleById($articleId);
}

// Call add comment function
if (isset($_POST['add-comment'])) {
    setComment($commentContent, $userId, $articleId);
}

// Get list of comments by article id
$listComments = listComments($articleId);

// list of categories
$listCategories = listCategories();
?>

<!-- Page Content -->
<div class="container">

    <!-- Breadcrumb -->
    <a href="index.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to articles</a>

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4 font-weight-bold"><?php echo $getArticleById['article_title'] ?></h1>

            <!-- Author -->
            <p class="lead mb-1">
                by
                <a href="#">Start Bootstrap</a>
            </p>

            <!-- Date/Time -->
            <p class="font-italic">Posted on January 1, 2019 at 12:00 PM</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead"><?php echo $getArticleById['article_content'] ?></p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

            <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in
                    <cite title="Source Title">Source Title</cite>
                </footer>
            </blockquote>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

            
            <hr>

            <div class="d-flex justify-content-between" role="group" aria-label="Basic example">
                <a href="#" class="text-secondary"><i class="fas fa-chevron-left"></i> Previous article</a>
                <a href="#" class="text-secondary">Next article <i class="fas fa-chevron-right"></i></a>
            </div>

            <!-- Comments Form -->
            <?php if (isset($_SESSION['user_id'])) { ?>
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form action="singleArticle.php?id=<?php echo $articleId; ?>" method="POST">
                            <div class="form-group">
                                <textarea class="form-control" name="comment_content" rows="3"></textarea>
                            </div>
                            <button type="submit" name="add-comment" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card my-4">
                    <h5 class="card-header">Comments</h5>
                    <div class="card-body d-flex justify-content-start align-items-center">
                        <p class="m-0">You want to leave a comment ? Please log in first</p>
                        <a href="login.php" class="btn btn-primary btn-sm ml-2">Log in <i class="fas fa-sign-in-alt"></i></a>
                    </div>
                </div>
            <?php } ?>

            <!-- Single Comment -->
            <?php foreach ($listComments as $comment) : ?>
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">
                            <?php
                            $data = commentatorsUserId($comment['user_id']);
                            echo '<span class="font-italic" style="font-size: .8rem">Posted by : </span>' . $data['user_name'];
                            ?>
                        </h5>
                        <p><?php echo $comment['comment_content'] ?></p>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-lg-4 col-md-12 col-sm-12">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for an article...">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($listCategories as $category) : ?>
                                    <li>
                                        <a href="#" class=""><?php echo $category['category_name'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<?php include_once 'footer.php' ?>