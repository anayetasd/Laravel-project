@extends("layouts.master")

@section("page")

<style>
  .receipt-wrapper {
    max-width: 1200px;
    margin: 30px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .receipt-header {
    text-align: center;
    margin-bottom: 20px;
  }

  .receipt-header h1 {
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 5px;
  }

  .receipt-header p {
    margin: 0;
    font-size: 16px;
    color: #555;
  }

  .form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
  }

  .form-group label {
    font-weight: 600;
    margin-bottom: 6px;
    display: block;
  }

  .form-group input,
  .form-group select,
  .form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
  }

  table.receipt-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  .receipt-table th, .receipt-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
  }

  .receipt-table th {
    background-color: #007bff;
    color: white;
    font-weight: 600;
  }

  .btn {
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    font-weight: 600;
    cursor: pointer;
    font-size: 14px;
  }

  .btn-primary {
    background-color: #007bff;
    color: white;
  }

  .btn-danger {
    background-color: #dc3545;
    color: white;
  }

  .btn-success {
    background-color: #28a745;
    color: white;
  }

  .summary {
    margin-top: 25px;
    text-align: right;
    font-weight: 600;
    font-size: 16px;
  }

  .btn-group-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 25px;
  }
</style>

<div class="receipt-wrapper">
  <div class="receipt-header">
    <h1>{{ $company->name }}</h1>
    <p>{{ $company->address ?? '' }}</p>
    <h2 style="margin-top: 10px;">Money Receipt</h2>
  </div>

  <div class="form-grid">
    <div class="form-group">
      <label for="customer_id">Customer</label>
      <select id="customer_id">
        @foreach($customers as $customer)
          <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="receipt_date">Date</label>
      <input type="date" id="receipt_date" value="{{ date('Y-m-d') }}">
    </div>

    <div class="form-group">
      <label for="mr_id">Receipt ID</label>
      <input type="text" value="{{ $MR_last + 1 }}" readonly>
    </div>

    <div class="form-group">
      <label for="shipping_address">Shipping Address</label>
      <textarea id="shipping_address" rows="2"></textarea>
    </div>

    <div class="form-group">
      <label for="remark">Remark</label>
      <textarea id="remark" rows="2"></textarea>
    </div>
  </div>

  <table class="receipt-table">
    <thead>
      <tr>
        <th>#</th>
        <th>Product</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Subtotal</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="receipt-items"></tbody>
    <tfoot>
      <tr>
        <td></td>
        <td>
          <select id="product_id">
            @foreach($products as $product)
              <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
          </select>
        </td>
        <td><input type="number" id="price"></td>
        <td><input type="number" id="discount"></td>
        <td></td>
        <td><button class="btn btn-primary" id="addItem">+</button></td>
      </tr>
    </tfoot>
  </table>

  <div class="summary">
    Total: <span id="receipt-total">0.00</span>
  </div>

  <div class="btn-group-actions">
    <button onclick="window.print()" class="btn btn-primary">🖨 Print</button>
    <button class="btn btn-success" id="submitReceipt">Submit</button>
  </div>
</div>

<script>
        let items = [];

        function refreshItems() {
        let tbody = document.getElementById("receipt-items");
        tbody.innerHTML = '';
        let total = 0;

        items.forEach((item, index) => {
            let subtotal = item.price - item.discount;
            total += subtotal;
            tbody.innerHTML += `
            <tr>
                <td>${index + 1}</td>
                <td>${item.name}</td>
                <td>${item.price}</td>
                <td>${item.discount}</td>
                <td>${subtotal.toFixed(2)}</td>
                <td><button class="btn btn-danger btn-sm" onclick="removeItem(${index})">X</button></td>
            </tr>`;
        });

        document.getElementById("receipt-total").innerText = total.toFixed(2);
        }

        function removeItem(i) {
        items.splice(i, 1);
        refreshItems();
        }

        document.getElementById("addItem").addEventListener("click", () => {
        let select = document.getElementById("product_id");
        let name = select.options[select.selectedIndex].text;
        let product_id = select.value;
        let price = parseFloat(document.getElementById("price").value || 0);
        let discount = parseFloat(document.getElementById("discount").value || 0);

        if (!product_id || price <= 0) {
            alert("Please enter valid product and price");
            return;
        }

        items.push({ product_id, name, price, qty: 1, discount,  vat: 0 });

        refreshItems();

        document.getElementById("price").value = '';
        document.getElementById("discount").value = '';
        });

        document.getElementById("submitReceipt").addEventListener("click", () => {
        if (items.length === 0) {
            alert("No items added");
            return;
        }

        let total = parseFloat(document.getElementById("receipt-total").innerText);

        let data = {
            customer_id: document.getElementById("customer_id").value,
            receipt_date: document.getElementById("receipt_date").value,
            shipping_address: document.getElementById("shipping_address").value,
            remark: document.getElementById("remark").value,

            receipt_total: total,
            paid_amount: total,
            discount: 0,
            vat: 0,
            items: items.map(item => ({
                product_id: item.product_id,
                price: item.price,
                qty: item.qty,
                vat: item.vat,
                discount: item.discount
            }))

        };

        fetch("http://localhost/laravel12/project_app/public/api/mrs", {
            method: "POST",
            headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
            },
            body: JSON.stringify(data)
        })
            .then(res => res.json())
           .then(json => {
              
                if (json.message === "Money Receipt Saved Successfully" && json.mr_id) {
                    alert("Receipt saved: ID " + json.mr_id);
                    items = [];
                    refreshItems();
                } else {
                    alert("Error: " + JSON.stringify(json));
                }
                })
            .catch(err => {
            alert("Failed to connect to server");
            console.error(err);
            });
        });
</script>

@endsection
