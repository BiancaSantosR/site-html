<?php
session_start();

// Verifica se o carrinho já está inicializado na sessão
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Função para adicionar um item ao carrinho
function addToCart($item) {
    $_SESSION['cart'][] = $item;
}

// Função para remover um item do carrinho
function removeFromCart($index) {
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
    }
}

// Função para calcular o total da compra
function calculateTotal() {
    $total = 0;
    
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'];
    }
    
    return $total;
}

// Exemplo de produtos disponíveis
$products = array(
    array('name' => 'Produto 1', 'price' => 30.00, 'image' => 'carrinho/img1.jfif'),
    array('name' => 'Produto 2', 'price' => 35.00, 'image' => 'carrinho/img2.jfif'),
    array('name' => 'Produto 3', 'price' => 26.50, 'image' => 'carrinho/img3.jfif'),
    array('name' => 'Produto 3', 'price' => 28.80, 'image' => 'carrinho/img4.jfif'),
    array('name' => 'Produto 3', 'price' => 37.90, 'image' => 'carrinho/img5.jfif'),
    array('name' => 'Produto 3', 'price' => 41.75, 'image' => 'carrinho/img6.jpg'),
    array('name' => 'Produto 3', 'price' => 35.00, 'image' => 'carrinho/img7.jpg'),
    array('name' => 'Produto 3', 'price' => 26.00, 'image' => 'carrinho/img8.jpeg'),
    array('name' => 'Produto 3', 'price' => 36.00, 'image' => 'carrinho/img9.jpg')
);

// Verifica se um produto foi adicionado ao carrinho
if (isset($_POST['add'])) {
    $index = $_POST['add'];
    
    if (isset($products[$index])) {
        addToCart($products[$index]);
    }
}

// Verifica se um produto foi removido do carrinho
if (isset($_POST['remove'])) {
    $index = $_POST['remove'];
    removeFromCart($index);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrinho de Compras</title>
</head>
<body>
    <h1>Carrinho de Compras</h1>
    
    <div id="cart">
        <ul id="item-list">
            <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                <li>
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" width="100" height="100">
                    <?php echo $item['name']; ?> - R$ <?php echo $item['price']; ?>
                    <form method="post" action="">
                        <input type="hidden" name="remove" value="<?php echo $index; ?>">
                        <button type="submit">Remover do Carrinho</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <p id="total">Total: R$ <?php echo calculateTotal(); ?></p>
        <button id="checkout-button">Finalizar Compra</button>
    </div>
    
    <h2>Produtos Disponíveis</h2>
    
    <ul id="product-list">
        <?php foreach ($products as $index => $product): ?>
            <li>
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="100" height="100">
                <?php echo $product['name']; ?> - R$ <?php echo $product['price']; ?>
                <form method="post" action="">
                    <input type="hidden" name="add" value="<?php echo $index; ?>">
                    <button type="submit">Adicionar ao Carrinho</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
