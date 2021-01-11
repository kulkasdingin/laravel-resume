<template>
  <div class="card overflow-auto">
    <div class="card-header">
      <div class="card-title">Experience</div>
    </div>
    <div class="card-body">
      <table class="table text-center">
        <thead>
          <tr>
            <th></th>
            <th
              v-for="(attribute_line, index) in attribute_lines"
              v-bind:key="index"
            >
              {{ attribute_line }}
              <i
                class="fas fa-times fa-xs"
                @click="deleteAttr(index)"
                :style="{ color: 'darkgray' }"
              ></i>
            </th>
            <th v-if="showInputAttributeLine">
              <form @submit.prevent="addAttributeLine">
                <input
                  type="text"
                  name="newAttributeLine"
                  v-model="newAttributeLine"
                />
              </form>
            </th>
            <th>
              <button
                class="btn btn-primary"
                @click="toggleShowInputAttributeLine()"
              >
                <div v-if="showInputAttributeLine">
                  <i class="fas fa-check"></i>
                </div>
                <div v-else>
                  <i class="fas fa-plus"></i>
                </div>
              </button>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(record, recIndex) in records" v-bind:key="record.order">
            <td>{{ recIndex + 1 }}.</td>
            <td
              v-for="(attribute, attrIndex) in attribute_lines"
              v-bind:key="attrIndex"
            >
              <input
                type="text"
                v-model="
                  record.custom_field_record_attribute_line_values[attrIndex]
                "
              />
            </td>
          </tr>
          <tr>
            <td>
              <button class="btn btn-primary" @click="addRecord">
                <i class="fas fa-plus"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <button
        type="button"
        class="btn btn-primary col-6 offset-6 mt-3"
        click="submit"
      >
        Next section
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      records: [],
      attribute_lines: ["Job Title", "Start Date", "End Date", "Company"],
      showInputAttributeLine: false,
      newAttributeLine: "",
      highestAttributeOrder: 4,
      highestRecordOrder: 1,
    };
  },
  methods: {
    toggleShowInputAttributeLine() {
      if (this.showInputAttributeLine == true) {
        this.addAttributeLine();
      }
      this.showInputAttributeLine = true;
    },
    addAttributeLine() {
      if (this.newAttributeLine != "") {
        this.attribute_lines.push(this.newAttributeLine);
        this.newAttributeLine = "";
      }
      this.showInputAttributeLine = false;
    },
    deleteAttr(index) {
      this.attribute_lines.splice(index, 1);
      this.records.forEach((record) => {
        record.custom_field_record_attribute_line_values.splice(index, 1);
      });
    },
    addRecord() {
      this.records.push({
        custom_field_record_attribute_line_values: [],
      });
    },

    submit() {
      let formData = new FormData();
      formData.append("name", "Experience");
      formData.append("order", 1);
      formData.append("cv_id", 1);

      axios
        .post(this.apiUrl.concat("/cvs"), formData)
        .then((response) => {
          const cv = response.data.cv;
          console.log(cv);
          window.location.href = "/admin/CV/new/" + cv.id + "/experience";
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>