<?php
include '../model/Produit.php';
include '../Controller/ProduitC.php';

$error = "";
$produitC = new ProduitC();

if (isset($_POST["nom_produit"]) &&
    isset($_POST["prix_produit"]) &&
    isset($_POST["id_produit"])) {
    
    $produit = new Produit(
        $_POST["nom_produit"],
        $_POST["prix_produit"]
    );
    
    $produitC->updateproduit($produit, $_POST["id_produit"]);
    header('Location:listproduit.php');
} else {
    $error = "Missing information";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .form-control:focus {
            border-color: #4d4d4d;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Product</h1>
        <hr>
        <a href="listproduit.php" class="btn btn-secondary mb-3">Back to List</a>

        <div class="alert alert-danger <?php if (!$error) echo 'd-none' ?>" role="alert">
            <?php echo $error; ?>
        </div>

        <?php
        if (isset($_POST['id_produit'])) {
            $produit = $produitC->showproduit($_POST['id_produit']);
        ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="nom_produit">Product Name:</label>
                <input type="text" class="form-control" name="nom_produit" id="nom_produit" pattern="[A-Za-z\s]+" required maxlength="20" value="<?php echo $produit['nom_produit']; ?>">
                <small class="form-text text-muted">Enter only letters (A-Z, a-z).</small>
            </div>
            <div class="form-group">
                <label for="prix_produit">Product Price:</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="prix_produit" id="prix_produit" step="0.01" required value="<?php echo str_replace('DT', '', $produit['prix_produit']); ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">DT</span>
                    </div>
                </div>
                <small class="form-text text-muted">Enter a float number (e.g. 1.99).</small>
            </div>
            <div class="form-group">
                <input type="hidden" name="id_produit" value="<?php echo $_POST['id_produit']; ?>">
                <button type="submit" class="btn btn-primary mr-3">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
        <?php
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>