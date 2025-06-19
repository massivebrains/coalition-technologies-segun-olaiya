<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Quantity in stock</th>
        <th>Price per item</th>
        <th>Datetime submitted</th>
        <th>Total value number</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="row in cart">
        <td>@{{ row.product_name }}</td>
        <td>@{{ row.quantity }}</td>
        <td>$@{{row.price}}</td>
        <td>@{{formatDate(row.created_at)}}</td>
        <td>$@{{row.quantity * row.price}}</td>
        <td>
            <button class="btn btn-sm btn-primary" @click="() => editForm(row)">Edit</button>
        </td>
    </tr>
    <tr v-if="cart.length === 0">
        <td colspan="6" class="text-center">When you add items to your cart, they will show up here</td>
    </tr>
    <tr v-else>
        <td colspan="5">Total</td>
        <td><strong>@{{total}}</strong></td>
    </tr>
    </tbody>
</table>
