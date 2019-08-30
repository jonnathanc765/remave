<template>
     <tr>
        <td>


            <div class="media">
                <div class="d-flex justify-content-center mr-3" style="width: 170px; height: 50px">
                    <img :src="'/storage/' + product.image" alt="">
                </div>
                <div class="media-body">
                    <a :href="'/product/' + product.code">
                        <p>{{ product.name }}</p>
                    </a>
                </div>
            </div>


        </td>
        <td>{{ product.price | truncate }}</td>
        <td>
        <div class="product_count">
            <input type="text" title="Cantidad" class="input-text qty" v-model="product.qty" @keyup="change">
            <button class="increase items-count" type="button" @click="increment"><i class="lnr lnr-chevron-up"></i></button>
            <button class="reduced items-count" type="button" @click="decrease"><i class="lnr lnr-chevron-down"></i></button>
        </div>

        </td>
        <td>{{ product.subtotal | truncate }}</td>
        <td>
            <button class="btn btn-danger" @click="destroy">
                <i class="fas fa-times"></i>
            </button>
        </td>
     </tr>
</template>

<script>
export default {
    props: {
        product: null,
        index: null
    },
    data() {
        return {
            time: null
        }
    },
    filters: {
        truncate(number) {
            return number.toFixed(2);
        }   
    },
    methods: {
        increment() {
            this.product.qty++;
            this.change();
        },
        decrease() {
            if (this.product.qty > 1)
                this.product.qty--;
                this.change();
            return;
        },
        change() {
            this.updateSubtotal();
            this.updateTotalItemsCart();      
            var vm = this;
            clearTimeout(this.time);
            this.time = window.setTimeout(() => {
                this.update(vm.product.rowId, vm.product.qty);
            }, 500);
        },
        destroy() {
            
            this.update(this.product.rowId, 0);
            return this.$parent.cartItems.splice(this.index, 1);

        },
        updateSubtotal() {
            this.product.subtotal = this.product.qty * this.product.price;
            this.$parent.updateTotal();
        },
        update(rowId, quantity) {
            

            axios.put('/cart/update', {
                rowId, quantity
            })
            .then(response => {
                
                return 0;
            })
            .catch(error => {
                console.log('¡Ha ocurrido un error!');
                return -1;
            });
        },
        updateTotalItemsCart() {
            var value = 0;
            this.$parent.cartItems.forEach(item => {
                value += item.qty;
            });
            this.$store.commit('setCount', value);
        }
         
    },
    created() {
        this.updateTotalItemsCart();
    }
}
</script>
