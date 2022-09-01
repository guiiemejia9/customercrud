<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Customer</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="customer.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" v-model="customer.address">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Numero Telefonico</label>
                                    <input type="text" class="form-control" v-model="customer.phone_number">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"crear-customer",
    data(){
        return {
            customer:{
                nombre:"",
                address:"",
                phone_number:""
            }
        }
    },
    methods:{
        async crear(){
            await this.axios.post('/api/customer',this.customer).then(response=>{
                this.$router.push({name:"mostrarCustomers"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>