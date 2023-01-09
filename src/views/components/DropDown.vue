<template>
<div class="drop-down-container">
    <BaseInput
                alternative
                :value="name"
                :drop-down="true"
                :placeholder="placeholder"
                addon-left-icon="ni ni-align-left-2"
                @click.native="openDropDown"
    />
    <div v-if="dropDown" class="drop-down-list">
        <div
            v-for="client in clients"
             class="client"
             @click.prevent.self="selectClient(client)"
        >
            {{ text(client) }}
        </div>
    </div>
</div>
</template>

<script>
import BaseInput from "@/components/BaseInput.vue";
export default {
    name: "DropDown",
    data() {
        return {
            dropDown: false,
            name: ''
        }
    },
    props: {
        clients: {
            type: Array,
            default: null
        },
        type: {
            type: String,
            default: ''
        },
        placeholder: {
            type: String,
            default: ''
        }
    },
    components: {
        BaseInput
    },
    methods: {
        text(obiect) {
            if(this.type === 'locatii' && !!obiect) {
                return obiect.adresa;
            }
            else if(this.type === 'masini' && !!obiect) {
                return obiect.marca + ' ' + obiect.model;
            }
            else if (!!obiect) {
                return obiect.nume + ' ' + obiect.prenume;
            }
            else {
                return ''
            }
        },
        openDropDown() {
            this.dropDown = !this.dropDown;
        },
        selectClient(obiect) {
            this.dropDown = false;
            if(this.type === 'locatii' && !!obiect) {
                this.name = obiect.adresa;
                this.$emit('selected', obiect);
            }
            else if(this.type === 'masini' && !!obiect) {
                this.name = obiect.marca + ' ' + obiect.model;
                this.$emit('selected', obiect);
            }
            else if (!!obiect) {
                this.name = obiect.nume + ' ' + obiect.prenume;
                this.$emit('selected', obiect);
            }
        },
        restartData() {
            this.name = '';
        }
    }
}
</script>

<style scoped>
.drop-down-list {
    position: absolute;
    background-color: white;
    z-index: 2;
    height: 56%;
    overflow-y: scroll;
    scroll-behavior: smooth;
    border-radius: 4px;
}
.client {
    cursor: pointer;
    padding-left: 8px;
    padding-right: 8px;
    border: 1px solid black;
    border-radius: 4px;
    margin-bottom: 5px;
    z-index: 2;
    background-color: lightgray;
    color: black;
}

::-webkit-scrollbar {
    width: 0;
    background: transparent;
}
::-webkit-scrollbar-thumb {
    background: lightgreen;
}
</style>
