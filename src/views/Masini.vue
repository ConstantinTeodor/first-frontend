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
                                <h1 class="display-3  text-white">Flota de maşini
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
                            <div v-for="masina in masini" class="col-lg-4 mt-4">
                                <card class="border-0" hover shadow body-classes="py-5">
                                    <icon name="ni ni-collection" type="primary" rounded class="mb-4" style="color: white !important; background: green !important">
                                    </icon>
                                    <h5 class="text-primary text-uppercase" style="color: green !important"> {{ masina['marca'] }}  -  {{ masina['model'] }}</h5>
                                    <h6 class="text-primary text-uppercase" style="color: green !important"> {{ masina['nrInmatriculare'] }} - {{masina['anFabricatie']}}</h6>
                                    <div style="color: green !important"> Maşina se află în locația: {{locatie(masina)['adresa']}}</div>
                                    <div class="pt-3">
                                        <badge type="primary" rounded style="color: white !important; background: rgba(0, 136, 0, 0.5) !important">{{ masina['categorie']}}</badge>
                                        <badge type="primary" rounded style="color: white !important; background: rgba(0, 136, 0, 0.5) !important">{{ masina['tipMotor'] }}</badge>
                                        <badge type="primary" rounded style="color: white !important; background: rgba(0, 136, 0, 0.5) !important">{{ masina['tipTransmisie'] }}</badge>
                                        <badge type="primary" rounded style="color: white !important; background: rgba(0, 136, 0, 0.5) !important"> Număr pasageri: {{ masina['nrPasageri'] }}</badge>
                                        <badge type="primary" rounded style="color: white !important; background: rgba(0, 136, 0, 0.5) !important"> Număr uşi: {{ masina['nrUsi'] }}</badge>
                                    </div>
                                    <base-button tag="a" href="#" type="primary" class="mt-4" style="background: green !important">
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
import {toInteger} from "lodash";

export default {

    name: "masini",

    data() {
        return {
            masini: [],
            locatii: []
        };
    },

    components: {},
    mounted() {
        this.saveData()
    },

    methods: {

        locatie(masina) {
            return this.locatii.find(locatie => locatie.idLocatie === toInteger(masina.idLocatieActuala));
        },

        async saveData() {

            let masini = [];

            const options = {
                method: 'GET',
                url: 'http://127.0.0.1:8000/masini',
                headers: {accept: 'application/json; charset=utf-8'}
            };

            this.getData(options)
                .then(data => {
                    this.masini = data;
                });

            let locatii = [];

            const options1 = {
                method: 'GET',
                url: 'http://127.0.0.1:8000/locatii',
                headers: {accept: 'application/json; charset=utf-8'}
            };

            this.getData(options1)
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
