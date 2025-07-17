

<?php
   use App\Models\Sales\Customer;
   
   use App\Models\Product;
   use App\Models\Company;
   use App\Models\Sales\Order;

   $customers=Customer::all();
   $products=Product::all();
   $company=Company::find(1);
   
   $order_last=Order::max('id');
?>

@extends("layouts.master")

@section("page")

<style>
  select{
    padding: 5px;
    min-width:200px;
  }
  textarea{width: 30%;}
</style>

        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                    
               <?php $company = \App\Models\Company::find(1); ?>
            

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <img src="{{ url('img/' . $company->logo) }}" width="100" alt="Company Logo">
                    <strong>{{ $company->name }}</strong>
                </div>
                <small>Date: {{ date('d M Y') }}</small>
            </div>

              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>{{ $company->name }}</strong><br>
                {{ $company->street_address }}<br>
                Mobile: {{ $company->mobile }}<br>
                Email: {{ $company->email }}
                </address>

            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              Customer
              <address>
                <select name="customer" class="form-control" >
                    @foreach ($customers as $cus)
                        <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                    @endforeach
                </select>
                <div id="customer-info"></div>
              </address>
              <div>
                Shipping Address:<br>
                <textarea id="txtShippingAddress"></textarea>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">

              <table>
                <tr>
                  <td><b>Order ID:</b></td>
                  <td><input type="text" id="Order_id" name="Order_id" style="width:60px" value="{{$order_last+1}}" readonly /></td>
                </tr>
                <tr>
                  <td><b>Order Date:</b></td>
                  <td><input type="date" id="txtOrderDate" value="{{ date('Y-m-d') }}"/></td>
                </tr>
                <tr>
                  <td><b>Due Date:</b></td>
                  <td><input type="date" id="txtDueDate" value="{{ date('Y-m-d') }}" /></td>
                </tr>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                    <th><input type="button" id="clearAll" value="Clear" /></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>
                    <select id="cmbProduct" class="form-control">
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                     
                    </th>
                    <th><input type="number" id="txtPrice" step="0.01" /></th>
                    <th><input type="number" id="txtQty" /></th>
                    <th><input type="number" id="txtDiscount" step="0.01" /></th>
                    <th></th>
                    <th><input type="button" id="btnAddToCart" value=" + " /></th>
                  </tr>
                </thead>
                <tbody id="items">

                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <strong>Remark</strong><br>
              <textarea id="txtRemark"></textarea>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Amount Due {{ date('d M Y', strtotime(request()->input('txtDueDate') ?? date('Y-m-d'))) }}</p>


              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td id="subtotal">0</td>
                    </tr>

                    <tr>
                      <th>Discount:</th>
                      <td id="total-discount">0</td>
                    </tr>

                    <tr>
                      <th>Total:</th>
                      <td id="net-total">0</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              <button type="button"  id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
              <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
              </button>
            </div>
          </div>
        </div>
        <!-- /.invoice -->

<script>
        let cart = [];

        function refreshTable() {
            let tbody = document.getElementById("items");
            tbody.innerHTML = '';
            let subtotal = 0;
            let totalDiscount = 0;

            cart.forEach((item, i) => {
              let itemTotal = item.qty * item.price;
              let itemDiscount = item.discount || 0;

              subtotal += itemTotal;
              totalDiscount += itemDiscount;

              let lineTotal = itemTotal - itemDiscount;

              tbody.innerHTML += `
                <tr>
                  <td>${i + 1}</td>
                  <td>${item.name}</td>
                  <td>${item.price}</td>
                  <td>${item.qty}</td>
                  <td>${item.discount}</td>
                  <td>${lineTotal.toFixed(2)}</td>
                  <td><button onclick="removeRow(${i})" class="btn btn-danger btn-sm">X</button></td>
                </tr>
              `;
            });

            document.getElementById("subtotal").innerText = subtotal.toFixed(2);
            document.getElementById("total-discount").innerText = totalDiscount.toFixed(2);
            document.getElementById("net-total").innerText = (subtotal - totalDiscount).toFixed(2);
          }


        function removeRow(index) {
          cart.splice(index, 1);
          refreshTable();
        }

        document.getElementById("btnAddToCart").addEventListener("click", function () {
          let product = document.getElementById("cmbProduct");
          let name = product.options[product.selectedIndex].text;
          let product_id = product.value;
          let price = parseFloat(document.getElementById("txtPrice").value || 0);
          let qty = parseInt(document.getElementById("txtQty").value || 0);
          let discount = parseFloat(document.getElementById("txtDiscount").value || 0);

          if (product_id === "" || qty <= 0 || price <= 0) {
            alert("Product, price, or qty thik moto din");
            return;
          }

          cart.push({ product_id, name, price, qty, discount });
          refreshTable();

          document.getElementById("txtPrice").value = '';
          document.getElementById("txtQty").value = '';
          document.getElementById("txtDiscount").value = '';
        });

        document.getElementById("clearAll").addEventListener("click", function () {
          cart = [];
          refreshTable();
        });

        document.getElementById("btnProcessOrder").addEventListener("click", function () {
          if (cart.length === 0) {
            alert("Kono item nai cart e");
            return;
          }

          let subtotal = parseFloat(document.getElementById("net-total").innerText) || 0;

          

          let data = {
            customer_id: document.querySelector("select[name='customer']").value,
            order_date: document.getElementById("txtOrderDate").value,
            delivery_date: document.getElementById("txtDueDate").value,
            shipping_address: document.getElementById("txtShippingAddress").value,
            remark: document.getElementById("txtRemark").value,
            order_total: subtotal,
            paid_amount: subtotal,
            discount: 0,
            vat: 0,
            items: cart.map(item => ({
            product_id: item.product_id,
            qty: item.qty,
            price: item.price,
            vat: item.vat || 0,
            discount: item.discount
            }))
          };

          fetch("http://localhost/laravel12/project_app/public/api/orders", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "Accept": "application/json"
            },
            body: JSON.stringify(data)
          })
            .then(async res => {
              const text = await res.text();
              console.log("🔍 RAW response:", text);
              try {
                const json = JSON.parse(text);
                if (json.msg === "Success") {
                  alert("Order ID " + json.id + " saved.");
                  cart = [];
                  refreshTable();
                } else {
                  alert("API Error: " + (json.error || JSON.stringify(json)));
                }
              } catch (e) {
                console.error("❌ JSON parse failed!", e);
                alert("Invalid JSON from API");
              }
            })
            .catch(err => {
              alert("Failed to connect to API.");
              console.error(err);
            });

        });
</script>



@endsection
