<template>
  <div>
    <div class="content">
      <v-row >
        <v-col cols="6" class="kiri">
          <center>
            <img src="~assets/image 2.png" style="margin-top: 285px;" alt="">
          </center>
        </v-col>
        <v-col cols="6" class="kanan">
          <center>
            <img src="~assets/mdi_user.png" style="margin-top: 155px;" alt="">
            <div class="form_login">
              <div class="judul" style="margin-top: 15px; margin-bottom: 12px;">
                <h1>MASUK</h1>
              </div>
              <v-sheet class="bg-deep-purple pa-12" rounded>
                <v-card class="card mx-auto px-6 py-8" flat max-width="400">
                  <v-form novalidate
                    v-model="form"
                    @submit.prevent="onSubmit"
                  >
                    <v-text-field
                      v-model="username"
                      :readonly="loading"
                      :rules="[required1]"
                      class="mb-2"
                      clearable
                      variant="outlined"
                      label="Username"
                      placeholder="Masukan Username"
                    ></v-text-field>
                    <v-text-field
                      v-model="password"
                      :readonly="loading"
                      :rules="[required]"
                      clearable
                      variant="outlined"
                      label="Password"
                      placeholder="Masukan Password"
                    ></v-text-field>

                    <br>

                    <v-btn
                    class="btnlogin"
                      :disabled="!form"
                      :loading="loading"
                      block
                      color="#539165"
                      size="large"
                      type="submit"
                      variant="elevated"
                    >
                      <div class="login">
                        Masuk
                      </div>
                    </v-btn>
                 
                      
                  </v-form>
                </v-card>
              </v-sheet>
            </div>
          </center>
        </v-col>
      </v-row>
    </div>
  </div>
</template>
<script>
  export default {
    data: () => ({
      name: 'IndexPage',
      form: false,
      // username: null,
      // password: null,
      loading: false,
    }),

    methods: {
      onSubmit() {
      var login = {
        username: this.username,
        password: this.password,
      };

      
      this.$axios.post("http://localhost/PJBL2023/api_pjbl/public/login", login) // Ubah sesuai dengan alamat dan port server lokal Anda
      .then((response) => {
      // Proses respons dari server
      // ...
      
      this.$router.push("/dashboard");
    })
    .catch((error) => {
      console.error(error);
      // Tampilkan pesan error jika login gagal
    });
    },
      required (v) {
        return !!v || 'Password harus diisi!'
      },
      required1 (v) {
        return !!v || 'Username harus diisi!'
      },
    },
  }
</script>
<style>
.content{
  font-family: 'Poppins', sans-serif;
}
.kiri{
  background-color: #539165;
  height: 101.2vh;
}
.login{
  color: white;
}
.card{
  box-shadow: none;
}
.btnlogin{
  border-radius: 50px;
}
</style>