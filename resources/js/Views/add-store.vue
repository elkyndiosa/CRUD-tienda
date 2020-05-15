<template>
	<div class="col-md-8">
		<h4 class="text-center">Agregar nueva tienda</h4>
		<p class="text-center">Agrega tu nueva tienda. Por favor llena los datos</p>
		<div class="card">
			<div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Nombre de tienda</label>
                        <input type="text" class="form-control" id="name" placeholder="Escriba el nombre de su tienda aqui" v-model="name" required>
                    </div>
                    <div class="error" v-if="error.name">
                        <p class="text-danger" v-text="error.name[0]"></p>
                    </div>
                    <button type="submit" @click.prevent="addstore" class="btn btn-primary">Agregar tienda</button>
                </form>
			</div>
		</div>
	</div>
</template>
<script>
    export default {
        data(){
            return{
                name: '',
                error: ''
            };
        },
        methods:{
            addstore(){
                let url = 'http://localhost/tienda-prueba/public/api/add-store'
                var formdata = new FormData();
                formdata.append('name', this.name);
                axios.post(url, formdata).then(response => {
                    window.location.href = "http://localhost/tienda-prueba/public/";
                }).catch(error =>{
                    this.error = error.response.data.errors;
                });
            },
        }

     }
</script>
