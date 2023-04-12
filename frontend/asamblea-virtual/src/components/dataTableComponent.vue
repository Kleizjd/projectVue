<template>
  <div class="container" id="table-content">
    <div class="table-container">
      <b-table :items="tableItems" :fields="fields">
        <template #cell(id)="data">
          <!-- <b-form-input type="number" v-if="tableItems[data.index].isEdit" v-model="tableItems[data.index].id"></b-form-input> -->
          <span>{{ data.value }}</span>
        </template>
        <template #cell(cedula)="data">
          <b-form-input
            v-if="tableItems[data.index].isEdit"
            type="number"
            v-model="tableItems[data.index].cedula"
          ></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(nombre)="data">
          <b-form-input
            v-if="tableItems[data.index].isEdit"
            type="text"
            v-model="tableItems[data.index].nombre"
          ></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(agencia)="data">
          <b-form-input
            v-if="tableItems[data.index].isEdit"
            type="text"
            v-model="tableItems[data.index].agencia"
          ></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(celular)="data">
          <b-form-input
            v-if="tableItems[data.index].isEdit"
            type="number"
            v-model="tableItems[data.index].celular"
          ></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(estado_personas_id)="data">
          <b-form-input
            v-if="tableItems[data.index].isEdit"
            type="text"
            v-model="tableItems[data.index].estado_personas_id"
          ></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(correo)="data">
          <b-form-input
            v-if="tableItems[data.index].isEdit"
            type="text"
            v-model="tableItems[data.index].correo"
          ></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(grupo)="data">
          <b-form-input
            v-if="tableItems[data.index].isEdit"
            type="number"
            v-model="tableItems[data.index].grupo"
          ></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(rol_id)="data">
          <b-form-input
            v-if="tableItems[data.index].isEdit"
            type="number"
            v-model="tableItems[data.index].rol_id"
          ></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(edit)="data">
          <b-button
            pill
            variant="warning"
            size="sm"
            @click="editRowHandler(data)"
          >
            <span v-if="!tableItems[data.index].isEdit">Editar</span>
            <span v-else>Guardar</span>
          </b-button>
        </template>
      </b-table>
    </div>
    <!-- <pre>
      {{ tableItems }}
    </pre> -->
  </div>
</template>
<script>
export default {
  name: "dataTableComponent",
  components: {},
  props: {
    items: Array,
    fields: Array,
  },

  data() {
    return {
      selectedRow: {},
      tableItems: this.items,
    };
  },
  methods: {
    editRowHandler(data) {
      this.tableItems[data.index].isEdit = !this.tableItems[data.index].isEdit;
    },
  },
};
</script>
<style>
#table-content {
  text-align: center;
  margin: 60px;
}

thead,
tbody,
tfoot,
tr,
td,
th {
  text-align: left;
  width: 100px;
  vertical-align: middle;
}

pre {
  text-align: left;
  color: #d63384;
}
</style>
