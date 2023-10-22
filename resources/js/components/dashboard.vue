<template>
  <v-app>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ $t('message.DASHBOARD') }}</h1>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
                <MonthlySalesChart></MonthlySalesChart>
            </div>
            <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fa fa-cubes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$t('message.ORDERS')}}</span>
                <span class="info-box-number">12</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fa fa-barcode"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$t('message.PRODUCTS')}}</span>
                <span class="info-box-number">15,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa fa-object-group"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$t('message.PRODUCT_CATEGORIES')}}</span>
                <span class="info-box-number">200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <div class="info-box mb-3 bg-secondary">
              <span class="info-box-icon"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$t('message.CUSTOMERS')}}</span>
                <span class="info-box-number">50</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$t('message.SYSTEM_USERS')}}</span>
                <span class="info-box-number">3</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">{{$t('message.LATEST_ORDERS')}}</h3>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool"  data-toggle="collapse" data-target="#demo">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table table-responsive table-hover table-bordered collapse-in" id="demo">
                  <table class="table m-0" >
                    <thead>
                    <tr>
                      <th>{{$t('message.ORDER_NUMBER')}}</th>
                      <th>{{$t('message.CUSTOMER')}}</th>
                      <th>{{$t('message.GRAND_TOTAL')}}</th>
                      <th>{{$t('message.STATUS')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>0001</td>
                        <td>Asad Amjad</td>
                        <td>50000</td>
                        <td>Delivered</td>
                      </tr>
                      <tr>
                        <td>0001</td>
                        <td>Asad Amjad</td>
                        <td>50000</td>
                        <td>Delivered</td>
                      </tr>
                      <tr>
                        <td>0001</td>
                        <td>Asad Amjad</td>
                        <td>50000</td>
                        <td>Delivered</td>
                      </tr>
                      <tr>
                        <td>0001</td>
                        <td>Asad Amjad</td>
                        <td>50000</td>
                        <td>Delivered</td>
                      </tr>
                      <tr>
                        <td>0001</td>
                        <td>Asad Amjad</td>
                        <td>50000</td>
                        <td>Delivered</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            </div>
            <!-- /.card -->
            </div>
            <div class="col-6">
              <QuarterlySalesGraph></QuarterlySalesGraph>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
  </v-app>
</template>

<script>
import MonthlySalesChart from "./charts/monthlySalesChart.vue";
import QuarterlySalesGraph from "./charts/quarterlySalesGraph.vue";
export default {
    data() {
        return {
          dashboardSummary: [],
          saleAmountSummary:{},
          salePaymentAmountSummary:{},
          expenseAmountSummary:{},
          getLatestOrders:{},
            data: [],
        };
    },
    methods: {
    //   getData() {
    //   this.$Progress.start();
    //   axios
    //     .get("api/dashboard")
    //     .then((response) => {
    //       this.dashboardSummary = response.data;
    //       axios
    //       .get("api/saleAmountSummary")
    //       .then((response) => {
    //         this.saleAmountSummary = response.data;
    //         axios
    //         .get("api/salePaymentAmountSummary")
    //         .then((response) => {
    //           this.salePaymentAmountSummary = response.data;
    //         axios
    //         .get("api/expenseAmountSummary")
    //         .then((response) => {
    //           this.expenseAmountSummary = response.data;
    //           axios
    //           .get("api/getLatestOrders")
    //           .then((response) => {
    //             this.getLatestOrders = response.data;
    //           })
    //         })
    //       })
    //     })
    //       this.$Progress.finish();
    //     })
    //     .catch(() => {
    //       this.$Progress.fail();
    //       this.loading = false;
    //     });
    // },
    },
    mounted() {
       this.getData();
    },
    components: { MonthlySalesChart, QuarterlySalesGraph }
};
</script>