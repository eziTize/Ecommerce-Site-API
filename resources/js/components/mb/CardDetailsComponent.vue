<template>
  <span>
    <section class="inner-title-main">
      <div class="container">
        <div class="inner-title-list">
          <ul>
            <li><router-link to="/dashboard">Dashboard </router-link> <i class="fas fa-angle-right" aria-hidden="true"></i> </li>
            <li><a>Saved Card Details</a></li>
          </ul>
        </div>
      </div>
    </section>

    <section class="dashbord-page">
      <div class="container">
      <div class="card-details-page">
        <h3 class="payment-pethod-title">Saved Cards</h3>
        <div class="row">
        <div class="col-md-12">
          <div class="payment-method-body">
            <div class="payment-method-subtitle">
            <button @click="storeCardModal()" class="add-new-card"> <i class="fas fa-plus"></i> Add new card</button>
          </div>
            <ul class="card-payment">
              <li v-for="crd in card" v-bind:key="card.id"><span class="card-img"><img v-if="crd.c_type=='visa'" src="assets/images/visa-png.png" title="visa" alt="visa">
              <img v-if="crd.c_type=='master'" src="assets/images/master-card.png" title="master" alt="master">
              </span><span class="card-content"><p>**** **** **** {{crd.c_number}}</p> <span class="card-name">{{crd.holder}}</span><br>
              <span class="card-name">{{crd.validity}}</span> <br>
              <span class="card-name">{{crd.card_name}}</span>
              </span>
                <span class="edit-re-main">
                <button class="edit-remove" @click="editCard(crd.id)">Edit | </button>
               <button  @click="removeCard(crd.id)" class="edit-remove">Remove</button>
             </span></li>
             <!--  <li class="active"><span class="card-img"><input type="radio" id="featured-2" name="featured"><img src="assets/images/master-card.png" title="master" alt="master"></span><span class="card-content"><p>**** **** **** 8454</p> <span class="card-name">Master</span></span>
                <span class="edit-re-main">
                <a href="#" class="edit-remove">Edit | </a>
               <a href="#" class="edit-remove">Remove</a>
             </span></li>
                <li><span class="card-img"><input type="radio" id="featured-3" name="featured"><img src="assets/images/rupay-card.png" title="rupay" alt="rupay"></span><span class="card-content"><p>**** **** **** 9977</p> <span class="card-name">Rupay</span></span>
                 <span class="edit-re-main">
                <a href="#" class="edit-remove">Edit | </a>
               <a href="#" class="edit-remove">Remove</a>
             </span></li> -->
            </ul>
          </div>
        </div>
      <!--   <div class="col-md-5">
          <div class="single-address-section">
            <div class="order-details-address">
              <label for="featured-1">Active</label>
              <h3>Stive Smith</h3>
              <p>CHAKDAHA ROAD, BONGAON, VILL-POLTA, P.O- NUTAN GRAM BONGAON, POLTA FP SCHOOL Bangaon - 743235, West Bengal</p>
               <h3>Phone number</h3>
              <p>8768611937, 9002248498</p>
                <ul><li><a href="#">Edit</a> | </li>
                <li><a href="#">Remove</a></li>
              </ul>
            </div>
          </div>
        </div> -->
      </div>
      </div>
      </div>
    </section>
<div v-if="cardModal" class="cardmodal">
  <div> <button  @click="tglcardModal()" title="Close" class="cardclose">X</button>
    
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> <span>SAVE CREDIT/DEBIT CARD</span> </div>
                            <div class="col-md-6 text-right" style="margin-top: -5px;"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png"> <img src="https://img.icons8.com/color/36/000000/amex.png"> </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 350px">
                        <div class="form-group"> <label for="numeric" class="control-label">CARD NAME</label> <input type="text" class="input-lg form-control" v-model="card_name">
                        </div>
                        <div class="form-group"> <label for="name" class="control-label">CARD HOLDER NAME</label> <input type="text" class="input-lg form-control" v-model="holder"> </div>
                        <div class="form-group"> <label for="cc-number" class="control-label">CARD NUMBER</label> <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" v-model="c_number" required> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <label for="cc-exp" class="control-label">CARD EXPIRY</label> <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" v-model="validity" required> </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group"> <label for="cardtype" class="control-label">CARD TYPE</label> 
                                  <select type="select" class="input-lg form-control" v-model="c_type" required>
                                    <option value="visa">Visa</option>
                                    <option value="master">Master Card</option>
                                    <option value="other">Others</option>
                                  </select>
                                 </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <button v-if="storeCard" class="btn btn-success btn-lg form-control" style="font-size: 1.4rem; padding: 4px;" v-on:click.prevent="addCard()">Save Card</button>
                          <button v-else class="btn btn-success btn-lg form-control" style="font-size: 1.4rem; padding: 4px;" v-on:click.prevent="updateCard(id)">Update Card</button>
                        </div>
                    </div>
                </div>

