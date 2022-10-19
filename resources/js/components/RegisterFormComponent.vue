<template>
    <div>
        <section class="section section-lg bg-default text-center">
            <div class="container">
            <div class="loader" v-if="loading">
                <span class="helper"></span>
                <img class="loaderImg" src="https://i.imgur.com/1J8ulDf.gif">
            </div>
            <div class="row justify-content-md-center" id="infoAfterRegister">

                <div class="col-md-12 col-lg-8" v-if="issucess == true">
                        <div class="inset-lg-right-30">
                            <h3 style='color:#5cb85c;'>Gracias por registrarse</h3>
                            <p>Sus datos se han registrado satisfactoriamente, en unos minutos estara recibiendo un correo electrónico
                            a la cuenta de correo ingresada para finalizar el proceso de registro</p>
                            <div class="group">
                                <a class="button button-secondary box-with-triangle-right" href="/" data-triangle=".button-overlay">
                                    <span>Ir al inicio</span>
                                    <span class="button-overlay" style="border-top-width: 60.4px; border-left-width: 187.875px;"></span>
                                </a>
                            </div>
                        </div>
                </div>

                <div class="col-md-12 col-lg-8" v-if="issucess == false">
                        <div class="inset-lg-right-30">
                            <h4 style='color:#d9534f;'>Ups, Algo ocurrio</h4>
                            <p>{{messageError}}</p>
                            <div class="group">
                                <a class="button button-secondary box-with-triangle-right" href="/regitroform" data-triangle=".button-overlay">
                                    <span>Intentar nuevamente</span>
                                    <span class="button-overlay" style="border-top-width: 60.4px; border-left-width: 187.875px;"></span>
                                </a>
                            </div>
                        </div>
                </div>


                <div class="col-md-12 col-lg-8" v-show="issucess == null" >
                    <h4>Registrate para poder participar</h4>

                    <!--Mailform-->
                    <form v-on:submit.prevent="submitForm" >
                        <div class="row row-narrow row-20">
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label for="contact-name">Tipo de documento</label>
                                    <select name="" disabled id="">
                                        <option value="" selected>DNI</option>
                                    </select>
                                <!-- <label class="form-label" for="contact-name">Nombre y apellidos</label> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="labelContact-dni"> DNI</label>
                                <div class="form-wrap">
                                    <!-- <label class="form-label" for="contact-dni2">DNI</label> -->
                                <input class="form-input" v-model="dniTemp" id="contact-dni" type="text" name="dni" autocomplete="chrome-off" maxlength="8" @keydown="validarDNI()" required>

                                </div>
                            </div>
                            <div class="col-md-12" v-if="LoadingSearchDNI">
                                <!-- <label for="labelContact-dni"> DNI</label> -->
                                <div class="form-wrap">
                                    <!-- <label class="form-label" for="contact-dni2">DNI</label> -->
                                <p> <img src="https://media.tenor.com/guhB4PpjrmUAAAAM/loading-loading-gif.gif" width="10%" alt="" srcset=""> Estamos validando su número de documento, espere un momento</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="contact-name1">Primer Nombre</label>
                                <div class="form-wrap">
                                <input class="form-input" :disabled="existData!=1?disabled:''"  v-model="form.names1" v-bind:id="'contact-name1'" type="text" name="name" required>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label for="contact-name2">Segundo Nombre</label>
                                    <input class="form-input" :disabled="existData!=1?disabled:''" v-model="form.names2" id="contact-name2" type="text" name="name" required>
                                    <!-- <label for="contact-name2">Segundo Nombre</label> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label for="contact-lastname1">Apellidos Paterno</label>
                                    <input class="form-input" :disabled="existData!=1?disabled:''" v-model="form.lastNames1" id="contact-lastname1" type="text" name="lastname1" required>
                                    <!-- <label class="form-label" for="contact-lastname1">Apellidos Paterno</label> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label for="contact-lastname2">Apellidos Materno</label>
                                    <input class="form-input" :disabled="existData!=1?disabled:''" v-model="form.lastNames2" id="contact-lastname2" type="text" name="lastname2" required>
                                    <!-- <label class="form-label" for="contact-lastname2">Apellidos Materno</label> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label for="contact-email">E-mail</label>
                                    <input class="form-input"  v-model="form.email"  id="contact-email" type="email" name="email" required>
                                    <!-- <label class="form-label" for="contact-email">E-mail</label> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label for="contact-phone">Numero Celular</label>
                                    <input class="form-input"  v-model="form.phone"  id="contact-phone" type="text" name="phone" @keydown="filterKey" maxlength="9" required>
                                    <!-- <label class="form-label" for="contact-phone">Numero Celular</label> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-wrap" >
                                    <label for="contact-organization">Organización / Universidad</label>
                                    <input class="form-input"  v-model="form.organization" id="contact-organization" type="organization" name="organization" >
                                    <!-- <label class="form-label" for="contact-organization">Organización / Universidad</label> -->
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="form-wrap">
                                    <label>
                                        <input type='checkbox' id="certificateid">
                                        <span></span>
                                        Deseo Certificado
                                    </label>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <button class="button button-lg button-primary" type="submit" ><span>Confirmar</span><span class="button-overlay"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            disabled: true,
            existData: 1, //1: No se hace consulta, 2: Se hace consulta y no existe, 3: Se hace consulta y existe
            dniTemp: '',
            messageError: 'Porfavor valida correctamente los datos ingresados',
            form:{
                dni:'',
                names1: null,
                names2: null,
                lastNames1: null,
                lastNames2: null,
                email: null,
                phone: "",
                organization : null,
                is_certificate:false
            },
            LoadingSearchDNI: false,
            loading: false,
            success: false,
            issucess:null
        }
    },
    methods: {
        submitForm(e){
            e.preventDefault();
            this.onCompleteForm();
        },

        onCompleteForm(){
            let params = this.form;
            var isChecked = document.getElementById('certificateid').checked;
            if (isChecked) {
                params.is_certificate = 1
            }else{
                params.is_certificate = 0
            }
                this.loading = true;


            axios.post(`/addparticipant`,params)
            .then((data) =>{
                // alert(JSON.parse(data))
                //console.log(newData)
                if (data.data.error != true) {
                    this.issucess = true
                }else{
                    this.issucess = false
                }
                console.log('000');
                console.log(data.data);
            })
            .catch(({response})=>{
                this.issucess = false
                this.messageError = response.data.message;
            })
            .finally(() => {
                this.loading = false;
            })
        },

        validarDNI(){

            var letters = this.dniTemp.length;
            if (letters > 8) {
                this.dniTemp = this.dniTemp.substring(0,8);
            }
            letters = letters + 1;
            if (letters == 8) {
                this.LoadingSearchDNI = true;
                setTimeout(async () => {
                    const resp = await axios.get(`/validardni/${this.dniTemp}`)
                    // validar si objeto esta vacio
                    if (!resp.data.error) {
                        if (Object.keys(resp.data.data).length > 0){
                            this.existData = 3  // 3: Se hace consulta y existe
                            this.form.dni = this.dniTemp
                            this.form.names1 = resp.data.data.nombre1
                            this.form.names2 = resp.data.data.nombre2
                            this.form.lastNames1 = resp.data.data.apellidoPaterno
                            this.form.lastNames2 = resp.data.data.apellidoMaterno
                            this.form.email = resp.data.data.email
                            this.form.phone = resp.data.data.telefono
                            this.form.organization = ""
                             this.disabled= true;
                        }else{
                            this.existData = 2 // 2: Se hace consulta y no existe
                            this.disabled= false;
                            this.form.dni = this.dniTemp
                            this.form.names1 = ""
                            this.form.names2 = ""
                            this.form.lastNames1 = ""
                            this.form.lastNames2 = ""
                            this.form.email = ""
                            this.form.phone = ""
                            this.form.organization = ""
                        }
                        this.LoadingSearchDNI = false;
                    }else{ // Error de validacion
                        this.existData = 2
                        this.form.dni = this.dniTemp
                        this.form.names1 = ""
                        this.form.names2 = ""
                        this.form.lastNames1 = ""
                        this.form.lastNames2 = ""
                        this.form.email = ""
                        this.form.phone = ""
                        this.form.organization = ""
                    }

                }, 600);
            }
        },

        setFocus(item){
            document.getElementById(item).focus();
        },
        filterKey(evt) {
            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;

            if(code==8) { // backspace.
            return true;
            } else if(code>=48 && code<=57) { // is a number.
            return true;
            } else{ // other keys.
            return false;
            }

        }
    },
}
</script>

<style scoped>
#axiosForm {
  /* Components Root Element ID */
  position: relative;
}
.loader {
  /* Loader Div Class */
  position: absolute;
  top: 0px;
  right: 0px;
  width: 100%;
  height: 100%;
  background-color: #eceaea;
  background-image: url("https://crossover.evoqondemand.com/Portals/0/Images/Map/xopreload.gif");
  background-size: 50px;
  background-repeat: no-repeat;
  background-position: center;
  z-index: 10000000;
  opacity: 0.4;
  filter: alpha(opacity=40);
}

.helper {
  display: inline-block;
  height: 100%;
  vertical-align: middle;
}

.loaderImg {
  vertical-align: middle;
  max-height: 300px;
  max-width: 300px;
}

#certificateid{
width: 20px;
height: 20px;
}
</style>
