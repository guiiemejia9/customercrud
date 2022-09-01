<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Customer</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
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
    name:"editar-customer",
    data(){
        return {
            customer:{
                name:"",
                address:"",
                phone_number:""
            }
        }
    },
    mounted(){
        this.mostrarCustomer()
    },
    methods:{
        async mostrarCustomer(){
            await this.axios.get(`/api/customer/${this.$route.params.id}`).then(response=>{
                const { name, address, phone_number } = response.data
                this.customer.name = name
                this.customer.address = address
                this.customer.phone_number = phone_number
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/customer/${this.$route.params.id}`,this.customer).then(response=>{
                this.$router.push({name:"mostrarCustomers"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>