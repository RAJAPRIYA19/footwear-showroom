let allProducts = [];
let selectedCategory = "";

window.onload = () => {
  const urlParams = new URLSearchParams(window.location.search);
  selectedCategory = urlParams.get("category") || "All";

  fetch('products.json')
    .then(res => res.json())
    .then(data => {
      allProducts = data.filter(p => selectedCategory === "All" || p.category === selectedCategory);
      displayProducts(allProducts); // Load products initially
    });
};

function displayProducts(products) {
  const catalog = document.getElementById("catalog");
  catalog.innerHTML = '';
  if (products.length === 0) {
    catalog.innerHTML = "<p>No products found.</p>";
    return;
  }

  products.forEach(product => {
    catalog.innerHTML += `
      <div class="product-card">
        <img src="${product.image}" alt="${product.name}">
        <h3>${product.name}</h3>
        <p>₹${product.price}</p>
        <button onclick="addToCart('${product.name}', ${product.price})">Add to Cart</button>
      </div>
    `;
  });
}

function filterSearch() {
  const query = document.getElementById("searchInput").value.toLowerCase();
  const filtered = allProducts.filter(p => p.name.toLowerCase().includes(query));
  displayProducts(filtered);
}

function addToCart(name, price) {
    const formData = new FormData();
    formData.append("name", name);
    formData.append("price", price);
  
    fetch("cart.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        alert(data); // Shows message like "Item added to cart!"
      })
      .catch(error => {
        console.error("Error adding to cart:", error);
      });
  }
  
  

