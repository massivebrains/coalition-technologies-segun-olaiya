<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Quantity in stock</th>
        <th scope="col">Price per item</th>
        <th scope="col">Datetime submitted</th>
        <th scope="col">Total value number</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="row in cart">
        <td>@{{ row.product_name }}</td>
        <td>@{{ row.quantity }}</td>
        <td>$@{{row.price}}</td>
        <td>@{{formatDate(row.created_at)}}</td>
        <td>$@{{row.quantity * row.price}}</td>
    </tr>
    <tr v-if="cart.length === 0">
        <td colspan="5" class="text-center">When you add items to your cart, they will show up here</td>
    </tr>
    <tr v-else>
        <td colspan="4">Total</td>
        <td><strong>@{{total}}</strong></td>
    </tr>
    </tbody>
</table>
