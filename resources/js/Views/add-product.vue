<template>
	<div class="col-md-8">
		<h4 class="text-center">Agregar nueva Producto</h4>
		<p class="text-center">Agrega tu nueva producto. Por favor llena los datos</p>
		<div class="card">
			<div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Nombre de producto</label>
                        <input type="text" class="form-control input-edit" id="name" placeholder="Escriba el nombre del producto aqui" v-model="product.name" required>
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
                    <div class="custom-file my-4">
                        <input type="file" class="custom-file-input" required required @change="getImage">
                        <label class="custom-file-label">Ingrese imagen...</label>
                    </div>

                    <button type="submit" @click.prevent="addproduct" class="btn btn-outline-primary">Agregar producto</button>
                </form>
			</div>
		</div>
	</div>
</template>
<script>
    export default {
        props: ['id'],
        data(){
            return{
                product: {
                    'name': '',
                    'nombre': '',
                    'sku': '',
                    'descripción': '',
                    'valor': ''
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
                formdata.append('store_id', this.id);
                axios.post(url, formdata).then(response => {
                     this.product= {'name': '','nombre': '','sku': '','descripción': '','valor': ''};
                     this.image= '';
                     var dir= 'http://localhost/tienda-prueba/public/store/'+this.id;
                     console.log(dir);
                     $(location).attr('href', dir);
                }).catch(error =>{
                    console.log(error.response);
                });
            },
        }

     }
</script>
