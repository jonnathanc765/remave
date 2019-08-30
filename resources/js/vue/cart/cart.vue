<template>
    <div>
        <h2>Carrito de compras</h2>
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                
                <product v-for="(product, index) of cartItems" :key="product.rowId" :product="product" :index="index"></product>

                <tr v-if="cartItems.length == 0">
                    <td colspan="4">
                        <h3 class="text-center">Carrito Vacio</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Total</td>
                    <td>
                        {{ total | truncate }}
                    </td>
                </tr>

            </tbody>
        </table>
        


         <div class="checkout_btn_inner d-flex align-items-center justify-content-between">
            <button class="button-danger" @click="emptyCart" type="button">
                Eliminar Todo
            </button>
            <div class="d-flex justify-content-end">
                <a class="gray_btn" href="/">
                    Continuar Comprando
                </a>
                <a class="customized-button ml-2" href="#" @click="send">
                    Confirmar Compra
                </a>
            </div>

        </div>
        
        
    </div>
    
</template>

<script>
export default {
    props: {
        cart: '',
        images: ''
    },
    data() {
        return {
            cartItems: '',
            total: 0
        }
    },
    filters: {
        truncate(number) {
            return number.toFixed(2);
        }   
    },
    methods: {
        send() {
            this.$swal({
                title: '¿Esta Seguro?',
                text: 'Por favor confirme su accion!',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, continuar',
                cancelButtonText: 'No, seguir aqui'
            })
            .then((result) => {
                if (result.value) {
                    window.location.replace('/cart/checkout');
                }
            });
        },
        emptyCart() {
            this.$swal({
                title: '¿Esta Seguro?',
                text: 'Esta accion no se puede revertir',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, Borrar',
                cancelButtonText: 'Mantener Carrito'
            })
            .then((result) => {
                this.emptyCartPetition();
            });
        },
        emptyCartPetition() {
            let self = this;
            axios.post('/cart/destroy', {
                '_method': 'DELETE'
            })
            .then(response => {
                this.$swal({
                    title: 'Exitoso',
                    type: 'success',
                    text: response.data.message
                });
                self.cartItems = [];
                self.total = 0;
            })
            .catch(error => {
                return -1;
            });
        },
        updateTotal() {
            this.total = 0;
            for (var cart of this.cartItems) {
                this.total += cart.subtotal;
            }
        }
        
    },
    created() {

        this.cartItems = JSON.parse(this.cart);
        this.updateTotal();
        
    }
}
</script>

<style lang="scss">
.customized-button {
    height: 40px;
    padding: 0px 44px;
    line-height: 38px;
    text-transform: capitalize;
    background: #384aeb;
    border-radius: 30px;
    color: #fff;
    font-weight: 500;
}   
</style>
