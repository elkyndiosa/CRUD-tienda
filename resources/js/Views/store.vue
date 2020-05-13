<template>
	<div class="col-md-8">
		<h4 class="text-center" v-text="store.name"></h4>
        <div>
            <router-link :to="{name: 'add-product'}" class="btn btn-outline-success">Agregar producto</router-link>
        </div>
        <div v-if="products.length == 0" class="my-4">
            <h4 class="text-center">No hay productos registrados</h4>
        </div>
        <div v-else>
            <div class="card mt-4" v-for="product in products">
                <div class="card-body d-flex justify-content-around">
                    <h5 class="card-title text-left col-7 m-0" v-text="product.name">
                    </h5>
                </div>
            </div>
        </div>

	</div>
</template>
<script>
    export default {
        props: ['id'],
        data(){
            return{
                url_base: 'http://localhost/tienda-prueba/public',
                store: '',
                products: ''
            };
        },
        created(){
            let url = this.url_base+'/api/store/'+this.id;
            axios.get(url).then(response => {
               this.store = response.data.store;
               this.products = response.data.products;
            }).catch(error =>{
                console.log(error);
            });
        }
     }
</script>

