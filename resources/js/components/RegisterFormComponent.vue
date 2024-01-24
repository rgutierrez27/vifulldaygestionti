<template>
    <div>
        <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(../images/bg-breadcrumbs-01-1894x424.jpg);" v-if="event_ && issucess == null">
            <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">{{event_.descripcion}}</a></li>
                <li class="active">Formulario de registro</li>
            </ul>
            <h3 class="breadcrumbs-custom-title">Participa en nuestro {{event_.tipodescripcion}}</h3>
            </div>
        </section>
        <section class="section section-lg bg-default text-center">
            <div class="container">
            <div class="loader" v-if="loading">
                <span class="helper"></span>
                <img class="loaderImg" src="https://i.imgur.com/1J8ulDf.gif">
            </div>
            <div class="row justify-content-md-center" id="infoAfterRegister">
                <div class="col-md-12 col-lg-8 success-container" v-if="issucess == true">
                    <section class="parallax-container section" style="background:#072667;">
                        <div class="parallax-content section-lg context-dark text-center">
                            <div class="container">
                                <h6 class="text-secondary">{{form.names1}} muchas gracias por registrarse :)</h6>
                                <h3>Se le notificará a su correo electrónico para continuar con el proceso.</h3>
                                <div class="group">
                                    <a class="button button-secondary box-with-triangle-right" href="/" data-triangle=".button-overlay">
                                        <span>Ir al inicio</span>
                                        <span class="button-overlay" style="border-top-width: 60.4px; border-left-width: 187.875px;"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-12 col-lg-8 success-container" v-if="issucess == false">
                    <section class="parallax-container section" style="background:#072667;">
                        <div class="parallax-content section-lg context-dark text-center">
                            <div class="container">
                                <h6 class="text-secondary">No se ha completado el registro :c</h6>
                                <h3>{{form.names1}} usted ya se encuentra registrado.</h3>
                                <div class="group">
                                    <a class="button button-secondary box-with-triangle-right" href="#" data-triangle=".button-overlay" @click="()=>{issucess=null;}">
                                        <span>Volver a intentar</span>
                                        <span class="button-overlay" style="border-top-width: 60.4px; border-left-width: 187.875px;"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


                <div class="col-md-12 col-lg-10" v-show="issucess == null" >
                    <h4 class="mb-5">Registrate para poder participar</h4>
                    <!--Mailform-->
                    <form v-on:submit.prevent="submitForm" >
                        <div class="row row-narrow row-20">
                            <div class="col-md-6">
                                <div class="form-wrap2">
                                    <label for="contact-name2">Tipo de documento</label>
                                    <select name="" id="" v-model="typeDocumentTemp" style="width: 100%; min-height: 78px; padding: 6%;" :disabled="searchDone" required>
                                        <option value="01">DNI</option>
                                        <option value="05">CARNET DE EXTRANJERIA</option>
                                        <!-- <option value="06">REG. UNICO DE CONTRIBUYENTES</option> -->
                                        <option value="07">PASAPORTE</option>
                                    </select>
                                <!-- <label class="form-label" for="contact-name">Nombre y apellidos</label> -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="labelContact-dni"> {{typeDocumentTemp=='01'?'DNI':(typeDocumentTemp=='05'?'CARNET DE EXTRANJERIA':(typeDocumentTemp=='06'?'RUC':'PASAPORTE'))}}</label>
                                <div class="form-wrap">
                                    <!-- <label class="form-label" for="contact-dni2">DNI</label> -->
                                <input class="form-input" v-model="dniTemp" id="contact-dni" type="text" name="dni" autocomplete="chrome-off" :disabled="searchDone"  required>

                                </div>
                            </div>
                            <div class="col-md-2">

                                <label for="labelContact-dni"> - </label>
                                <div class="form-wrap">
                                    <button v-if="!searchDone" class="button button-lg button-primary" type="button" @click="validarDNI()"><span>Buscar</span><span class="button-overlay"></span></button>
                                    <button v-else class="button button-lg button-primary" type="button" @click="clearData()"><span>Realizar otra consulta</span><span class="button-overlay"></span></button>
                                </div>
                            </div>
                            <div class="col-md-12" v-if="LoadingSearchDNI">
                                <!-- <label for="labelContact-dni"> DNI</label> -->
                                <div class="form-wrap">
                                    <!-- <label class="form-label" for="contact-dni2">DNI</label> -->
                                    <p> <img src="https://media.tenor.com/guhB4PpjrmUAAAAM/loading-loading-gif.gif" width="10%" alt="" srcset=""> Estamos validando su número de documento, espere un momento</p>
                                </div>
                            </div>
                            <div class="col-md-12" v-if="ErrorNumDoc">
                                <div class="form-wrap">
                                    <p> <img src="https://w7.pngwing.com/pngs/901/56/png-transparent-exit-icon-area-symbol-point-brand-status-dialog-error-symbolic-rectangle-logo-sign-thumbnail.png" width="5%" alt="" srcset=""> Numero de documento incorrecto</p>
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
                                    <input class="form-input" :disabled="existData!=1?disabled:''" v-model="form.names2" id="contact-name2" type="text" name="name">
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
                                    <input class="form-input" :disabled="existData!=1?disabled:''" v-model="form.lastNames2" id="contact-lastname2" type="text" name="lastname2">
                                    <!-- <label class="form-label" for="contact-lastname2">Apellidos Materno</label> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label for="contact-email">E-mail</label>
                                    <input class="form-input"  v-model="form.email"  id="contact-email" type="email" name="email" :disabled="disableInputEmail" required>
                                    <!-- <label class="form-label" for="contact-email">E-mail</label> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label for="contact-phone">Numero Celular</label>
                                    <input class="form-input"  v-model="form.phone"  id="contact-phone" type="text" name="phone" :disabled="disableInputPhone" @keydown="filterKey" maxlength="9" required>
                                    <!-- <label class="form-label" for="contact-phone">Numero Celular</label> -->
                                </div>
                            </div>
                            <div class="col-md-6" v-if="incription_concepts.length > 0">
                                <div class="form-wrap2">
                                    <label for="contact-name2">Incripción</label>
                                    <select name="" id="" v-model="form.incription_concept" style="width: 100%; min-height: 78px; padding: 6%;" required>
                                        <option value="" disabled>-- SELECCIONAR UNA OPCIÓN --</option>
                                        <option v-for="(item, index) in incription_concepts" :key="index" :value="item.value">{{item.label}}</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-6" v-if="existData == 3 && arrayRoles.length > 0">
                                <div class="form-wrap2">
                                    <label for="contact-name2">Participar como</label>
                                    <select name="" id="" v-model="form.user_rol_code" style="width: 100%; min-height: 78px; padding: 6%;" required>
                                        <option value="" disabled>-- SELECCIONAR UNA OPCIÓN --</option>
                                        <option v-for="(item, index) in arrayRoles" :key="index" :value="item.codigo">{{item.desc}}</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-6" v-if="certificate_concepts.length > 0 && is_certificate == true">
                                <div class="form-wrap2">
                                    <label for="contact-name2">Certificado</label>
                                    <select name="" id="" v-model="form.certificate_concept" style="width: 100%; min-height: 78px; padding: 6%;" required>
                                        <option value="" disabled>-- SELECCIONAR UNA OPCIÓN --</option>
                                        <option v-for="(item, index) in certificate_concepts" :key="index" :value="item.value">{{item.label}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 d-none">
                                <div class="form-wrap" >
                                    <label for="contact-organization">Organización / Universidad</label>
                                    <input class="form-input"  v-model="form.organization" id="contact-organization" type="organization" name="organization" >
                                </div>
                            </div>

                            <div class="col-12" v-if="showDivCertificate">
                                <div class="form-wrap">
                                    <label>
                                        <input type='checkbox' id="certificateid" v-model="is_certificate">
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
import axios from 'axios';
import 'vue-search-select/dist/VueSearchSelect.css'
import { ModelSelect } from 'vue-search-select'

export default {
    components: {
      ModelSelect
    },
    data(){
        return{
            event_: null,
            incription_concepts:[],
            certificate_concepts:[],
            disableInputEmail: false,
            disableInputPhone: false,
            is_certificate: false,
            showDivCertificate: false,
            searchDone:false,
            ErrorNumDoc: false,
            disabled: true,
            existData: 1, //1: No se hace consulta, 2: Se hace consulta y no existe, 3: Se hace consulta y existe
            dniTemp: '',
            typeDocumentTemp: '01',
            messageError: 'Porfavor valida correctamente los datos ingresados',
            form:{
                typeDocument: '',
                dni:'',
                names1: null,
                names2: null,
                lastNames1: null,
                lastNames2: null,
                email: null,
                phone: "",
                organization : null,
                is_certificate: 0,
                incription_concept: '',
                certificate_concept: '',
                user_rol_code: null
            },
            LoadingSearchDNI: false,
            loading: false,
            success: false,
            issucess:null,
            arrayRoles: [],
            options: [
          { value: '1', text: 'aa' + ' - ' + '1' },
          { value: '2', text: 'ab' + ' - ' + '2' },
          { value: '3', text: 'bc' + ' - ' + '3' },
          { value: '4', text: 'cd' + ' - ' + '4' },
          { value: '5', text: 'de' + ' - ' + '5' }
        ],
        }
    },
    methods: {
        submitForm(e){
            e.preventDefault();
            this.onCompleteForm();
        },
        onCompleteForm(){
            let params      = this.form;
            this.loading    = true;

            axios.post(`/addparticipant`,{
                ...params,
                rolesCount: this.arrayRoles.length,
                event: event_.capacitacion
            })
            .then((data) =>{
                if (data.data.message == 'OK') {
                    this.issucess = true
                }else{
                    this.issucess = false
                    this.messageError = "Ya se encuentra registrado"
                }
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
            let longitudStringPermitida = 0;
            if (this.typeDocumentTemp == '01')
                longitudStringPermitida = 8
            if (this.typeDocumentTemp == '05' || this.typeDocumentTemp == '07')
                longitudStringPermitida = this.dniTemp.length; //12
            if (this.typeDocumentTemp == '06')
                longitudStringPermitida = this.dniTemp.length; //11


            var letters = this.dniTemp.length;
            if (letters != longitudStringPermitida) {
                this.ErrorNumDoc = true;
            }else{
                this.ErrorNumDoc = false;
            }

            if (letters == longitudStringPermitida) {
                this.LoadingSearchDNI = true;
                setTimeout(async () => {
                    const resp = await axios.get(`/validardni/${this.dniTemp}/${this.typeDocumentTemp}`);
                    // validar si objeto esta vacio
                    if (!resp.data.error) {
                        if (resp.data.data.email != null || resp.data.data.email != '')
                            this.disableInputEmail = true;

                        if (resp.data.data.phone != null || resp.data.data.phone != '')
                            this.disableInputPhone = true;

                        if (Object.keys(resp.data.data).length > 0){
                            this.existData = 3  // 3: Se hace consulta y existe
                            this.form.typeDocument = this.typeDocumentTemp
                            this.form.dni = this.dniTemp
                            this.form.names1 = resp.data.data.nombre1
                            this.form.names2 = resp.data.data.nombre2
                            this.form.lastNames1 = resp.data.data.apellidoPaterno
                            this.form.lastNames2 = resp.data.data.apellidoMaterno
                            this.form.email = resp.data.data.email
                            this.form.phone = resp.data.data.telefono
                            this.arrayRoles = [];
                            resp.data.data.roles.forEach(element => {
                                if (element.role == 'Alumno') {
                                    this.arrayRoles.push({
                                        codigo: element.main_code,
                                        desc: 'Estudiante de ' +' '+element.structure
                                    })

                                } else if(element.role == 'Administrativo') {
                                    this.arrayRoles.push({
                                        codigo: element.main_code,
                                        desc: element.role
                                    })

                                } else if(element.role == 'Docente') {
                                    this.arrayRoles.push({
                                        codigo: element.main_code,
                                        desc: element.role
                                    })

                                }
                            });
                            this.form.organization = ""
                             this.disabled= true;
                             this.searchDone = true;
                        }else{
                            this.existData = 2 // 2: Se hace consulta y no existe
                            this.disabled= false;
                            this.form.typeDocument = this.typeDocumentTemp
                            this.form.dni = this.dniTemp
                            this.form.names1 = ""
                            this.form.names2 = ""
                            this.form.lastNames1 = ""
                            this.form.lastNames2 = ""
                            this.form.email = ""
                            this.form.phone = ""
                            this.form.organization = ""
                            this.searchDone = true;
                            this.disableInputEmail = false;
                            this.disableInputPhone = false;
                        }
                        this.LoadingSearchDNI = false;
                    }else{ // Error de validacion
                        this.existData = 2
                        this.form.typeDocument = this.typeDocumentTemp
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

        },
        clearData(){
            this.searchDone =false;
            this.ErrorNumDoc = false;
            this.disabled = true;
            this.existData = 1, //1: No se hace consulta, 2: Se hace consulta y no existe, 3: Se hace consulta y existe
            this.dniTemp = '';
            this.typeDocumentTemp = '01';
            this.messageError = 'Porfavor valida correctamente los datos ingresados';
            this.form.typeDocument = '';
            this.form.dni ='';
            this.form.names1 = null;
            this.form.names2 = null;
            this.form.lastNames1 = null;
            this.form.lastNames2 = null;
            this.form.email = null;
            this.form.phone = "";
            this.form.organization  = null;
            this.form.is_certificate = false;
            this.LoadingSearchDNI = false;
            this.loading = false;
            this.success = false;
            this.issucess = null;
        },
        changEvent(){
            alert(this.typeDocumentTemp);
        },
        initDataConcepts(){
            if(concepto_inscripcion !== null){
                const detail = concepto_inscripcion.detail;
                this.incription_concepts = detail.length == 0
                    ? [{value: concepto_inscripcion.concepto,label: `${concepto_inscripcion.descripcioncompleta} S/.${concepto_inscripcion.importe}`}]
                    : detail.reduce(function(acc, item){
                        acc.push({
                            value: `d${item.id}`,
                            label: `${item.descripcion} S/.${item.importe}`
                        });
                        return acc;
                    }, []);
            }

            if(concepto_certificado !== null){
                const detail_ = concepto_certificado.detail;
                this.certificate_concepts = detail_.length == 0
                    ? [{value: concepto_certificado.concepto,label: `${concepto_certificado.descripcioncompleta} S/.${concepto_certificado.importe}`}]
                    : detail_.reduce(function(acc, item){
                        acc.push({
                            value: `d${item.id}`,
                            label: `${item.descripcion} S/.${item.importe}`
                        });
                        return acc;
                    }, []);
            }

            this.event_ = event_
        }
    },
    mounted(){
        this.initDataConcepts();
        this.showDivCertificate = requiere_certificado==1?true:false
    },
    watch:{
        is_certificate(val){
            this.form.is_certificate = val == true ? 1 : 0;
            if (val == false)
                this.form.certificate_concept = '';
        }
    }
}
</script>

<style scoped>
.success-container{
    height: 62vh !important;
}
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
