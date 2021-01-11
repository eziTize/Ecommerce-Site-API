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
        <div class="col-md-4">
          <div class="single-address-section">
            <div class="order-details-address">
               <input type="radio" id="featured-1" name="featured" checked><label for="featured-1">Active</label>
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
          <div class="col-md-4">
          <div class="single-address-section">
            <div class="order-details-address">
               <input type="radio" id="featured-2" name="featured"><label for="featured-2">Select this address</label>
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
          <div class="col-md-4">
          <div class="single-address-section">
            <div class="order-details-address">
               <input type="radio" id="featured-3" name="featured"><label for="featured-3">Select this address</label>
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
          <div class="col-md-4">
          <div class="single-address-section">
            <div class="order-details-address">
              <a class="add-new-address" href="#"> Add new address
                <img src="assets/images/add-icon.png" alt="" title="">
              </a>
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
            titleTemplate: 'Saved Address - %s'
        }
    }
</script>

<style scoped>
    
</style>