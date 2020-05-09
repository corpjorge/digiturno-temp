<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" v-if="publicidad">
                        <div class="carousel-item active" v-for="(item, index) in publicidad" :key="index">
                            <video :src="'./storage/'+item.img" alt="" class="img-responsive" autoplay loop muted></video>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title" align="center">Turnos</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-primary">
                                <th>NOMBRE</th>
                                <th>TURNO#</th>
                                <th>MODULO</th>
                            </thead>
                            <tbody v-if="turnos">
                                <tr v-for="(item,index) in turnos" :key="index">
                                    <td>{{ item.usuario.name }}</td>
                                    <td>{{ item.servicio.sigla }}{{ item.numero }}</td>
                                    <td>{{ item.modulo_id }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.img-responsive {
    width: 100%;
}
</style>

<script>
    export default {
        data() {
            return {
                turnos:[],
                publicidad:[],
                cantidad:0
            }
        },
        created() {
            this.getPublicidad();
            setInterval(() => {
                this.getTurnos();
            },5000)
        },
        methods: {
            getPublicidad:function() {
                axios.post('/turnero/publicidades')
                .then(res => {
                    this.publicidad = res.data;
                })
            },
            getTurnos:function() {
                axios.post('/turnero/turnos')
                .then(res => {
                    this.turnos = res.data;
                    this.Sound();
                })
            },
            Sound:function() {
                if (this.turnos.length > this.cantidad) {
                    this.cantidad = this.turnos.length;
                    //Reproducir Audio
                    var audio = new Audio('http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3');
                    audio.play();
                } else {
                    this.cantidad = this.turnos.length;
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
