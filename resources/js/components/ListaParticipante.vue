<template>
    <div class="container">
<br>
        <div class="row  d-flex justify-content-between align-center">
            <div class="col-md-4">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Total de Registrados</h5>
                        <p class="card-text">
                        {{this.totalRegister}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Certificados</h5>
                        <p class="card-text">
                        {{this.totalCertificate}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Email Verificados</h5>
                        <p class="card-text">
                        {{this.totalEmailVerify}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,key) in items" :key="item.id">
                    <th  class="data" scope="row">{{key+1}}</th>
                    <td>{{item.nombrecompleto}}</td>
                    <td>{{item.email}}</td>
                    <td>{{item.phone}}</td>
                    <td>{{item.organization}}</td>
                    <td  v-if="item.is_certificado == 1"> Si</td> <td v-else> No</td>
                    <td v-if="item.confirmed == 1"> Si</td> <td v-else> No</td>
                    <td>
                        <button type="button" title="Quiero Certificado" class="btn btn-primary" v-on:click="certificar(item.id_participante)"><i class="fas fa-certificate"></i></button>
                        <button type="button" title="Eliminar Registro" class="btn btn-danger" v-on:click="deleteParticipant(item.id_participante)"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            items: [],
            totalRegister: 0,
            totalCertificate:0,
            totalEmailVerify:0,
            idParticipant: ''
        };
    },
    methods: {
        getParticipants : function (){
            axios.get(`/getparticipant`)
                .then((data) =>{
                    if (data.data.error != true) {
                        this.items = data.data.infoParcticipant
                        this.totalRegister = this.items.length;
                        var contCertificate = 0;
                        var contConfirmate = 0;
                        for (let i = 0; i < this.items.length; i++) {
                            // console.log(this.items[i].is_certificado)
                            if (this.items[i].is_certificado === 1) contCertificate ++;
                            if (this.items[i].confirmed === 1) contConfirmate ++;
                        }


                        this.totalCertificate = contCertificate;
                        this.totalEmailVerify = contConfirmate;
                    }else{
                        this.items = []
                    }

                })
                .catch(()=>{

                })
                .finally()
        },

        certificar : function (idParticipan){
            var params = {}
            params = {idParticipant: idParticipan}
			axios.post(`/changeOptionCerticate`, params )
                .then((data) =>{
                    if (data.data.error != true) {
                        this.getParticipants()
                    }else{
                        this.items = []
                    }

                })
                .catch(()=>{

                })
                .finally()
        },

        deleteParticipant : function (idParticipan){
            var params = {}
            params = {idParticipant: idParticipan}
			axios.post(`/deleteParticipant`, params )
                .then((data) =>{
                    if (data.data.error != true) {
                        this.getParticipants()
                    }else{
                        this.items = []
                    }

                })
                .catch(()=>{

                })
                .finally()
        }
    },
    mounted() {
        this.getParticipants();
    },
};

</script>

<style scoped>
.btn-primary {
	color: #fff;
	background-color: #0d6efd;
	border-color: #0d6efd
}

.btn-primary:hover {
	color: #fff;
	background-color: #0b5ed7;
	border-color: #0a58ca
}

.btn-check:focus+.btn-primary,
.btn-primary:focus {
	color: #fff;
	background-color: #0b5ed7;
	border-color: #0a58ca;
	box-shadow: 0 0 0 .25rem rgba(49, 132, 253, .5)
}

.btn-check:active+.btn-primary,
.btn-check:checked+.btn-primary,
.btn-primary.active,
.btn-primary:active,
.show>.btn-primary.dropdown-toggle {
	color: #fff;
	background-color: #0a58ca;
	border-color: #0a53be
}

.btn-check:active+.btn-primary:focus,
.btn-check:checked+.btn-primary:focus,
.btn-primary.active:focus,
.btn-primary:active:focus,
.show>.btn-primary.dropdown-toggle:focus {
	box-shadow: 0 0 0 .25rem rgba(49, 132, 253, .5)
}

.btn-primary.disabled,
.btn-primary:disabled {
	color: #fff;
	background-color: #0d6efd;
	border-color: #0d6efd
}

.btn-secondary {
	color: #fff;
	background-color: #6c757d;
	border-color: #6c757d
}

.btn-secondary:hover {
	color: #fff;
	background-color: #5c636a;
	border-color: #565e64
}

