<template>
  <span>
    <section class="inner-title-main">
      <div class="container">
        <div class="inner-title-list">
          <ul>
            <li><router-link to="/dashboard">Dashboard </router-link></li>
          </ul>
        </div>
      </div>
    </section>

    <section class="dashbord-page">
      <div class="container">
        <div class="dashbord-body">
          <div class="row">
            <div class="col-md-4">
              <router-link to="/order" class="db-a">
                <div class="single-db">
                  <div class="single-db-img">
                    <img src="assets/images/db-order.png" alt="" title="">
                  </div>
                  <div class="single-db-content">
                    <h3>Order List</h3>
                    <p>Click here to view your ordered items list</p>
                  </div>
                </div>
              </router-link>
            </div>

            <div class="col-md-4">
              <router-link to="/address" class="db-a">
                <div class="single-db">
                  <div class="single-db-img">
                    <img src="assets/images/db-location.png" alt="" title="">
                  </div>
                  <div class="single-db-content">
                    <h3>Saved Address</h3>
                    <p>Click here to view your saved address</p>
                  </div>
                </div>
              </router-link>
            </div>

            <div class="col-md-4">
              <router-link to="/card-details" class="db-a">
                <div class="single-db">
                  <div class="single-db-img">
                    <img src="assets/images/db-card.png" alt="" title="">
                  </div>
                  <div class="single-db-content">
                    <h3>Saved Card Details</h3>
                    <p>Click here to view your saved card details</p>
                  </div>
                </div>
              </router-link>
            </div>

            <div class="col-md-4">
              <router-link to="/profile" class="db-a">
                <div class="single-db">
                  <div class="single-db-img">
                    <img src="assets/images/db-profile.png" alt="" title="">
                  </div>
                  <div class="single-db-content">
                    <h3>My Profile</h3>
                    <p>Click here to view your profile information</p>
                  </div>
                </div>
              </router-link>
            </div>

            <div class="col-md-4">
              <router-link to="/change-password" class="db-a">
                <div class="single-db">
                  <div class="single-db-img">
                    <img src="assets/images/db-password.png" alt="" title="">
                  </div>
                  <div class="single-db-content">
                    <h3>Change Password</h3>
                    <p>Click here to change your existing password</p>
                  </div>
                </div>
              </router-link>
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
            titleTemplate: 'Dashboard - %s'
        }
    }
</script>

<style scoped>
    
</style>