<template>
    <div class="row justify-content-center">
        <div class="jumbotron-fluid pb-3 pt-4 px-5 px-md-3">
            <h5 class="">Aqui puedes buscar tiendas por id</h5>
            <p>Si utilizo los seedors de la instalacion, las tiendas creados tienen id desde 1 hasta el 20</p>
            <hr class="my-4">
            <form v-on:submit.prevent="" class="form-inline d-flex justify-content-center justify-content-md-end">
                <div class="form-group col-12 col-md-5 px-0">
                    <input type="number" class="form-control mr-3 col-12" placeholder="Ingrese id de producto" id="id" v-model="searchs_id">
                </div>
                <div class="form-group col-8 col-md-3 col-md-1 mt-2 mt-md-0 px-0">
                    <router-link :to="{name: 'store', params: {id: searchs_id}}" class="btn btn-success form-control">Buscar</router-link>
                </div>
            </form>
        </div>
        <transition name='slide-fade' mode='out-in'>
            <router-view :key="$route.fullPath"></router-view>
        </transition>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                searchs_id: ''
            };
        }
     }
</script>

