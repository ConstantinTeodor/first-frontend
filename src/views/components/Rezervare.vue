<template>
<div class="rez-container">
    <div class="date">
        <div>
            <h4 class="mb-1" style="color: green !important">Rezervarea ta:</h4>
        </div>
        <div class="masina">
            Mașina: {{ masina.marca + ' ' + masina.model }}
        </div>
        <div class="data">
            Perioada: {{ data.dataInchiriere }} / {{ data.dataPredareLimita }}
        </div>
        <div class="masina">
            Număr înmatriculare: {{ masina.nrInmatriculare }}
        </div>
        <div class="masina">
            Ridicare: {{ locatieInchiriere.adresa }}
        </div>
        <div class="masina">
            Predare: {{ locatiePredare.adresa }}
        </div>
    </div>
    <div class="buttons">
        <div class="delete" @click.prevent.self="$emit('delete')">
            Delete
        </div>
        <div class="edit" @click.prevent.self="$emit('edit')">
            Edit
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "Rezervare",
    props: {
        data: {
            type: Object,
            default: null
        },
        masina: {
            type: Object,
            default: null
        },
        locatieInchiriere: {
            type: Object,
            default: null
        },
        locatiePredare: {
            type: Object,
            default: null
        }
    }
}
</script>

<style scoped>
    .rez-container {
        padding: 8px;
        background-color: white;
        /*border: 4px solid darkgrey;*/
        /*border-radius: 4px;*/

        border-width:                .0625rem;
        border-color:                #e9ecef;

        border-radius:               .25rem;

        box-shadow:                  0 15px 35px rgba(50,50,93,.1), 0 5px 15px rgba(0,0,0,.07);

        width: 100%;
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
    }
    .date {
        display: flex;
        flex-direction: column;
    }
    .buttons {
        display: flex;
        justify-content: space-between;
    }
    .delete {
        margin-top: auto;
        margin-bottom: auto;
        height: fit-content;
        padding: 2px;
        cursor: pointer;
        color: darkred;
        background-color: white;
        border-width:                .0625rem;
        border-color:                #e9ecef;

        border-radius:               .25rem;

        box-shadow:                  0 15px 35px rgba(50,50,93,.1), 0 5px 15px rgba(0,0,0,.07);
    }
    .edit {
        margin-top: auto;
        margin-bottom: auto;
        height: fit-content;
        padding: 2px;
        cursor: pointer;
        color: darkgreen;
        background-color: white;
        border-width:                .0625rem;
        border-color:                #e9ecef;

        border-radius:               .25rem;

        box-shadow:                  0 15px 35px rgba(50,50,93,.1), 0 5px 15px rgba(0,0,0,.07);

        margin-left: 16px;
        margin-right: 16px;
    }
</style>
