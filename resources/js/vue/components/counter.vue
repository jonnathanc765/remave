<template>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-primary" type="button" id="button-minus" @click="decrease">-</button>
        </div>
        <input value="1" type="text" v-model="quantity" class="form-control" name="quantity" placeholder="Cantidad" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button" id="button-plus" @click="increase">+</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            quantity: 1
        }
    },
    methods: {
        increase() {
            return this.quantity++;
        },
        decrease() {
            if (this.quantity < 1 ) {
                return;
            }
            return this.quantity--;
        }
    }
    
}
</script>
