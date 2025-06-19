@extends('layouts.app')
@section('content')
<div class="card p-4 w-100" style="max-width: 400px;">
    <h4 class="text-center mb-4">Product Entry Form</h4>
    @include('partials.form')

    <h4 class="text-center mt-4">Cart</h4>
    @include('partials.table')
</div>
@endsection

@push('js')
    <script>
        const { createApp, ref, onMounted } = Vue

        createApp({
            setup() {
                const defaults = {
                    product_name: '',
                    quantity: 1,
                    price: ''
                }

                const form = ref(defaults)
                const cart = ref([])

                const submitForm = async () => {
                    try {
                        console.log('>>>', form.value)
                        const response = await axios.post('/store', form.value)
                        console.log('>>>', response)
                        Swal.fire({
                            title: 'Product successfully added to cart!',
                            text: 'Do you want to continue',
                            icon: 'success',
                        })
                        form.value = defaults
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
                        console.log('>>>>', response.data.cart)
                    } catch (error) {

                    }
                }

                onMounted(() => fetchCart())

                return {
                    form,
                    cart,
                    submitForm
                }
            }
        }).mount('#app')
    </script>
@endpush
