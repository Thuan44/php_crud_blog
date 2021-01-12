<?php include_once 'header.php' ?>



<?php
$listArticles = listArticles();
?>

<div class="container">

    <h3 class="p-2 m-2 text-center">Most recent articles</h3>
    <div class="divider"></div>

    <div class="row">
        <?php foreach ($listArticles as $article) : ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4">

                <div class="card shadow-sm h-100">
                    <div class="card-body position-relative">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <h4 class="card-title font-weight-bold"><?php echo $article['article_title'] ?></h4>

                            <?php if ($article['category_id'] == 1) { ?>
                                <span class="badge badge-info p-2"><?php echo $article['category_name'] ?></span>
                            <?php } elseif ($article['category_id'] == 2) { ?>
                                <span class="badge badge-warning p-2"><?php echo $article['category_name'] ?></span>
                            <?php } elseif ($article['category_id'] == 3) { ?>
                                <span class="badge badge-secondary p-2"><?php echo $article['category_name'] ?></span>
                            <?php } else { ?>
                                <span class="badge badge-light p-2"><?php echo $article['category_name'] ?></span>
                            <?php } ?>

                        </div>
                        <hr>
                            <p class="card-text text-justify"><?php echo $article['article_content'] ?></p>
                            <div style="position: absolute; right: 18px; bottom: 0"><a href="singleArticle.php?id=<?php echo $article['article_id'];?>" class="read-article btn btn-primary btn-sm"><i class="fab fa-readme"></i> Read article</a></div>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                        <div class="views">Oct 20, 12:45PM
                        </div>
                        <div class="stats">
                            <i class="far fa-eye"></i> 1347
                            <i class="far fa-comment"></i> 12
                        </div>

                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>



</div>


<?php include_once 'footer.php' ?>