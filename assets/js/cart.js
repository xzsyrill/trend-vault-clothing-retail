// ------Login Warning------
function showLoginWarning(
  message = "Please login or create an account first before using the cart.",
) {
  let modal = document.getElementById("login-warning-modal");
  if (!modal) {
    modal = document.createElement("div");
    modal.id = "login-warning-modal";
    modal.className = "login-warning-modal";
    modal.innerHTML = `
      <div class="login-warning-card" role="dialog" aria-modal="true" aria-labelledby="login-warning-title">
        <button class="login-warning-close" type="button" aria-label="Close">&times;</button>
        <div class="login-warning-icon">!</div>
        <h2 id="login-warning-title">Login Required</h2>
        <p class="login-warning-message"></p>
        <div class="login-warning-actions">
          <a class="login-warning-primary" href="login.php?login_required=1">Login / Create Account</a>
          <button class="login-warning-secondary" type="button">Continue Browsing</button>
        </div>
      </div>`;
    document.body.appendChild(modal);
    modal
      .querySelector(".login-warning-close")
      .addEventListener("click", () => modal.classList.remove("show"));
    modal
      .querySelector(".login-warning-secondary")
      .addEventListener("click", () => modal.classList.remove("show"));
    modal.addEventListener("click", (event) => {
      if (event.target === modal) modal.classList.remove("show");
    });
  }
  modal.querySelector(".login-warning-message").textContent = message;
  modal.classList.add("show");
}

// ------Cart API------
async function cartRequest(action = "get", data = {}) {
  const form = new FormData();
  form.append("action", action);
  Object.entries(data).forEach(([key, value]) => form.append(key, value));

  const response = await fetch("cart_api.php", { method: "POST", body: form });
  const result = await response
    .json()
    .catch(() => ({ success: false, message: "Something went wrong." }));

  if (response.status === 401) {
    if (action !== "get")
      showLoginWarning(
        result.message ||
          "Please login or create an account first before using the cart.",
      );
    return null;
  }

  if (!result.success) {
    alert(result.message || "Unable to update cart.");
    return null;
  }
  return result.cart || [];
}

// ------Helpers------
function money(value) {
  return Number(value || 0).toLocaleString("en-PH", {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });
}

function setCartCount(cart) {
  const counter = document.getElementById("cart-count");
  if (!counter) return;
  counter.textContent = (cart || []).reduce(
    (sum, item) => sum + Number(item.quantity || 0),
    0,
  );
}

async function updateCartCount() {
  const cart = await cartRequest("get");
  if (cart) setCartCount(cart);
}

// ------Products------
function updatePrice(id) {
  const sizeSelect = document.getElementById(`${id}-size`);
  const priceBox = document.getElementById(`price-${id}`);
  if (!sizeSelect || !priceBox) return;
  const selectedOption = sizeSelect.options[sizeSelect.selectedIndex];
  priceBox.textContent = selectedOption.getAttribute("data-price");
}

async function addToCartFromButton(button) {
  const card = button.closest(".card");
  if (!card) return;

  const name = card.querySelector("h3")?.textContent.trim() || "Product";
  const priceSpan = card.querySelector('p span[id^="price-"]');
  const price = Number((priceSpan?.textContent || "0").replace(/,/g, ""));
  const size = card.querySelector("select")?.value || "N/A";
  const quantityInput = card.querySelector('input[type="number"]');
  const quantity = Math.max(1, parseInt(quantityInput?.value || "1", 10));
  const image = card.querySelector("img")?.getAttribute("src") || "";

  if (!price || quantity < 1) {
    alert("Please choose a valid product quantity.");
    return;
  }

  const oldText = button.textContent;
  button.disabled = true;
  button.textContent = "Adding...";

  const cart = await cartRequest("add", { name, price, size, quantity, image });
  if (cart) {
    setCartCount(cart);
    button.textContent = "Added ✓";
    setTimeout(() => {
      button.textContent = oldText || "Add to Cart";
      button.disabled = false;
    }, 900);
  } else {
    button.disabled = false;
    button.textContent = oldText || "Add to Cart";
  }
}

// ------Cart Page------
async function renderCartPage() {
  const list = document.getElementById("cart-items-list");
  const subtotalBox = document.getElementById("cart-subtotal");
  const checkoutBtn = document.getElementById("checkout-button");
  const emptyBox = document.getElementById("empty-cart");
  if (!list || !subtotalBox) return;

  const cart = await cartRequest("get");
  if (!cart) return;
  setCartCount(cart);
  list.innerHTML = "";

  if (cart.length === 0) {
    if (emptyBox) emptyBox.style.display = "block";
    if (checkoutBtn) checkoutBtn.disabled = true;
    subtotalBox.textContent = "0.00";
    return;
  }

  if (emptyBox) emptyBox.style.display = "none";
  if (checkoutBtn) checkoutBtn.disabled = false;
  let subtotal = 0;

  cart.forEach((item) => {
    const lineTotal = Number(item.price) * Number(item.quantity);
    subtotal += lineTotal;

    const row = document.createElement("div");
    row.className = "cart-row";
    row.innerHTML = `
      <img src="${item.image}" alt="${item.name}">
      <div class="cart-info">
        <h3>${item.name}</h3>
        <p>Size: ${item.size}</p>
        <p>₱${money(item.price)} each</p>
      </div>
      <div class="cart-actions">
        <input type="number" min="1" value="${item.quantity}" onchange="changeQuantity(${item.id}, this.value)">
        <strong>₱${money(lineTotal)}</strong>
        <button type="button" onclick="removeCartItem(${item.id})">Remove</button>
      </div>
    `;
    list.appendChild(row);
  });

  subtotalBox.textContent = money(subtotal);
}

async function changeQuantity(id, value) {
  await cartRequest("update", {
    id,
    quantity: Math.max(1, parseInt(value || "1", 10)),
  });
  renderCartPage();
}

async function removeCartItem(id) {
  await cartRequest("remove", { id });
  renderCartPage();
}

// ------Checkout Page------
async function renderCheckoutPage() {
  const summary = document.getElementById("checkout-summary");
  const totalBox = document.getElementById("checkout-total");
  const form = document.getElementById("checkout-form");
  if (!summary || !totalBox || !form) return;

  const cart = await cartRequest("get");
  if (!cart) return;
  setCartCount(cart);

  if (cart.length === 0) {
    summary.innerHTML = "<p>Your cart is empty. Please add items first.</p>";
    totalBox.textContent = "0.00";
    form.querySelector('button[type="submit"]').disabled = true;
    return;
  }

  let total = 0;
  summary.innerHTML = cart
    .map((item) => {
      const lineTotal = Number(item.price) * Number(item.quantity);
      total += lineTotal;
      return `<div class="summary-line"><span>${item.quantity} × ${item.name} (${item.size})</span><strong>₱${money(lineTotal)}</strong></div>`;
    })
    .join("");
  totalBox.textContent = money(total);
}

// ------Init------
document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelectorAll('a[href="cart.php"], a[href="checkout.php"]')
    .forEach((link) => {
      link.addEventListener("click", async function (event) {
        const cart = await cartRequest("get");
        if (!cart) {
          event.preventDefault();
          showLoginWarning(
            "Please login or create an account first before viewing your cart or checking out.",
          );
        }
      });
    });
  updateCartCount();
  renderCartPage();
  renderCheckoutPage();
});
