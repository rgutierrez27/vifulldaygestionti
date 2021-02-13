<template>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Organizacion</th>
                    <th scope="col">Certificado</th>
                    <th scope="col">Email Verificado</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,key) in items" :key="item.id">
                    <th scope="row">{{key+1}}</th>
                    <td>{{item.name}}</td>
                    <td>{{item.email}}</td>
                    <td>{{item.phone}}</td>
                    <td>{{item.organization}}</td>
                    <td v-if="item.IS_CERTIFICATE == 1"> Si</td> <td v-else> No</td>
                    <td v-if="item.confirmed == 1"> Si</td> <td v-else> No</td>
                </tr>
            </tbody>
        </table>


    </div>
</template>

<script>
export default {
    data() {
        return {
            items: []
        };
    },
    methods: {
        getParticipants : function (){
            axios.get(`/getparticipant`)
                .then((data) =>{
                    if (data.data.error != true) {
                        this.items = data.data.infoParcticipant
                    }else{
                        this.items = []
                    }

                })
                .catch(()=>{
                    this.issucess = false
                })
                .finally(() => this.loading = false)
        }
    },
    mounted() {
        this.getParticipants();
    },
};
</script>
