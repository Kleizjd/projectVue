<template>
  <div class="container" id="table-content">
    <div class="table-container">
      <b-table :items="items" :fields="fields">
        <template #cell(id)="data">
          <!-- <b-form-input type="number" v-if="items[data.index].isEdit" v-model="items[data.index].id"></b-form-input> -->
          <span>{{ data.value }}</span>
        </template>
        <template #cell(cedula)="data">
          <b-form-input v-if="items[data.index].isEdit" type="number" v-model="items[data.index].cedula"></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(nombre)="data">
          <b-form-input v-if="items[data.index].isEdit" type="text" v-model="items[data.index].nombre"></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(agencia)="data">
          <b-form-input v-if="items[data.index].isEdit" type="text" v-model="items[data.index].agencia"></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(celular)="data">
          <b-form-input v-if="items[data.index].isEdit" type="number" v-model="items[data.index].celular"></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(estado_personas_id)="data">
          <b-form-input v-if="items[data.index].isEdit" type="text"
            v-model="items[data.index].estado_personas_id"></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(correo)="data">
          <b-form-input v-if="items[data.index].isEdit" type="text" v-model="items[data.index].correo"></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(grupo)="data">
          <b-form-input v-if="items[data.index].isEdit" type="number" v-model="items[data.index].grupo"></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(rol_id)="data">
          <b-form-input v-if="items[data.index].isEdit" type="number" v-model="items[data.index].rol_id"></b-form-input>
          <span v-else>{{ data.value }}</span>
        </template>
        <template #cell(edit)="data">
          <b-button pill variant="warning" size="sm" @click="editRowHandler(data)">
            <span v-if="!items[data.index].isEdit">Editar</span>
            <span v-else>Guardar</span>
          </b-button>
        </template>
      </b-table>
      <!-- <pre>
          {{ items }}
        </pre> -->
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "dataTableComponent",
  components: {},
  created() { },
  mounted() {
    this.listarPersonas();
  },
  data() {
    return {
      fields: [
        {
          key: "id",
          label: "ID",
        },
        {
          key: "cedula",
          label: "Cedula",
        },
        {
          key: "nombre",
          label: "Nombre",
        },
        {
          key: "agencia",
          label: "Agencia",
        },
        {
          key: "celular",
          label: "Celular",
        },
        {
          key: "estado_personas_id",
          label: "Estado",
        },
        {
          key: "correo",
          label: "Correo",
        },
        {
          key: "grupo",
          label: "Grupo",
          type: "checkbox",
        },
        {
          key: "rol_id",
          label: "Rol",
          type: "select",
        },
        { key: "edit", label: "" },
      ],
      items: null,
    };
  },
  methods: {
    async listarPersonas() {
      const optionsRequest = {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
      };

      axios
        .get(`http://127.0.0.1:8000/api/persona`, {
          optionsRequest,
        })
        .then((response) => {
          this.items = response.data;
          this.items = this.items.map((item) => ({ ...item, isEdit: false }));
          console.log(this.items);
        })
        .catch(function (error) {
          console.log(error);
        })
        .finally(function () {
          console.log("lista de usuarios extraida con exito!");
        });
    },
    editRowHandler(data) {
      this.items[data.index].isEdit = !this.items[data.index].isEdit;
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
