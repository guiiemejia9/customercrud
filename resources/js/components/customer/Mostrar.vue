<template>
    <div class="row">
        <div class="col-12 mb-2">
            <router-link :to='{name:"crearCustomer"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Numero Telefonico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="customer in customers" :key="customer.id">
                                    <td>{{ customer.id }}</td>
                                    <td>{{ customer.name }}</td>
                                    <td>{{ customer.address }}</td>
                                    <td>{{ customer.phone_number }}</td>
                                    <td>
                                        <router-link :to='{name:"editarCustomer",params:{id:customer.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="borrarCustomer(customer.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>                         
                        </table>
                    </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"customers",
    data(){
        return {
            customers:[]
        }
    },
    mounted(){
        this.mostrarCustomers()
    },
    methods:{
        async mostrarCustomers(){
            await this.axios.get('/api/customer').then(response=>{
                this.customers = response.data
            }).catch(error=>{
                console.log(error)
                this.customers = []
            })
        },
        borrarCustomer(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/customer/${id}`).then(response=>{
                    this.mostrarCustomers()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>