.btn-check:focus+.btn-secondary,
.btn-secondary:focus {
	color: #fff;
	background-color: #5c636a;
	border-color: #565e64;
	box-shadow: 0 0 0 .25rem rgba(130, 138, 145, .5)
}

.btn-check:active+.btn-secondary,
.btn-check:checked+.btn-secondary,
.btn-secondary.active,
.btn-secondary:active,
.show>.btn-secondary.dropdown-toggle {
	color: #fff;
	background-color: #565e64;
	border-color: #51585e
}

.btn-check:active+.btn-secondary:focus,
.btn-check:checked+.btn-secondary:focus,
.btn-secondary.active:focus,
.btn-secondary:active:focus,
.show>.btn-secondary.dropdown-toggle:focus {
	box-shadow: 0 0 0 .25rem rgba(130, 138, 145, .5)
}

.btn-secondary.disabled,
.btn-secondary:disabled {
	color: #fff;
	background-color: #6c757d;
	border-color: #6c757d
}

.btn-success {
	color: #fff;
	background-color: #198754;
	border-color: #198754
}

.btn-success:hover {
	color: #fff;
	background-color: #157347;
	border-color: #146c43
}

.btn-check:focus+.btn-success,
.btn-success:focus {
	color: #fff;
	background-color: #157347;
	border-color: #146c43;
	box-shadow: 0 0 0 .25rem rgba(60, 153, 110, .5)
}

.btn-check:active+.btn-success,
.btn-check:checked+.btn-success,
.btn-success.active,
.btn-success:active,
.show>.btn-success.dropdown-toggle {
	color: #fff;
	background-color: #146c43;
	border-color: #13653f
}

.btn-check:active+.btn-success:focus,
.btn-check:checked+.btn-success:focus,
.btn-success.active:focus,
.btn-success:active:focus,
.show>.btn-success.dropdown-toggle:focus {
	box-shadow: 0 0 0 .25rem rgba(60, 153, 110, .5)
}

.btn-success.disabled,
.btn-success:disabled {
	color: #fff;
	background-color: #198754;
	border-color: #198754
}

.btn-info {
	color: #000;
	background-color: #0dcaf0;
	border-color: #0dcaf0
}

.btn-info:hover {
	color: #000;
	background-color: #31d2f2;
	border-color: #25cff2
}

.btn-check:focus+.btn-info,
.btn-info:focus {
	color: #000;
	background-color: #31d2f2;
	border-color: #25cff2;
	box-shadow: 0 0 0 .25rem rgba(11, 172, 204, .5)
}

.btn-check:active+.btn-info,
.btn-check:checked+.btn-info,
.btn-info.active,
.btn-info:active,
.show>.btn-info.dropdown-toggle {
	color: #000;
	background-color: #3dd5f3;
	border-color: #25cff2
}

.btn-check:active+.btn-info:focus,
.btn-check:checked+.btn-info:focus,
.btn-info.active:focus,
.btn-info:active:focus,
.show>.btn-info.dropdown-toggle:focus {
	box-shadow: 0 0 0 .25rem rgba(11, 172, 204, .5)
}

.btn-info.disabled,
.btn-info:disabled {
	color: #000;
	background-color: #0dcaf0;
	border-color: #0dcaf0
}

.btn-warning {
	color: #000;
	background-color: #ffc107;
	border-color: #ffc107
}

.btn-warning:hover {
	color: #000;
	background-color: #ffca2c;
	border-color: #ffc720
}

.btn-check:focus+.btn-warning,
.btn-warning:focus {
	color: #000;
	background-color: #ffca2c;
	border-color: #ffc720;
	box-shadow: 0 0 0 .25rem rgba(217, 164, 6, .5)
}

.btn-check:active+.btn-warning,
.btn-check:checked+.btn-warning,
.btn-warning.active,
.btn-warning:active,
.show>.btn-warning.dropdown-toggle {
	color: #000;
	background-color: #ffcd39;
	border-color: #ffc720
}

.btn-check:active+.btn-warning:focus,
.btn-check:checked+.btn-warning:focus,
.btn-warning.active:focus,
.btn-warning:active:focus,
.show>.btn-warning.dropdown-toggle:focus {
	box-shadow: 0 0 0 .25rem rgba(217, 164, 6, .5)
}

.btn-warning.disabled,
.btn-warning:disabled {
	color: #000;
	background-color: #ffc107;
	border-color: #ffc107
}

