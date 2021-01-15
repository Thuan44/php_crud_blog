<?php include_once 'header.php' ?>



<?php
$listArticles = listArticles();


?>

<div class="container">

    <h3 class="p-2 m-2 text-center">Most recent articles</h3>
    <div class="divider"></div>

    <div class="row">
        <?php foreach ($listArticles as $article) : ?>
            <?php $getArticleImg = getArticleImg($article['article_id']); ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4">
                <div class="card shadow-sm h-100">
                    <!-- <img src="./img/upload/<?php echo $getArticleImg['img_name']; ?>" class="card-img-top" alt="..."> -->
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
                        <div style="position: absolute; right: 18px; bottom: 0"><a href="singleArticle.php?id=<?php echo $article['article_id']; ?>" class="read-article btn btn-primary btn-sm"><i class="fab fa-readme"></i> Read article</a></div>
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

    <div class="d-flex justify-content-center mt-3">
        <ul class="pagination pagination-sm">
            <li class="page-item disabled">
                <a class="page-link" href="#">&laquo;</a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">5</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">&raquo;</a>
            </li>
        </ul>
    </div>

</div>


<?php include_once 'footer.php' ?>