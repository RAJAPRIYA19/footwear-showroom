<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart - StepIn Style</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>StepIn Style - Your Cart</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="products.html">Shop</a>
  </nav>
</header>

<main class="cart-container">
  <h2>Your Shopping Cart</h2>

  <?php
  $result = $conn->query("SELECT * FROM cart");
  if ($result && $result->num_rows > 0):
  ?>

    <table class="cart-table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total = 0;
        while ($row = $result->fetch_assoc()):
          $total += $row['price'];
        ?>
        <tr>
          <td data-label="Product"><?= htmlspecialchars($row['name']) ?></td>
          <td data-label="Price">₹<?= number_format($row['price'], 2) ?></td>
          <td data-label="Action">
            <form method="POST" action="remove.php" style="display:inline;">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <button type="submit" class="btn">Remove</button>
            </form>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <div class="total-section">Total: ₹<?= number_format($total, 2) ?></div>

    <a href="payment.php" class="checkout-btn">Proceed to Payment</a>

  <?php else: ?>
    <p style="text-align:center; font-size:18px; color: #555;">Your cart is empty.</p>
  <?php endif; ?>

  <?php $conn->close(); ?>
</main>

<footer>
  &copy; <?= date("Y") ?> StepIn Style. All rights reserved.
</footer>

</body>
</html>