.btn-danger {
	color: #fff;
	background-color: #dc3545;
	border-color: #dc3545
}

.btn-danger:hover {
	color: #fff;
	background-color: #bb2d3b;
	border-color: #b02a37
}

.btn-check:focus+.btn-danger,
.btn-danger:focus {
	color: #fff;
	background-color: #bb2d3b;
	border-color: #b02a37;
	box-shadow: 0 0 0 .25rem rgba(225, 83, 97, .5)
}

.btn-check:active+.btn-danger,
.btn-check:checked+.btn-danger,
.btn-danger.active,
.btn-danger:active,
.show>.btn-danger.dropdown-toggle {
	color: #fff;
	background-color: #b02a37;
	border-color: #a52834
}

.btn-check:active+.btn-danger:focus,
.btn-check:checked+.btn-danger:focus,
.btn-danger.active:focus,
.btn-danger:active:focus,
.show>.btn-danger.dropdown-toggle:focus {
	box-shadow: 0 0 0 .25rem rgba(225, 83, 97, .5)
}

.btn-danger.disabled,
.btn-danger:disabled {
	color: #fff;
	background-color: #dc3545;
	border-color: #dc3545
}

.btn-light {
	color: #000;
	background-color: #f8f9fa;
	border-color: #f8f9fa
}

.btn-light:hover {
	color: #000;
	background-color: #f9fafb;
	border-color: #f9fafb
}

.btn-check:focus+.btn-light,
.btn-light:focus {
	color: #000;
	background-color: #f9fafb;
	border-color: #f9fafb;
	box-shadow: 0 0 0 .25rem rgba(211, 212, 213, .5)
}

.btn-check:active+.btn-light,
.btn-check:checked+.btn-light,
.btn-light.active,
.btn-light:active,
.show>.btn-light.dropdown-toggle {
	color: #000;
	background-color: #f9fafb;
	border-color: #f9fafb
}

.btn-check:active+.btn-light:focus,
.btn-check:checked+.btn-light:focus,
.btn-light.active:focus,
.btn-light:active:focus,
.show>.btn-light.dropdown-toggle:focus {
	box-shadow: 0 0 0 .25rem rgba(211, 212, 213, .5)
}

.btn-light.disabled,
.btn-light:disabled {
	color: #000;
	background-color: #f8f9fa;
	border-color: #f8f9fa
}

.btn-dark {
	color: #fff;
	background-color: #212529;
	border-color: #212529
}

.btn-dark:hover {
	color: #fff;
	background-color: #1c1f23;
	border-color: #1a1e21
}

.btn-check:focus+.btn-dark,
.btn-dark:focus {
	color: #fff;
	background-color: #1c1f23;
	border-color: #1a1e21;
	box-shadow: 0 0 0 .25rem rgba(66, 70, 73, .5)
}

.btn-check:active+.btn-dark,
.btn-check:checked+.btn-dark,
.btn-dark.active,
.btn-dark:active,
.show>.btn-dark.dropdown-toggle {
	color: #fff;
	background-color: #1a1e21;
	border-color: #191c1f
}

.btn-check:active+.btn-dark:focus,
.btn-check:checked+.btn-dark:focus,
.btn-dark.active:focus,
.btn-dark:active:focus,
.show>.btn-dark.dropdown-toggle:focus {
	box-shadow: 0 0 0 .25rem rgba(66, 70, 73, .5)
}

.btn-dark.disabled,
.btn-dark:disabled {
	color: #fff;
	background-color: #212529;
	border-color: #212529
}

.btn-outline-primary {
	color: #0d6efd;
	border-color: #0d6efd
}

.btn-outline-primary:hover {
	color: #fff;
	background-color: #0d6efd;
	border-color: #0d6efd
}

.btn-check:focus+.btn-outline-primary,
.btn-outline-primary:focus {
	box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .5)
}

.btn-check:active+.btn-outline-primary,
.btn-check:checked+.btn-outline-primary,
.btn-outline-primary.active,
.btn-outline-primary.dropdown-toggle.show,
.btn-outline-primary:active {
	color: #fff;
	background-color: #0d6efd;
	border-color: #0d6efd
}

.btn-check:active+.btn-outline-primary:focus,
.btn-check:checked+.btn-outline-primary:focus,
.btn-outline-primary.active:focus,
.btn-outline-primary.dropdown-toggle.show:focus,
.btn-outline-primary:active:focus {
	box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .5)
}

