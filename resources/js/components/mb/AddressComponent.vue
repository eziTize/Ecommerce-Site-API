<template>
  <span>
    <section class="inner-title-main">
      <div class="container">
        <div class="inner-title-list">
          <ul>
            <li><router-link to="/dashboard">Dashboard </router-link> <i class="fas fa-angle-right" aria-hidden="true"></i> </li>
            <li><a>Saved Address</a></li>
          </ul>
        </div>
      </div>
    </section>

    <section class="dashbord-page">
      <div class="container">
     <div class="address-page-body">
      <div class="row">
        <div class="col-md-4" v-for="addr in address" v-bind:key="address.id">
          <div class="single-address-section">
            <div class="order-details-address">
              </label>
              <h3>{{addr.adr_name}}</h3>
              <p>{{addr.bld_apt}}, {{addr.address}}, {{addr.city}}, {{addr.postal}}, {{addr.region}}, {{addr.country}}</p>
                <ul><li><button @click="editAddress(addr.id)">Edit</button> | </li>
                <li><button @click="removeAdr(addr.id)">Remove</button></li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="single-address-section">
            <div class="order-details-address">
              <button class="add-new-address" v-on:click="storeAdrModal()"> Add new address
                <img src="assets/images/add-icon.png" alt="" title="">
              </button>
            </div>
          </div>
        </div>
      </div>
     </div>
      </div>
    </section>

      <div v-if="adrModal" class="adrmodal">
          <div> <button  @click="tglAdrModal()" title="Close" class="adrclose">X</button>
                          <form id="contact-form" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0"> 
                                            <label for="adr_name" class="man-field">*</label>
                                            <input type="text" id="adr_name" v-model="adr_name" class="form-control contact-input" placeholder="Address Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="md-form mb-0"> 
                                            <label for="bld_apt" class="man-field">*</label>
                                            <input type="text" id="bld_apt" v-model="bld_apt" class="form-control contact-input" placeholder="Building/Apartment">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <label for="addrs" class="man-field">*</label>
                                            <textarea type="text" id="addrs" v-model="addrs" rows="2" class="form-control contact-input md-textarea" placeholder="Street Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="city" class="man-field">*</label>
                                            <input type="text" id="city" v-model="city" class="form-control contact-input" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="postal" class="man-field">*</label>
                                            <input type="text" id="postal" v-model="postal" class="form-control contact-input" placeholder="Postal">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="region" class="man-field"></label>
                                            <input type="text" id="region" v-model="region" class="form-control contact-input" placeholder="Region">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="country" class="man-field">*</label>
                                            <input type="text" id="country" v-model="country" class="form-control contact-input" placeholder="Country">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button v-if="storeAdr" class="btn contact-send" v-on:click.prevent="addAddress()">Enviar</button>
                                    <button v-else class="btn contact-send" v-on:click.prevent="updateAddress(id)">Actualizar</button>
                                </div>
                          </form>
          </div>
      </div>
  </span>
</template>

