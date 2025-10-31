// // javascript variable : let, var, const
//         // php variable = $define, const

//         let nama = "enrio hernanda";
//         var name = "bambang pamungkas";
//         const fullname = "wahyudin kamal";
//         // const : tetap tidak boleh merubah nilai
//         // document.write()
//         // console.log({
//         //     "nama": name,
//         //     "fullname": fullname
//         // });
//         // alert(nama);

//         let angka1 = 10;
//         let angka2 = 20;
//         console.log(angka1 + angka2);
//         console.log(angka1 - angka2);
//         console.log(angka1 / angka2);
//         console.log(angka1 * angka2);
//         console.log(angka1 % angka2);
//         console.log(angka1 ** angka2);

//         // operator penugasan
//         let x = 10;
//         x += 5; //15
//         console.log(x);

//         // operator pembandingan
//         //  >, <, =, ==, ===, !==
//         let a = 1;
//         let b = 1;
//         if (a == b) {
//             console.log("sama");
//         } else {
//             console.log("tidak sama");
//         }

//         console.log(a >= b);
//         console.log(a <= b);

//         // operator logika
//         // &&, AND, OR, ||, !: tidak / not
//         let umur = 20;
//         let punyaSim = true;
//         if (umur > 17 && punyaSim) {
//             console.log("boleh mengemudi");
//         } else {
//             console.log("tidak boleh mengemudi");
//         }

//         // array : sebuah tipe data yang bisa memiliki nilai lebih dari 1
//         let buah = ['pisang', 'salak', 'semangka'];
//         console.log("buah di keranjang:", buah);
//         console.log("saya mau buah", buah[1]);
//         buah[1] = "Nanas";
//         console.log("buah baru:", buah);
//         buah.push('Pepaya');
//         console.log("Buah", buah);
//         buah.pop();
//         console.log("Buah", buah);

        // document.getElementById("product-title").innerHTML = "Data Product";
        // // document.querySelector("#product-title");
        // let btn = document.getElementsByClassName('category-btn');
        // // btn[0].style.color = "red";
        // // btn[1].style.color = "black";
        // // btn[2].style.color = "brown";
        // console.log("ini button", btn);
        
//         let buttons = document.querySelectorAll(".category-btn");
//         // buttons.forEach(function (btn){});
//         buttons.forEach((btn) => {
//             btn.style.color = "red";
//             console.log(btn);
//         })

//         let card = document.getElementById("card");
//         let h3 = document.createElement("h3");
//         let textH3 = document.createTextNode("Selamat Datang");
//         h3.textContent = "Selamat Datang dengan TextContent";

//         let p = document.createElement("p");
//         p.innerText = "Duarr jadi";
//         p.textContent = "Nuall jadi";
//         // menambahkan element didalam card
//         card.appendChild(h3);
//         card.appendChild(p); 

let currentCategory = "all";

function filterCategory(category, event) {
  currentCategory = category;

  let buttons = document.querySelectorAll(".category-btn");
  buttons.forEach((btn) => {
    btn.classList.remove("active");
    btn.classList.remove("btn-primary");
    btn.classList.add("btn-outline-primary");
  });

  event.classList.add("active");
  event.classList.remove("btn-outline-primary");
  event.classList.add("btn-primary");
  console.log({
    currentCategory: currentCategory,
    category: category,
    event: event,
  });
  renderProducts();
}

function renderProducts(searchProduct = "") {
  const productGrid = document.getElementById("productGrid");
  productGrid.innerHTML = "";

  //filter
  const filtered = products.filter((p) => {
    //shorthand/ ternery
    const matchcategory =
      currentCategory === "all" || p.category_name === currentCategory;
    const matchSearch = p.product_name.toLowerCase().includes(searchProduct);
    return matchcategory && matchSearch;
  });

  //munculin data dari table products
  filtered.forEach((product) => {
    const col = document.createElement("div");
    col.className = "col-md-4 col-sm-6";
    col.innerHTML = `<div class="card product-card" onclick="addToCart(${product.id})">
      <div class="product-img">
        <img src="../${product.product_photo}" width="100%">
      </div>
      <div class="card-body">
        <span class="badge bg-secondary badge-category">${product.category_name}</span>
        <h6 class="card-title mt-2 mb-2">${product.product_name}</h6>
        <p class="card-text text-primary fw-bold">Rp. ${product.product_price}</p>
      </div>
    </div>`;
    productGrid.appendChild(col);
  });
}