.btn-outline-primary.disabled,
.btn-outline-primary:disabled {
	color: #0d6efd;
	background-color: transparent
}

.btn-outline-secondary {
	color: #6c757d;
	border-color: #6c757d
}

.btn-outline-secondary:hover {
	color: #fff;
	background-color: #6c757d;
	border-color: #6c757d
}

.btn-check:focus+.btn-outline-secondary,
.btn-outline-secondary:focus {
	box-shadow: 0 0 0 .25rem rgba(108, 117, 125, .5)
}

.btn-check:active+.btn-outline-secondary,
.btn-check:checked+.btn-outline-secondary,
.btn-outline-secondary.active,
.btn-outline-secondary.dropdown-toggle.show,
.btn-outline-secondary:active {
	color: #fff;
	background-color: #6c757d;
	border-color: #6c757d
}

.btn-check:active+.btn-outline-secondary:focus,
.btn-check:checked+.btn-outline-secondary:focus,
.btn-outline-secondary.active:focus,
.btn-outline-secondary.dropdown-toggle.show:focus,
.btn-outline-secondary:active:focus {
	box-shadow: 0 0 0 .25rem rgba(108, 117, 125, .5)
}

.btn-outline-secondary.disabled,
.btn-outline-secondary:disabled {
	color: #6c757d;
	background-color: transparent
}

.btn-outline-success {
	color: #198754;
	border-color: #198754
}

.btn-outline-success:hover {
	color: #fff;
	background-color: #198754;
	border-color: #198754
}

.btn-check:focus+.btn-outline-success,
.btn-outline-success:focus {
	box-shadow: 0 0 0 .25rem rgba(25, 135, 84, .5)
}

.btn-check:active+.btn-outline-success,
.btn-check:checked+.btn-outline-success,
.btn-outline-success.active,
.btn-outline-success.dropdown-toggle.show,
.btn-outline-success:active {
	color: #fff;
	background-color: #198754;
	border-color: #198754
}

.btn-check:active+.btn-outline-success:focus,
.btn-check:checked+.btn-outline-success:focus,
.btn-outline-success.active:focus,
.btn-outline-success.dropdown-toggle.show:focus,
.btn-outline-success:active:focus {
	box-shadow: 0 0 0 .25rem rgba(25, 135, 84, .5)
}

.btn-outline-success.disabled,
.btn-outline-success:disabled {
	color: #198754;
	background-color: transparent
}

.btn-outline-info {
	color: #0dcaf0;
	border-color: #0dcaf0
}

.btn-outline-info:hover {
	color: #000;
	background-color: #0dcaf0;
	border-color: #0dcaf0
}

.btn-check:focus+.btn-outline-info,
.btn-outline-info:focus {
	box-shadow: 0 0 0 .25rem rgba(13, 202, 240, .5)
}

.btn-check:active+.btn-outline-info,
.btn-check:checked+.btn-outline-info,
.btn-outline-info.active,
.btn-outline-info.dropdown-toggle.show,
.btn-outline-info:active {
	color: #000;
	background-color: #0dcaf0;
	border-color: #0dcaf0
}

.btn-check:active+.btn-outline-info:focus,
.btn-check:checked+.btn-outline-info:focus,
.btn-outline-info.active:focus,
.btn-outline-info.dropdown-toggle.show:focus,
.btn-outline-info:active:focus {
	box-shadow: 0 0 0 .25rem rgba(13, 202, 240, .5)
}

.btn-outline-info.disabled,
.btn-outline-info:disabled {
	color: #0dcaf0;
	background-color: transparent
}

.btn-outline-warning {
	color: #ffc107;
	border-color: #ffc107
}

.btn-outline-warning:hover {
	color: #000;
	background-color: #ffc107;
	border-color: #ffc107
}

.btn-check:focus+.btn-outline-warning,
.btn-outline-warning:focus {
	box-shadow: 0 0 0 .25rem rgba(255, 193, 7, .5)
}

.btn-check:active+.btn-outline-warning,
.btn-check:checked+.btn-outline-warning,
.btn-outline-warning.active,
.btn-outline-warning.dropdown-toggle.show,
.btn-outline-warning:active {
	color: #000;
	background-color: #ffc107;
	border-color: #ffc107
}

