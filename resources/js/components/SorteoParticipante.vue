<template>
    <div>
        <div id="slot_wrapper">
            <input type="text" class="search" />
            <ul id="slot">
                <!-- la lista llenada por cada elemento -->
                <li>test</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
            </ul>
        </div>

        <button type="button" v-on:click="sortear()" id="random_location">Gira la ruleta</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            msa: [
                { name: "0982820405    Verónica" },
                { name: "0972810576  Vicente" },
                { name: "982211370    Saida" },
                { name: "0971650876     Liliana" },
                { name: "0971112309   Carlos Andrés" },
                { name: "0971226914    Elias" },
                { name: "9823423423 Pancho" },
                { name: "465477987   Juanita" },
                { name: "654654654   Brandon" }
            ]
        };
    },
    methods: {
        sortear : function (){
            //this.makeSlots();
        },
        makeSlots: function (){
            //inicia en el valor aleatorio previo
            var list = ['<li>'+$input.val()+'</li>'];
            //se hace recursivo el llamado
            makeSlotList(list);
        },
        makeSlotList: function (list) {
            console.log(list);
                //soporta hasta 18 valores en la animacion
                if(list.length<20){//el valor puede ser ajustado
                    var index = _.random(this.msa.length-1);
                    if(list.length===1){
                        /*
                            elemento inicial de la lista
                        */
                        random_index = index;
                    }
                    list.push( '<li index='+_.random(this.msa.length-1)+'>'+this.msa[index].name+'</li>' );
                    return makeSlotList(list);
                } else {
                    //dio un giro
                    //la entrada se limpia
                    $input.val('');
                    // se agrega el elemento seleccionado
                    $('#slot').html(list.join('')).parent().show().trigger('spin');
                    return list;
                }
        }
    },
};
</script>



<style scoped>
    * { box-sizing: border-box; }
    li, ul { padding: 0; margin:0; }
    input {
        margin: 4px 0;
        font-family: Arial, sans-serif;
        font-size: 16px;
        padding: 5px 4px 4px;
        height: 30px;
        width: 350px;
    }
    #slot li {
        font-family: Arial, sans-serif;
        font-size: 16px;
        padding: 6px 4px 6px 6px;
        line-height: normal;
        height: 30px;
        overflow: hidden;
    }
    #slot_wrapper {
        position: relative;
    }
    .jSlots-wrapper {
        margin: 4px 0;
        overflow: hidden; /*oculta la lista */
        height: 29px; /*altura de caca slot */
        width: 300px;
        position: absolute;
        top: 0px;
        display: none;
    }
    #slot {
        display: none;
    }
</style>
