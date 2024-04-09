<?php 
require("connect-db.php");    // include("connect-db.php");
require("home-db.php");
$products = getAvailableProducts($db);

// $displayedPrice = updatedPriceFetch($displayedSize, $displayedName);  
?>

<?php   // form handling

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">    
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Bereket, Carlos, Emily, Natalie">
  <meta name="description" content="Website that sells candles">
  <meta name="keywords" content="Cavalier Candles">
  <link rel="icon" type="image/png" href="https://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
  
  <title>Cavalier Candles</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="maintenance-system.css">  

  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candle Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            width: calc(33.33% - 20px); /* Adjust width for 3 boxes per row */
            box-sizing: border-box;
        }
        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>

<body>  
    
<?php include("header.php"); ?>
<script>
function updatedPriceFetch(uniqueId, selectedSize, productName) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('price-' + uniqueId).textContent = this.responseText;
        }
    };
    xhttp.open("GET", "home-db.php?size=" + selectedSize + "&Name=" + encodeURIComponent(productName), true);
    xhttp.send();
}
</script>

    <div class="container">
        <div class="filter-option">
            <label for="sizeFilter">Filter by size:</label>
            <select id="sizeFilter" name="sizeFilter" onchange="filterProducts()">
                <option value="">All</option>
                <option value="8oz">8oz</option>
                <option value="12oz">12oz</option>
            </select>
        </div>
    </div>
    
    <div class="container">
    <?php foreach ($products as $product): ?>
        <?php $uniqueId = htmlspecialchars($product['Name']) . rand(); ?>
        <div class="product">
            <h2> <h2 style="color: #FFB6C1;"><?php echo htmlspecialchars($product['Name']); ?></h2>
            <p>Price: $<span id="price-<?php echo $uniqueId; ?>"><?php echo htmlspecialchars($product['Price']); ?></span></p>
            <label for="size-<?php echo $uniqueId; ?>">Size:</label>
            <select id="size-<?php echo $uniqueId; ?>" name="size" onchange="updatedPriceFetch('<?php echo $uniqueId; ?>', this.value, '<?php echo addslashes(htmlspecialchars($product['Name'])); ?>')">
                <option value="8oz">8oz</option>
                <option value="12oz">12oz</option>
            </select>
        </div>
    <?php endforeach; ?>
</div>

  
<?php 
//include('footer.html') ?> 

<!-- <script src='maintenance-system.js'></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>