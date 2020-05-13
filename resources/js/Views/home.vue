<template>
	<div class="col-md-8">
		<h4 class="text-center">Lista de tiendas</h4>
		<div v-if="stores == ''">
			<h4 class="text-center">No existen tiendas registradas</h4>
		</div>
		<div v-else>
			<div class="card mt-4" v-for="store in stores">
				<div class="card-body d-flex justify-content-around">
					<h5 class="card-title text-left col-7 m-0" v-text="store.name">
					</h5>
                    <router-link :to="{name: 'store', params: {id: store.id}}" class="btn btn-outline-success col-3">Ver tienda</router-link>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
    export default {
        data(){
            return{
                url_base: 'http://localhost/tienda-prueba/public',
                stores: ''
            };
        },
        created(){
            let url = this.url_base+'/api/stores'
            axios.get(url).then(response => {
               this.stores = response.data
            });
        }
    }
</script>

