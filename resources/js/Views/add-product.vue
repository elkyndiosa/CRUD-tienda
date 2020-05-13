<template>
	<div class="col-md-8">
		<h4 class="text-center">Agregar nueva Producto</h4>
		<p class="text-center">Agrega tu nueva producto. Por favor llena los datos</p>
		<div class="card">
			<div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Nombre de producto</label>
                        <input type="text" class="form-control" id="name" placeholder="Escriba el nombre del producto aqui" v-model="product.name" required>
                    </div>
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control" id="sku" placeholder="ingrese SKU" v-model="product.sku" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" placeholder="Escriba la descripcion del producto aqui" id="descripcion" v-model="product.description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="value">Valor</label>
                        <input type="number" class="form-control" id="value" placeholder="Valor del producto" v-model="product.value" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Ingrese imagen</label>
                        <input type="file" class="form-control" id="image" required @change="getImage">
                    </div>
                    <button type="submit" @click.prevent="addproduct" class="btn btn-primary">Agregar producto</button>
                </form>
			</div>
		</div>
	</div>
</template>
<script>
    export default {
        data(){
            return{
                product: {
                    'name': '',
                    'nombre': '',
                    'sku': '',
                    'descripción': '',
                    'valor': '',
                },
                image: ''
            };
        },
        methods:{
            getImage:function(e){
                var file= e.target.files[0];
                this.image = file;
                // this.showImage(file);
                // $('#img-show').hide();
            },
            addproduct(){
                let url = 'http://localhost/tienda-prueba/public/api/add-product'
                var formdata = new FormData();
                formdata.append('name', this.product.name);
                formdata.append('sku', this.product.sku);
                formdata.append('description', this.product.description);
                formdata.append('value', this.product.value);
                formdata.append('image', this.image);
                axios.post(url, formdata).then(response => {
                    console.log(response);
                    // window.location.href = "http://localhost/tienda-prueba/public/";
                }).catch(error =>{
                    console.log(error);
                });
            },
        }

     }
</script>
