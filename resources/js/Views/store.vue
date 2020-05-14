<template>
	<div class="col-12">
		<h4 class="text-center" v-text="store.name"></h4>
        <div>
            <router-link :to="{name: 'add-product', params: {id: this.id}}" class="btn btn-outline-success">Agregar producto</router-link>
        </div>
        <div v-if="products.length == 0" class="my-4">
            <h4 class="text-center">No hay productos registrados en la tienda</h4>
        </div>
        <div v-else>
            <table class="table table-striped table-dark mt-4">
                <thead>
                    <tr>
                        <th scope="col">SKU</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Valor</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(product, index) in products">
                        <th scope="row" v-text="product.sku"></th>
                        <td v-text="product.name"></td>
                        <td v-text="product.value"></td>
                        <td>
                            <a class="mx-1 btn" @click="edit(index, product.id)"><i class='fas fa-edit'></i></a>
                            <a class="mx-1 btn" @click="pr_delete(index, product.id)"><i class='fas fa-trash'></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edited" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Nombre de producto</label>
                                <input type="text" class="form-control" id="name" placeholder="Escriba el nombre del producto aqui" v-model="product_edit.name" required>
                            </div>
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control" id="sku" placeholder="ingrese SKU" v-model="product_edit.sku" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control" placeholder="Escriba la descripcion del producto aqui" id="descripcion" v-model="product_edit.description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="value">Valor</label>
                                <input type="number" class="form-control" id="value" placeholder="Valor del producto" v-model="product_edit.value" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Ingrese imagen</label>
                                <input type="file" class="form-control" id="image" @change="getImage" required>
                            </div>
                            <div class="w-25" v-if="product_edit">
                                <img :src="'../storage/'+product_edit.image_path" class="img-fluid">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="update">Guadar cambios</button>
                    </div>
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
                products: '',
                product_edit: '',
                image_new: ''
            };
        },
        created(){
            let url = this.url_base+'/api/store/'+this.id;
            axios.get(url).then(response => {
               this.store = response.data.store;
               this.products = response.data.products;
               console.log(this.products);
            }).catch(error =>{
                console.log(error);
            });
        },
          methods:{
            pr_delete(index, id){
                this.products.splice(index, 1);
                let url = 'http://localhost/tienda-prueba/public/api/delete-product/'+id;
                axios.get(url).then(response => {
                    console.log('delete')
                }).catch(error =>{
                    console.log(error.response);
                });
            },
            edit(index){
                this.product_edit = '';
                this.product_edit = this.products[index];
                $('#modal-edit').modal('show');
            },
            update(){
                let url = 'http://localhost/tienda-prueba/public/api/edit-product';
                var formdata = new FormData();
                formdata.append('id', this.product_edit.id);
                formdata.append('name', this.product_edit.name);
                formdata.append('sku', this.product_edit.sku);
                formdata.append('description', this.product_edit.description);
                formdata.append('value', this.product_edit.value);
                formdata.append('image', this.image_new);
                formdata.append('image_prev', this.product_edit.image_path);
                axios.post(url, formdata).then(response => {
                    $('#modal-edit').modal('hide');
                }).catch(error =>{
                    console.log(error.response);
                });
            },
            getImage:function(e){
                var file= e.target.files[0];
                this.image_new = file;
            },
        }
     }
</script>

