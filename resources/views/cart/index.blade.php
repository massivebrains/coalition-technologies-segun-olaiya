@extends('layouts.app')
@section('content')
<div class="card p-4 w-200" style="max-width: 800px;">
    <h4 class="text-center mb-4">Product Entry Form</h4>
    <small class="text-center">Watch Demo <a href="https://www.loom.com/share/461f867d4599400da31adc5dd03ac969" target=="_blank">here</a></small>
    @include('partials.form')

    <template v-if="form.id === ''">
        <h4 class="text-center mt-4">Cart</h4>
        @include('partials.table')
    </template>

</div>
@endsection

@push('js')
    <script>
        const { createApp, ref, onMounted } = Vue

        createApp({
            setup() {
                const form = ref({
                    id: '',
                    product_name: '',
                    quantity: 1,
                    price: ''
                })
                const cart = ref([])
                const total = ref(0)

                const submitForm = async () => {
                    try {
                        await axios.post('/store', form.value)
                        Swal.fire({
                            title: 'Product successfully added to cart!',
                            icon: 'success',
                        })

                        form.value.product_name = ''
                        form.value.quantity = 1
                        form.value.price = ''
                        fetchCart()
                    } catch (error) {
                        Swal.fire({
                            title: 'Error',
                            text: error?.response?.data?.message || error.message,
                            icon: 'error',
                        })
                    }
                }

                const fetchCart = async () => {
                    try {
                        const response = await axios.get('/cart')
                        cart.value = response.data.cart
                        total.value = response.data.total
                    } catch (error) {

                    }
                }

                const formatDate = (isoString) => {
                    const date = new Date(isoString)

                    const options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: 'numeric',
                        minute: '2-digit',
                        hour12: true,
                    }

                    return date.toLocaleString('en-US', options)
                }

                const editForm = async (item) => {
                    form.value.id = item.id
                    form.value.product_name = item.product_name
                    form.value.quantity = item.quantity
                    form.value.price = item.price
                }

                const saveForm = async () => {
                    try {
                        await axios.post('/update', form.value)
                        Swal.fire({
                            title: 'Product successfully saved in cart!',
                            icon: 'success',
                        })

                        form.value.id = ''
                        form.value.product_name = ''
                        form.value.quantity = 1
                        form.value.price = ''
                        fetchCart()
                    } catch (error) {
                        Swal.fire({
                            title: 'Error',
                            text: error?.response?.data?.message || error.message,
                            icon: 'error',
                        })
                    }
                }

                onMounted(() => fetchCart())

                return {
                    form,
                    cart,
                    total,
                    submitForm,
                    formatDate,
                    editForm,
                    saveForm
                }
            }
        }).mount('#app')
    </script>
@endpush
