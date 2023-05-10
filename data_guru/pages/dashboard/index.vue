<template>
    <div>
        <div class="dashboard" style="font-family: 'Poppins', sans-serif;">
            <div class="appbar">
                <v-app-bar
      color="#539165"
      dense
      dark
    >
      <img src="~assets/image 2.png" style="width: 50px;" alt="">
      <div class="judul" style="font-weight: 700;">
          <v-toolbar-title>DATA GURU REKAYASA PERANGKAT LUNAK</v-toolbar-title>
      </div>

      <v-spacer></v-spacer>

      <div class="icon" >
          <img src="~assets/mdi_user_white.png" style="width: 50px; margin-right: 70px; margin-top: 6px;" alt="">
      </div>
      <div class="info-user">
        <!-- <div class="nama-user">
            Admin
        </div> -->
        <div class="info-logout">
            <v-menu
              transition="slide-y-transition"
              bottom 
              offset-y
            >
              <template v-slot:activator="{ on, attrs }" >
                <v-btn
                flat
                  v-bind="attrs"
                  v-on="on"
                >
                  Admin
                </v-btn>
              </template>
              <v-list>
                <v-list-item
                  v-for="(item, index) in actions"
                  :key="index"
                  @click="item.to" 
                >
                  <v-list-item-title class="white--text">
                    {{item.title}}
                  </v-list-item-title>
                </v-list-item>
              </v-list>
            </v-menu>
        </div>
      </div>
    </v-app-bar>
            </div>
        </div>
        <div class="container">                    
          <div class="addBtn" style="color: #ffffff; margin-top: 21px;">
            <!-- <v-btn style="background: #539165" rounded outlined dark>Tambah Data</v-btn> -->
            <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
        style="background: #539165"
          rounded
          outlined
          dark
          v-bind="attrs"
          v-on="on"
        >
          Tambah Data
        </v-btn>
      </template>
    </v-dialog>
          </div>
          <div class="search" style="margin-left:1180px; margin-top: -18px; width: 600px">
            <v-toolbar flat >
              <v-text-field
                v-model="cari"
                flat
                placeholder="Cari"
                style="border-radius: 56px"
              ></v-text-field>
              <v-btn @click="searchData(cari)" icon>
                <v-icon>mdi-magnify</v-icon>
              </v-btn>
            </v-toolbar>
          </div>
          <div class="tabel">
            <v-simple-table fixed-header height="500px" data-app>
              <template v-slot:top>
                <v-dialog v-model="dialog">
                  <template v-slot:activator="{ on, attrs }">                    
                  </template>
                  <v-card>
                    <v-card-title>
                      <span class="text-h5">DMS</span>
                    </v-card-title>
      
                    <v-card-text>
                      <v-container>
                        <v-row>
                          <v-col cols="12" sm="6" md="4">
                            <v-text-field
                              label="Nama"
                            ></v-text-field>
                          </v-col>
                          <v-col cols="12" sm="6" md="4">
                            <v-text-field
                              label="Jenis Kelamin"
                            ></v-text-field>
                          </v-col>
                          <v-col cols="12" sm="6" md="4">
                            <v-text-field
                              label="Jabatan"
                            ></v-text-field>
                          </v-col>
                          <v-col>
                            <v-textarea clearable label="Alamat"></v-textarea>
                          </v-col>
                          <v-col cols="12" sm="6" md="4">
                            <v-text-field
                              label="No. Telepon"
                            ></v-text-field>
                          </v-col>
                        </v-row>
                      </v-container>
                    </v-card-text>
      
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="blue darken-1" text @click="close">
                        Cancel
                      </v-btn>
                      <v-btn color="blue darken-1" text @click="save"> Save </v-btn>
                    </v-card-actions>
                  </v-card>
                </v-dialog>
              </template>
              <thead>
                <tr>
                  <th class="text-left">Id</th>
                  <th class="text-left">Nama</th>
                  <th class="text-left">Jenis Kelamin</th>
                  <th class="text-left">Jabatan</th>
                  <th class="text-left">Alamat</th>
                  <th class="text-left">No. Telepon</th>
                  <th class="text-left">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in get" :key="item.id">
                  <td style="width: 100px">id</td>
                  <td style="width: 100px">nama</td>
                  <td style="width: 100px">jenis kelamin</td>
                  <td style="width: 100px">jabatan</td>
                  <td style="width: 100px">alamat</td>
                  <td style="width: 100px">notelp</td>
                  <td style="width: 100px">
                    <tr>
                      <v-row>
                        <v-col>
                          <v-btn
                            @click.prevent="edit(item)"
                            color="primary"
                            fab
                            small
                            dark
                            ><v-icon>mdi-pencil</v-icon></v-btn
                          >
                        </v-col>
                        <v-col>
                          <v-btn
                            @click.prevent="remove(item)"
                            color="danger"
                            fab
                            small
                            dark
                            ><v-icon>mdi-delete</v-icon></v-btn
                          >
                        </v-col>
                      </v-row>
                    </tr>
                  </td>
                </tr>
              </tbody>
            </v-simple-table>
          </div>
        </div>
    </div>
</template>
<script>
export default{
    data: () => ({
     cari: null,
     dialog: false,
     editIndex: -1,
     editGuru: {
      nama: '',
      gender: '',
      jabatan: '',
      alamat: '',
      nomer:''
     },
     defaultGuru: {
      nama: '',
      gender: '',
      jabatan: '',
      alamat: '',
      nomer:''
     }
    }),

    methods: {
      close(){
        this.dialog = false;
        this.dialog = null;
        this.$nextTick(() => {
          this.editGuru = Object.assign({}, this.defaultGuru);
          this.editIndex = -1;
        })
      },
    },
}
</script>