<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price ($)</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="row in cart">
        <td>@{{ row.product_name }}</td>
        <td>@{{ row.quantity }}</td>
        <td>$@{{row.price}}</td>
    </tr>
    <tr v-if="cart.length === 0">
        <td colspan="3">When you add items to your cart, they will show up here</td>
    </tr>
    </tbody>
</table>
