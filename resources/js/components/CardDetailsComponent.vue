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
        <h3 class="payment-pethod-title">Payment Method</h3>
        <div class="row">
        <div class="col-md-7">
          <div class="payment-method-body">
            <div class="payment-method-subtitle">
            <h4>Card Payment</h4>
            <a href="" class="add-new-card"> <i class="fas fa-plus"></i> Add new card</a>
          </div>
            <ul class="card-payment">
              <li class="active"><span class="card-img"><input type="radio" id="featured-1" name="featured" checked><img src="assets/images/visa-png.png" title="visa" alt="visa"></span><span class="card-content"><p>**** **** **** 4565</p> <span class="card-name">Visa</span></span>
                <span class="edit-re-main">
                <a href="#" class="edit-remove">Edit | </a>
               <a href="#" class="edit-remove">Remove</a>
             </span></li>
               <li><span class="card-img"><input type="radio" id="featured-2" name="featured"><img src="assets/images/master-card.png" title="master" alt="master"></span><span class="card-content"><p>**** **** **** 8454</p> <span class="card-name">Master</span></span>
                <span class="edit-re-main">
                <a href="#" class="edit-remove">Edit | </a>
               <a href="#" class="edit-remove">Remove</a>
             </span></li>
                <li><span class="card-img"><input type="radio" id="featured-3" name="featured"><img src="assets/images/rupay-card.png" title="rupay" alt="rupay"></span><span class="card-content"><p>**** **** **** 9977</p> <span class="card-name">Rupay</span></span>
                 <span class="edit-re-main">
                <a href="#" class="edit-remove">Edit | </a>
               <a href="#" class="edit-remove">Remove</a>
             </span></li>
            </ul>
          </div>
        </div>
         <div class="col-md-5">
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
        </div>
      </div>
      </div>
      </div>
    </section>
  </span>
</template>

<script>
    export default {
        metaInfo: {
            titleTemplate: 'Saved Card Details - %s'
        }
    }
</script>

<style scoped>
    
</style>