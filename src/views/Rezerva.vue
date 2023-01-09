<template>
    <div>
        <div class="position-relative">
            <!-- shape Hero -->
            <section class="section-shaped my-0 ">
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
                                <h1 class="display-3  text-white">Rezervă o mașină
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-1 section-contact-us">
                <div class="container">
                    <div class="row justify-content-center mt--300">
                        <div class="col-lg-8">
                            <card gradient="secondary" shadow body-classes="p-lg-5">
                                <h4 class="mb-1" style="color: green !important">Vrei să faci o rezervare?</h4>
                                <p class="mt-0" style="color: green !important">Completează formularul.</p>
                                <DropDown
                                    class="mt-3"
                                    ref="clienti"
                                    :clients="clienti"
                                    :placeholder="'Numele tau'"
                                    @selected="selectClient"
                                />
                                <DropDown
                                    :type="'masini'"
                                    ref="masini"
                                    :clients="masini"
                                    :placeholder="'Alege masina'"
                                    @selected="selectMasina"
                                />
                                <base-input
                                            alternative
                                            placeholder="Data inchiriere (An-Luna-Zi)"
                                            addon-left-icon="ni ni-calendar-grid-58">
                                    <textarea class="form-control form-control-alternative" id="ridicare" name="name" rows="1"
                                              cols="80" placeholder="Data ridicare (An-Luna-Zi)"></textarea>
                                </base-input>
                                <base-input
                                    alternative
                                    placeholder="Data predare (An-Luna-Zi)"
                                    addon-left-icon="ni ni-calendar-grid-58">
                                    <textarea class="form-control form-control-alternative" id="predare" name="name" rows="1"
                                              cols="80" placeholder="Data predare (An-Luna-Zi)"></textarea>
                                </base-input>
                                <DropDown
                                    :type="'locatii'"
                                    ref="ridicate"
                                    :clients="locatii"
                                    :placeholder="'Alege locatia de ridicare'"
                                    @selected="selecteazaLocatiaRidicare"
                                />
                                <DropDown
                                    :type="'locatii'"
                                    ref="predare"
                                    :clients="locatii"
                                    :placeholder="'Alege locatia de predare'"
                                    @selected="selecteazaLocatiaPredare"
                                />
                                <base-button type="default" round block size="lg" @click.native="send" style="color: white !important; background: green !important">
                                    {{ editing ? 'Save' : 'Fă rezervare'  }}
                                </base-button>
                            </card>
                        </div>
                    </div>
                </div>
                <div v-if="inchirieri.length" class="container pt-3">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <card shadow body-classes="p-lg-5">
                                <div class="rezervari">
                                    <Rezervare
                                        v-for="rezervare in inchirieri"
                                        :data="rezervare"
                                        :masina="masina(rezervare)"
                                        :locatieInchiriere="locatieInchiriere(rezervare)"
                                        :locatiePredare="locatiePredaree(rezervare)"
                                        @delete="remove(rezervare)"
                                        @edit="edit(rezervare)"
                                    />
                                </div>
                            </card>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
