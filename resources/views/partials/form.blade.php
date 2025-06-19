<form>
    <div class="form-group">
        <label for="productName">Product name</label>
        <input type="text" class="form-control" placeholder="Enter product name" v-model="form.product_name">
    </div>
    <div class="form-group">
        <label for="quantity">Quantity in stock</label>
        <input type="number" class="form-control" placeholder="Enter quantity" v-model="form.quantity">
    </div>
    <div class="form-group">
        <label for="price">Price per item ($)</label>
        <input type="number" class="form-control" placeholder="Enter price" step="0.01" v-model="form.price">
    </div>
    <button type="button" class="btn btn-primary btn-block" @click="submitForm" v-if="form.id === ''">Submit</button>
    <button type="button" class="btn btn-info btn-block" v-else @click="saveForm">Save</button>
</form>