let cart = [];
function addToCart(id) {
  const product = products.find((p) => p.id == id);
  const existing = cart.find((item) => item.id == id);
  if (existing) {
    existing.quantity += 1;
  } else {
    cart.push({ ...product, quantity: 1 });
  }
  renderCart();
}

function renderCart() {
  const cartContainer = document.querySelector("#cartItems");
  cartContainer.innerHTML = "";

  if (cart.length === 0) {
    cartContainer.innerHTML = `<div class="cart-items" id="cartItems">
          <div class="text-center text-muted mt-5">
            <i class="bi bi-basket"></i>
            <p>Empty Cart</p>
          </div>
      </div>`;
      updateTotal();
      return;
  }
  cart.forEach((item, index) => {
    const div = document.createElement("div");
    div.className =
      "cart-item d-flex justify-content-between align-items-center mb-2";
    div.innerHTML = `
        <div>
          <strong>${item.product_name}</strong>
          <small>${item.product_price}</small>
        </div>
        <div class="d-flex align-items-center">
          <button class="btn btn-outline-secondary me-2" onclick="changeQty(${item.id}, -1)">-</button>
          <span>${item.quantity}</span>
          <button class=" btn btn-outline-secondary ms-2" onclick="changeQty(${item.id}, 1)">+</button>
          <button class="btn btn-danger ms-3" onclick="removeItem(${item.id})">
            <i class="bi bi-trash-fill"></i>
          </button>
        </div>`;
    cartContainer.appendChild(div);
  });
  updateTotal();
}

// menghapus item dari cart
function removeItem(id) {
  cart = cart.filter((p) => p.id != id);
  renderCart();
}

// mengatur qty di cart
function changeQty(id, x) {
  const item = cart.find((p) => p.id == id);
  if (!item) {
    return;
  }
  item.quantity += x;
  if (item.quantity <= 0) {
    alert("Minimum must be 1 product!");
    item.quantity += 1;
    // cart = filter((p) => p.id != id);
  }
  renderCart();
}

function updateTotal() {
    const subtotal = cart.reduce((sum, item) => sum + item.product_price * item.quantity, 0);
    const tax = subtotal * 0.1;
    const total = tax + subtotal;

    document.getElementById("subtotal").textContent = `Rp. ${subtotal.toLocaleString()}`;
    document.getElementById("tax").textContent = `Rp. ${tax.toLocaleString()}`;
    document.getElementById("total").textContent = `Rp. ${total.toLocaleString()}`;

    document.getElementById("subtotal_value").value = subtotal;
    document.getElementById("tax_value").value = tax;
    document.getElementById("total_value").value = total;
    // console.log(subtotal);
    // console.log(tax);
    // console.log(total);
}

document.getElementById("clearCart").addEventListener("click", 
    function() {
        cart = [];
        renderCart();
});

async function processPayment() {
    if (cart.length === 0){
        alert("Cart still empty!");
        return;
    }
    const order_code = document.querySelector('.orderNumber').textContent.trim();
    const subtotal = document.querySelector('#subtotal_value').value.trim();
    const tax = document.querySelector('#tax_value').value.trim();
    const grandTotal = document.querySelector('#total_value').value.trim();
    try {
        const res = await fetch("add-pos.php?payment", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ cart, order_code, subtotal, tax, grandTotal }),
        });
        const data = await res.json();
        if (data.status == "success"){
            alert("Transaction Successfully!");
            window.location.href = "print.php";
        }else{
          alert("Transaction Failed", data.message);
        }
        
    } catch (error) {
        alert("Upss Transaction failed!")
        console.log("error", error); 
        die;
    }
}

//useEffect(() => {
//},[])

//DomContentLoaded : akan meload function pertama kali
renderProducts();

document.getElementById("searchProduct").addEventListener("input", function (e) {
  const searchProduct = e.target.value.toLowerCase();
  console.log(searchProduct);
  renderProducts(searchProduct);
});