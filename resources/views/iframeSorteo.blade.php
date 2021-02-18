<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        li,
        ul {
            padding: 0;
            margin: 0;
        }

        input{
            margin: 4px 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 1.8em;
            padding: 5px 4px 4px;
            height: 60px;
            width: 100%;
            text-align: center;
            border-right: 0;
            border-left: 0;

            background: #ffffff00;
            border-top: 4px solid #20457c;
            border-bottom: 4px solid #20457c;
            /* width: 350px; */
        }

        input:focus, input.form-control:focus {

            outline:none !important;
            outline-width: 0 !important;
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            }

        img{
            margin: 4px 0;
            font-size: 1.8em;
            padding: 5px 4px 4px;
            /* height: 60px; */
            /* //width: 100%; */
            text-align: center;
            bottom: -500px;
            /* width: 350px; */
        }

        #slot li {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 1.8em;
            padding: 6px 4px 6px 6px;
            line-height: normal;
            height: 60px;
            overflow: hidden;
            text-align: center;
        }

        #slot_wrapper {
            position: relative;
        }

        .jSlots-wrapper {
            margin: 4px 0;
            overflow: hidden;
            /*oculta la lista */
            height: 59px;
            /*altura de caca slot */
            /* width: 300px; */
            width: 100%;
            position: absolute;
            top: 0px;
            display: none;
        }

        #slot {
            display: none;
        }
    </style>

</head>

<body>


<br><br><br>
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            {{-- <div class="col-md-8" style="position: relative; z-index: 3;">
                <img src="images/winner.gif" alt="" style="position: relative; z-index: 3;">
            </div> --}}
            <div class="col-md-12">
                {{-- <img src="images/winner.gif" alt="" style="position: relative;"> --}}
                <div id="slot_wrapper">
                    <div class="input-group input-group-lg text-center">

                        <input type="text" class="search"  class="form-control" ria-describedby="inputGroup-sizing-lg">
                    </div>
                    <ul id="slot">
                        <!-- la lista llenada por cada elemento -->
                        <li>test</li>
                        <?php
                            for ($i=0; $i <90 ; $i++) {
                                ?>
                                <li>&nbsp;</li>
                                <?php
                            }
                        ?>

                    </ul>
                </div>

            </div>
            <div class="col-md-4">
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success mt-3 btn-block" id="random_location"><i class="fas fa-play"></i> Play! Para sortear</button>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script
        src="https://bl.ocks.org/sarahjsquire/raw/4706c4d48962e9962175/6ad2d061715fbc9f6de328ecb5ab5d3a6c1003d5/jquery.jSlots.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>

    <script
        src="https://bl.ocks.org/sarahjsquire/raw/4706c4d48962e9962175/6ad2d061715fbc9f6de328ecb5ab5d3a6c1003d5/jquery.jSlots.js">
    </script>
    <script>
        $(function () {
            var cantParticipant = 0;
            var msa = [],
                $input = $('input'),
                random_index;

            //lista recursiva hasta detenerse en el elemento configurado
            function makeSlotList(list) {
                //soporta hasta 18 valores en la animacion
                if (list.length < cantParticipant) { //el valor puede ser ajustado
                    var index = _.random(msa.length - 1);
                    if (list.length === 1) {
                        /*
                            elemento inicial de la lista
                        */
                        random_index = index;
                    }
                    list.push('<li index=' + _.random(msa.length - 1) + '>' + msa[index].name + '</li>');
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

            //se crea la lista de elementos o slot
            function makeSlots() {
                //barajeamos el array
                msa.sort(function() { return Math.random() - 0.5 });
                msa = msa;
                //inicia en el valor aleatorio previo
                var list = ['<li>' + $input.val() + '</li>'];
                //se hace recursivo el llamado
                makeSlotList(list);
            }

            $('#slot').jSlots({
                number: 1,
                spinner: '.jSlots-wrapper',
                spinEvent: 'spin',
                time : 2000,
                loops : 6,
                endNum: 2, //finaliza en el segundo elmento del arreglo aleatorio
                onEnd: function (finalElement) {
                    //set result
                    $input.val(msa[random_index].name);
                    //oculta spiner
                    $(this.spinner).hide();
                }
            });
            obtenerData();
            function obtenerData() {
                console.log("obteniendo datos...");
                    user_url = '/getparticipant';
                    $.ajax({
                        type: 'get',
                        url: user_url,
                        dataType: 'html',
                        success: function (data) {
                            var datos = JSON.parse(data);

                            if (!datos.error) {
                                for (let index = 0; index < datos.infoParcticipant.length; index++) {
                                    // const element = array[index];
                                    cantParticipant++;
                                    var objeto =   {
                                        name: datos.infoParcticipant[index].name + ' - '+datos.infoParcticipant[index].email
                                    }

                                        msa.push(objeto);

                                }

                                var arr1 = ["a", "b", "c", "d"];

                                // for ( x in msa) {
                                //     console.log( msa[x] );
                                // }
                            }
                        },
                        error: function (data) {
                            alert(data.responseJSON.message);
                        }
                    });
            }

            //elemento aleatorio
            $('#random_location').on('click', makeSlots);
        });
    </script>

</body>

</html>
