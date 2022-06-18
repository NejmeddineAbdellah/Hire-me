<template>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-users fa-3x"></i></a>
                <div class="info">
                    <h5>Total Candidats</h5>
                    <p><b>{{usercandidat.length}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-briefcase fa-3x"></i></a>
                <div class="info">
                    <h5>Total Recruteurs</h5>
                    <p><b>{{userrecruteur.length}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-newspaper-o fa-3x"></i></a>
                <div class="info">
                    <h5>Total annonces Candidat</h5>
                    <p><b>{{annoncecandidat.length}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-bullhorn fa-3x"></i></a>
                <div class="info">
                    <h5>Total annonces Recruteur</h5>
                    <p><b>{{annoncerecruteur.length}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-envelope fa-3x"></i></a>
                <div class="info">
                    <h5>Total Des Demandes</h5>
                    <p><b>{{demandes.length}}</b></p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        data() {
            return {
                usercandidat:[],
                userrecruteur:[],
                annoncecandidat:[],
                annoncerecruteur:[],
                demandes:[]
            }
        },
        methods: {
            getUsersCandidat() {
                axios.get('http://127.0.0.1:8000/api/getUser/' + 'candidat')
                    .then(res => {
                        this.usercandidat = res.data;
                    })
                    .catch(function (err) {
                        console.log(err);
                    })

            },
            getUsersRecruteur() {
                axios.get('http://127.0.0.1:8000/api/getUser/' + 'recruteur')
                    .then(res => {
                        this.userrecruteur = res.data;
                    })
                    .catch(function (err) {
                        console.log(err);
                    })

            },
            getAnnoncescandidat() {
                axios.get('http://127.0.0.1:8000/api/annonceByType/' + 'candidat')
                    .then(res => {
                        this.annoncecandidat = res.data;
                    })
                    .catch(function (err) {
                        console.log(err);
                    })

            },
            getAnnoncesrecruteur() {
                axios.get('http://127.0.0.1:8000/api/annonceByType/' + 'recruteur')
                    .then(res => {
                        this.annoncerecruteur = res.data;
                    })
                    .catch(function (err) {
                        console.log(err);
                    })

            },
        },
        mounted() {
          this.getUsersRecruteur();
          this.getUsersCandidat();
          this.getAnnoncesrecruteur();
          this.getAnnoncescandidat();
        },
    }

</script>

<style scoped>
    .row {
        margin-top: 30px;
    }

</style>