<script>
    export default {
        metaInfo: {
            titleTemplate: 'Saved Address - %s'
        },
        data() {
            return {
               address:[],
               addr:{
                  id: '',
                  adr_name: '',
                  address: '',
                  bld_apt: '',
                  city: '',
                  region: '',
                  postal: '',
                  country: ''
               },
               adrModal: false,
               id: '',
               adr_name: '',
               addrs: '',
               bld_apt: '',
               city: '',
               region: '',
               postal: '',
               country: '',
               storeAdr: false,
            }
        },
        mounted() {
            this.fetchAddress();
        },
        methods: {

            tglAdrModal(){
              this.adr_name = '';
              this.addrs = '';
              this.adr_name = '';
              this.bld_apt = '';
              this.region = '';
              this.postal = '';
              this.country = '';
              this.adrModal = !this.adrModal;
              this.storeAdr = false;

            },
            storeAdrModal(){
              this.adrModal = !this.adrModal;
              this.storeAdr = true;
            },
            fetchAddress(){
              axios.get(this.apiRootUrl+'/address', {
                    headers: {
                        authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                    }
                  }).then(response => {
                let data = response.data;
                this.address = data.data;
             })
            },
            editAddress(adr_id){
              this.adrModal = !this.adrModal;
              axios.get(this.apiRootUrl+'/address/'+ adr_id +'/edit', {
                    headers: {
                        authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                    }
                  }).then(response => {
                let data = response.data;
                this.id = data.data.id;
                this.adr_name = data.data.adr_name;
                this.addrs = data.data.address;
                this.city = data.data.city;
                this.bld_apt = data.data.bld_apt;
                this.region = data.data.region;
                this.postal = data.data.postal;
                this.country = data.data.country;
             })
            },

            removeAdr(adr_id){

              this.$swal({
                title: 'Are you sure?',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: `Yes`,
                cancelButtonText: `Cancel`,
              }).then((result) => {
                if (result.isConfirmed) {
                      axios.delete(this.apiRootUrl+'/address/'+ adr_id +'/destroy', {
                        headers: {
                           authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                        },
                      }).then(response => {
                        this.fetchAddress();
                        this.$swal('Success', response.data.message, 'success');
                     })
                    .catch((error) => {
                      this.$swal('Error', response.data.message, 'error');
                     })
                }
              })
            },
            addAddress(){

               if ( this.adr_name.length <= 0 || this.addrs.length <= 0 || this.bld_apt.length <= 0 || this.city.length <= 0 || this.country.length <= 0 || this.postal.length <= 0 ){
                this.adrModal = !this.adrModal;
                this.$swal('Warning', 'Please fillup all the fields', 'warning');
              }

              else{

                      axios.post(this.apiRootUrl+'/address/store',  {
                      adr_name: this.adr_name,
                      address: this.addrs,
                      bld_apt: this.bld_apt,
                      city: this.city,
                      region: this.region,
                      postal: this.postal,
                      country: this.country
                      }, 
                      {
                        headers: {
                        authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                      }
                  })
                .then (res => {

                      this.adr_name = '';
                      this.addrs = '';
                      this.adr_name = '';
                      this.bld_apt = '';
                      this.region = '';
                      this.postal = '';
                      this.country = '';
                      this.adrModal = !this.adrModal;
                      this.fetchAddress();
                      this.storeAdr = false;
                      this.$swal('Success', res.data.message, 'success');
                })
                .catch((error) => {
                        this.$swal('Error', res.data.message, 'error');
                  })
              }
          },
          updateAddress(adr_id){

            if ( this.adr_name.length <= 0 || this.addrs.length <= 0 || this.bld_apt.length <= 0 || this.city.length <= 0 || this.country.length <= 0 || this.postal.length <= 0 ){
                this.adrModal = !this.adrModal;
                this.$swal('Warning', 'Please fillup all the fields', 'warning');
              }

              else{
                        axios.put(this.apiRootUrl+'/address/'+ adr_id +'/update', {
                        adr_name: this.adr_name,
                        address: this.addrs,
                        bld_apt: this.bld_apt,
                        city: this.city,
                        region: this.region,
                        postal: this.postal,
                        country: this.country
                        }, 
                        {
                          headers: {
                          authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                        }
                    })
                  .then (res => {

                        this.adr_name = '';
                        this.addrs = '';
                        this.adr_name = '';
                        this.bld_apt = '';
                        this.region = '';
                        this.postal = '';
                        this.country = '';
                        this.adrModal = !this.adrModal;
                        this.fetchAddress();
                        this.$swal('Success', res.data.message, 'success');
                  })
                  .catch((error) => {
                          this.$swal('Error', res.data.message, 'error');
                      })
              }
          }
      },
    }
</script>

<style scoped>
.adrmodal {
    position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 99999;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    opacity:1;
    pointer-events: auto;
}
.adrmodal > div {
    width: 600px;
    position: relative;
    margin: 10% auto;
    padding: 35px 20px 13px 15px;
    padding-left: 35px;
    padding-right: 35px;
    border-radius: 10px;
    background: #fff;
    background: -moz-linear-gradient(#fff, #999);
    background: -webkit-linear-gradient(#fff, #999);
    background: -o-linear-gradient(#fff, #999);
}
.adrclose {
    background: #606061;
    color: #FFFFFF;
    line-height: 25px;
    position: absolute;
    right: -12px;
    text-align: center;
    top: -10px;
    width: 24px;
    text-decoration: none;
    font-weight: bold;
    -webkit-border-radius: 12px;
    -moz-border-radius: 12px;
    border-radius: 12px;
    -moz-box-shadow: 1px 1px 3px #000;
    -webkit-box-shadow: 1px 1px 3px #000;
    box-shadow: 1px 1px 3px #000;
}
.adrclose:hover {
    background: #00d9ff;
}
</style>