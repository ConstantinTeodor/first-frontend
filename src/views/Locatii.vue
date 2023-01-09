<template>
    <div>

        <div class="position-relative">
            <!-- shape Hero -->
            <section class="section-shaped my-0">
                <div class="shape shape-style-1 shape-default shape-skew">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="container shape-container d-flex">
                    <div class="col px-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="display-3  text-white">Unde ne găsiţi
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 1st Hero Variation -->
        </div>
        <section class="section section-lg pt-lg-0 mt--200">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row row-grid">
                            <div v-for="locatie in locatii" class="col-lg-4 mt-4">
                                <card class="border-0 h-100" hover shadow body-classes="py-5">
                                    <icon name="ni ni-square-pin" type="primary" rounded class="mb-4" style="color: white !important; background: green !important">
                                    </icon>
                                    <h5 class="text-primary text-uppercase" style="color: green !important">{{locatie['adresa']}}</h5>
                                    <div class="pt-3" >
                                        <badge type="primary" rounded style="color: white !important; background: rgba(0, 136, 0, 0.5) !important"> Cod poştal: {{ locatie['codPostal']}}</badge>
                                        <badge type="primary" rounded style="color: white !important; background: rgba(0, 136, 0, 0.5) !important">{{ locatie['email'] }}</badge>
                                        <badge type="primary" rounded style="color: white !important; background: rgba(0, 136, 0, 0.5) !important">{{ locatie['nrTelefon'] }}</badge>
                                    </div>
                                    <base-button tag="a" href="#" type="primary" class="mt-5" style="background: green !important">
                                        Mai multe detalii
                                    </base-button>
                                </card>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

import axios from 'axios';

export default {

    name: "locatii",

    data() {
        return {
            locatii: []
        };
    },

    components: {},
    mounted() {
        this.saveData()
    },

    methods: {
        async saveData() {

            let masini = [];

            const options = {
                method: 'GET',
                url: 'http://127.0.0.1:8000/locatii',
                headers: {accept: 'application/json; charset=utf-8'}
            };

            this.getData(options)
                .then(data => {
                    this.locatii = data;
                })
        },

        getData(options) {
            return  axios.request(options)
                .then((response) => response.data);
        }
    }
};
</script>
