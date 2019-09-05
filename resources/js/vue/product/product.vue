<template>
    

    <div class="product-item product_1">

        <div v-for="(product, index) of products" :key="index">
             
            <hr>
            <button type="button" class="btn btn-danger float-right" @click="destroy(index)"><i class="fa fa-trash"></i></button>
            <legend class="heading-reference"><span>Producto N° {{ index + 1 }}</span></legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="hidden" :name="'ID_code_' + index" value="">
                    <label :for="'ID_color_' + index" class="col-form-label label_color">Marcas:</label>
                    <div class="input-group mb-3">
                        <select class="form-control" :name="'ID_color_' + index" :id="'ID_color_' + index">
                            <option :value="color" v-for="(color, i) of colors" :key="i">{{ color }}</option>
                        </select>
                    </div>
                </div>
              
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label :for="'ID_price_' + index" class="label_price">Precio:</label>
                    <input type="text" :id="'ID_price_' + index" :name="'ID_price_' + index" class="input_price form-control"
                        placeholder="" value="">
                </div>
                <div class="form-group col-md-6">
                    <label :for="'ID_off_' + index" class="label_off">Descuento:</label>
                    <input type="text" :id="'ID_off_' + index" :name="'ID_off_' + index"
                        class="form-control input_off" placeholder="70% (opcional)"
                        value="">
                </div>
            </div>

            <input type="hidden" v-model="quantity" name="quantity">

            
            <h2>Cargar nuevas fotos</h2>
            <div class="custom-file">
                <input type="file" :id="'ID_photo_' + index" :name="'ID_photo_' + index + '[]'" class="custom-file-input input_photo"
                    multiple="multiple" @change="onFileChange($event, index)" ref="imageInput">
                <label :for="'ID_photo_' + index" class="label_photo custom-file-label">Fotos</label>

                    <div v-if="products[index]['url'].length > 0" :id="'thumb-output_' + index">
                        
                        <div v-for="(uri, index) of products[index]['url']" :key="index">
                            <img class="img-uploading" :src="uri" />
                        </div>
                        
                        <button class="btn btn-info btn-rounded" @click="resetInputFile(index)" type="button">Limpiar</button>
                    </div>                    
               
                
                    
                

            </div>

            

        </div>

        <button style="" class="btn btn-primary btn-save" @click="create" type="button"><i class="fa fa-plus mr-1"></i> Agregar nuevo producto</button>
    </div>
        
    
</template>

<script>



export default {
    // Lugar donde se declaran las variables a usar en la instacia de vue
    data() {
        return {
            quantity: 1,
            products: [{
                url: []
            }],
            colors: [
                'Mocar',
                'Toyota',
                'Chery',
                'GM Genuine',
                'Acdelco',
                'Mitsuba',
                'Filko',
                'Bosch',
                'Vortex',
                'Mamusa',
                'Dorado',
                'Vulko',
                'Otros'
            ]
        }
    },
    props: {
        size_type: ''
    },

    // Todos los metodos que se usaran en el componente de Vue
    methods: {
        create() {
            this.products.push({url: []});
            this.quantity++;
        },
        destroy(index) {
            // destruye un producto si existe mas de uno
            if (this.products.length > 1) {
                this.products.splice(index, 1);
                this.quantity--;
            }
        },
        onFileChange(e, index) {

            this.resetInputFile(index);
            
            // capturar el eveton Change
            let files = e.target.files;

            // itera cada uno de los archivos
            for (let file of files) {
                this.products[index]['url'].push(URL.createObjectURL(file));              
            }
            
        },
        resetInputFile(index) {
            // hace referencia al input de tipo file y lo vacia, y a su vez vacia la variable url
            this.$refs.imageInput.value = null;
            this.products[index]['url'] = [];
            // retorna vacio
            return;
        }

    }
}
</script>

<style>

/* Aqui van todos los estilos */

div[id^=thumb-output]{
    margin-bottom: 15px;
}

div[id^=thumb-output] div{

    display: inline-block;
    position: relative;
    margin-right: 10px;
    margin-bottom: 10px;
}

@media screen and (max-width:768px) {

.btn-save {
    position:absolute; 
    right:-7px; 
    bottom:-53px;
}
    
}

@media screen and (min-width:769px) {

.btn-save {
    position:relative; 
    left: 0;
    top:15px;
}
    
}
</style>
