<script>
import TitleComponent from "../components/TitleComponent.vue";
import dataTableComponent from "../components/dataTableComponent.vue";
import axios from "axios";
export default {
  name: "Persona",
  components: {
    dataTableComponent,
    TitleComponent,
  },

  created() {
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
      items: [],
    };
  },

  methods: {
    async listarPersonas() {
      const url = "http://127.0.0.1:8000/api/persona";
      const optionsRequest = {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
      };

      axios
        .get(url, optionsRequest)
        .then((response) =>
          response.data.map((row) => {
            row.isEdit = false;
            this.items.push(row);
          })
        )
        .catch(console.log)
        .finally(console.log);
    },
  },
};
</script>
<template>
  <div class="children">
    <div id="contenido">
      <TitleComponent title="Personas" />
      <dataTableComponent :items="items" :fields="fields"></dataTableComponent>
    </div>
  </div>
</template>
<style scoped>
#contenido {
  margin: auto;
  width: 100%;
}
</style>
