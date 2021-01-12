<template>
  <div class="col-md-12">
    <div class="card card-outline card-secondary">
      <div class="card-header">
        <h1 class="card-title">CVs</h1>
        <a
          href=""
          class="btn btn-sm btn-success float-right"
          data-toggle="modal"
          data-target="#modal-add-new"
          >Add New</a
        >
      </div>
      <div class="card-body">
        <table id="cvs-table" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>First Name</th>
              <th>Profession</th>
              <th>Email</th>
              <th>Active</th>
              <th>Protected</th>
              <th>Last Update</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="cv in cvs" :key="cv.id">
              <td>{{ cv.id }}</td>
              <td>{{ cv.first_name }}</td>
              <td>{{ cv.profession }}</td>
              <td>
                <template v-if="cv.email">
                  {{ cv.email }}
                </template>
                <template v-else> - </template>
              </td>
              <td>
                <template v-if="cv.is_active == 1"> Active </template>
                <template v-else> Deactived </template>
              </td>
              <td>
                <template v-if="cv.is_protected == 1"> Protected </template>
                <template v-else> Unprotected </template>
              </td>
              <td>
                <template v-if="cv.updated_at">
                  {{ cv.updated_at }}
                </template>
                <template v-else>
                  {{ cv.created_at }}
                </template>
              </td>
              <td class="align-content-center">
                <!-- Show modal to update CV -->
                <a href="" class="btn btn-sm btn-warning">Update</a>
                <!-- Url to display template cv -->
                <a v-if="cv.is_protected" v-bind:href="'/CV/first/' + cv.uuid" class="btn btn-sm btn-primary"
                  >View First Template</a
                >
                <a v-else v-bind:href="'/CV/first/' + cv.id" class="btn btn-sm btn-primary"
                  >View First Template</a
                >
                <a v-if="cv.is_protected" v-bind:href="'/CV/second/' + cv.uuid" class="btn btn-sm btn-primary"
                  >View Second Template</a
                >
                <a v-else v-bind:href="'/CV/second/' + cv.id" class="btn btn-sm btn-primary"
                  >View Second Template</a
                >
                <!-- Deactive a cv -->
                <a href="" class="btn btn-sm btn-danger">Deactive</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal add/update ditaruh sini  -->
  <!-- add update kasih tambah row buat tambah custom field -->
</template>
<script>
export default {
  data() {
    return {
      cv: {
        first_name: "",
        last_name: "",
        profession: "",
        photo: "",
        address: "",
        email: "",
        birth_date: "",
        phone: "",
        gender: "",
        profile_id: "",
        is_active: "",
        is_protected: "",
        updated_at: "",
        created_at: "",
      },
      cvs: [],
      profileState: [true, "Square"], // isCircle, InnerHtml
      uri: "/admin/resource/cvs",
    };
  },
  methods: {
    tableInit() {
      $("#cvs-table")
        .DataTable({
          responsive: true,
          lengthChange: false,
          autoWidth: false,
          destroy: true,
          buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        })
        .buttons()
        .container()
        .appendTo("#example1_wrapper .col-md-6:eq(0)");
    },
    putAsyncData(data) {
      console.log(data);
      this.cvs = data;
    },
    loadData() {
      axios.get(this.uri).then((response) => {
        let self = this;
        $.when(this.putAsyncData(response.data.cvs)).then(function () {
          self.tableInit();
        });
      });
    },
    resetData() {
      (this.cv.first_name = ""),
        (this.cv.last_name = ""),
        (this.cv.profession = ""),
        (this.cv.photo = ""),
        (this.cv.address = ""),
        (this.cv.email = ""),
        (this.cv.birth_date = ""),
        (this.cv.phone = ""),
        (this.cv.gender = ""),
        (this.cv.is_protected = ""),
        (this.cv.profile_id = "");
    },
    sendNewData() {
      let formData = new FormData();
      let photo = $("#photo")[0].files[0];
      formData.append("first_name", this.profile.first_name);
      formData.append("last_name", this.profile.last_name);
      formData.append("profession", this.profile.profession);
      if (photo) {
        formData.append("photo", photo);
      }
      formData.append("address", this.profile.address);
      formData.append("email", this.profile.email);
      formData.append("birth_date", this.profile.birth_date);
      formData.append("phone", this.profile.phone);
      formData.append("gender", this.profile.gender);
      formData.append("user_id", 1);
      axios
        .post(this.uri, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.loadData();
          this.resetData();
          toastr.success(response.data.status);
        })
        .catch((error) => {
          toastr.error(error.data);
        });
    },
    changeImageProfileToSquare(event) {
      $("#profile-image").toggleClass("img-circle");
      if (this.profileState[0]) {
        this.profileState = [false, "Circle"];
      } else {
        this.profileState = [true, "Square"];
      }
    },
  },
  mounted() {
    this.loadData();
    console.log("Component mounted.");
  },
};
</script>
