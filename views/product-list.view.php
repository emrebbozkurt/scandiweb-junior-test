<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $title = 'Product List';
    include APP_ROOT . '/views/layouts/head.view.php';
    ?>
</head>
<body class="container">
<header>
    <div class="row">
        <div class="col header-left">
            <h2><?php echo $title ?></h2>
        </div>
        <div class="col header-right">
            <div class="float-end">
                <a class="btn btn-primary" href="/add-product">ADD</a>
                <a class="btn btn-danger" id="delete-product-btn">MASS DELETE</a>
            </div>
        </div>
    </div>
    <hr class="separator">
</header>
<main>
    <form id="product_form" action="/" method="post">
        <div class="row">
            <?php foreach ($data as $product) : ?>
                <div class="col-sm-3">
                    <div class="card product-card">
                        <div class="card-body">
                            <label>
                                <input type="checkbox" class="delete-checkbox"
                                       name="product-<?php echo $product['id']; ?>"
                                       value="<?php echo $product['id']; ?>">
                            </label>
                            <div class="product-card-body">
                                <p class="product-card-text"><?php echo $product['sku']; ?></p>
                                <p class="product-card-text"><?php echo $product['name']; ?></p>
                                <p class="product-card-text"><?php echo $product['price'] . ' $'; ?></p>
                                <p class="product-card-text"><?php echo $product['attribute']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
</main>
<?php include APP_ROOT . '/views/layouts/footer.view.php'; ?>
<script src="/assets/js/list.js"></script>
</body>
</html>