.btn-check:active+.btn-outline-warning:focus,
.btn-check:checked+.btn-outline-warning:focus,
.btn-outline-warning.active:focus,
.btn-outline-warning.dropdown-toggle.show:focus,
.btn-outline-warning:active:focus {
	box-shadow: 0 0 0 .25rem rgba(255, 193, 7, .5)
}

.btn-outline-warning.disabled,
.btn-outline-warning:disabled {
	color: #ffc107;
	background-color: transparent
}

.btn-outline-danger {
	color: #dc3545;
	border-color: #dc3545
}

.btn-outline-danger:hover {
	color: #fff;
	background-color: #dc3545;
	border-color: #dc3545
}

.btn-check:focus+.btn-outline-danger,
.btn-outline-danger:focus {
	box-shadow: 0 0 0 .25rem rgba(220, 53, 69, .5)
}

.btn-check:active+.btn-outline-danger,
.btn-check:checked+.btn-outline-danger,
.btn-outline-danger.active,
.btn-outline-danger.dropdown-toggle.show,
.btn-outline-danger:active {
	color: #fff;
	background-color: #dc3545;
	border-color: #dc3545
}

.btn-check:active+.btn-outline-danger:focus,
.btn-check:checked+.btn-outline-danger:focus,
.btn-outline-danger.active:focus,
.btn-outline-danger.dropdown-toggle.show:focus,
.btn-outline-danger:active:focus {
	box-shadow: 0 0 0 .25rem rgba(220, 53, 69, .5)
}

.btn-outline-danger.disabled,
.btn-outline-danger:disabled {
	color: #dc3545;
	background-color: transparent
}

.btn-outline-light {
	color: #f8f9fa;
	border-color: #f8f9fa
}

.btn-outline-light:hover {
	color: #000;
	background-color: #f8f9fa;
	border-color: #f8f9fa
}

.btn-check:focus+.btn-outline-light,
.btn-outline-light:focus {
	box-shadow: 0 0 0 .25rem rgba(248, 249, 250, .5)
}

.btn-check:active+.btn-outline-light,
.btn-check:checked+.btn-outline-light,
.btn-outline-light.active,
.btn-outline-light.dropdown-toggle.show,
.btn-outline-light:active {
	color: #000;
	background-color: #f8f9fa;
	border-color: #f8f9fa
}

.btn-check:active+.btn-outline-light:focus,
.btn-check:checked+.btn-outline-light:focus,
.btn-outline-light.active:focus,
.btn-outline-light.dropdown-toggle.show:focus,
.btn-outline-light:active:focus {
	box-shadow: 0 0 0 .25rem rgba(248, 249, 250, .5)
}

.btn-outline-light.disabled,
.btn-outline-light:disabled {
	color: #f8f9fa;
	background-color: transparent
}

.btn-outline-dark {
	color: #212529;
	border-color: #212529
}

.btn-outline-dark:hover {
	color: #fff;
	background-color: #212529;
	border-color: #212529
}

.btn-check:focus+.btn-outline-dark,
.btn-outline-dark:focus {
	box-shadow: 0 0 0 .25rem rgba(33, 37, 41, .5)
}

.btn-check:active+.btn-outline-dark,
.btn-check:checked+.btn-outline-dark,
.btn-outline-dark.active,
.btn-outline-dark.dropdown-toggle.show,
.btn-outline-dark:active {
	color: #fff;
	background-color: #212529;
	border-color: #212529
}

.btn-check:active+.btn-outline-dark:focus,
.btn-check:checked+.btn-outline-dark:focus,
.btn-outline-dark.active:focus,
.btn-outline-dark.dropdown-toggle.show:focus,
.btn-outline-dark:active:focus {
	box-shadow: 0 0 0 .25rem rgba(33, 37, 41, .5)
}

.btn-outline-dark.disabled,
.btn-outline-dark:disabled {
	color: #212529;
	background-color: transparent
}

.btn-link {
	font-weight: 400;
	color: #0d6efd;
	text-decoration: underline
}

.btn-link:hover {
	color: #0a58ca
}

.btn-link.disabled,
.btn-link:disabled {
	color: #6c757d
}

.btn-group-lg>.btn,
.btn-lg {
	padding: .5rem 1rem;
	font-size: 1.25rem;
	border-radius: .3rem
}

.btn-group-sm>.btn,
.btn-sm {
	padding: .25rem .5rem;
	font-size: .875rem;
	border-radius: .2rem
}
</style>


