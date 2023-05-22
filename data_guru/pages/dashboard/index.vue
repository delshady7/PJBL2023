<template>
    <div>
      <div class="semua">

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
  
        <!-- <div class="icon" >
            <img src="~assets/mdi_user_white.png" style="width: 50px; margin-right: 70px; margin-top: 6px;" alt="">
        </div> -->
        <div class="info-user">
          <v-menu
        v-model="menu"      
        offset-x
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn
            color="indigo"
            icon
            dark
            v-bind="attrs"
            v-on="on"
          >
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </template>
  
        <v-card>
          <v-list>
            <v-list-item>
              <v-list-item-avatar>
                <img
                  src="https://cdn.vuetifyjs.com/images/john.jpg"
                  alt="John"
                >
              </v-list-item-avatar>
  
              <v-list-item-content class="list" style="margin-left: 10px;">
                <v-list-item-title>Admin</v-list-item-title>
                <v-list-item-subtitle>Guru</v-list-item-subtitle>
              </v-list-item-content>
  
              <v-list-item-action>
               <v-btn text>
                <nuxt-link to="/" style="color:black; text-decoration:none">
                  <v-icon>mdi-logout</v-icon>
                </nuxt-link>
               </v-btn>
              </v-list-item-action>
            </v-list-item>
          </v-list>
  
          <v-divider></v-divider>
  
          <v-list>
            <v-list-item>
             <!-- <nuxt-link to="/profile" style="color: black; text-decoration:none;">Profil
            </nuxt-link>-->
            <div class="text-center">
              <v-dialog
                v-model="dialogProfil"
                width="500"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-btn
                  class="profile-btn"
                    color="white"
                    text
                    width="200"                  
                    v-bind="attrs"
                    v-on="on"
                  >
                    Profil
                  </v-btn>
                </template>
          
                <v-card>
                  <v-card-title class="text-h5 grey lighten-2">
                    Detail Profil
                  </v-card-title>
          
                  <v-card-text>
                    <v-row>
                      <v-col class="q">
                        Nama
                      </v-col>
                      <v-col class="a">
                        Admin
                      </v-col>
                    </v-row>               
                    <v-row>
                      <v-col class="q">
                        Jenis Kelamin
                      </v-col>
                      <v-col class="a">
                        Tidak Disebutkan
                      </v-col>
                    </v-row>               
                    <v-row>
                      <v-col class="q">
                        Jabatan
                      </v-col>
                      <v-col class="a">
                        guru
                      </v-col>
                    </v-row>               
                    <v-row>
                      <v-col class="q">
                        Alamat
                      </v-col>
                      <v-col class="a">
                        dmn aja
                      </v-col>
                    </v-row>               
                    <v-row>
                      <v-col class="q">
                        No. Telp
                      </v-col>
                      <v-col class="a">
                        084571
                      </v-col>
                    </v-row>               
                  </v-card-text>
          
                  <v-divider></v-divider>
          
                  <!-- <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                      color="primary"
                      text
                      @click="dialogProfil = false"
                    >
                    </v-btn>
                  </v-card-actions> -->
                </v-card>
              </v-dialog>
            </div>
            </v-list-item>
  
            <!-- <v-list-item>
              <v-list-item-action>
                <v-switch
                  v-model="hints"
                  color="purple"
                ></v-switch>
              </v-list-item-action>
              <v-list-item-title>Enable hints</v-list-item-title>
            </v-list-item> -->
          </v-list>
  
          <v-card-actions>
            <v-spacer></v-spacer>
  
            <!-- <v-btn
              text
              @click="menu = false"
            >
              Cancel
            </v-btn>
            <v-btn
              color="primary"
              text
              @click="menu = false"
            >
              Save
            </v-btn> -->
          </v-card-actions>
        </v-card>
      </v-menu>
          <div class="info-logout">
             
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
          style="background: #539165; font-weight: 700;"
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
                                v-model="nama"
                              ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="4">
                              <v-text-field
                                label="Jenis Kelamin"
                                v-model="jenis_kelamin"
                              ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="4">
                              <v-text-field
                                label="Pendidikan"
                                v-model="pendidikan"
                              ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="4">
                              <v-text-field
                                label="Jabatan"
                                v-model="jabatan"
                              ></v-text-field>
                            </v-col>
                            <v-col>
                              <v-textarea 
                              clearable 
                              label="Alamat" 
                              v-model="alamat">
                              </v-textarea>
                            </v-col>
                            <v-col cols="12" sm="6" md="4">
                              <v-text-field
                                label="No. Telepon"
                                v-model="telepon"
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
                    <th class="text-left">Nama</th>
                    <th class="text-left">Jenis Kelamin</th>
                    <th class="text-left">Pendidikan</th>
                    <th class="text-left">Jabatan</th>
                    <th class="text-left">Alamat</th>
                    <th class="text-left">No. Telepon</th>
                    <th class="text-left">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in data_guru" :key="item.id">
                    <td style="width: 100px">{{ item.nama }}</td>
                    <td style="width: 100px">{{ item.jenis_kelamin }}</td>
                    <td style="width: 100px">{{ item.pendidikan }}</td>
                    <td style="width: 100px">{{ item.jabatan }}</td>
                    <td style="width: 100px">{{ item.alamat }}</td>
                    <td style="width: 100px">{{ item.telepon }}</td>
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
                              @click.prevent="remove(item.id , index)"
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
    </div>
</template>
<script>
export default{
  created() {
    console.log("ok")
    const endpoint = "http://localhost/PJBL2023/api_pjbl/public/data_guru"
    

    fetch(endpoint,
      {
        // mode: 'no-cors',
        // method: 'GET',
        headers: {
          // 'Content-Type': 'application/json',
          // 'Access-Control-Allow-Origin' : 'http://localhost:3000/',
          // "Access-Control-Allow-Credentials" : true ,
          // 'Access-Control-Allow-Headers' : '*',
          // 'Access-Control-Allow-Methods' : 'index,create,update,delete',
          // 'Content-Type': 'application/x-www-form-urlencoded',
          
        },
      })
      .then(result => result.json())
      // .then(result => console.log(result))

    .then(result => {
      this.data_guru=result.data
      console.log(result.data)
    })
  },

    data: () => ({
     data_guru : [],
     cari: null,
     dialog: false,
     dialogProfil: false,
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
      closeAdd(){
        this.dialog = false;
        this.$nextTick(() => {
          this.editGuru = Object.assign({}, this.defaultGuru);
          this.editIndex = -1;
        })
      },
       save() {
        var data_guru = {
          nama : this.nama,
          jenis_kelamin : this.jenis_kelamin,
          pendidikan : this.pendidikan,
          jabatan : this.jabatan,
          alamat : this.alamat,
          telepon : this.telepon,
        }
        this.$axios.post("http://localhost/PJBL2023/api_pjbl/public/data_guru", data_guru)
      
        .then(() => this.$router.push("/dashboard")) ;
     
      },
      remove(id, index) {
        this.$axios.delete(`http://localhost/PJBL2023/api_pjbl/public/data_guru/${id}`)
     .then(response => {
         this.data_guru.splice(index, 1);
         console.log(response);
      }).catch(error => {
         console.log(error.response);
  });
      }
    },
}
</script>
<style>
.semua {
  font-family: 'Poppins', sans-serif;
}
.profile-btn{
  text-align: left;
}
.q{
  font-weight: 700;
}
</style>