import DropDown from "@/views/components/DropDown.vue";
import Rezervare from "@/views/components/Rezervare.vue";
import {toInteger} from "lodash";
export default {
    components: {
        DropDown,
        Rezervare
    },
    data() {
        return {
            clienti: [],
            masini: [],
            selectedClient: null,
            selectedMasina: null,
            locatii: [],
            locatieRidicare: null,
            locatiePredare: null,
            inchirieri: [],
            editing: null
        };
    },
    mounted() {
        this.updateData();
    },
    watch: {
        selectedClient: function () {
            if(!!this.selectedClient) {
                this.saveInchirieri();
            }
            else  {
                this.inchirieri = [];
            }
        }
    },
    methods: {
        updateData() {
            this.saveInchirieri();
            this.saveData();
            this.saveCars();
            this.saveLocations();
        },

        masina(rezervare) {
            return this.masini.find(masina => masina.idMasina === toInteger(rezervare.idMasina));
        },
        locatiePredaree(rezervare) {
            return this.locatii.find(locatie => locatie.idLocatie === toInteger(rezervare.idLocatiePredare));
        },
        locatieInchiriere(rezervare) {
            return this.locatii.find(locatie => locatie.idLocatie === toInteger(rezervare.idLocatieInchiriere));
        },
        edit(rezervare) {
            this.editing = toInteger(rezervare.idInchiriere);
            this.$refs.masini.selectClient(this.masini.find( masina => masina.idMasina === toInteger(rezervare.idMasina)));
            this.$refs.ridicate.selectClient(this.locatii.find( locatie => locatie.idLocatie === toInteger(rezervare.idLocatieInchiriere)));
            this.$refs.predare.selectClient(this.locatii.find( locatie => locatie.idLocatie === toInteger(rezervare.idLocatiePredare)));
            document.getElementById("ridicare").value = rezervare.dataInchiriere;
            document.getElementById("predare").value = rezervare.dataPredareLimita;

        },
        async saveData() {
            const options = {
                method: 'GET',
                url: 'http://127.0.0.1:8000/clienti',
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
        async saveInchirieri() {
            const options = {
                method: 'GET',
                url: 'http://127.0.0.1:8000/inchirieri/client/' + this.selectedClient.idClient,
                headers: {accept: 'application/json; charset=utf-8'}
            };

            this.getInchirieri(options)
                .then(data => {
                    this.inchirieri = data;
                })
        },

        getInchirieri(options) {
            return  axios.request(options)
                .then((response) => response.data);
        },
        async saveCars() {
            const options = {
                method: 'GET',
                url: 'http://127.0.0.1:8000/masini',
                headers: {accept: 'application/json; charset=utf-8'}
            };

            this.getCars(options)
                .then(data => {
                    this.masini = data;
                })
        },

        getCars(options) {
            return  axios.request(options)
                .then((response) => response.data);
        },
        async saveLocations() {
            const options = {
                method: 'GET',
                url: 'http://127.0.0.1:8000/locatii',
                headers: {accept: 'application/json; charset=utf-8'}
            };

            this.getLocations(options)
                .then(data => {
                    this.locatii = data;
                })
        },

        getLocations(options) {
            return  axios.request(options)
                .then((response) => response.data);
        },

        selectClient(client) {
            this.selectedClient = client;
            if (this.editing) {
                this.editing = null;
                this.$refs.masini.restartData();
                this.$refs.ridicate.restartData();
                this.$refs.predare.restartData();
                document.getElementById("ridicare").value = '';
                document.getElementById("predare").value = '';
            }
        },
        selectMasina(masina) {
            this.selectedMasina = masina;
            if(!this.editing) {
                this.inchirieri = this.inchirieri.filter(rezervare => toInteger(rezervare.idMasina) === masina.idMasina)
            }
        },
        selecteazaLocatiaRidicare(locatie) {
            this.locatieRidicare = locatie;
            if(!this.editing) {
                this.inchirieri = this.inchirieri.filter(rezervare => toInteger(rezervare.idLocatieInchiriere) === locatie.idLocatie)
            }
        },
        selecteazaLocatiaPredare(locatie) {
            this.locatiePredare = locatie;
            if(!this.editing) {
                this.inchirieri = this.inchirieri.filter(rezervare => toInteger(rezervare.idLocatiePredare) === locatie.idLocatie)
            }
        },
        remove(rez) {
            const options = {
                method: 'DELETE',
                url: 'http://127.0.0.1:8000/inchirieri',
                headers: {
                    accept: 'application/json; charset=utf-8',
                    'Access-Control-Allow-Origin': 'origin-list'
                },
                data: {
                    'id': toInteger(rez.idInchiriere)
                }
            };
            this.getRemove(options)
                .then(response => {
                    this.updateData();
                    console.log(response);
                })
        },
        getRemove(options) {
            return  axios.request(options)
                .then((response) => response.data);
        },
        save() {
            let ridicare = document.getElementById("ridicare").value;
            let predare = document.getElementById("predare").value;

            const options = {
                method: 'PUT',
                url: 'http://127.0.0.1:8000/inchirieri',
                headers: {
                    accept: 'application/json; charset=utf-8',
                    'Access-Control-Allow-Origin': 'origin-list'
                },
                data: {
                    "idInchiriere": this.editing,
                    "idClient": this.selectedClient.idClient,
                    "idMasina": this.selectedMasina.idMasina,
                    "dataInchiriere": ridicare,
                    "dataPredareLimita": predare,
                    "idLocatieInchiriere": this.locatieRidicare.idLocatie,
                    "idLocatiePredare": this.locatiePredare.idLocatie
                }
            };
            this.getSave(options)
                .then(response => {
                    this.updateData();
                    console.log(response);
                })
        },
        getSave(options) {
            return  axios.request(options)
                .then((response) => response.data);
        },
        send() {
            if(!!this.editing) {
                this.save()
            }
            else {
                let ridicare = document.getElementById("ridicare").value;
                let predare = document.getElementById("predare").value;

                const options = {
                    method: 'POST',
                    url: 'http://127.0.0.1:8000/inchirieri',
                    headers: {
                        accept: 'application/json; charset=utf-8',
                        'Access-Control-Allow-Origin': 'origin-list'
                    },
                    data: {
                        "idClient": this.selectedClient.idClient,
                        "idMasina": this.selectedMasina.idMasina,
                        "dataInchiriere": ridicare,
                        "dataPredareLimita": predare,
                        "idLocatieInchiriere": this.locatieRidicare.idLocatie,
                        "idLocatiePredare": this.locatiePredare.idLocatie
                    }
                };
                this.getSend(options)
                    .then(response => {
                        this.updateData();
                        console.log(response);
                    })
            }

            this.editing = null;
            this.$refs.masini.restartData();
            this.$refs.ridicate.restartData();
            this.$refs.predare.restartData();
            this.$refs.clienti.restartData();
            document.getElementById("ridicare").value = '';
            document.getElementById("predare").value = '';
        },
        getSend(options) {
            return  axios.request(options)
                .then((response) => response.data);
        },
    }
};
</script>
<style scoped>
    .position-relative {
        height: 100vh;
        overflow: scroll;
    }
    .rezervari {
        max-width: 587px;
        margin-left: auto;
        margin-right: auto;
    }
    ::-webkit-scrollbar {
        width: 0;
        background: transparent;
    }
    ::-webkit-scrollbar-thumb {
        background: lightgreen;
    }

</style>
