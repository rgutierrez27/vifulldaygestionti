<template>
    <div>
        <section class="section section-lg bg-default text-center">
            <div class="container">
            <div class="loader" v-if="loading">
                <span class="helper"></span>
                <img class="loaderImg" src="https://crossover.evoqondemand.com/Portals/0/Images/Map/xopreload.gif">
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
                            <h4 style='color:#d9534f;'>Tuvimos problemas, al guardar tu información</h4>
                            <p>Porfavor valida correctamente los datos ingresados</p>
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
                    <form @submit="onSubmit" class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="">
                        <div class="row row-narrow row-20">
                        <div class="col-md-12">
                            <div class="form-wrap">
                            <input class="form-input" v-model="form.names" id="contact-name" type="text" name="name" data-constraints="@Required">
                            <label class="form-label" for="contact-name">Nombre y apellidos</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap">
                            <input class="form-input" v-model="form.email"  id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                            <label class="form-label" for="contact-email">E-mail</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap">
                            <input class="form-input" v-model="form.phone"  id="contact-phone" type="text" name="phone" @keydown="filterKey" maxlength="9" data-constraints="@Required">
                            <label class="form-label" for="contact-phone">Numero Celular</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-wrap">
                                <input class="form-input" v-model="form.organization" id="contact-organization" type="organization" name="organization" data-constraints="@Required">
                                <label class="form-label" for="contact-organization">Organización / Universidad</label>
                            </div>

                        </div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, aperiam fuga soluta cum necessitatibus, saepe modi neque doloremque quo sequi, voluptas quidem? Eos eveniet omnis quam repellendus quidem praesentium nisi.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et sequi officiis atque, exercitationem quaerat sunt animi soluta quod molestiae velit, adipisci ratione ipsum repellat, aperiam fugit quo officia similique consequatur.
                        <div class="col-12">
                            <div class="form-wrap">
                                <label>
                                    <input type='checkbox' id="certificateid">
                                    <span></span>
                                    Deseo Certificado (S/.15)
                                </label>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <button class="button button-lg button-primary" type="submit" data-triangle=".button-overlay"><span>Confirmar</span><span class="button-overlay"></span></button>
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
export default {
    data(){
        return{
            form:{
                names: '',
                email: '',
                phone: '',
                organization : '',
                is_certificate:false
            },
            loading: false,
            success: false,
            issucess:null
        }
    },
    methods: {
        onSubmit(e){
            e.preventDefault();
            let params = this.form;
            var isChecked = document.getElementById('certificateid').checked;
            if (isChecked) {
                params.is_certificate = true
            }else{
                params.is_certificate = false
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

                })
                .catch(()=>{
                    this.issucess = false
                })
                .finally(() => this.loading = false)


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
