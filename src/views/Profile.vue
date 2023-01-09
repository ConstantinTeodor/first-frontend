<template>
    <div class="profile-page">
        <section class="section-profile-cover section-shaped my-0">
            <div class="shape shape-style-1 shape-default shape-skew alpha-4">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </section>
        <section class="section section-skew">
            <div class="container">
                <card shadow class="card-profile mt--300" no-body>
                    <div class="px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img v-lazy="'img/theme/team-4-800x800.jpg'" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">

                            </div>
                            <div class="col-lg-4 order-lg-1">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading" style="color: white">22</span>
                                        <span class="description" style="color: white">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading" style="color: white">10</span>
                                        <span class="description" style="color: white">Photos</span>
                                    </div>
                                    <div>
                                        <span class="heading" style="color: white">89</span>
                                        <span class="description" style="color: white">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <h3>{{ clienti['nume']}}  {{clienti['prenume']}}
                            </h3>
                            <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>{{ clienti['email'] }}</div>
                            <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>{{ clienti['nrTelefon'] }}</div>
                        </div>
                        <div class="container pb-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="row row-grid">
                                        <div v-for="plata in plati" class="col-lg-4 mt-4">
                                            <card class="border-0" hover shadow body-classes="py-5">
                                                <icon name="ni ni-tag" type="primary" rounded class="mb-4" style="color: white !important; background: green !important">
                                                </icon>
                                                <h5 class="text-primary text-uppercase" style="color: green !important"> {{ plata['suma'] }} RON</h5>
                                                <h6 class="text-primary text-uppercase" style="color: green !important"> {{ plata['tipPlata'] }}</h6>
                                                <h6 class="text-primary text-uppercase" style="color: green !important"> {{ plata['statusPlata'] }}</h6>
                                                <base-button tag="a" href="#" type="primary" class="mt-4" style="background: green !important">
                                                    Mai multe detalii
                                                </base-button>
                                            </card>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </card>
            </div>
        </section>
    </div>
</template>
<script>

import axios from 'axios';

export default {

    data() {
        return {
            clienti: [],
            plati: []
        };
    },

    components: {},
    mounted() {
        this.saveData()
        this.saveData1()
    },

    methods: {
        async saveData() {

            let clienti = [];

            const options = {
                method: 'GET',
                url: 'http://127.0.0.1:8000/clienti/1',
                headers: {accept: 'application/json; charset=utf-8'}
            };

            this.getData(options)
                .then(data => {
                    this.clienti = data;
                })
        },

        getData(options) {
            return  axios.request(options)
                .then((response) => response.data);
        },

        async saveData1() {

            let plati = [];

            const options = {
                method: 'GET',
                url: 'http://127.0.0.1:8000/plati/client/1',
                headers: {accept: 'application/json; charset=utf-8'}
            };

            this.getData1(options)
                .then(data => {
                    this.plati = data;
                })
        },

        getData1(options) {
            return  axios.request(options)
                .then((response) => response.data);
        }
    }
};
</script>
<style>
</style>