</div>
</div>
  </span>
</template>

<script>
    export default {
        metaInfo: {
            titleTemplate: 'Saved Card Details - %s'
        },
                data() {
            return {
               card:[],
               crd:{
                  id: '',
                  card_name: '',
                  holder: '',
                  c_number: '',
                  validity: '',
                  c_type: '',
               },
               cardModal: false,
               id: '',
               card_name: '',
               holder: '',
               c_number: '',
               validity: '',
               c_type: '',
               storeCard: false,
            }
        },
        mounted() {
            this.fetchCard();

        },
        methods: {
            tglcardModal(){
              this.card_name = '';
              this.holder = '';
              this.c_number = '';
              this.validity = '';
              this.c_type = '';
              this.cardModal = !this.cardModal;
              this.storeCard = false;

            },
            storeCardModal(){
              this.cardModal = !this.cardModal;
              this.storeCard = true;
            },
            fetchCard(){
              axios.get(this.apiRootUrl+'/cards', {
                    headers: {
                        authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                    }
                  }).then(response => {
                let data = response.data;
                this.card = data.data;
             })
            },
            editCard(card_id){
              this.cardModal = !this.cardModal;
              axios.get(this.apiRootUrl+'/card/'+ card_id +'/edit', {
                    headers: {
                        authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                    }
                  }).then(response => {
                let data = response.data;
                this.id = data.data.id;
                this.card_name = data.data.card_name;
                this.holder = data.data.holder;
                this.c_number = data.data.c_number;
                this.validity = data.data.validity;
                this.c_type = data.data.c_type;
             })
            },

            removeCard(card_id){

              this.$swal({
                title: 'Are you sure?',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: `Yes`,
                cancelButtonText: `Cancel`,
              }).then((result) => {
                if (result.isConfirmed) {
                axios.delete(this.apiRootUrl+'/card/'+ card_id +'/destroy', {
                  headers: {
                     authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                  },
                }).then(response => {
                  this.fetchCard();
                  this.$swal('Success', response.data.message, 'success');
               })
              .catch((error) => {
                this.$swal('Error', response.data.message, 'error');
               })
             }
            })
          },
            addCard(){

              if ( this.card_name.length <= 0 || this.holder.length <= 0 || this.c_number.length <= 0 || this.validity.length <= 0 || this.c_type.length <= 0){
                this.cardModal = !this.cardModal;
                this.$swal('Warning', 'Please fillup all the fields', 'warning');
              }

              else{
              axios.post(this.apiRootUrl+'/card/store',  {

              card_name: this.card_name,
              holder: this.holder,
              c_number: this.c_number,
              validity: this.validity,
              c_type: this.c_type,
              }, 
              {
                headers: {
                authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
              }
          })
        .then (res => {

              this.card_name = '';
              this.holder = '';
              this.c_number = '';
              this.validity = '';
              this.c_type = '';
              this.cardModal = !this.cardModal;
              this.fetchCard();
              this.storeCard = false;
              this.$swal('Success', res.data.message, 'success');
        })
        .catch((error) => {
                this.$swal('Error', res.data.message, 'error');
            })
        }
      },
          updateCard(card_id){

            if ( this.card_name.length <= 0 || this.holder.length <= 0 || this.c_number.length <= 0 || this.validity.length <= 0 || this.c_type.length <= 0){
                this.cardModal = !this.cardModal;
                this.$swal('Warning', 'Please fillup all the fields', 'warning');
              }

              else{
              axios.put(this.apiRootUrl+'/card/'+ card_id +'/update', {

              card_name: this.card_name,
              holder: this.holder,
              c_number: this.c_number,
              validity: this.validity,
              c_type: this.c_type,
              }, 
              {
                headers: {
                authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
              }
          })
        .then (res => {

              this.card_name = '';
              this.holder = '';
              this.c_number = '';
              this.validity = '';
              this.c_type = '';
              this.cardModal = !this.cardModal;
              this.fetchCard();
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
  .padding {
    padding: 5rem !important
}

.form-control:focus {
    box-shadow: 10px 0px 0px 0px #ffffff !important;
    border-color: #4ca746
}
.cardmodal {
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
.cardmodal > div {
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
.cardclose {
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
.cardclose:hover {
    background: #00d9ff;
}
</style>