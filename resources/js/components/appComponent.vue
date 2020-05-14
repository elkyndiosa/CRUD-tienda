<template>
    <div class="row justify-content-center">
        <div class="jumbotron-fluid pb-3 pt-4">
            <h5 class="">Aqui puedes buscar tiendas por id</h5>
            <p>Si utilizo los seedors de la instalacion, las tiendas creados tienen id desde 1 hasta el 20</p>
            <hr class="my-4">
            <form v-on:submit.prevent="" class="form-inline">
                <div class="form-group col-6">
                    <input type="number" class="form-control w-50 mr-3 col-12" placeholder="Ingrese id de producto" id="id" v-model="searchs_id">
                </div>
                <div class="form-group">
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

