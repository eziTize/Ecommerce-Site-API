<template>
  <span>
    <section class="inner-title-main">
      <div class="container">
        <div class="inner-title-list">
          <ul>
            <li><router-link to="/dashboard">Dashboard </router-link> <i class="fas fa-angle-right" aria-hidden="true"></i> </li>
            <li><a>Order List</a></li>
          </ul>
        </div>
      </div>
    </section>

 <div class="container header-primary">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <button class="nav-link" style="font-size: 20px; padding: 10px; margin-right: 10px;" v-on:click="toggleTabs(1)" v-bind:class="{'': openTab !== 1, 'activeTab': openTab === 1}">Products</button>
                    </li>
                 
                    <li class="nav-item">
                        <button class="nav-link" style="font-size: 20px; padding: 10px;" v-on:click="toggleTabs(2)" v-bind:class="{'': openTab !== 2, 'activeTab': openTab === 2}">Services</button>
                    </li>
                </ul>
            </div>
        </div>
  </div>


  <!-- Products Section -->
    <section class="dashbord-page" v-bind:class="{'hiddenSection': openTab !== 1, '': openTab === 1}">
      <div class="container">
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img1.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>ACOUSTIC GUITAR</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img2.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>ACOUSTIC GUITAR</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img3.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>ACOUSTIC GUITAR</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img4.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>ACOUSTIC GUITAR</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img5.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>ACOUSTIC GUITAR</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img6.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>ACOUSTIC GUITAR</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Products Section -->

    <!-- Services Section -->
    <section class="dashbord-page" v-bind:class="{'hiddenSection': openTab !== 2, '': openTab === 2}">
      <div class="container">
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img1.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>Service 1</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img2.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>Service 2</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img3.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>Service 3</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img4.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>Service 4</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-body">
          <div class="row">
            <div class="col-md-2">
              <div class="product-list-img">
                <img src="assets/images/product-img5.jpg" title="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="product-list-content">
                <h3>Service 5</h3>
                <p>Lorem Ipsum is simply dummy text of the</p>
              </div>
            </div>
            <div class="col-md-1">
              <div class="product-list-price">
                <span class="price-value">$180</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="product-list-status">
                <p>Delivered on Jul 18, 2018</p>
                <span>Your item has been delivered</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="product-view-details">
                <button class="order-l-btn" type="button">View Details</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Services Section -->
  </span>
</template>

<script>
    export default {
        metaInfo: {
            titleTemplate: 'Order List - %s'
        },
        data: () => {
            return{
                openTab: 1,
                openBox: 1,
             }
           },
        methods: {
            toggleTabs: function(tabNumber){
              this.openTab = tabNumber
            },

            toggleBox: function(boxNumber){
              this.openBox = boxNumber
            },
        },
    }
</script>

<style scoped>
.activeTab{
  background-color: rgb(27 67 195); 
  color: white;
}
.hiddenSection{
  display: none;
}

</style>